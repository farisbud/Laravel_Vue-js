@extends('layout.main')


<!-- Breadcrumb End -->

@section('isi')

<div class="breadcrumb-wrap">
    <div class="container">
        <ul class="breadcrumb mt-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
         
            <li class="breadcrumb-item active">Data finance</li>
           
        </ul>
    </div>
</div>
<!-- Single News Start-->
<div class="single-news">
    <div class="container">


      @if ($data->count()) 
                        <div class="container">
                            <div class="row">
                        @foreach ($data as $item)
                            
                        
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
                        </div> 

         @else
         <p class="text-center"><h4><strong>Data belum ada</strong></h4></p>
        @endif 

            {{-- <div class="row">
                    
                <div class="col-lg-4">
                    <div class="news-list">
                        <div class="nl-item">
                            <div class="nl-title">
                                <a href="">coba</a>
                            </div>
                        </div>
                            <hr>        
                    </div>
                </div>  
            </div> --}}

        
                    
              
                <div class="d-flex justify-content-start mt-4">
                    <nav>
                        <ul class="pagination">
                              <li class="page-item">
                                {{ $data->links() }}
                              </li>
                        </ul> 
                   </nav>                    
                </div>
    </div>
</div>


        

@endsection