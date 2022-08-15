@include('admin.layout_admin.header')

 <div class="app-body">
@include('admin.layout_admin.menu')
  <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          
          <li class="breadcrumb-item active">About-Us</li>
          <!-- Breadcrumb Menu-->
         
        </ol>
        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-md-10">
                <div class="card">
                  <div class="card-header">

                    <strong>About Us</strong>
                    </div>
                    @if (session('pesan'))
                    <div class="alert alert-success">
                        {{session('pesan')}}
                      </div>
                    @endif
                  <div class="card-body">
                    
                   
                      
                    
                      @if ($about->count())
                      
                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Visi</label>
                        <div class="col-md-8">
                            <label class="col-md-8 col-form-label" for="text-input">{!!  $about[0]->visi  !!}</label>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Misi</label>
                        <div class="col-md-8">
                            <label class="col-md-8 col-form-label" for="text-input">{!!  $about[0]->misi  !!}</label>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Deskripsi</label>
                        <div class="col-md-8">
                            <label class="col-md-8 col-form-label" for="text-input">{!!  $about[0]->deskripsi  !!}</label>
                        </div>
                      </div>
                      
                      <h3>Profile</h3>
                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Nama</label>
                        <div class="col-md-8">
                            <label class="col-md-8 col-form-label" for="text-input">{!!  $about[0]->nama  !!}</label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Alamat</label>
                        <div class="col-md-8">
                            <label class="col-md-8 col-form-label" for="text-input">{!!  $about[0]->alamat  !!}</label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Telp</label>
                        <div class="col-md-8">
                            <label class="col-md-8 col-form-label" for="text-input">{!!  $about[0]->telp  !!}</label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Riwayat Pendidikan</label>
                        <div class="col-md-8">
                            <label class="col-md-8 col-form-label" for="text-input">{!!  $about[0]->riwayat  !!}</label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Gelar</label>
                        <div class="col-md-8">
                            <label class="col-md-8 col-form-label" for="text-input">{!!  $about[0]->pendidikan  !!}</label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Photo</label>
                        <div class="col-md-2">
                            <img class="img-fluid mb-3" src="{{asset('storage/'.$about[0]->image)}}" alt="">
                        </div>
                      </div>
                    

                      <div class="form-group row justify-content-center">
                          <div  class="text-center">
                            <a href="/admin/about-us/{{ $about[0]->id }}/edit">
                            <button class="btn btn-warning" type="button">
                              <i class="icon-pencil "></i> Edit</button></a>
                          </div>  
                          <form action="/admin/about-us/{{$about[0]->id}}" method="post" enctype="multipart/form-data">
                              @method('delete')
                              @csrf
                              <fieldset>
                                <button onclick="return confirm('Yakin Hapus Data Roti?')" type="submit"  class="btn btn-secondary btn-danger"><i class="icons cui-trash "></i> Hapus</button>
                              </fieldset>
                            </form> 
                      </div>
                      @else
                  
                          <div  class="col-6 col-sm-4 col-md mb-3 mb-xl-0 text-center">
                            <a href="/admin/about-us/tambah">
                            <button class="btn btn-primary" type="button">
                              <i class="icon-plus "></i> Tambah</button></a>
                          </div>        
                      @endif
                  

                  </div>

                  
                </div>
                </div>
            </div> 
              </div>
              <!-- /.col-->
       </div>
       </main>
      

      </div>

@include('admin.layout_admin.footer')
