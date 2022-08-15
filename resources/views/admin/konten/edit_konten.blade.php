@include('admin.layout_admin.header')

 <div class="app-body">
@include('admin.layout_admin.menu')

  <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">
            <a href="#">Sub kategori</a>
          </li>
          <li class="breadcrumb-item active">Tambah sub kategori</li>
          <!-- Breadcrumb Menu-->
         
        </ol>
        <div class="container-fluid">
          <div class="animated fadeIn">
<div class="row">
              <div class="col-md-10">
                <div class="card">
                  <div class="card-header">

                    <strong>Input sub kategori</strong>
                    
                    </div>
                  
                  <div class="card-body">
                  

                    <form class="form-horizontal" action="/admin/konten/{{$cont->id}}" method="post" enctype="multipart/form-data">
                        
                      @method('patch')
                      @csrf

                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Nama sub Kategori</label>
                        
                        <div class="form-group col-sm-4">
                          
                          <select class="category-sub" name="sub_cat">
                            <option value="0" disabled="true" selected="true" >Sub Kategori</option>  
                        @foreach ($sub_cat as $sub)
                            
                        @if (old('sub_cat',$cont->sub_category_id) == $sub->id)
                              <option value="{{$sub->id}}" selected>{{$sub->Name_sub}}</option>
                        @else
                             <option value="{{$sub->id}}">{{$sub->Name_sub}}</option>
                        @endif
                      
                        @endforeach        
                         </select>
                         @error('sub_cat')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                      @enderror
                          </div>
                     </div>
                  
                     <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Judul</label>
                        <div class="col-sm-4">
                          <input class="form-control @error('judul') is-invalid @enderror" type="text" name="judul" placeholder="Judul konten" value="{{old('judul',$cont->judul)}}">
                          
                          @error('judul')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     
                    </div>

                  
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">caption</label>
                      <div class="col-sm-4">
                        <input class="form-control @error('caption') is-invalid @enderror" type="text" name="caption" placeholder="Nama caption" value="{{old('caption',$cont->caption)}}">
                        
                        @error('caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                      </div>
                   
                    </div>

                  
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Isi konten</label>
                        <div class="col-sm-4">
                         
                          <input id="content" value="{{old('content',$cont->description)}}" type="hidden" name="content">
                            <trix-editor input="content"></trix-editor>
                          @error('content')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-md-2 col-form-label">Gambar</label>
                        <div class="col-sm-4">
                          <input type="hidden" name="oldImage" id="oldImage" value="{{$cont->image}}">
                          @if ($cont->image)
                          <img src="{{asset('storage/'.$cont->image)}}" class="img-preview img-fluid mb-3">
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

                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">Image online source</label>
                      <div class="col-sm-4">
                        <input class="form-control @error('image_source') is-invalid @enderror" type="text" name="image_source" placeholder="Image Source" value="{{old('image_source',$cont->image_source)}}">
                        
                        @error('image_source')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
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
      
</div>
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
@include('admin.layout_admin.footer')
