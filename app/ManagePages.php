<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManagePages extends Model
{
    protected $table = 'mm_pages';
    public $timestamps = false;
    protected $primaryKey = 'page_id';
}
