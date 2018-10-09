<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['type', 'customer_id', 'date'];

    public function details(){
        return $this->hasMany('App\SaleDetail');
    }

    public function customer(){
        return $this->belongsTo('App\Customer');
    }
}
