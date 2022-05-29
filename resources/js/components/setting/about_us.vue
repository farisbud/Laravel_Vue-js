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
                                        <label class="col-md-8 col-form-label" for="text-input">{{ item.riwayat }}</label>
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
                                        <a href="">
                                        <button class="btn btn-warning" type="button">
                                        <i class="icon-pencil "></i> Edit</button></a>
                                    </div>  
                                    <form action="" method="post" enctype="multipart/form-data">
                                        
                                        <fieldset>
                                            <button onclick="return confirm('Yakin Hapus Data Roti?')" type="submit"  class="btn btn-secondary btn-danger"><i class="icons cui-trash "></i> Hapus</button>
                                        </fieldset>
                                        </form> 
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

                  
                </div>
                </div>
            </div> 
              </div>
              <!-- /.col-->
       </div>
       </main>
</template>
<script>
export default {
    data() {
        return {
            about: [],
        };
    },

    created(){

        this.loadData()

    },
    methods:{
        loadData(){
            axios
            .get('api/admin/about')
            .then(response => {
                this.about = response.data.about;
            });

        }

    },
}
</script>