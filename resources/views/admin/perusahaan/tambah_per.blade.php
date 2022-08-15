@include('admin.layout_admin.header')

 <div class="app-body">
@include('admin.layout_admin.menu')
  <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          
          <li class="breadcrumb-item active">Tambah Perusahaan</li>
          <!-- Breadcrumb Menu-->
         
        </ol>
        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-md-10">
                <div class="card">
                  <div class="card-header">

                    <strong>Tambah data perusahaan</strong>
                    </div>
                  <div class="card-body">
                    <form class="form-horizontal" action="{{ route('store_per') }}" method="post" >
                     @csrf
                        <div class="form-group row">
                          <label class="col-md-2 col-form-label" for="text-input">Kd_Saham</label>
                          <div class="col-md-3">
                            <input  class="form-control @error('kd_saham') is-invalid @enderror" type="text" name="kd_saham" placeholder="kode saham" autocomplete="kd_saham" value="{{ old('kd_saham') }}" autofocus>
                                @error('kd_saham')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror  
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-2 col-form-label" for="text-input">Nama_PT</label>
                          <div class="col-md-5">
                            <input  class="form-control @error('nama_pt') is-invalid @enderror" type="text" name="nama_pt" placeholder="nama pt" autocomplete="nama_pt" value="{{ old('nama_pt') }}" autofocus>
                                @error('nama_pt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror  
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-2 col-form-label" for="text-input">Alamat</label>
                          <div class="col-md-5">
                            <input  class="form-control @error('alamat') is-invalid @enderror" type="text" name="alamat" placeholder="Alamat" autocomplete="alamat" value="{{ old('alamat') }}" autofocus>
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror  
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-2 col-form-label" for="text-input">Email</label>
                          <div class="col-md-5">
                            <input  class="form-control @error('email') is-invalid @enderror" type="text" name="email" placeholder="Email" autocomplete="email" value="{{ old('email') }}" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror  
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-2 col-form-label" for="text-input">Nomor telepon</label>
                          <div class="col-md-5">
                            <input  class="form-control @error('no_telp') is-invalid @enderror" type="text" name="no_telp" placeholder="Nomor telpon" autocomplete="no_telp" value="{{ old('no_telp') }}" autofocus>
                                @error('no_telp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror  
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-2 col-form-label" for="text-input">description</label>
                          <div class="col-md-5">
                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="deskripsi" autocomplete="deskripsi" cols="30" rows="10">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror  
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-2 col-form-label" for="text-input">Situs website</label>
                          <div class="col-md-5">
                            <input  class="form-control @error('situs') is-invalid @enderror" type="text" name="situs" placeholder="situs" autocomplete="situs" value="{{ old('situs') }}" autofocus>
                                @error('situs')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror  
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-2 col-form-label" for="text-input">Tanggal Pencatatan</label>
                          <div class="col-md-5">
                            <input  class="form-control @error('tanggal') is-invalid @enderror" type="date" name="tanggal" placeholder="Tanggal pencatatan" autocomplete="tanggal" value="{{ old('tanggal') }}" autofocus>
                                @error('tanggal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror  
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-2 col-form-label" for="text-input">Papan</label>
                          <div class="col-md-5">
                            <input  class="form-control @error('papan') is-invalid @enderror" type="text" name="papan" placeholder="Papan" autocomplete="papan" value="{{ old('papan') }}" autofocus>
                                @error('papan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror  
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-2 col-form-label" for="text-input">Bidang usaha utama</label>
                          <div class="col-md-5">
                            <input  class="form-control @error('bidang') is-invalid @enderror" type="text" name="bidang" placeholder="Bidang usaha" autocomplete="bidang" value="{{ old('bidang') }}" autofocus>
                            
                                @error('bidang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror  
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-2 col-form-label" for="text-input">Sector</label>
                          <div class="col-md-5">
                            <input  class="form-control @error('sector') is-invalid @enderror" type="text" name="sector" placeholder="Sector" autocomplete="sector" value="{{ old('sector') }}" autofocus>
                                @error('sector')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror  
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-2 col-form-label" for="text-input">Sub Sector</label>
                          <div class="col-md-5">
                            <input  class="form-control @error('sub_sector') is-invalid @enderror" type="text" name="sub_sector" placeholder="Sub Sector" autocomplete="sub_sector" value="{{ old('sub_sector') }}" autofocus>
                                @error('sub_sector')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror  
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-2 col-form-label" for="text-input">Industri</label>
                          <div class="col-md-5">
                            <input  class="form-control @error('industri') is-invalid @enderror" type="text" name="industri" placeholder="Industri" autocomplete="industri" value="{{ old('industri') }}" autofocus>
                                @error('industri')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror  
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-2 col-form-label" for="text-input">Sub Industri</label>
                          <div class="col-md-5">
                            <input  class="form-control @error('sub_industri') is-invalid @enderror" type="text" name="sub_industri" placeholder="Sub Industri" autocomplete="sub_industri" value="{{ old('sub_industri') }}" autofocus>
                                @error('sub_industri')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror  
                          </div>
                        </div>
                        
                        <div class="form-group row">
                          <label class="col-md-2 col-form-label" for="text-input">Biro Administrasi</label>
                          <div class="col-md-5">
                            
                            <input  class="form-control @error('administrasi') is-invalid @enderror" type="text" name="administrasi"  autocomplete="administrasi" placeholder="Biro Administrasi" value="{{ old('administrasi') }}" autofocus>
                                @error('administrasi')
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
