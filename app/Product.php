<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'stock'];

    public function saleDetail(){
        return $this->hasMany('App\SaleDetail');
    }
}
