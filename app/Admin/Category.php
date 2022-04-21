<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $table='category';

    //  protected $primaryKey = 'id_category';
    


    protected $fillable=[
        'Name_cat',
       ];
    

      public function sub_category(){
     	return $this->hasMany(Sub_category::class);
     }

   
    //
}
