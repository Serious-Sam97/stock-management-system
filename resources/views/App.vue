<template>
    <div>
        <header-menu/>
        HI
        <p>
            <router-link :to="{ name: 'home' }">Home</router-link> |
        </p>

        <div class="container">
            <router-view></router-view>
        </div>
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
