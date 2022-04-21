@extends('layout.main')


<!-- Breadcrumb End -->

@section('isi')

<div class="breadcrumb-wrap">
    <div class="container">
        <ul class="breadcrumb mt-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
         
            <li class="breadcrumb-item active">About US</li>
           
        </ul>
    </div>
</div>
<!-- Single News Start-->
<div class="single-news">
    <div class="container">
       
            <div class="sn-container">
               <div class="sn-content">
            
                

            @if ($about->count())
                
                    <div class="news-list">
                        <div class="nl-item">
                            <div class="nl-title">

                                <div class="row mb-4">
                                        <h3>Visi</h3>
                                    <div class="col-md-14">
                                        <label class="mb-1 mt-1">{!! $about[0]->visi !!}</label>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                        <h3>Misi</h3>
                                    <div class="col-md-14">
                                        <label class="mb-1 mt-2">{!! $about[0]->misi !!}</label>
                                    </div>
                                </div>  
                                <div class="row mb-4    ">
                                      <h3>Pusdafi</h3>
                                    <div class="col-md-14">
                                        <label class="mb-1 mt-2">{!! $about[0]->deskripsi !!}</label>
                                    </div>
                                </div>
                            
                                    <div class="d-flex justify-content-center">
                                        <h3 class="mt-4 pb-2">Profile Pengelola</h3> 
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            
                                            <div class="col-lg-8 mn-list">
                                                <div class="row">
                                                        <label class="col-md-4 col-form-label" for="text-input">Nama Penulis</label>
                                                    <div class="col-md-8">
                                                        <label class="mb-1 mt-2">: {{ $about[0]->nama }}</label>
                                                    </div>
                                                
                                                </div>
                                                <div class="row">
                                                        <label class="col-md-4 col-form-label" for="text-input">Alamat Penulis</label>
                                                    <div class="col-md-8">
                                                        <label class="mb-1 mt-2">: {{ $about[0]->alamat }}</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                        <label class="col-md-4 col-form-label" for="text-input">Telepon</label>
                                                    <div class="col-md-8">
                                                        <label class="mb-1 mt-2">: {{ $about[0]->telp }}</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                        <label class="col-md-4 col-form-label" for="text-input">Riwayat Pendidikan</label>
                                                    <div class="col-md-8">
                                                    : {!! $about[0]->riwayat !!}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                        <label class="col-md-4 col-form-label" for="text-input">Gelar Pendidikan</label>
                                                    <div class="col-md-8">
                                                        <label class="mb-1 mt-2">: {{ $about[0]->pendidikan }}</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                            
                                                
                                                    <div class="mn-list">
                                                            <div class="container-image">
                                                            
                                                            <img class="image-about" src="{{ asset('storage/'.$about[0]->image) }}" alt="">
                                                                <div class="overlay-image">{{ $about[0]->pendidikan }}</div>
                                                            </div>
                                                    </div>
                                            
                                            
                                            </div>



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
                    
                  
                   
                   
            </div>        
        </div>
    </div>
</div>


        

@endsection