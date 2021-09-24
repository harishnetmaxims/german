<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Webpanel_users extends Model
{
    protected $table = 'member_profile';
    public $timestamps = false;
    protected $primaryKey = 'user_id';

}
