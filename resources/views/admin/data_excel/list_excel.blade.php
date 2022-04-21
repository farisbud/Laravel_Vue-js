
@include('admin.layout_admin.header')
<div class="app-body">
@include('admin.layout_admin.menu')
<main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
         
          <li class="breadcrumb-item active">list data</li>
          <!-- Breadcrumb Menu-->
          
        </ol>
           <div class="row">
           <div class="container-fluid">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i> Daftar data excel</div>
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
                          <th>Jumlah link excel</th>
                          
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                
                       
                            
                    
                         @foreach ($data as $item)
                             
                         
                     
                          <tr>
                             
                          <td>{{ $data->firstItem() + $loop->index }}</td>
                          <td>{{ $item->kd_saham }}</td>
                          <td>{{ $item->nama_lengkap}}</td>
                        

                          <td>
                            {{ $item->data_excel->count() }}
                            </td>
                         
                         
                          <td>
                          <div class="form-group row">

                                
                            
                                <a href="/admin/data-excel/{{ $item->id }}/show">
                                            <fieldset>
                                              <button type="submit"  class="btn btn-secondary btn-dark">Detail</button>
                                            </fieldset>
                                </a>
                          @if ($item->data_excel->count())
                              
                          @else
                          <a href="/admin/data-excel/{{ $item->id }}/tambah">
                            <fieldset>
                              <button type="submit"  class="btn btn-primary"></i>Tambah</button>
                            </fieldset>
                        </a>
                              
                          @endif
                                
                              
                          </div>
                          </td>

                        </tr>
                       
                        @endforeach
                      </tbody>

                    </table>
                       
                        <nav>
                          <ul class="pagination">
                                <li class="page-item">
                                  {{ $data->links() }}
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