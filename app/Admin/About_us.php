<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class About_us extends Model
{

    protected $table = 'about_us';

    //protected $guarded = 'id';
    
    protected $fillable = [
        'visi',
        'misi',
        'deskripsi',
        'nama',
        'alamat',
        'telp',
        'riwayat',
        'pendidikan',
        'image',
    ];
    //
}
