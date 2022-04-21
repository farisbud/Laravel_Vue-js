<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.1.5
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->


@include('admin.layout_admin.header')

    <div class="app-body" id="app">

@include('admin.layout_admin.menu')
      


     
              <router-view></router-view>
              
             

              
    
      
    </div>

    @include('admin.layout_admin.footer')
