
<template>

<main class="main">
        <!-- Breadcrumb-->
            <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            
            <li class="breadcrumb-item active">Sub Kategori</li>
            <!-- Breadcrumb Menu-->
            
            </ol>
           <div class="row">
            <div class="container-fluid">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i> Daftar Sub Kategori</div>
                
                  <!-- <div class="alert alert-success">
                     
                    </div> -->
                
                  <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                      <thead>
                        <tr>
                          <th>no</th>
                          <th>Kategori</th>
                          <th>Jumlah sub kategori</th>
                          
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>

                          <tr v-for="(item, key) in posts" :key="item.id">                             
                            <td>{{ key+1 }}</td>
                            <td>{{ item.Name_cat }}</td>
                            <td>{{ item.sub_category.length }}</td>
                            <td>
                                <div class="form-group row">
                                  
                                    <router-link :to="{ name:'getSubKategori', params:{id:item.id} }">
                                        <fieldset>
                                            <button type="submit"  class="btn btn-secondary btn-dark">Lihat</button>
                                        </fieldset>
                                    </router-link>
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
               posts : [],

           };
       },
       methods:{
           loadData(){
               axios.get('api/admin/sub_kategori').then(response => {
                    this.posts = response.data.posts;
                }); 
           },
    
       },
       created(){
           this.loadData();
           
       }

    }
</script>
