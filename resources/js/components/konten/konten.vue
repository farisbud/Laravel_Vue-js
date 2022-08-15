
<template>

<main class="main">
        <!-- Breadcrumb-->
            <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            
            <li class="breadcrumb-item active">Konten</li>
            <!-- Breadcrumb Menu-->
            
            </ol>
           <div class="row">
            <div class="container-fluid">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i> Daftar Konten</div>
                
                  <!-- <div class="alert alert-success">
                     
                    </div> -->
                
                  <div class="card-body">
                        <vue-good-table
                      
                      :columns="columns"
                      :rows="content"
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
                        <button type="submit" class="btn btn-secondary btn-danger" @click="deleteRow(props.row.id)">Delete</button>
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
                                 
                                  <button class="btn btn-primary" type="button" @click="showModal()">
                                    <i class="icon-plus "></i> Tambah</button>
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
                                        <!-- status modal untuk edit data -->
                                        <div v-show="statusModal">
                                            <!-- <div class="form-group">
                                              <label for="recipient-name" class="col-form-label">Kategori:</label>
                                                  <select class="category" id="category" name="category" v-model="category_id" :class="{ 'is-invalid' : form.errors.has('category_id') }">
                                                      <option value="" selected disabled>Pilih Kategori</option>  
                                                  
                                                      <option v-for="item in cat" :key="item.id" :value="item.id">{{ item.Name_cat }}</option>

                                                  </select>    
                                                  <has-error :form="form" field="category_id"></has-error>          
                                            </div> -->
                                              <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Sub Kategori:</label>
                                                    <select class="form-control" v-model="form.sub_category_id" :class="{ 'is-invalid' : form.errors.has('sub_category_id') }">
                                                        <option value="" selected disabled>Pilih Sub Kategori</option>  
                                                        <!-- <option v-for="item in sub_category" :key="item.id" v-if="item.id = form.sub_category_id"></option> -->
                                                        <option v-for="item in sub" :key="item.id" :value="item.id">{{ item.Name_sub }}</option>

                                                    </select>    
                                                    <has-error :form="form" field="sub_category_id"></has-error>          
                                              </div> 
                                        </div>
                                        <!-- status modal untuk add data -->
                                        <div v-show="!statusModal">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Kategori:</label>
                                                    <select class="category" id="category" name="category" v-model="category_id" :class="{ 'is-invalid' : form.errors.has('category_id') }">
                                                        <option value="" selected disabled>Pilih Kategori</option>  
                                              
                                                        <option v-for="item in cat" :key="item.id" :value="item.id">{{ item.Name_cat }}</option>

                                                    </select>    
                                                    <has-error :form="form" field="category_id"></has-error>          
                                            </div>
                                            <div class="form-group">
                                              <label for="recipient-name" class="col-form-label">Sub Kategori:</label>
                                                  <select class="form-control" v-model="form.sub_category_id" :class="{ 'is-invalid' : form.errors.has('sub_category_id') }">
                                                      <option value="" selected disabled>Pilih Sub Kategori</option>  
                                                      <!-- <option v-for="item in sub_category" :key="item.id" v-if="item.id = form.sub_category_id"></option> -->
                                                      <option v-for="item in sub_category" :key="item.id" :value="item.id">{{ item.Name_sub }}</option>

                                                  </select>    
                                                  <has-error :form="form" field="sub_category_id"></has-error>          
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">Judul:</label>
                                          
                                            <input type="text" class="form-control" v-model="form.judul" :class="{ 'is-invalid' : form.errors.has('judul') }">
                                          <has-error :form="form" field="judul"></has-error>                              
                                        </div>
                                         <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">Caption:</label>
                                          
                                            <input type="text" class="form-control" v-model="form.caption" :class="{ 'is-invalid' : form.errors.has('caption') }">
                                          <has-error :form="form" field="caption"></has-error>                              
                                        </div>
                                         <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">Isi konten:</label>
                                            <VueTrix class="form-control" v-model="form.description" :class="{ 'is-invalid' : form.errors.has('description') }"/>
                                          <has-error :form="form" field="description"></has-error>                             
                                        </div>
                                        
                                         <div class="form-group" v-show="statusModal">

                                        
                                          <label for="image" class="col-form-label">Gambar</label>
                                            <div v-if="imagePreviewEdit">

                                              <img class="img-preview img-fluid mb-3" :src="imagePreviewEdit"/> 

                                            </div>

                                            <div v-else-if="contentEdit.image">
                                                <img class="img-preview img-fluid mb-3" v-bind:src="'storage/' + contentEdit.image" />
                                            </div>

                                              
                                            <span><small><strong>Pastikan ukuran gambar dibawah *1 Mb</strong></small></span>
                                            <input type="file" ref="fileupload" class="form-control-file" v-on:change="onFileChangeEdit" :class="{ 'is-invalid' : form.errors.has('image') }">
                                          
                                              <has-error :form="form" field="image"></has-error>     
                                         </div>
                                         <div class="form-group" v-show="!statusModal">

                                        
                                          <label for="image" class="col-form-label">Gambar</label>
           
                                              <img class="img-preview img-fluid mb-3" :src="imagePreview"/> 
                                 
                                            <span><small><strong>Pastikan ukuran gambar dibawah *1 Mb</strong></small></span>
                                            <input type="file" ref="fileupload" class="form-control-file" v-on:change="onFileChange" :class="{ 'is-invalid' : form.errors.has('image') }">
                                          
                                              <has-error :form="form" field="image"></has-error>     
                                         </div>

                                          <div class="form-group">
                                            <label class="col-form-label" for="text-input">Image online source</label>

                                              <input class="form-control" type="text" v-model="form.image_source" :class="{ 'is-invalid' : form.errors.has('image_source') }">

                                              <has-error :form="form" field="image_source"></has-error>     
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

                          <!-- modal untuk detail  -->
                            <div class="modal fade" id="showModalDetail" tabindex="-1" role="dialog" aria-labelledby="showModal1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content" style="width: 200%; ">
                                    
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">Detail</h5>
                                     
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                   
                                      <div class="modal-body">
                          
                                              <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Sub Kategori:</label>
                                                    <select class="form-control" v-model="form.sub_category_id" :class="{ 'is-invalid' : form.errors.has('sub_category_id') }">
                                                       
                                                       
                                                        <option v-for="item in sub" :key="item.id" :value="item.id">{{ item.Name_sub }}</option>

                                                    </select>    
                                                    <has-error :form="form" field="sub_category_id"></has-error>          
                                              </div> 
                              
                                        <div class="form-group">
                                          <label for="recipient-name" class="col-form-label">Judul:</label>
                                          
                                            <input type="text" class="form-control" v-model="form.judul" :class="{ 'is-invalid' : form.errors.has('judul') }">
                                          <has-error :form="form" field="judul"></has-error>                              
                                        </div>
                                         <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Caption:</label>
                                            
                                              <input type="text" class="form-control" v-model="form.caption" :class="{ 'is-invalid' : form.errors.has('caption') }">
                                            <has-error :form="form" field="caption"></has-error>                              
                                          </div>
                                         
                                         <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Isi konten:</label>
                                              <div contenteditable="true" v-html="form.description" >
                                                
                                              </div>
                                            
                                            <has-error :form="form" field="description"></has-error>                              
                                         </div>
                                         
                                         <div class="form-group">
                                          <label for="image" class="col-form-label">Gambar</label>
                                            <div v-if="form.image">
                                                <img  class="img-preview img-fluid mb-3" v-bind:src="'storage/' + form.image" />
                                            </div>
                                            
                                         </div>
                                         <div class="form-group">
                                            <label class="col-form-label" for="text-input">Image online source</label>

                                              <input class="form-control" type="text" v-model="form.image_source" :class="{ 'is-invalid' : form.errors.has('image_source') }">

                                              <has-error :form="form" field="image_source"></has-error>     
                                          </div>
                                        
                                         

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
          // ...
          
       mounted() {
		// Fetch initial results
		      console.log('component mounted');
	      },
        components: {
          VueTrix,
        },
      data(){
           return {
               columns: [
                 {
                   label: 'Caption',
                   field: 'caption',
                 },
                 {
                   label: 'Judul',
                   field: 'judul',
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
                 sub_category_id: "",
                 caption: "",
                 judul: "",
                 description: "",
                 image_source: "",
                 image: "",

               }),
            
               content : {},
               contentEdit: {},
               //data kategori
               cat: {},
               //data sub_kategori
               sub: {},
               statusModal: false,
               loading: false,
               disabled: false,
               
                category_id: "",
                sub_category: {},
                
                imagePreview: null,
                imagePreviewEdit: null,
            
           };
       },

       watch : {

         category_id : function(value){
            axios
            .get('api/findSub?id='+ this.category_id)
            .then(response => {
              
              this.sub_category = response.data.sub_category;
            //  console.log(response.data.sub_category);
            })
            .catch((error)=>{
              console.log(error);
            });

         },
         
      
         

       },

      created(){
        
         this.loadData();
         Fire.$on("refreshData", () => {
              this.loadData();
              this.clear();
              this.imagePreview=null;
              this.imagePreviewEdit=null;
           });

       
       },
      
        methods:{

            loadData(){
               
                axios.get('api/admin/konten').then(response => {
                      this.content = response.data.content;  
                      this.cat = response.data.cat;
                      this.sub = response.data.sub;

                  }); 
            },


            deleteRow(id){
             // console.log(id);
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
                    this.form.delete('api/delete_konten/' + id)
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

         
            showDetail(row){
            
             this.form.reset();
             $("#showModalDetail").modal("show");
             this.form.fill(row);
            },

            showModal(){
             this.statusModal = false;
             this.form.reset();
             $("#showModal").modal("show");
            },

            showModalEdit(row){
              this.statusModal = true;
              this.form.reset();
                 axios
                 .get('api/admin/getGambar/' + row.id)
                 .then(response => {

                   this.contentEdit = response.data;
                  //console.log(this.contentEdit.image)
                 });
              $("#showModal").modal("show");
              this.form.fill(row);
           },

           clear () {
              const input = this.$refs.fileupload;
              input.type = 'text';
              input.type = 'file';
            },

           onFileChange(e) {
        
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

          onFileChangeEdit(e) {

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
                     this.imagePreviewEdit = e.target.result;
               };
                }else{
                    alert('File size can not be bigger than 1 MB')
                }
             
           },

           saveData(){
             this.$Progress.start();
             this.loading = true;
             this.disabled = true;
             
             this.form.post('api/save_konten')
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
             
            
             this.form.post('api/update_konten/' + this.form.id)
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
