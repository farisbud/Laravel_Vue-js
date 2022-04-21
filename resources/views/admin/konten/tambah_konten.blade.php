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

                    <strong>Input kontent</strong>
                    
                    </div>
                  
                  <div class="card-body">
                    
                    <form class="form-horizontal" action="{{ route('store_content') }}" method="post" enctype="multipart/form-data">
                        
                      @csrf

                          <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="text-input">Nama Kategori</label>
                            
                            <div class="form-group col-sm-4">
                              
                              <select class="category" id="category" name="category">
                                <option value="0" disabled="true" selected="true" >Pilih Kategori</option>  

                                @foreach ($cat as $c)
                                    @if (old('category') == $c->id)
                                    <option value="{{$c->id}}" selected>{{$c->Name_cat}}</option>         
                                    @else
                                    <option value="{{$c->id}}">{{$c->Name_cat}}</option>  
                                    @endif
                              
                              
                                @endforeach
                            </select>
                            @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                          
                          <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="text-input">Nama sub Kategori</label>
                            
                            <div class="form-group col-sm-4">
                              
                              <select class="category-sub" name="sub_cat">

                                <option value="0" disabled="true" selected="true" >Sub Kategori</option>  
                            
                                    
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
                              <input class="form-control @error('judul') is-invalid @enderror" type="text" id="judul" name="judul" placeholder="Judul konten" value="{{old('judul')}}">
                              
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
                            <input class="form-control @error('caption') is-invalid @enderror" type="text" id="caption" name="caption" placeholder="Nama caption" value="{{old('caption')}}">
                            
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
                              <input id="content" value="{{old('content')}}" type="hidden" name="content">
                              <trix-editor input="content"></trix-editor>
                              @error('content')
                                  <p class="text-danger">{{$message}}</p>
                              @enderror
                            </div> 
                        </div>

                        <div class="form-group row">
                          <label for="image" class="col-md-2 col-form-label">Gambar</label>
                          <div class="col-sm-4">
                            <img class="img-preview img-fluid mb-3">    
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
                              <input class="form-control @error('image_source') is-invalid @enderror" type="text" name="image_source" placeholder="Image Source" value="{{old('image_source')}}">
                              
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

@extends('admin.layout_admin.footer')
@section('ajax')
      <script type="text/javascript">

        $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
    
            $(document).on('change','.category',function(){
    
                // console.log('its change');
    
              var cat_id = $(this).val();
              // console.log(cat_id);
    
              var div = $(this).parent().parent().parent();//parent() adalah div, jadi ketika ada 3 div di tambah_konten parent() dibuat 3
              var op = " ";
                
                $.ajax({
                  type:'get',
                  url:'{!!URL::to('/admin/konten/findSub')!!}',
                  data:{'id':cat_id},
                    success:function(data){
    
                      // console.log('success');
                      // console.log(data);
                      // console.log(data.length);
    
                      op+='<option value="0" selected disabled>pilih sub kategory</option>';
                        for(var i=0;i<data.length;i++){
                          op+='<option value="'+data[i].id+'">'+data[i].Name_sub+'</option>';
                        }
                      
                      div.find('.category-sub').html("");
                      div.find('.category-sub').append(op);
    
    
                    },
                    error:function(){
    
                    }
    
    
                });
    
            });
    
        });
    
        document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
        });
  </script> 
@endsection
