
@include('admin.layout_admin.header')
<div class="app-body">
@include('admin.layout_admin.menu')
<main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
         
          <li class="breadcrumb-item active">Navbar</li>
          <!-- Breadcrumb Menu-->
          
        </ol>
           <div class="row">
           <div class="container-fluid">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i>Navbar</div>
                  @if (session('pesan'))
                  <div class="alert alert-success">
                      {{session('pesan')}}
                    </div>
                  @endif
                  <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                      <thead>
                        <tr>
                          <th>no</th>
                          <th>Email</th>
                          <th>No Telp</th>
                          
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                
                        @foreach ($nav as $n)
                            
                     
                          <tr>
                             
                          <td>{{ $loop->iteration }}</td>
                          <td>{{$n->email}}</td>
                          <td>{{$n->no_telp}}</td>
                        
                         
                          <td>
                          <div class="form-group row">
                                <a href="/admin/navbar/{{$n->id}}/edit">
                                            <fieldset>
                                              <button type="submit"  class="btn btn-secondary btn-dark">Edit</button>
                                            </fieldset>
                                </a>
                          </div>
                          </td>

                        </tr>
                        @endforeach
                      </tbody>

                    </table>
                        
                   
                  </div>
                </div>
              </div>
              <!-- /.col-->
            </div>
            </div>
       </main>
    
      </div>

@include('admin.layout_admin.footer')