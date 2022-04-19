<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'user_id',
        'transaction_no',
        'date_sold',
        'total_amount_sold',
        'total_kg_sold',
    'total_box_sold',
        'class_a_total',
        'class_b_total'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
