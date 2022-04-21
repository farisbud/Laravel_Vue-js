
@include('admin.layout_admin.header')
<div class="app-body">
@include('admin.layout_admin.menu')
<main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
         
          <li class="breadcrumb-item">kode saham</li>
          <li class="breadcrumb-item"><strong>{{$per->kd_saham}}</strong></li>
          <!-- Breadcrumb Menu-->
          
        </ol>
           <div class="row">
           <div class="container-fluid">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i> Daftar Sub Kategori</div>
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
                          <th>Nama/keterangan</th>
                          <th>url</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                @foreach ($link as $l)
                    
                          <tr>
                             
                          <td>{{$loop->iteration}}</td>
                          <td>{{ $l->nama_url }}</td>
                          <td>{{ $l->url }}</td>
                          <td>
                            <div class="form-group row">
                                <form action="/admin/data-link/{{$l->id}}" method="post">
                                  @method('delete')
                                  @csrf
                                  <fieldset>
                                    <button onclick="return confirm('Yakin Hapus Data Roti?')" type="submit"  class="btn btn-secondary btn-danger">Hapus</button>
                                  </fieldset>
                                </form>
                                
                                    <a href="/admin/data-link/{{$l->id}}/edit">
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