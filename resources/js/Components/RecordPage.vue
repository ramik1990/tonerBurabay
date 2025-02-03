<template>
    <h1 align="center">Запись</h1>
    <calendar :year="year" :month="month"/>
</template>

<script>
import Calendar from './RecordPage/Calendar.vue';

export default {
    name: "RecordPage",
    data() {
        return {
            year: null,
            month: null
        }
    },
    components: {
        'calendar' : Calendar
    },
    methods: {
        getCurrentDate() {
            this.year = new Date().getFullYear();
            this.month = new Date().getMonth() + 1;
        }
    },
    created() {
        this.getCurrentDate();
    }
}
</script>

<style scoped>
h1 {
    text-transform: uppercase;
    font-weight: bolder;
    font-family: monospace;
}
</style>