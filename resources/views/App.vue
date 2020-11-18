<template>
    <div>
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

        <v-app>
            <header-menu/>

            <div class="container">
                <router-view></router-view>
            </div>
        </v-app>
    </div>
</template>

<script>
    import HeaderMenu from '../js/components/system-base/HeaderMenu.vue';
    export default {
        name: 'App',
        components: {
            HeaderMenu,
        },
    }
</script>
