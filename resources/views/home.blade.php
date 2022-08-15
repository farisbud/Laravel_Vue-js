@extends('layout.main')
        <!-- Nav Bar End -->

        <!-- Top News Start-->




    
        <!-- Top News End-->

        <!-- Category News Start-->

       
@section('isi')
    
            <div class="tab-content pb-4">
                <div id="background">
            
                    <div class="d-flex justify-content-center text-black pl-3 pr-2" style="position:relative; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                        <strong>
                            <h3 style="font-size: 4vw; margin-left: 10%;"><blockquote>Ingin mencari data? klik dibawah</blockquote></h3>
                            <div class="d-flex justify-content-center">
                                <a href="/finance" class="btn btn-dark">Read more..</a>
                            </div>
                            
                        </strong>
                        </div>

                </div>
               
            </div>

                <div class="d-flex justify-content-center">
    
                    <div class="card mb-4">
                        
                        <div class="single-news">
                            <div class="container-card">
                                <span>
                                    
                                    <h1>{{$data[0]->judul}}</h1>
                                </span>
                               
                                <div class="pt-2 col-lg-8">
                
                                    <div class="row">
                                        <p>{{date('d-m-Y H:i:s',strtotime($data[0]->created_at))}}</p>
                                        
                                        <p class="ml-3">{{$data[0]->created_at->diffForHumans()}}</p>
                                    </div>
                
                
                                </div>
                                <hr>
                                <div class="row">
                                    
                                    <div class="col-lg-8">
                                        <div class="sn-container">
                                            <div class="sn-img">
                                                <a href="/single-page/{{ $data[0]->id }}/show/{{ $data[0]->sub_category_id }}">
                                                    @csrf
                                                <div class="position-absolute bg-dark px-3 py-2 text-white">{{ $data[0]->sub_category->Name_sub }}</div>
                                                <img src="/storage/{{$data[0]->image}}">
                                            </a>
                                            </div>
                                          
                                        </div>
                
                                        
                                        <div class="pt-4">
                                        <article>
                                            <div style="text-align: justify;">
                                                {{$data[0]->sub_content }}
                                            </div>
                                            <a href="/single-page/{{ $data[0]->id }}/show/{{ $data[0]->sub_category_id }}" class="btn btn-primary mt-2">Read more..</a>
                                        </article>
                                        </div>
                                      
                                    </div>
                                
                
                                    <div class="col-lg-4">
                                        <div class="sidebar">
                                            <div class="sidebar-widget">
                                            <br>
                                                <div class="news-list">
                                                   
                                                    
                                                        <div class="sidebar sidebar-widget mb-2">
                                                                <h2 class="sw-title ">Latest</h2>
                                                             </div>
                                                            
                                                   
                                                    @foreach ($data as $item)
                                                        
                                                     @if ($loop->first) @continue @endif   
                                                    <div class="nl-item">
                                                        <div class="nl-img">
                                                            <img src="/storage/{{$item->image}}" />
                                                        </div>
                                                        <div class="nl-title">
                                                            <a href="/single-page/{{ $item->id }}/show/{{ $item->sub_category_id }}">{{$item->judul}}</a>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    @endforeach
                                                </div>
                                            </div> 
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
        
                
                  <br>
                <div class="row">
                     @foreach ($sub_cat as $sub)
                            
                        
                    <div class="col-md-6">
                       
                        <h2>{{$sub->Name_sub}}</h2>
                        <div class="row cn-slider">
                            <?php $count = 0; ?>
                            
                            @foreach ($sub->content->reverse() as $item)
                            
                            <?php if ($count==4) break; ?>
                          
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="/storage/{{$item->image}}" />
                                    <div class="cn-title">
                                        <a href="/single-page/{{ $item->id }}/show/{{ $item->sub_category_id }}">{{$item->judul}}</a>
                                    </div>
                                </div>
                            </div>
                            
                            <?php $count++; ?>
                           
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                  
                </div>
@endsection
         
        <!-- Category News End-->

        <!-- Category News Start-->
      
        <!-- Category News End-->
        
        <!-- Tab News Start-->
       
        <!-- Tab News Start-->

        <!-- Main News Start-->
    
      
        <!-- Main News End-->

        <!-- Footer Start -->
        
        <!-- Footer End -->
        
        <!-- Footer Menu Start -->
    
        <!-- Footer Menu End -->

        <!-- Footer Bottom Start -->
