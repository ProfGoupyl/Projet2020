require('./bootstrap');
require('alpinejs');



// Vue.js

window.Vue = require('vue');

Vue.component('cours', require('./components/cours.component').default)
Vue.component('faq', require('./components/faq.component').default)
Vue.component('modifyuser', require('./components/modify-user.component').default)
Vue.component('user', require('./components/user.component').default)

new Vue({
    el: '#app'
})