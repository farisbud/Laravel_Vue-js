
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
                                    
                                        <fieldset>
                                            <button type="submit" @click="showModalEdit(item)"  class="btn btn-secondary btn-dark">Edit</button>
                                        </fieldset>
                                   
                                </div>
                            </td>
                        </tr>
                      </tbody>
                    </table>
                           <!-- Modal -->
                        <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModal1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 v-show="!statusModal" class="modal-title" id="exampleModalLongTitle">Tambah Akun</h5>
                                <h5 v-show="statusModal" class="modal-title" id="exampleModalLongTitle">Edit Akun</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form @submit.prevent="statusModal ? updateData() : saveData()">
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Nama lengkap:</label>
                                      <input type="text" class="form-control" v-model="form.email" :class="{ 'is-invalid' : form.errors.has('email') }">
                                    <has-error :form="form" field="email"></has-error>                             
                                  </div>
                                   <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Username:</label>
                                      <input type="text" class="form-control" v-model="form.no_telp" :class="{ 'is-invalid' : form.errors.has('no_telp') }">
                                    <has-error :form="form" field="no_telp"></has-error>                             
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
               nav :{},
               statusModal: false,
               loading: false,
               disabled: false,
               form: new Form({
                 
                 id: "",
                 email: "",
                 no_telp: "",

               }),

           };
       },
       methods:{
          showModalEdit(item){

            this.statusModal = true;
            this.form.reset();
            $("#showModal").modal("show");
            this.form.fill(item);

          },
           loadData(){
               axios
               .get('api/admin/navbar')
               .then(response => {
                   this.nav = response.data.nav;
               });
           },

           updateData(){
             this.$Progress.start();
             this.loading = true;
             this.disabled = true;
             this.form.put('api/update_navbar/' + this.form.id)
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
       },
       created(){
           this.loadData();
           Fire.$on("refreshData", () => {
             this.loadData();
           })
       }

    }
</script>
