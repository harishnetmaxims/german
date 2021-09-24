<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManageCategory extends Model
{
    protected $table = 'channels';
    public $timestamps = false;
    protected $primaryKey = 'channel_id';
}
