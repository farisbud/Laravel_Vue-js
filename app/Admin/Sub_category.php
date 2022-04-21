<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Sub_category extends Model
{
   
    protected $table='sub_category';

    protected $primaryKey = 'id';
    // protected $foreignKey = 'category_id';

   
    protected $fillable=[
        'category_id',
        'Name_sub',
     
       ];

       public function category(){
    	return $this->belongsTo('App\Admin\Category');
    }

        public function content(){
        return $this->hasMany('App\Admin\Content');
    }
    //
}
