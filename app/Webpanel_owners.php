<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Webpanel_owners extends Model
{
    protected $table = 'group_owner';
    public $timestamps = false;
    protected $primaryKey = 'indexer';
}
