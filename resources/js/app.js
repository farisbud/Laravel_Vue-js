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

let routes = [
    {
        path: '/admin',
        component:require('./components/home/home.vue').default

    },
    { 
        path: '/kategori', 
        component:require('./components/kategori/kategori.vue').default
    },
    { 
        path: '/sub_kategori', 
        component:require('./components/sub_kategori/sub_kategori.vue').default, 
        // children: [
        //     {   
        //         name: 'getSubKategori',
        //         path: '/getSubKategori/:id?', 
        //         component:require('./components/sub_kategori/detail_sub_kategori.vue').default 
        //     },
            
        // ]
    },
    {   
        name: 'getSubKategori',
        path: '/getSubKategori/:id?', 
        component:require('./components/sub_kategori/detail_sub_kategori.vue').default 
    },
    {
        path: '/konten',
        component:require('./components/konten/konten.vue').default
    },
    {
        path: '/perusahaan',
        component:require('./components/perusahaan/perusahaan.vue').default
    },
    {
        path: '/data_link',
        component:require('./components/data/data_link.vue').default
    },
    {   
        name: 'getDataLink',
        path: '/getDataLink/:id?', 
        component:require('./components/data/detail_data_link.vue').default 
    },
    {
        path: '/data_excel',
        component:require('./components/data/data_excel.vue').default
    },
    {
        name:'getDataExcel',
        path:'/getDataExcel/:id?',
        component:require('./components/data/detail_data_excel.vue').default
    },
    {
        path: '/akun',
        component:require('./components/setting/akun.vue').default
    },
    {
        path: '/navbar',
        component:require('./components/setting/navbar.vue').default
    },
    {
        path: '/about',
        component:require('./components/setting/about_us.vue').default
    },
];
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);



const router = new VueRouter({
    mode: 'history',
    routes
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    
    router,
  
});
