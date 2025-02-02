<template>
    <div>
        <mainNavigation />
        <router-view></router-view>
    </div>
</template>

<script>
    import Navigation from './Navigation.vue';
    
    export default {
        components: {
            'mainNavigation' : Navigation
        }
    }
</script>

<style scoped>

</style>