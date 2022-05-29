
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
                    <i class="fa fa-align-justify"></i> Nav Bar</div>
                
                  <!-- <div class="alert alert-success">
                     
                    </div> -->
                
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

                          <tr v-for="(item,key) in nav" :key="item.id">                             
                            <td>{{ key + 1 }}</td>
                            <td>{{ item.email }}</td>
                            <td>{{ item.no_telp }}</td>
                            <td>
                                <div class="form-group row">
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
               nav :[]
           };
       },
       methods:{
           loadData(){
               axios
               .get('api/admin/navbar')
               .then(response => {
                   this.nav = response.data.nav;
               });
           }
       },
       created(){
           this.loadData();
       }

    }
</script>
