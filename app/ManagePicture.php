<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManagePicture extends Model
{
    protected $table = 'images';
    public $timestamps = false;
    protected $primaryKey = 'indexer';
}
