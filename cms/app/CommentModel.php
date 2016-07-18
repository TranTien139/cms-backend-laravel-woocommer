<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    protected $table='systemcommment';
    protected $fillable = ['name','content','reply_id','object_id','object_name','count_reply','images'];
    public $timestamps = true;
}
