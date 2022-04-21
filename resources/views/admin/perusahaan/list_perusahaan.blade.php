
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
                    <i class="fa fa-align-justify"></i> Daftar perusahaan</div>
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
                          <th>Kd_Saham</th>
                          <th>Nama perusahaan</th>
                          <th>Sektor</th>
                          
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                
                       
                            
                     @foreach ($item as $i)
                         
                     
                          <tr>
                             
                          <td>{{ $item->firstItem() + $loop->index }}</td>
                          <td>{{ $i->kd_saham }}</td>
                          <td>{{ $i->nama_lengkap }}</td>
                          <td>{{ $i->sector }}</td>
                        
                         
                          <td>
                          <div class="form-group row">
                            <form action="/admin/perusahaan/{{ $i->id }}" method="post">
                              @method('delete')
                              @csrf
                              <fieldset>
                                <button onclick="return confirm('Yakin Hapus Data Perusahaan')" type="submit"  class="btn btn-secondary btn-danger">Hapus</button>
                              </fieldset>
                            </form>
                            
                                <a href="/admin/perusahaan/{{ $i->id }}/edit">
                                            <fieldset>
                                              <button type="submit"  class="btn btn-secondary btn-dark">Edit</button>
                                            </fieldset>
                                </a>

                                <a href="/admin/perusahaan/{{ $i->id }}/detail">
                                  <fieldset>
                                    <button type="submit"  class="btn btn-secondary btn-warning">detail</button>
                                  </fieldset>
                                </a>
                          </div>
                          </td>

                        </tr>
                        @endforeach
                      </tbody>

                    </table>
                         <div  class="col-6 col-sm-4 col-md mb-3 mb-xl-0 text-center">
                              <a href="/admin/perusahaan/tambah">
                              <button class="btn btn-primary" type="button">
                                <i class="icon-plus "></i> Tambah</button></a>
                        </div>
                        <nav>
                          <ul class="pagination">
                                <li class="page-item">
                                    {{$item->links()}}
                                </li>
                          </ul> 
                     </nav>
                  </div>
                </div>
              </div>
              <!-- /.col-->
            </div>
            </div>
       </main>
    
      </div>

@include('admin.layout_admin.footer')