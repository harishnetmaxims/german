<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin_blog extends Model
{
    protected $table = 'dp_blogs';
    public $timestamps = false;
    protected $primaryKey = 'indexer';
}
