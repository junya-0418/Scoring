/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Paginate from 'vuejs-paginate';

// import Vuetify from 'vuetify';
// import 'vuetify/dist/vuetify.min.css';
// Vue.use(Vuetify);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('evaluation-form', require('./components/evaluation_form.vue').default);
Vue.component('globalmenu-component', require('./components/GlobalMenu.vue').default);
Vue.component('globalmenu-component_sp', require('./components/GlobalMenu_sp.vue').default);
Vue.component('search-component', require('./components/SearchComponent.vue').default);
Vue.component('side-component', require('./components/SideComponent.vue').default);
Vue.component('matchreview-component', require('./components/matchReview.vue').default);
Vue.component('user-index', require('./components/user-index.vue').default);
Vue.component('user-edit', require('./components/user-edit.vue').default);
Vue.component('checkin', require('./components/Checkin.vue').default);
Vue.component('contact', require('./components/contact.vue').default);
Vue.component('paginate', Paginate);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const router = new VueRouter({
//     mode: 'history'
// });

const app = new Vue({
    el: '#app',
});






