<template>
  <v-app>
    <v-app-bar
      app
      color="primary"
    >   
      <router-link 
              to="/" 
              class="text-button white--text font-weight-bold"
              style="text-decoration: none"
      >
        Dashboard
      </router-link>
      <router-link 
              to="/raffle" 
              class="text-button white--text font-weight-bold ml-5"
              style="text-decoration: none"        
      >
        Raffle
      </router-link>
    </v-app-bar>
    <v-main>
      <router-view />
    </v-main>
  </v-app>
</template>

<script>

export default {
  name: 'App',

  data: () => ({
    //
  }),
};
</script>
