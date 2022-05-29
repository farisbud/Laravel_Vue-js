
<template>

<main class="main">
        <!-- Breadcrumb-->
            <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Kategori</li>
            <li class="breadcrumb-item"><b>{{ category.Name_cat }}</b></li>
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
                          <th>No</th>
                          <th>Nama Sub Kategori</th>
                         
                          
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>

                          <tr v-for="(item, key) in subCategory" :key="item.id">                             
                            <td>{{ key+1 }}</td>
                            <td>{{ item.Name_sub }}</td>
                         
                            <td>
                                <div class="form-group row">
                                      <form @submit.prevent="deleteData(item.id)">
                                  
                                      <fieldset>
                                          <button type="submit"  class="btn btn-secondary btn-danger">Hapus</button>
                                      </fieldset>
                                      </form> 
                                    
                                          <fieldset>
                                              <button type="submit"  class="btn btn-secondary btn-dark" @click="showModalEdit(item)">Edit</button>
                                          </fieldset>
                                    
                                  </div>
                            </td>
                        </tr>
                      </tbody>
                    </table>
                        <div  class="col-6 col-sm-4 col-md mb-3 mb-xl-0 text-center">
                            
                            <button class="btn btn-primary" type="button" @click="showModal()">
                            <i class="icon-plus "></i> Tambah</button>
                        </div>
                         <!-- Modal -->
                         <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModal1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 v-show="!statusModal" class="modal-title" id="exampleModalLongTitle">Tambah Sub Kategori</h5>
                                <h5 v-show="statusModal" class="modal-title" id="exampleModalLongTitle">Edit Sub Kategori</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form @submit.prevent="statusModal ? updateData() : saveData()" method="post">
                                <div class="modal-body">
                                  <!-- <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Nama Kategori:</label>
                                        <select class="form-control" v-model="form.category_id">
                                            <option value>Pilih Kategori</option>  
                                   
                                            <option v-for="item in cat" :key="item.id" :value="item.id">{{ item.Name_cat }}</option>

                                        </select>              
                                  </div> -->
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Sub Kategori:</label>
                                    
                                    <input type="text" class="form-control" v-model="form.Name_sub" :class="{ 'is-invalid' : form.errors.has('Name_sub') }">
                                    <has-error :form="form" field="Name_sub"></has-error>                              
                                  </div>
                          
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button v-show="statusModal" type="submit" class="btn btn-primary" :disabled="disabled"><i v-show="loading" class="fa fa-spinner fa-spin"></i> Update</button>
                                  <button v-show="!statusModal" type="submit" class="btn btn-primary" :disabled="disabled"><i v-show="loading" class="fa fa-spinner fa-spin"></i> Simpan</button>
                                </div>
                              </form>
                            </div>
                          </div>
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
              
               subCategory: [],
               category:[],
               statusModal: false,
               loading: false,
               disabled: false,
               form: new Form({
                   id: "",
                   category_id: "" + this.$route.params.id,
                   Name_sub: "",
               }),
                
               
                
           };
       },
       methods:{
           loadData(){
               axios.get('/api/getSubKategori/' + this.$route.params.id)
               .then(response => {
                    this.subCategory = response.data.subCategory;
                    this.category = response.data.category;
                   
                })
                .catch((error)=>{
                    console.log(error);
                }); 
               
           },
            showModal(){
             this.statusModal = false;
             this.form.reset();
             $("#showModal").modal("show");
           },
            showModalEdit(item){
             this.statusModal = true;
             this.form.reset();
             $("#showModal").modal("show");
             this.form.fill(item);
           },

           saveData(){
             this.$Progress.start();
             this.loading = true;
             this.disabled = true;
             this.form.post('/api/save_sub')
             .then(() => {
               
               Fire.$emit("refreshData");

               $("#showModal").modal("hide");

                Toast.fire({
                  icon: 'success',
                  title: 'Data Berhasil Disimpan'
                });

                this.$Progress.finish();
                this.loading = false;
                this.disabled = false;
             })
             .catch(()=>{
               this.$Progress.fail();
             this.loading = false;
             this.disabled = false;
             });
           },

            updateData(){
             this.$Progress.start();
             this.loading = true;
             this.disabled = true;
             this.form.put('/api/update_sub/' + this.form.id)
             .then(() => {

               Fire.$emit("refreshData");

               $("#showModal").modal("hide");

                Toast.fire({
                  icon: 'success',
                  title: 'Data Berhasil Diupdate'
                });
                this.$Progress.finish();
                this.loading = false;
                this.disabled = false;
             })
             .catch(()=>{
               this.$Progress.fail();
             this.loading = false;
             this.disabled = false;
             });
           },

            deleteData(id){
            Swal.fire({
              title: "Apakah anda yakin menghapus data ini ??",
              text: "Klik cancel jika ingin membatalkan penghapusan",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButton: "#d33",
              confirmButtonText: "Hapus",

              })
              .then(result => {
                  if(result.value){
                    this.form.delete('/api/delete_sub/' + id)
                    .then(()=>{
                      Swal.fire(
                        "Terhapus",
                        "Data anda sudah terhapus",
                        "success",
                      );
                      Fire.$emit("refreshData");

                    })
                    .catch(()=>{
                      Swal.fire(
                        "Gagal",
                        "Data gagal terhapus",
                        "warning"
                      );
                    });
                  }
              });
            
          },
          
       },
       created(){
           this.loadData();
           Fire.$on("refreshData", () => {
              this.loadData();
           });
       },
       mounted(){
         
       },

    }
</script>
