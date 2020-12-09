require('./bootstrap');
require('alpinejs');



// Vue.js

window.Vue = require('vue');
import VueRouter from 'vue-router'
Vue.use(VueRouter)

Vue.component('cours', require('./components/cours.component').default)
Vue.component('faq', require('./components/faq.component').default)
Vue.component('modifyuser', require('./components/modify-user.component').default)
Vue.component('user', require('./components/user.component').default)

// Vue router

const routes = [
    { path: '/user', component: require('./components/user.component.vue') },
    { path: '/cours', component: require('./components/cours.component.vue') },
    { path: '/faq', component: require('./components/faq.component.vue') },
    { path: '/profile', component: require('./components/modify-user.component.vue') }
]

const router = new VueRouter({
    routes // raccourci pour `routes: routes`
})

new Vue({
    router,
    el: '#app'
})