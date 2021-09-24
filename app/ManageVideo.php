<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManageVideo extends Model
{
    protected $table = 'videos';
    public $timestamps = false;
    protected $primaryKey = 'indexer';
}
