<template>
    <div>
        <h1 align="center">Главная страница</h1>
    </div>
    <div class="logo"></div>
</template>

<script>
export default {
    name: "Home"
}
</script>

<style scoped>
h1 {
    text-transform: uppercase;
    font-weight: bolder;
    font-family:monospace;
}
.logo {
    background-image: url('/images/logo.png');
    background-size: cover; /* Растягивает изображение, чтобы оно покрывало весь блок */
    background-position: center; /* Центрирует изображение */
    background-repeat: no-repeat; /* Не повторяет изображение */
    height: 300px; /* Устанавливаем высоту блока */
    width: 100%; /* Устанавливаем ширину блока */
}

</style>