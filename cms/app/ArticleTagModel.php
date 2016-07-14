<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleTagModel extends Model
{
    protected $table='articles_tags';
    protected $fillable = ['article_id','tag_id','text_tag','tag_alias'];
    public $timestamps = true;
}
