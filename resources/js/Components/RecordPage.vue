<template>
    <h1 align="center">Запись</h1>
    <table border="1" v-if="calendarOnMonth.length">
        <thead>
            <tr>
                <th>Понедельник</th>
                <th>Вторник</th>
                <th>Среда</th>
                <th>Четверг</th>
                <th>Пятница</th>
                <th>Суббота</th>
                <th>Воскресенье</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(week, index) in getWeeks()" :key="index">
                <td v-for="day in week" :key="day?.day">
                    {{ day ? day.day : '' }}
                </td>
            </tr>
        </tbody>
    </table> 
    <h3 v-else align="center">Загрузка...</h3>   
</template>

<script>
import axios from 'axios';

export default {
    name: "RecordPage",
    data() {
        return {
            calendarOnMonth: []
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
        }
    },
    mounted() {
        this.getCalendar(new Date().getFullYear(), new Date().getMonth() + 1);
    }
}
</script>

<style scoped>
h1 {
    text-transform: uppercase;
    font-weight: bolder;
    font-family: monospace;
}
table {
    margin: auto;
    width: 80%;
}
table td {
    width: 12.7%;
    height: 100px;
    text-align: center;
}
</style>