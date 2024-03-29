/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';

// Install BootstrapVue
Vue.use(BootstrapVue);
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('messenger-component', require('./components/MessengerComponent.vue').default);
Vue.component('contacto-component', require('./components/contactoComponent.vue').default);
Vue.component('contactolist-component', require('./components/contactoListComponent.vue').default);
Vue.component('activeconversation-component', require('./components/ActiveConversationComponent.vue').default);
Vue.component('messageconversation-component', require('./components/MessageConversationComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    methods:{
    	logout(){
    		document.getElementById('logout-form').submit();
    	}
    },
    created(){
    	// var userId=($('meta[name="userId"]').attr('content'));
     //    Echo.private('App.User.' + userId)
     //    .notification((notification) => {
     //    });
    }
});
