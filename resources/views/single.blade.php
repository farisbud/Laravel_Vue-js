@extends('layout.main')

@section('twitter-content')

            <meta name="twitter:card" content="summary_large_image" />
            <meta name="twitter:site" content="@DimasWisnuAsh" />
            <meta name="twitter:creator" content="@DimasWisnuAsh" />
            <meta property="og:url" content="http://pusdafi.com" />
            <meta property="og:title" content="{{ $cont->judul }}" />
            <meta property="og:description" content="{{ $cont->sub_content }}" />
            <meta property="og:image" content="http://pusdafi.com/storage/{{ $cont->image }}" />

@endsection

<!-- Breadcrumb End -->

@section('isi')

<div class="breadcrumb-wrap">
    <div class="container">
        <ul class="breadcrumb mt-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
           
            <li class="breadcrumb-item active">News details</li>
        </ul>
    </div>
</div>
<!-- Single News Start-->
<div class="single-news">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="sn-container">
                    <div class="sn-img">
                        <div class="position-absolute bg-dark px-3 py-2 text-white">{{ $cont->sub_category->Name_sub }}</div>
                        <img src="/storage/{{ $cont->image }}" />
                        
                    </div>
                    <div class="d-flex justify-content-end">
                        <small>Source: {{ $cont->image_source }}</small>
                    </div>
                    <div class="sn-content" style="padding: 10px">
                        <h1 class="sn-title">{{ $cont->judul }}</h1>
                        <div class="d-flex justify-content-end">
                            <div class="row mr-2">
                                <p>{{date('d-m-Y H:i:s',strtotime($cont->created_at))}}</p>
                                
                                <p class="ml-3">{{$cont->created_at->diffForHumans()}}</p>
                            </div>
                        </div>
                        <hr class="mt-0">
                        <div style="text-align: justify;">
                            <p>
                                {!! $cont->description !!}
                            </p>
                        </div>
                    </div>
                </div>
               
            </div>

            <div class="col-lg-4">
                <div class="sidebar">
                   
                    
                
                    
                    <div class="sidebar-widget">
                        <div class="tab-news">
                            <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#featured">Related category</a>
                                </li>
                               
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#latest">Latest</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div id="featured" class="container tab-pane active">
                                    @foreach ($sub_cat as $i)
                                   
                                        
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="/storage/{{ $i->image }}" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="/single-page/{{ $i->id }}/show/{{ $i->sub_category_id }}">{{ $i->judul }}</a>
                                    </div>
                                </div>
                               
                                @endforeach 
                                
                                </div>
                               
                                <div id="latest" class="container tab-pane fade">
                                    @foreach ($all as $it)
                                   
                                    <div class="tn-news">
                                        <div class="tn-img">
                                            <img src="/storage/{{ $it->image }}" />
                                        </div>
                                        <div class="tn-title">
                                            <a href="/single-page/{{ $it->id }}/show/{{ $it->sub_category_id }}">{{ $it->judul }}</a>
                                        </div>
                                    </div>
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

@endsection