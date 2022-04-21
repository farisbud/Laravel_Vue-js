<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Pusdafi</title>
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
                            <p><i class="fas fa-envelope"></i>{{ $nav[0]->email }}</p>
                            <p><i class="fas fa-phone-alt"></i>{{ $nav[0]->no_telp }}</p>
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
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Finance</a>
                                <div class="dropdown-menu">  
                                    <a href="/finance" class="dropdown-item">Data</a>
                                    <a href="/data-finance" class="dropdown-item">Laporan</a>
                                </div>
                               
                            </div>
                            <a href="{{ route('all') }}" class="nav-item nav-link">All Post</a>
                            <a href="{{ route('about') }}" class="nav-item nav-link">About Us</a>
                          
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

<div class="breadcrumb-wrap">
    <div class="container">
        <ul class="breadcrumb mt-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
         
            <li class="breadcrumb-item active">search site</li>
           
        </ul>
    </div>
</div>
<!-- Single News Start-->
<div class="single-news">
    <div class="container">
                
                    <div class="brand">
                        <div class="container">
                           

                            <form action="/search-site">
                                <div class="row align-item-center">
                                    <div class="ml-2 mt-2 col-lg-3 col-md-4">
                                       
                                        <div class="b-search">
                                            <input type="text" placeholder="Search" name="search" value="{{ request('search') }}">
                                            <button><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                    <label class="pt-3 pl-3" for="">filter :</label>
                                        <div class="pt-2 col-lg-3 col-md-3">
                                            
                                                <select class="custom-select mb-2" name="sub_category">
                                                    <option value="">ALL</option>
                                                    
                                                    @foreach ($drop as $d)
                                                    @if (request('sub_category') == $d->Name_sub)
                                                    <option value="{{$d->Name_sub}}" selected>{{$d->Name_sub}}</option>
                                                  @else
                                                  <option value="{{ $d->Name_sub}}">{{ $d->Name_sub }}</option>
                                                
                                                
                                                     @endif
                                                    
                                                    @endforeach
                                                </select>
                                        
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div>

     @if ($content->count())
         
                    <div class="container">
                        <div class="row">
                    
                        @foreach ($content as $item)
                            
                      
                             <div class="col-md-4 mb-3">
                    
                                <div class="card " >
                                    <div class="position-absolute bg-dark px-3 py-2 text-white">{{ $item->sub_category->Name_sub }}</div>
                                    <img class="card-img-top" src="/storage/{{ $item->image }}" alt="Card image cap">
                                    <div class="card-body">
                                       
                                      <h5 class="card-title"><strong>{{ $item->judul }}</strong></h5>
                                      <p><small>{{$item->created_at->diffForHumans()}}</small></p>
                                      
                                      <p class="card-text">{{ $item->sub_content }}</p>
                                      <a href="/single-page/{{ $item->id }}/show/{{ $item->sub_category_id }}" class="btn btn-primary">Read more...</a>
                                    </div>
                                  </div>
                            </div>
                           
                        @endforeach 
                        </div>
                    </div> 
              
                <div class="d-flex justify-content-start mt-4">
                    <nav>
                        <ul class="pagination">
                              <li class="page-item">
                                {{ $content->links() }}
                              </li>
                        </ul> 
                   </nav>                    
                </div>


                @elseif($per->count())

                <div class="container">
                    <div class="row">
                @foreach ($per as $item)
                    
                
                        <div class="col-md-4 mb-3">
                
                            <div class="card " >
                                <div class="card-body">
                                <a href="/data-excel/{{ $item->id }}/detail">
                                    <h6 class="card-title"><strong>{{ $item->kd_saham }}</strong></h6>
                                 </a>
                                <p><small>{{ $item->nama_lengkap }}</small></p>
        
                                
                                </div>
                            </div>
                        </div>
                    
                        @endforeach
                    </div>

                    <div class="d-flex justify-content-start mt-4">
                        <nav>
                            <ul class="pagination">
                                  <li class="page-item">
                                    {{ $content->links() }}
                                  </li>
                            </ul> 
                       </nav>                    
                    </div>
                </div> 
               @else
            <div class="d-flex justify-content-center">

                <p class="text-center"><h1><strong>Data belum ada</strong></h1></p>
            </div>
                @endif
    </div>
</div>


</div>
</div>





<div class="footer-bottom">
<div class="container">
    <div class="row">

        <div class="col-md-12 template-by">
            <p>Copyright &copy; <a href="/">Pusdafi</a>. All Rights Reserved</p>
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

        

