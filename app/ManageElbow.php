<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManageElbow extends Model
{
    protected $table = 'hips_elbow';
    public $timestamps = false;
    protected $primaryKey = 'hdb';
}
