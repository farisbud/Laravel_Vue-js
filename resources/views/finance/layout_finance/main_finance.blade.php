<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Bootstrap News Template - Free HTML Templates</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Bootstrap News Template - Free HTML Templates" name="keywords">
        <meta content="Bootstrap News Template - Free HTML Templates" name="description">

        <!-- Favicon -->
        <link href="{{asset('return/img/favicon.ico')}}" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet"> 

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="{{asset('return/lib/slick/slick.css')}}" rel="stylesheet">
        <link href="{{asset('return/lib/slick/slick-theme.css')}}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{asset('return/css/style.css')}}" rel="stylesheet">
    
    </head>

    <body>
        <!-- Top Bar Start -->
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="tb-contact">
                            <p><i class="fas fa-envelope"></i>info@mail.com</p>
                            <p><i class="fas fa-phone-alt"></i>+012 345 6789</p>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <!-- Top Bar Start -->
        
        <!-- Brand Start -->
        <div class="brand">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4">
                        <div class="b-logo">
                            <a href="/">
                                <img src="{{asset('return/img/return.png')}}" alt="Logo">
                                
                            </a>
                        </div>
                    </div>
                  
                    <div class="col-lg-3 col-md-4 justify-content-center">
                        <form action="/search-site">
                        <div class="b-search">
                            <input type="text" placeholder="Search" name="search" value="{{ request('search') }}">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Brand End -->

        <!-- Nav Bar Start -->
        <div class="nav-bar">
            <div class="container">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="/" class="nav-item nav-link active">Home</a>
                            @foreach ($cat as $c)
                            <div class="nav-item dropdown">
                               
                                    
                                
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{$c->Name_cat}}</a>
                                <div class="dropdown-menu">
                                    @foreach ($c->sub_category as $s)
                                        
                                    
                                    <a href="/sub-all/{{ $s->id }}" class="dropdown-item">{{$s->Name_sub}}</a>
                                    @endforeach
                                    
                                </div>
                               
                            </div>
                            @endforeach
                            <a href="{{ route('all') }}" class="nav-item nav-link">All Post</a>
                            <a href="/finance" class="nav-item nav-link">Finance</a>
                        </div>
                        <div class="social ml-auto">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <br>





        <div class="cat-news">
            <div class="container">

              @yield('isi')

                </div>
            </div>






        
        
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
        
                    <div class="col-md-12 template-by">
                        <p>Copyright &copy; <a href="https://htmlcodex.com">Return</a>. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('return/lib/easing/easing.min.js')}}"></script>
        <script src="{{asset('return/lib/slick/slick.min.js')}}"></script>
        
        <!-- Template Javascript -->
        <script src="{{asset('return/js/main.js')}}"></script>
        
        </body>
        </html>  