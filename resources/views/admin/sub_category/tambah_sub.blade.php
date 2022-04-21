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
                    
                    <form class="form-horizontal" action="{{route('store_sub')}}" method="post" >
                        
                      @csrf
                      
                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Nama Kategori</label>
                        
                        <div class="form-group col-sm-4">
                          <select class="form-control" name="category_id">
                            <option disabled >Pilih Kategori</option>  
                            @foreach ($sub as $s)
                                 
                            <option value="{{$s->id}}">{{$s->Name_cat}}</option>

                            @endforeach
                       
                         </select>
                       
                       </div>
                     </div>

                  
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">Nama sub kategori</label>
                      <div class="col-sm-4">
                        <input class="form-control @error('Nama_sub') is-invalid @enderror" type="text" name="Nama_sub" placeholder="Nama sub kategori" value="{{old('Nama_sub')}}">
                        
                        @error('Nama_sub')
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
@include('admin.layout_admin.footer')
