@include('admin.layout_admin.header')

 <div class="app-body">
@include('admin.layout_admin.menu')
  <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          
          <li class="breadcrumb-item active">Edit Navbar</li>
          <!-- Breadcrumb Menu-->
         
        </ol>
        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-md-10">
                <div class="card">
                  <div class="card-header">

                    <strong>Edit Navbar</strong>
                    </div>
                  <div class="card-body">
                    <form class="form-horizontal" action="/admin/navbar/{{$nav->id}}" method="post" >
                    @method('patch')
                     @csrf
                        <div class="form-group row">
                          <label class="col-md-2 col-form-label" for="text-input">Email</label>
                          <div class="col-md-9">
                            <input  class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{ $nav->email }}" autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror  
                          </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="text-input">No telp</label>
                            <div class="col-md-9">
                              <input  class="form-control @error('telp') is-invalid @enderror" type="text" name="telp" value="{{ $nav->no_telp }}" autocomplete="telp">
                                  @error('telp')
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
