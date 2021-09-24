<?php

namespace App\Http\Controllers;

use App\social_profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateSocialProfileController extends Controller
{
    public function update_social_profile(Request $req) {
    	$profile = social_profile::find(1);
    	$profile->facebook = $req->input('facebook');
    	$profile->twitter = $req->input('twitter');
    	$profile->pintrest = $req->input('pintrest');
    	$profile->google = $req->input('google');
    	$profile->instagram = $req->input('instagram');
    	$profile->save();
    	$req->session()->flash('msg','Profiles Changed Successfully !!');
    	return redirect('webadmin/manage-social-profiles');
    }
}
