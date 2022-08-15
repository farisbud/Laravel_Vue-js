
export default {
    mode: 'history',
    routes: [
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
    ],

}