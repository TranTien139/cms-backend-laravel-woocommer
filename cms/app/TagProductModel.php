<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagProductModel extends Model
{
    protected $table='tags_products';
    protected $fillable = ['id_product','id_tag'];
    public $timestamps = false;
}
