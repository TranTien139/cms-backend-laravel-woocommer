<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table='products';
    protected $fillable = ['name','alias','desription','price','price_saleoff','content','image','imagedetail','category_id','read','status','ishot','isnew','isbestseller','published'];
    public $timestamps = true;
}
