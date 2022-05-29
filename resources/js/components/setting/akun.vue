
<template>

<main class="main">
        <!-- Breadcrumb-->
            <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            
            <li class="breadcrumb-item active">Setting</li>
            <!-- Breadcrumb Menu-->
            
            </ol>
           <div class="row">
            <div class="container-fluid">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i> Daftar Akun</div>
                
                  <!-- <div class="alert alert-success">
                     
                    </div> -->
                
                  <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                      <thead>
                        <tr>
                          <th>no</th>
                          <th>Nama</th>
                          <th>Username</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>

                          <tr v-for="(item,key) in akun" :key="item.id">                             
                            <td>{{ key + 1 }}</td>
                            <td>{{ item.Name }}</td>
                            <td>{{ item.Username }}</td>
                            <td>
                                <div class="form-group row">
                                    <form action="" method="post">
                                
                                    <fieldset>
                                        <button onclick="return confirm('Yakin Hapus Data Roti?')" type="submit"  class="btn btn-secondary btn-danger">Hapus</button>
                                    </fieldset>
                                    </form> 
                                    <a href="">
                                        <fieldset>
                                            <button type="submit"  class="btn btn-secondary btn-dark">Edit</button>
                                        </fieldset>
                                    </a>
                                </div>
                            </td>
                        </tr>
                      </tbody>
                    </table>
                         <div  class="col-6 col-sm-4 col-md mb-3 mb-xl-0 text-center">
                              <a href="">
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
 
</template>

<script>
    export default {
       data(){
           return {
               akun :[]
           };
       },
       methods:{
           loadData(){
               axios
               .get('api/admin/akun')
               .then(response => {
                   this.akun = response.data.akun;
               });
           }
       },
       created(){
           this.loadData();
       }

    }
</script>
