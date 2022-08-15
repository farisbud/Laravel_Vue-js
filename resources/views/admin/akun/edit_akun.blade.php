@include('admin.layout_admin.header')

 <div class="app-body">
@include('admin.layout_admin.menu')
  <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          
          <li class="breadcrumb-item active">Edit Akun</li>
          <!-- Breadcrumb Menu-->
         
        </ol>
        <div class="container-fluid">
          <div class="animated fadeIn">
<div class="row">
              <div class="col-md-10">
                <div class="card">
                  <div class="card-header">

                    <strong>Edit Akun</strong>
                    </div>
                  <div class="card-body">
                    <form class="form-horizontal" action="/admin/akun/{{ $akun->id }}" method="post" >
                        @method('patch')
                        @csrf
                        <div class="form-group row">
                          <label class="col-md-2 col-form-label" for="text-input">Nama lengkap</label>
                          <div class="col-md-9">
                            <input  class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" placeholder="Nama lengkap" autocomplete="nama" value="{{ old('nama',$akun->Name) }}" autofocus>
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror  
                          </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="text-input">Username</label>
                            <div class="col-md-9">
                              <input  class="form-control @error('username') is-invalid @enderror" type="text" name="username" placeholder="Username" autocomplete="username" value="{{ old('username',$akun->Username) }}" autofocus>
                                  @error('username')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                   @enderror  
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="text-input">Password</label>
                            <div class="col-md-9">
                                <small>jika tidak ingin mengganti password silahkan dikosongkan</small>
                              <input  class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" autocomplete="password" value="{{ old('password') }}" autofocus>
                                  @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                   @enderror  
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="text-input">Ulangi Password</label>
                            <div class="col-md-9">
                              <input  class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" placeholder="Ulangi Password" autocomplete="password" autofocus>
                                  @error('password_confirmation')
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
