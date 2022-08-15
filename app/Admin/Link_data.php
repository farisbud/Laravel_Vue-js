<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Link_data extends Model
{

    protected $table ='link_data';

    protected $fillable=[
        'perusahaan_id',
        'nama_url',
        'url',
       ];
    //

    public function perusahaan(){
        return $this->belongsTo(Perusahaan::class);
    }
}
