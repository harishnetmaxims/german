<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManagePedigree extends Model
{
    protected $table = 'pd_entries';
    public $timestamps = false;
    protected $primaryKey = 'indexer';
}
