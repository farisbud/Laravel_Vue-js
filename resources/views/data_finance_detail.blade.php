@extends('layout.main')


<!-- Breadcrumb End -->

@section('isi')

<div class="breadcrumb-wrap">
    <div class="container">
        <ul class="breadcrumb mt-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
         
            <li class="breadcrumb-item active">Detail laporan finance</li>
           
        </ul>
    </div>
</div>
<!-- Single News Start-->
<div class="single-news">
    <div class="container">
        <div class="col-lg-8">
            <div class="sn-container">
               
                <div class="sn-content">
                
                    <div class="news-list">
                        <div class="nl-item">
                            <div class="nl-title">
                                
                                <div class="row">
                                        <label class="col-md-4 col-form-label" for="text-input">Kode Saham</label>
                                    <div class="col-md-5">
                                        <label class="mb-1 mt-2">: {{ $data->kd_saham }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                        <label class="col-md-4 col-form-label" for="text-input">Nama</label>
                                    <div class="col-md-5">
                                        <label class="mb-1 mt-2">: {{ $data->nama_lengkap }}</label>
                                    </div>
                                </div>  
                                <div class="row">
                                        <label class="col-md-4 col-form-label" for="text-input">Profile perusahaan</label>
                                    <div class="col-md-5">
                                        <label class="mb-1 mt-2">: {{ $data->description }}</label>
                                    </div>
                                </div>  
                                <div class="row">
                                        <label class="col-md-4 col-form-label" for="text-input">Alamat Kantor</label>
                                    <div class="col-md-8">
                                        <label class="mb-1 mt-2">: {{ $data->alamat }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                        <label class="col-md-4 col-form-label" for="text-input">Alamat Email</label>
                                    <div class="col-md-8">
                                        <label class="mb-1 mt-2">: {{ $data->email }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                        <label class="col-md-4 col-form-label" for="text-input">Telepon</label>
                                    <div class="col-md-8">
                                        <label class="mb-1 mt-2">: {{ $data->no_telp }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                        <label class="col-md-4 col-form-label" for="text-input">Situs</label>
                                    <div class="col-md-8">
                                        <label class="mb-1 mt-2">: <a href="{{ $data->alamat_web }}" target="blank">{{ $data->alamat_web }}</a></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-4 col-form-label" for="text-input">Tanggal Pencatatan</label>
                                    <div class="col-md-8">
                                        <label class="mb-1 mt-2">: {{ date('d-m-Y',strtotime($data->tanggal)) }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-4 col-form-label" for="text-input">Papan</label>
                                    <div class="col-md-8">
                                        <label class="mb-1 mt-2">: {{ $data->papan }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-4 col-form-label" for="text-input">Bidang Usaha Utama</label>
                                    <div class="col-md-8">
                                        <label class="mb-1 mt-2">: {{ $data->bidang }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-4 col-form-label" for="text-input">Sektor</label>
                                    <div class="col-md-8">
                                        <label class="mb-1 mt-2">: {{ $data->sector }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-4 col-form-label" for="text-input">Sub Sektor</label>
                                    <div class="col-md-8">
                                        <label class="mb-1 mt-2">: {{ $data->sub_sector }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-4 col-form-label" for="text-input">Industri</label>
                                    <div class="col-md-8">
                                        <label class="mb-1 mt-2">: {{ $data->industri }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-4 col-form-label" for="text-input">Sub Industri</label>
                                    <div class="col-md-8">
                                        <label class="mb-1 mt-2">: {{ $data->sub_industri }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-4 col-form-label" for="text-input">Biro Administrasi Efek</label>
                                    <div class="col-md-8">
                                        <label class="mb-1 mt-2">: {{ $data->biro_administrasi }}</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                  
                   
                   
                </div>
            </div>
           
        </div>

        <hr>

        <div class="container">
            <h3 class="sn-title">Laporan Keuangan</h3>
            @if ($link->count())
            
                <div class="row">
           
                @foreach ($link as $item)
                    
                
                    <div class="col-lg-2">
                        <div class="news-list">
                            <div class="nl-item">
                                <div class="nl-title">
                                  
                                    <a href="{{ $item->url }}" target="blank">{{ $item->nama_url }}</a>
                                </div>
                            </div>
                                <hr>        
                        </div> 
                    </div> 
                
                @endforeach
                </div>
            
            @else
                <p class="text-center"><h4><strong>Data belum ada</strong></h4></p>
            @endif
     
        </div>           

   

                    
              
                <div class="d-flex justify-content-start mt-4">
                    <nav>
                        <ul class="pagination">
                              <li class="page-item">
                                
                              </li>
                        </ul> 
                   </nav>                    
                </div>
    </div>
</div>


        

@endsection