<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    protected $fillable = [
        'class_name',
        'price',
        'barcode',
        'class_status',
        'barcode_path'

    ];

    public function box_products(){
        return $this->hasMany(BoxProduct::class,'classification_id','id');
    }
}
