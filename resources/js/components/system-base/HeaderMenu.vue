<template>
    <div>
      <v-app-bar
      color="teal"
      sms
      flat
      tile
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>

      <v-toolbar-title>{{$route.name}}</v-toolbar-title>
      <v-toolbar-items></v-toolbar-items>

      <v-spacer></v-spacer>
      <h2 style="color: ; cursor: pointer" @click="this.$router.push('/Home')">
          SMS - Stock Management System
      </h2>
    
      <v-spacer></v-spacer>
        
    </v-app-bar>

    <v-navigation-drawer
      v-model="drawer"
      absolute
      bottom
      temporary
    >
      <v-list
        nav
        dense
      >
        <v-list-item-group
          v-model="group"
          active-class="deep-purple--text text--accent-4"
        >
          <v-list-item 
            @click="$router.push(menuItem.url)"
            v-for="(menuItem, menuItemindex) in menuItens" :key="`menuItem-${menuItemindex}`"
          >
            <v-list-item-title>{{menuItem.name}}</v-list-item-title>
          </v-list-item>
          
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>
    </div>
</template>

<script>
    export default {
        name: 'HeaderMenu',
        data: () => ({
            drawer: false,
            group: null,
            menuItens: [
                {
                    name: 'Home',
                    url: '/'
                },
                {
                    name: 'Products',
                    url: '/products'
                },
                {
                    name: 'Product History',
                    url: '/product-history'
                },
            ]
        }),

        watch: {
            group () {
                this.drawer = false
            },
        },
    }
</script>
       