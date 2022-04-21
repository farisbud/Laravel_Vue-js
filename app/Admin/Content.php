<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{

    protected $table = 'content';

    protected $primaryKey = 'id';
     
    protected $fillable = [
        'sub_category_id',
        'caption',
        'judul',
        'sub_content',
        'description',
        'image_source',
        'image',
    ];

    public function scopeFilter($query, array $filters){

        //tenary php
        // if(isset($filters['search']) ? $filters['search'] : false){

        //     return $query->where('judul', 'like', '%' . $filters['search'] . '%')
        //                     ->orWhere('description', 'like', '%' . $filters['search'] . '%');

        // }

        $query->when($filters['search'] ?? false, function($query, $search){

            return $query->where('judul', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%');

        });

        $query->when($filters['sub_category'] ?? false, function($query, $sub_category){

            return $query->whereHas('sub_category', function($query) use ($sub_category){
                        $query->where('Name_sub', $sub_category);
            
                    });

        });

    }


    public function sub_category(){
        return $this->belongsTo('App\Admin\Sub_category');
    }

    //
}
