
@include('admin.layout_admin.header')
<div class="app-body">
@include('admin.layout_admin.menu')
<main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
         
          <li class="breadcrumb-item active">Kategori</li>
          <!-- Breadcrumb Menu-->
          
        </ol>
           <div class="row">
           <div class="container-fluid">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i> Daftar Kategori</div>
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
                          <th>Nama Kategori</th>
                        
                          
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                
                        @foreach ($cat as $c)
                            
                     
                          <tr>
                             
                          <td>{{ $loop->iteration }}</td>
                          <td>{{$c->Name_cat}}</td>
                        
                         
                          <td>
                          <div class="form-group row">
                            <form action="/admin/kategori/{{$c->id}}" method="post">
                              @method('delete')
                              @csrf
                              <fieldset>
                                <button onclick="return confirm('Yakin Hapus Data Roti?')" type="submit"  class="btn btn-secondary btn-danger">Hapus</button>
                              </fieldset>
                            </form>
                            
                                <a href="/admin/kategori/{{$c->id}}/edit">
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
                         <div  class="col-6 col-sm-4 col-md mb-3 mb-xl-0 text-center">
                              <a href="{{route('tambah_kat')}}">
                              <button class="btn btn-primary" type="button">
                                <i class="icon-plus "></i> Tambah</button></a>
                        </div>
                   
                  </div>
                </div>
              </div>
              <!-- /.col-->
            </div>
            </div>
       </main>
    
      </div>

@include('admin.layout_admin.footer')