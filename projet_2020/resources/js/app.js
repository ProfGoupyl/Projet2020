require('./bootstrap')
require('alpinejs')
require('jquery')

window.Vue = require('vue')

Vue.component('cours', require('./components/cours.component').default)
Vue.component('faq', require('./components/faq.component').default)
Vue.component('modifyuser', require('./components/modify-user.component').default)
Vue.component('user', require('./components/user.component').default)
Vue.component('session', require('./components/session.component').default)

new Vue({
    el: '#app',
})