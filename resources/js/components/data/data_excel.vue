
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
                    <i class="fa fa-align-justify"></i> Daftar Data Excel</div>
                 
                  <div class="card-body">

                    <vue-good-table
                      
                      :columns="columns"
                      :rows="dataExcel"
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
                        <span v-if="props.column.field == 'count'">
                            <span style="font-weight: bold; color: blue;">{{props.row.data_excel.length}}</span> 
                        </span>
        

                       <span v-if="props.column.field == 'actions'">
                           <span>
                                <router-link :to="{ name:'getDataExcel', params:{id:props.row.id} }" >
                                  <button type="submit"  class="btn btn-secondary btn-dark">Detail</button>
                                </router-link>
                           </span>
                        </span>
                       <span v-else>
                        {{props.formattedRow[props.column.field]}}
                        </span>
                    </template>

                      </vue-good-table>
                      
               
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
              
              dataExcel: [],

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
                label: 'Jumlah Data Excel',
                field: 'count',
                sortable: false,
                // headerField: this.sum,
                
        
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
            
            
        };  
      },

      created(){
          this.loadData();
     
      },

      methods:{

          
          loadData(){

              axios
              .get('api/admin/data_excel')
              .then(response =>{
                  this.dataExcel = response.data.dataExcel;
              })
              .catch((error) => {
                console.log(error);
              });

          },
         

      },
   

    }

</script>
