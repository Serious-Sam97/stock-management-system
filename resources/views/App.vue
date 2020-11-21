<template>
    <div>
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

        <v-app>
            <header-menu/>

            <div class="container">
                <v-container>
                    <v-card elevation="4" style="height: 100px" shaped color="#f2f2f2">
                        <router-view></router-view>
                    </v-card>
                </v-container>
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
