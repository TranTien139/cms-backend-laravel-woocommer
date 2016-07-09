<?php

namespace App\Model\Languages;

use Illuminate\Database\Eloquent\Model;

class LanguageModel extends Model
{
    protected $table='languages';
    protected $fillable = ['lang'];
    public $timestamps = false;
}
