<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListTagProductModel extends Model
{
    protected $table='list_tags_products';
    protected $fillable = ['name','alias'];
    public $timestamps = false;
}
