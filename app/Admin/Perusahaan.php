<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{

    protected $table ='perusahaan';

    protected $fillable=[
        'kd_saham',
        'nama_lengkap',
        'alamat',
        'email',
        'no_telp',
        'description',
        'alamat_web',
        'tanggal',
        'papan',
        'bidang',
        'sector',
        'sub_sector',
        'industri',
        'sub_industri',
        'biro_administrasi',
        
       ];

       public function scopeFilter($query, array $filters){

        //tenary php
        // if(isset($filters['search']) ? $filters['search'] : false){

        //     return $query->where('judul', 'like', '%' . $filters['search'] . '%')
        //                     ->orWhere('description', 'like', '%' . $filters['search'] . '%');

        // }

        $query->when($filters['search'] ?? false, function($query, $search){

            return $query->where('nama_lengkap', 'like', '%' . $search . '%')
            ->orWhere('kd_saham', 'like', '%' . $search . '%');

        });

    }



        public function link_data(){
            return $this->hasMany(Link_data::class);
        }

        public function data_excel(){
            return $this->hasMany(Data_excel::class);
        }

    
    //
}
