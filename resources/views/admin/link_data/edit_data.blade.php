@include('admin.layout_admin.header')

 <div class="app-body">
@include('admin.layout_admin.menu')

  <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">
            <a href="#">Link data</a>
          </li>
          <li class="breadcrumb-item active">Edit data link</li>
          <!-- Breadcrumb Menu-->
         
        </ol>
        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-md-10">
                <div class="card">
                  <div class="card-header">

                    <strong>Edit link</strong>
                    
                    </div>
                  
                  <div class="card-body">
                    
                    <form class="form-horizontal" action="/admin/data-link/{{ $link->id }}" method="post" >
                        
                    @method('patch')
                      @csrf
                      
                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Kode saham</label>
                        
                        <div class="form-group col-sm-2">
                          <select class="form-control" name="kd_saham">
                            <option disabled >Pilih Kategori</option>  
                            @foreach ($per as $p)
                                 
                            <option value="{{ $p->id }}" {{$p->id == $link->perusahaan_id ? "selected" : null}}>{{$p->kd_saham}}</option>

                            @endforeach
                                                        
                         </select>
                       
                       </div>
                     </div>

                  
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">Keterangan url</label>
                      <div class="col-sm-4">
                        <input class="form-control @error('nama_url') is-invalid @enderror" type="text" name="nama_url" placeholder="keterangan url" value="{{old('nama_url',$link->nama_url)}}">
                        
                        @error('nama_url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                      </div>
                   
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Url</label>
                        <div class="col-sm-4">
                            
                          <input class="form-control @error('url') is-invalid @enderror" type="text" name="url" placeholder="Url" value="{{old('url',$link->url)}}">
                          <small>Pastikan mengisi alamat url dengan benar</small>
                          @error('url')
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
