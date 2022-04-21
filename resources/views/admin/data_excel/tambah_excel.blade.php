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
          <li class="breadcrumb-item active">Tambah data</li>
          <!-- Breadcrumb Menu-->
         
        </ol>
        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-md-10">
                <div class="card">
                  <div class="card-header">

                    <strong>Input Data Excel</strong>
                    
                    </div>
                  
                  <div class="card-body">
                    
                    <form class="form-horizontal" action="{{ route('store_excel') }}" method="post" enctype="multipart/form-data">
                        
                      @csrf
                      
                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Kode saham</label>
                        
                        <div class="form-group col-sm-2">
                          <select class="form-control" name="kd_saham">
                            <option disabled >Pilih Kategori</option>  
                            @foreach ($per as $p)
                                 
                            <option value="{{ $p->id }}" {{$p->id == $excel->id ? "selected" : null}}>{{$p->kd_saham}}</option>

                            @endforeach
                                                        
                         </select>
                       
                       </div>
                     </div>

                  
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">Judul</label>
                      <div class="col-sm-4">
                        <input class="form-control @error('judul') is-invalid @enderror" type="text" name="judul" placeholder="Judul" value="{{old('judul')}}">
                        
                        @error('judul')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                      </div>
                   
                    </div>

                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">link excel</label>
                      <div class="col-sm-4">
                        <input class="form-control @error('excel') is-invalid @enderror" type="text" name="excel" placeholder="link excel" value="{{old('excel')}}">
                        
                        @error('excel')
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
