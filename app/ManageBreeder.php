<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManageBreeder extends Model
{
    protected $table = 'group_profile';
    public $timestamps = false;
    protected $primaryKey = 'indexer';
}
