
<template>

<main class="main">
        <!-- Breadcrumb-->
            <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            
            <li class="breadcrumb-item active">Finance</li>
            <li class="breadcrumb-item"><b>{{ perusahaan.nama_lengkap }}</b>( <b>{{ perusahaan.kd_saham }} )</b></li>
            <!-- Breadcrumb Menu-->
            
            </ol>
              <div class="row">
           <div class="container-fluid">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i> Daftar Perusahaan Update Link</div>
                 
                  <div class="card-body">

                    <vue-good-table
                      
                      :columns="columns"
                      :rows="excel"
                      max-height="600px"
                     
                      :line-numbers="true"
                      :search-options="{
                        enabled: true,
                        placeholder: 'Search',
                    
                      }"
                      :pagination-options="{

                        enabled: true,
                          nextLabel: 'next',
                          prevLabel: 'prev',
                          rowsPerPageLabel: 'Tampilkan per',
                          ofLabel: 'of',
                          pageLabel: 'page', // for 'pages' mode
                          allLabel: 'All',

                      }">
                      
                    
                    <template slot="table-row" slot-scope="props">
    
                       <span v-if="props.column.field == 'actions'">
                        
                         <button type="submit" class="btn btn-secondary btn-danger" @click="deleteData(props.row.id)">Delete</button>
                        <button type="submit"  class="btn btn-secondary btn-dark" @click="showModalEdit(props.row)">Edit</button>
                       
                      </span>
                      <span v-else>
                        {{props.formattedRow[props.column.field]}}
                      </span>
                    </template>

                      </vue-good-table>
                      <br>
                        <span v-if="excel.length == 0 ">
                            <div  class="col-6 col-sm-4 col-md mb-3 mb-xl-0 text-center">
                            
                                <button class="btn btn-primary" type="button" @click="showModal()">
                                <i class="icon-plus "></i> Tambah</button>
                            </div>
                        </span>
                            <!-- Modal -->
                            <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModal1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 v-show="!statusModal" class="modal-title" id="exampleModalLongTitle">Tambah Data link</h5>
                                    <h5 v-show="statusModal" class="modal-title" id="exampleModalLongTitle">Edit Data Link</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form @submit.prevent="statusModal ? updateData() : saveData()">
                                    <div class="modal-body">
        
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">judul :</label>
                                        
                                        <input type="text" class="form-control" v-model="form.judul" :class="{ 'is-invalid' : form.errors.has('Name_sub') }">
                                        <has-error :form="form" field="Name_sub"></has-error>                              
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">url :</label>
                                        
                                        <input type="text" class="form-control" v-model="form.url_excel" :class="{ 'is-invalid' : form.errors.has('Name_sub') }">
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
              
              excel: {},
              perusahaan: {},

              columns: [
              {
                label: 'Nama data',
                field: 'judul',
              },
              {
                label: 'url excel',
                field: 'url_excel',
                //type: 'number',
              },
              {
                label: 'Aksi',
                field: 'actions',
                sortable: false,
              },
            
            ],

            form: new Form({
                id: "",
                perusahaan_id: "" + this.$route.params.id,
                judul: "",
                url_excel: "",
            }),
            statusModal: false,
            loading: false,
            disabled: false,
            
            
        };  
      },

      created(){
          this.loadData();
          Fire.$on("refreshData", ()=> {
              this.loadData();
          })
     
      },

      methods:{

          showModal(){

              this.statusModal = false;
              this.form.reset();
              $("#showModal").modal("show");

          },
          showModalEdit(row){

              this.statusModal = true;
              this.form.reset();
              $("#showModal").modal("show");
              this.form.fill(row);

          },
          
          loadData(){

              axios
              .get('/api/getDataExcel/' + this.$route.params.id)
              .then(response =>{
                  this.excel = response.data.excel;
                  this.perusahaan = response.data.perusahaan;
                 // console.log(this.link);
              })
              .catch((error) => {
                console.log(error);
              });

          },

          saveData(){
              this.$Progress.start();
              this.loading = true;
              this.disabled = true;
              this.form.post('/api/save_excel')
              .then(()=>{
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
             this.form.put('/api/update_excel/' + this.form.id)
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
                    this.form.delete('/api/delete_excel/' + id)
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
   

    }

</script>
