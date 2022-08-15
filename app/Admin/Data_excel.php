<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Data_excel extends Model
{

    protected $table = 'data_excel';

 
    protected $fillable=[
        'perusahaan_id',
        'judul',
        'url_excel'
       ];
    //

    public function perusahaan(){
        return $this->belongsTo(Perusahaan::class);
    }
}
