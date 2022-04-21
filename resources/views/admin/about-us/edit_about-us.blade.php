@include('admin.layout_admin.header')

 <div class="app-body">
@include('admin.layout_admin.menu')

  <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">
            <a href="#">About-Us</a>
          </li>
          <li class="breadcrumb-item active">Tambah About-Us</li>
          <!-- Breadcrumb Menu-->
         
        </ol>
        <div class="container-fluid">
          <div class="animated fadeIn">
<div class="row">
              <div class="col-md-10">
                <div class="card">
                  <div class="card-header">

                    <strong>Tambahkan About-Us</strong>
                    
                    </div>
                  
                  <div class="card-body">
                    
                    <form class="form-horizontal" action="/admin/about-us/{{ $about->id }}" method="post" enctype="multipart/form-data">
                    
                    @method('patch')
                      @csrf
                      
                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Visi</label>
                        <div class="col-sm-4">
                          <input id="visi" value="{{old('visi',$about->visi )}}" type="hidden" name="visi">
                          <trix-editor input="visi"></trix-editor>
                          @error('visi')
                              <p class="text-danger">{{$message}}</p>
                          @enderror
                        </div>
                      </div>
                    
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">Misi</label>
                      <div class="col-sm-4">
                        <input id="misi" value="{{old('misi',$about->misi)}}" type="hidden" name="misi">
                        <trix-editor input="misi"></trix-editor>
                        @error('misi')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                    </div>
               
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Deskripsi pusdafi</label>
                        <div class="col-sm-4">
                          <input id="deskripsi" value="{{old('deskripsi',$about->deskripsi)}}" type="hidden" name="deskripsi">
                          <trix-editor input="deskripsi"></trix-editor>
                          @error('deskripsi')
                              <p class="text-danger">{{$message}}</p>
                          @enderror
                        </div>
                    </div>

               <h3>Profile</h3>

                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">Nama</label>
                      <div class="col-sm-4">
                        <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" placeholder="Nama" value="{{old('nama',$about->nama)}}">
                        
                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                  
                    </div>

                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">Alamat</label>
                      <div class="col-sm-4">
                        <input class="form-control @error('alamat') is-invalid @enderror" type="text" name="alamat" placeholder="Alamat" value="{{old('alamat',$about->alamat)}}">
                        
                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                      </div>
                   
                    </div>

                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">Telp</label>
                      <div class="col-sm-4">
                        <input class="form-control @error('telp') is-invalid @enderror" type="text" name="telp" placeholder="Telepon" value="{{old('telp',$about->telp)}}">
                        
                        @error('telp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                      </div>
                   
                    </div>

               

                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="text-input">Riwayat Pendidikan</label>
                    <div class="col-md-5">
                      <textarea name="riwayat" class="form-control @error('riwayat') is-invalid @enderror" placeholder="riwayat" autocomplete="riwayat" cols="30" rows="10">{{ old('riwayat',$about->riwayat) }}</textarea>
                          @error('riwayat')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                           @enderror  
                    </div>
                  </div>

                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">Pendidikan</label>
                      <div class="col-sm-4">
                        <input class="form-control @error('pendidikan') is-invalid @enderror" type="text" name="pendidikan" placeholder="Pendidikan" value="{{old('pendidikan',$about->pendidikan)}}">
                        
                        @error('pendidikan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                      </div>
                   
                    </div>
                    

                    <div class="form-group row">
                      <label for="image" class="col-md-2 col-form-label">Photo</label>
                      <div class="col-sm-4">
                        
                        <input type="hidden" name="oldImage" id="oldImage" value="{{$about->image}}">
                        @if ($about->image)
                        <img src="{{asset('storage/'.$about->image)}}" class="img-preview img-fluid mb-3">
                        @else
                        <img class="img-preview img-fluid mb-3">    
                        @endif
                    
                     
                        
                        <span><small><strong>Pastikan ukuran gambar dibawah *1 Mb</strong></small></span>
                      <input type="file" class="form-control-file" id="image" name="image" onchange="previewImage()">
                          @error('image')
                    
                              <strong>{{ $message }}</strong>
                          
                      @enderror 
                      </div>
                  </div>

              
                    
                    
                    <div class="card-footer">
                      <button class="btn btn-sm btn-primary" type="submit">
                        <i class="fa fa-dot-circle-o"></i> Submit</button>
                        <button class="btn btn-sm btn-danger" type="reset">
                          <i class="fa fa-ban"></i> Reset</button>
                          
                        </div>

                      </form>
              
                  </div>

                </div>
                </div>



            </div> 
              </div>
              <!-- /.col-->
       </div>
       </main>
      
       <script>

        function previewImage(){
        
        const image = document.querySelector('#image'); //untuk mengambil id image
        const imgPreview = document.querySelector('.img-preview'); //untuk mengambil class dengan query selector
        
        imgPreview.style.display = 'block';
        
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        
              oFReader.onload = function (oFREvent){
                  imgPreview.src= oFREvent.target.result;
        
              }
        
        }
        </script>

        
    


</div>
@include('admin.layout_admin.footer')
