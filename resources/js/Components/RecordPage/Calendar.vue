<template>
    <timeline :day="dayToTimeline" />
    <table border="1" v-if="calendarOnMonth.length">
        <thead>
            <tr>
                <th>ПН</th>
                <th>ВТ</th>
                <th>СР</th>
                <th>ЧТ</th>
                <th>ПТ</th>
                <th>СБ</th>
                <th>ВС</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(week, index) in getWeeks()" :key="index">
                <td v-for="day in week" :key="day?.day" :class="day?.is_weekend ? 'holiday' : ''" @click="toTimeline(day)">
                    {{ day ? day.day : '' }}
                </td>
            </tr>
        </tbody>
    </table> 
    <h3 v-else align="center">Загрузка...</h3> 
</template>

<script>
import axios from 'axios';
import DayTimeLine from './DayTimeLine.vue';

export default {
    name: "Calendar",
    props: {
        year: Number,
        month: Number
    },
    components: {
        'timeline' : DayTimeLine
    },
    data() {
        return {
            calendarOnMonth: [],
            dayToTimeline: null
        }
    },
    methods: {
        getCalendar(year, month) {
            axios.get(`/api/calendar/${year}/${month}`).then( response => {
                this.calendarOnMonth = response.data;
            });
        },
        getWeeks(){
            if (!this.calendarOnMonth || this.calendarOnMonth.length === 0) return [];
            let weeks = [];
            let week = [];
            let firstDayofMonth = this.calendarOnMonth[0];
            let firstDayIndex = this.getDayIndex(firstDayofMonth.day_of_week);
            for(let i = 0; i < firstDayIndex; i++) {
                week.push(null);
            }
            this.calendarOnMonth.forEach((day) => {
                week.push(day);
                if(day.day_of_week === 'Sunday') {
                    weeks.push(week);
                    week = [];
                }
            });
            if (week.length) weeks.push(week);
            return weeks;
        },
        getDayIndex(day) {
            const daysofWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday','Sunday'];
            return daysofWeek.indexOf(day);            
        },
        toTimeline(day) {
            this.dayToTimeline = day;
        }
    },
    mounted() {
        this.getCalendar(this.year, this.month);
    }
}
</script>

<style scoped>
table {
    margin: auto;
    min-width: 350px;
    width: 80%;
    border: none;
}
table thead tr th{
    border: none;
    background-color: #4D4D4D;
    text-transform: uppercase;
    color: white;
    font-family: 'Courier New', Courier, monospace;
    font-weight: bolder;
    height: 30px;
}
table td {
    width: 12.7%;
    height: 50px;
    text-align: center;
    border: none;
    background-color: rgb(245, 245, 245);
}
table td:not(:empty):hover {
    transform: scale(1.05);
    box-shadow: #4D4D4D 0 0 2px;
    cursor: pointer;
}
.holiday {
    background-color: rgb(255, 219, 219);
}
</style>