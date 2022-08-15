
<template>

<main class="main">
        <!-- Breadcrumb-->
            <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            
            <li class="breadcrumb-item active">Finance</li>
            <!-- Breadcrumb Menu-->
            
            </ol>
              <div class="row">
           <div class="container-fluid">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i> Daftar perusahaan</div>
                 
                  <div class="card-body">

                    <vue-good-table
                      
                      :columns="columns"
                      :rows="perusahaan"
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
                        <button type="submit" class="btn btn-secondary btn-warning" @click="showDetail(props.row)">Detail</button>
                      </span>
                      <span v-else>
                        {{props.formattedRow[props.column.field]}}
                      </span>
                    </template>

                      </vue-good-table>
                      <br>
                   
                         <div  class="col-6 col-sm-4 col-md mb-3 mb-xl-0 text-center">
                              <a @click="showModal">
                              <button class="btn btn-primary" type="button">
                                <i class="icon-plus "></i> Tambah</button></a>
                        </div>

                      <!-- modal  -->
                            <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModal1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content" style="width: 200%;">
                                    <div class="modal-header">
                                      <h5 v-show="!statusModal" class="modal-title" id="exampleModalLongTitle">Tambah Konten</h5>
                                      <h5 v-show="statusModal" class="modal-title" id="exampleModalLongTitle">Edit Konten</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form @submit.prevent="statusModal ? updateData() : saveData()" enctype="multipart/form-data">
                                      <div class="modal-body">
                                       
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">kd saham:</label>
                                          
                                            <input type="text" class="form-control" v-model="form.kd_saham" :class="{ 'is-invalid' : form.errors.has('kd_saham') }">
                                          <has-error :form="form" field="kd_saham"></has-error>                              
                                        </div>
                                         <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">nama lengkap:</label>
                                          
                                            <input type="text" class="form-control" v-model="form.nama_lengkap" :class="{ 'is-invalid' : form.errors.has('nama_lengkap') }">
                                          <has-error :form="form" field="nama_lengkap"></has-error>                              
                                        </div>
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">alamat:</label>
                                          
                                            <input type="text" class="form-control" v-model="form.alamat" :class="{ 'is-invalid' : form.errors.has('alamat') }">
                                          <has-error :form="form" field="alamat"></has-error>                              
                                        </div>
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">email:</label>
                                          
                                            <input type="text" class="form-control" v-model="form.email" :class="{ 'is-invalid' : form.errors.has('email') }">
                                          <has-error :form="form" field="email"></has-error>                              
                                        </div>
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">no telp:</label>
                                          
                                            <input type="text" class="form-control" v-model="form.no_telp" :class="{ 'is-invalid' : form.errors.has('no_telp') }">
                                          <has-error :form="form" field="no_telp"></has-error>                              
                                        </div>
                                         <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">deskripsi:</label>
                                            <VueTrix v-model="form.description" placeholder="Enter content" :class="{ 'is-invalid' : form.errors.has('description') }"/>
                                          <has-error :form="form" field="description"></has-error>                              
                                         </div>
                                         <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">alamat web:</label>
                                          
                                            <input type="text" class="form-control" v-model="form.alamat_web" :class="{ 'is-invalid' : form.errors.has('alamat_web') }">
                                          <has-error :form="form" field="alamat_web"></has-error>                              
                                        </div>
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">tanggal berdiri:</label>
                                          
                                            <input type="date" class="form-control" v-model="form.tanggal" :class="{ 'is-invalid' : form.errors.has('tanggal') }">
                                          <has-error :form="form" field="tanggal"></has-error>                              
                                        </div>
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">papan:</label>
                                          
                                            <input type="text" class="form-control" v-model="form.papan" :class="{ 'is-invalid' : form.errors.has('papan') }">
                                          <has-error :form="form" field="papan"></has-error>                              
                                        </div>
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">bidang:</label>
                                          
                                            <input type="text" class="form-control" v-model="form.bidang" :class="{ 'is-invalid' : form.errors.has('bidang') }">
                                          <has-error :form="form" field="bidang"></has-error>                              
                                        </div>
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">sektor:</label>
                                          
                                            <input type="text" class="form-control" v-model="form.sector" :class="{ 'is-invalid' : form.errors.has('sector') }">
                                          <has-error :form="form" field="sector"></has-error>                              
                                        </div>
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">sub sektor:</label>
                                          
                                            <input type="text" class="form-control" v-model="form.sub_sector" :class="{ 'is-invalid' : form.errors.has('sub_sector') }">
                                          <has-error :form="form" field="sub_sector"></has-error>                              
                                        </div>
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">industri:</label>
                                          
                                            <input type="text" class="form-control" v-model="form.industri" :class="{ 'is-invalid' : form.errors.has('industri') }">
                                          <has-error :form="form" field="industri"></has-error>                              
                                        </div>
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">sub industri:</label>
                                          
                                            <input type="text" class="form-control" v-model="form.sub_industri" :class="{ 'is-invalid' : form.errors.has('sub_industri') }">
                                          <has-error :form="form" field="sub_industri"></has-error>                              
                                        </div>
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">biro adminsistrasi:</label>
                                          
                                            <input type="text" class="form-control" v-model="form.biro_administrasi" :class="{ 'is-invalid' : form.errors.has('biro_administrasi') }">
                                          <has-error :form="form" field="biro_administrasi"></has-error>                              
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

                           <!-- modal detail -->
                            <div class="modal fade" id="showModalDetail" tabindex="-1" role="dialog" aria-labelledby="showModal1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content" style="width: 200%;">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">Detail perusahaan</h5>
                                    
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    
                                      <div class="modal-body">
                                       
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">kd saham:</label>
                                          
                                            <input type="text" class="form-control" readonly v-model="form.kd_saham" :class="{ 'is-invalid' : form.errors.has('kd_saham') }">
                                          <has-error :form="form" field="kd_saham"></has-error>                              
                                        </div>
                                         <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">nama lengkap:</label>
                                          
                                            <input type="text" class="form-control" readonly v-model="form.nama_lengkap" :class="{ 'is-invalid' : form.errors.has('nama_lengkap') }">
                                          <has-error :form="form" field="nama_lengkap"></has-error>                              
                                        </div>
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">alamat:</label>
                                          
                                            <input type="text" readonly class="form-control" v-model="form.alamat" :class="{ 'is-invalid' : form.errors.has('alamat') }">
                                          <has-error :form="form" field="alamat"></has-error>                              
                                        </div>
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">email:</label>
                                          
                                            <input readonly type="text" class="form-control" v-model="form.email" :class="{ 'is-invalid' : form.errors.has('email') }">
                                          <has-error :form="form" field="email"></has-error>                              
                                        </div>
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">no telp:</label>
                                          
                                            <input readonly type="text" class="form-control" v-model="form.no_telp" :class="{ 'is-invalid' : form.errors.has('no_telp') }">
                                          <has-error :form="form" field="no_telp"></has-error>                              
                                        </div>
                                         <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">deskripsi:</label>
                                            <VueTrix readonly v-model="form.description" :class="{ 'is-invalid' : form.errors.has('description') }"/>
                                          <has-error :form="form" field="description"></has-error>                              
                                         </div>
                                         <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">alamat web:</label>
                                          
                                            <input type="text" readonly class="form-control" v-model="form.alamat_web" :class="{ 'is-invalid' : form.errors.has('alamat_web') }">
                                          <has-error :form="form" field="alamat_web"></has-error>                              
                                        </div>
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">tanggal berdiri:</label>
                                          
                                            <input type="date" readonly class="form-control" v-model="form.tanggal" :class="{ 'is-invalid' : form.errors.has('tanggal') }">
                                          <has-error :form="form" field="tanggal"></has-error>                              
                                        </div>
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">papan:</label>
                                          
                                            <input type="text" readonly class="form-control" v-model="form.papan" :class="{ 'is-invalid' : form.errors.has('papan') }">
                                          <has-error :form="form" field="papan"></has-error>                              
                                        </div>
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">bidang:</label>
                                          
                                            <input type="text" readonly class="form-control" v-model="form.bidang" :class="{ 'is-invalid' : form.errors.has('bidang') }">
                                          <has-error :form="form" field="bidang"></has-error>                              
                                        </div>
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">sektor:</label>
                                          
                                            <input type="text" readonly class="form-control" v-model="form.sector" :class="{ 'is-invalid' : form.errors.has('sector') }">
                                          <has-error :form="form" field="sector"></has-error>                              
                                        </div>
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">sub sektor:</label>
                                          
                                            <input type="text" readonly class="form-control" v-model="form.sub_sector" :class="{ 'is-invalid' : form.errors.has('sub_sector') }">
                                          <has-error :form="form" field="sub_sector"></has-error>                              
                                        </div>
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">industri:</label>
                                          
                                            <input type="text" readonly class="form-control" v-model="form.industri" :class="{ 'is-invalid' : form.errors.has('industri') }">
                                          <has-error :form="form" field="industri"></has-error>                              
                                        </div>
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">sub industri:</label>
                                          
                                            <input type="text" readonly class="form-control" v-model="form.sub_industri" :class="{ 'is-invalid' : form.errors.has('sub_industri') }">
                                          <has-error :form="form" field="sub_industri"></has-error>                              
                                        </div>
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">biro adminsistrasi:</label>
                                          
                                            <input type="text" readonly class="form-control" v-model="form.biro_administrasi" :class="{ 'is-invalid' : form.errors.has('biro_administrasi') }">
                                          <has-error :form="form" field="biro_administrasi"></has-error>                              
                                        </div>

                                          

                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    
                                      </div>
                                   
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

import VueTrix from "vue-trix";

export default {

    components: {

      VueTrix

    },
      
      data(){
        return {
              
              columns: [
              {
                label: 'Kd_Saham',
                field: 'kd_saham',
              },
              {
                label: 'Nama perusahaan',
                field: 'nama_lengkap',
                //type: 'number',
              },
              {
                label: 'Sektor',
                field: 'sector',
                // type: 'date',
                // dateInputFormat: 'yyyy-MM-dd',
                // dateOutputFormat: 'MMM do yy',
              },
              {
                label: 'Aksi',
                field: 'actions',
                sortable: false,
              },
            
            ],
            form: new Form({
               id: "",
                //  category_id: "",
                 kd_saham: "",
                 nama_lengkap: "",
                 alamat: "",
                 email: "",
                 no_telp: "",
                 description: "",
                 alamat_web: "",
                 tanggal: "",
                 papan: "",
                 bidang: "",
                 sector: "",
                 sub_sector: "",
                 industri: "",
                 sub_industri: "",
                 biro_administrasi: "",
            }),
            
            perusahaan: {},
            statusModal: false,
            loading: false,
            disabled: false,
        };  
      },

      created(){
          this.loadData();
          Fire.$on("refreshData", () => {
            this.loadData();
          });

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

          showDetail(row){
            this.form.reset();
            $("#showModalDetail").modal("show");
            this.form.fill(row);
          },


          loadData(){

              axios
              .get('api/admin/perusahaan')
              .then(response =>{
                  this.perusahaan = response.data.perusahaan;
              })
              .catch((error) => {
                console.log(error);
              });

          },

          saveData(){
            this.$Progress.start();
            this.loading = true;
            this.disabled = true;
            this.form.post('api/save_perusahaan')
            .then(()=>{
                
                Fire.$emit("refreshData");

                $("#showModal").modal("hide");

                  Toast.fire({
                    icon: 'success',
                    title: 'Data Berhasil Disimpan',
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
             
            
             this.form.put('api/update_perusahaan/' + this.form.id)
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
              .then(result =>{

                  if(result.value){
                    this.form.delete('api/delete_perusahaan/' + id)
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
