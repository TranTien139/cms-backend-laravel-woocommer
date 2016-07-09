<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageDetailProductModel extends Model
{
    protected $table='imageproductdetail';
    protected $fillable = ['imagedetail','product_id'];
    public $timestamps = false;
}
