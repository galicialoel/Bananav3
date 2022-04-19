<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Harvest extends Model
{
    protected $fillable = [
        'user_id',
        'classification_id',
        'harvest_date'
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function classification()
    {
        return $this->belongsTo(Classification::class,'classification_id','id');

    }
}
