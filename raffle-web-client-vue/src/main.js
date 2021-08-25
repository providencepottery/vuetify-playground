import Vue from 'vue'
import App from './App.vue'
import Dashboard from '@/components/Dashboard.vue'
import Raffle from '@/components/Raffle.vue'
import vuetify from './plugins/vuetify'
import VueRouter from 'vue-router'

Vue.config.productionTip = false
Vue.use(VueRouter)

const routes = [
    { path: '/', component: Dashboard },
    { path: '/raffle', component: Raffle }
]

const router = new VueRouter({
    mode: 'history',
    routes
})

new Vue({
  vuetify,
  router,
  render: h => h(App)
}).$mount('#app')
