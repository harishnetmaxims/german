<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin_blogcat extends Model
{
    protected $table = 'blog_categories';
    public $timestamps = false;
    protected $primaryKey = "category_id";
}
