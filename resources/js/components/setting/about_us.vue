<template>
    <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          
          <li class="breadcrumb-item active">About-Us</li>
          <!-- Breadcrumb Menu-->
         
        </ol>
        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-md-10">
                <div class="card">
                  <div class="card-header">

                    <strong>About Us</strong>
                    </div>
                   
                        <div class="card-body">
                            <div v-for="item in about" :key="item.id">
                            <span v-if="about.length >= 0"> 
                                
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="text-input">Visi</label>
                                    <div class="col-md-8">
                                        <label class="col-md-8 col-form-label" for="text-input" v-html="item.visi"></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="text-input">Misi</label>
                                    <div class="col-md-8">
                                        <label class="col-md-8 col-form-label" for="text-input" v-html="item.misi"></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="text-input">Deskripsi</label>
                                    <div class="col-md-8">
                                        <label class="col-md-8 col-form-label" for="text-input" v-html="item.deskripsi"></label>
                                    </div>
                                </div>
                                
                                <h3>Profile</h3>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="text-input">Nama</label>
                                    <div class="col-md-8">
                                        <label class="col-md-8 col-form-label" for="text-input">{{ item.nama }}</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="text-input">Alamat</label>
                                    <div class="col-md-8">
                                        <label class="col-md-8 col-form-label" for="text-input">{{ item.alamat }}</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="text-input">Telp</label>
                                    <div class="col-md-8">
                                        <label class="col-md-8 col-form-label" for="text-input">{{ item.telp }}</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="text-input">Riwayat Pendidikan</label>
                                    <div class="col-md-8">
                                        <label class="col-md-8 col-form-label" for="text-input" v-html="item.riwayat"></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="text-input">Gelar</label>
                                    <div class="col-md-8">
                                        <label class="col-md-8 col-form-label" for="text-input">{{ item.pendidikan }}</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label" for="text-input">Photo</label>
                                    <div class="col-md-2">
                                        <img class="img-fluid mb-3" :src="'/storage/' + item.image" alt="">
                                    </div>
                                </div>
                                

                                <div class="form-group row justify-content-center">
                                    <div  class="text-center">
                                        
                                        <button class="btn btn-warning" type="button" @click="showModalEdit(item)">
                                        <i class="icon-pencil "></i> Edit</button>
                                    </div>  
                                    <!-- <form action="" method="post" enctype="multipart/form-data">
                                        
                                        <fieldset>
                                            <button type="submit"  class="btn btn-secondary btn-danger"><i class="icons cui-trash "></i> Hapus</button>
                                        </fieldset>
                                        </form>  -->
                                </div>
                            </span>
                            <span v-else>
                                    <div  class="col-6 col-sm-4 col-md mb-3 mb-xl-0 text-center">
                                        <a href="">
                                        <button class="btn btn-primary" type="button">
                                        <i class="icon-plus "></i> Tambah</button></a>
                                    </div>        
                            </span>
                            </div>
                        </div>
                                  <!-- Modal -->
                        <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModal1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content" style="width: 200%;">
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
                                    <label for="recipient-name" class="col-form-label">Visi:</label>
                                        <VueTrix class="form-control" v-model="form.visi" :class="{ 'is-invalid' : form.errors.has('visi') }"/>
                                    <has-error :form="form" field="visi"></has-error>                             
                                  </div>
                                   <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Misi:</label>
                                        <VueTrix class="form-control" v-model="form.misi" :class="{ 'is-invalid' : form.errors.has('misi') }"/>
                                    <has-error :form="form" field="misi"></has-error>                             
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">deskripsi:</label>
                                        <VueTrix class="form-control" v-model="form.deskripsi" :class="{ 'is-invalid' : form.errors.has('deskripsi') }"/>
                                    <has-error :form="form" field="deskripsi"></has-error>                             
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">nama lengkap:</label>
                                      <input type="text" class="form-control" v-model="form.nama" :class="{ 'is-invalid' : form.errors.has('nama') }">
                                    <has-error :form="form" field="nama"></has-error>                             
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">telp:</label>
                                      <input type="text" class="form-control" v-model="form.telp" :class="{ 'is-invalid' : form.errors.has('telp') }">
                                    <has-error :form="form" field="telp"></has-error>                             
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">riwayat pendidikan:</label>
                                      <VueTrix class="form-control" v-model="form.riwayat" :class="{ 'is-invalid' : form.errors.has('riwayat') }"/>
                                    <has-error :form="form" field="riwayat"></has-error>                             
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">nama dan gelar:</label>
                                      <input type="text" class="form-control" v-model="form.pendidikan" :class="{ 'is-invalid' : form.errors.has('pendidikan') }">
                                    <has-error :form="form" field="pendidikan"></has-error>                             
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Misi:</label>
                                        <div v-if="imagePreview">
                                            <img class="img-preview img-fluid mb-3" :src="imagePreview"/> 
                                        </div>
                                        <div v-else-if="imageEdit.image">
                                            <img class="img-preview img-fluid mb-3" v-bind:src="'storage/' + imageEdit.image" />
                                        </div>
                                        <span><small><strong>Pastikan ukuran gambar dibawah *1 Mb</strong></small></span>
                                        <input type="file" ref="fileupload" class="form-control-file" v-on:change="onFileChangeEdit" :class="{ 'is-invalid' : form.errors.has('image') }">
                                    <has-error :form="form" field="misi"></has-error>                             
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
              </div>
              <!-- /.col-->
       </div>
       </main>
</template>
<script>

import VueTrix from "vue-trix";

export default {
    components: {
        VueTrix,
    },
    data() {
        return {
            about: {},
            statusModal: false,
            loading: false,
            disabled: false,
            form: new Form({
                id: "",
                visi: "",
                misi: "",
                deskripsi: "",
                nama: "",
                alamat: "",
                telp: "",
                riwayat: "",
                pendidikan: "",
                image: "",
            }),
            imageEdit: {},
            imagePreview: null,

        };
    },

    created(){

        this.loadData();
        Fire.$on("refreshData", () => {
            this.loadData();
            this.clear();
        });

    },
    methods:{
        showModalEdit(item){

            this.statusModal = true;
            this.form.reset();
                axios.get('api/getGambar/' + item.id)
                        .then(response =>{
                            this.imageEdit = response.data;
                          //  console.log(this.imageEdit);
                        });

            $("#showModal").modal("show");
            this.form.fill(item);

        },

        onFileChangeEdit(e){
            let file = e.target.files[0] || e.dataTransfer.files[0];
                let reader = new FileReader();  

                if(file['size'] < 1111775)
                {
                     reader.onloadend = (file) => {
                     this.form.image = e.target.files[0];
                  
                    //  console.log(reader.result);
                    }              
                     reader.readAsDataURL(file);
                     reader.onload = e => {
                     this.imagePreview = e.target.result;
               };
                }else{
                    alert('File size can not be bigger than 1 MB')
                }
        },
        
        clear () {
              const input = this.$refs.fileupload;
              input.type = 'text';
              input.type = 'file';
        },

        loadData(){
            axios
            .get('api/admin/about')
            .then(response => {
                this.about = response.data.about;
            });

        },
        updateData(){

            this.$Progress.start();
             this.loading = true;
             this.disabled = true;
             
            
             this.form.post('api/update_about/' + this.form.id)
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
}
</script>