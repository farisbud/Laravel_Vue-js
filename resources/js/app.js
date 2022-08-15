/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import {Form } from 'vform';
window.Form  = Form;



// import Pagination from 'laravel-vue-pagination';
// Vue.component('pagination', Pagination);

// Vue.component('pagination', Pagination);

Vue.component('pagination', require('laravel-vue-pagination'));

import VueGoodTablePlugin from 'vue-good-table';
import 'vue-good-table/dist/vue-good-table.css';

 import {

//     Button,
     HasError,
     AlertError,
//     AlertErrors,
//     AlertSuccess
   } from 'vform/src/components/bootstrap5'
//   // 'vform/src/components/bootstrap4'
//   // 'vform/src/components/tailwind'


//   Vue.component(Button.name, Button)
   Vue.component(HasError.name, HasError)
   Vue.component(AlertError.name, AlertError)
//   Vue.component(AlertErrors.name, AlertErrors)
//   Vue.component(AlertSuccess.name, AlertSuccess)



import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);
Vue.use(VueGoodTablePlugin);

let Fire = new Vue();
window.Fire = Fire;

//import sweet alert2
import Swal from 'sweetalert2'
window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position:'top-end',
    showConfirmButton: false,
    timer:3000,

});

window.Toast = Toast;

//import vue-progressbar
import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '20px'
});


// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

import routes from './routes';


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

   // router,
    router: new VueRouter(routes),
});
