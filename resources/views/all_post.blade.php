@extends('layout.main')


<!-- Breadcrumb End -->

@section('isi')

<div class="breadcrumb-wrap">
    <div class="container">
        <ul class="breadcrumb mt-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
         
            <li class="breadcrumb-item active">All Post</li>
           
        </ul>
    </div>
</div>
<!-- Single News Start-->
<div class="single-news">
    <div class="container">


     @if ($content->count())
         
     <div class="d-flex justify-content-center">
    
        <div class="card mb-4">
            
            <div class="single-news">
                <div class="container-card">
                    
                   
                            <div class="sn-container">
                                <div class="sn-img">
                                    <div class="position-absolute bg-dark px-3 py-2 text-white">{{ $content[0]->sub_category->Name_sub }}</div>
                                    <a href="/single-page/{{ $content[0]->id }}/show/{{ $content[0]->sub_category_id }}">
                                        @csrf
                                    <img src="/storage/{{ $content[0]->image }}" >
                                </a>
                                </div>
                              
                            </div>
    
                            
                            <div class="pt-4 pl-4">
                                <span>
                      
                                    <h1>{{ $content[0]->judul }}</h1>
                                </span>
                               
                                <div class="pt-2 col-lg-8">
                
                                    <div class="row">
                                        <p>{{date('d-m-Y H:i:s',strtotime($content[0]->created_at))}}</p>
                                        
                                        <p class="ml-3">{{$content[0]->created_at->diffForHumans()}}</p>
                                    </div>
                
                
                                </div>
                                <hr class="mt-0">
                            <article>
                                <div style="text-align: justify;">
                                  {{ $content[0]->sub_content }}
                                </div>
                            </article>

                            <a href="/single-page/{{ $content[0]->id }}/show/{{ $content[0]->sub_category_id }}" class="btn btn-primary mt-2">Read more....</a>
                            </div>    
                </div>
            </div>
        </div>
    </div>

        @else
        <div class="d-flex justify-content-center">

            <p class="text-center"><h1><strong>Data belum ada</strong></h1></p>
        </div>
        @endif
                   

                    <div class="container">
                        <div class="row">
                    
                        @foreach ($content as $item)
                            
                        @if ($loop->first) @continue @endif  
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
    </div>
</div>


        

@endsection