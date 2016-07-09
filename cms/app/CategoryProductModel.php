<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProductModel extends Model
{
    protected $table='categories_products';
    protected $fillable = ['name','alias','parent_id','order','published'];
    public $timestamps = true;
}
