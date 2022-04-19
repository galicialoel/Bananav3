<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoxProduct extends Model
{
    protected $fillable = [
        'user_id',
        'classification_id',
        'box_number',
        'order_delivery_date',
        'status',
        'product_destination',
        'price'
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function classification()
    {
        return $this->belongsTo(Classification::class,'classification_id','id');
    }

    public function harvests()
    {
        return $this->hasMany(Harvest::class,'box_product_id','id');
    }

}
