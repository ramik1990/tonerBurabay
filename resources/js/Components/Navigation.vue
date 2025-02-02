<template>
    <nav>
        <ul>
            <li><router-link to="/" :class="{active: currentRoute === '/'}">Главная страница</router-link></li>
            <li><router-link to="/about" :class="{active: currentRoute === '/about'}">О нас</router-link></li>
            <li><router-link to="/record" :class="{active: currentRoute === '/record'}">Записаться</router-link></li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: "mainNavigation",
    computed: {
        currentRoute() {
            return this.$route.path;
        }
    }
}
</script>

<style scoped>
    nav {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgb(77, 77, 77);
        width: 100%;
        height: 50px;
    }
    nav ul {
        display: flex;
        justify-content: space-around;
        align-items: center;
        width: 90%;
        height: 100%;
        gap: 20px;
        margin: 0;
        padding: 0;
    }
    nav ul li {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    nav ul li a {
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        text-decoration: none;
        font-weight: bolder;
        text-transform: uppercase;
        cursor: pointer;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: rgb(255, 255, 255);
    }
    nav ul li a:hover {
        transition: all .3s linear;
        background-color: aliceblue;
        color: rgb(77, 77, 77);
    }
    .active {
        background-color: white;
        color: rgb(77, 77, 77);
    }
</style>