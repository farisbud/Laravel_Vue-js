<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.1.5
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Return News</title>
    <!-- Icons-->
    <link href="{{asset('coreui/icons/css/coreui-icons.min.css') }}" rel="stylesheet">
    <link href="{{asset('coreui/vendors/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">
    <link href="{{ asset('coreui/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('coreui/vendors/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="{{asset('coreui/css/style.css') }}" rel="stylesheet">
    <link href="{{asset('coreui/vendors/pace-progress/css/pace.min.css') }}" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
  </head>
  <body class="app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
                  
                <form action="{{ route('log_in') }}" method="post">
                  @if (Session::get('gagal'))
                      <div class="alert alert-danger">
                        {{Session::get('gagal')}}
                      </div>
                  @else
                      
                  @endif
                   @csrf
                <h1><center>Login Return</center></h1>
                <p class="text-muted">Masukan Username dan Password</p>
                
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-user"></i>
                    </span>
                  </div>
                  <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" value="{{ old('username') }}" placeholder="Username" >
                  @error('username')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>

              


                <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-lock"></i>
                    </span>
                  </div>
                  <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" value="{{ old('password') }}" placeholder="Password">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                   @enderror
                </div>
            
                <div class="row">
                  <div class="col-6">
                    <input type="submit" class="btn btn-primary px-4" value="login">
                   
                  </div>
                  
                </div>
               </form>
              </div>
            </div>
           
          </div>
        </div>
      </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="{{asset('coreui/vendors/jquery/js/jquery.min.js') }}"></script>
    <script src="{{asset('coreui/vendors/popper.js/js/popper.min.js') }}"></script>
    <script src="{{asset('coreui/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{asset('coreui/vendors/pace-progress/js/pace.min.js') }}"></script>
    <script src="{{asset('coreui/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{asset('coreui/vendors/@coreui/coreui/js/coreui.min.js') }}"></script>
  </body>
</html>
