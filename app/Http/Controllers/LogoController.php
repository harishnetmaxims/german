<?php

namespace App\Http\Controllers;

use App\ManageLogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogoController extends Controller
{
	public function logo() {
        $ret = DB::table('dp_logo')->get();
        return view('webpanel.manage-logo',['ret'=>$ret]);
    }

    public function update_logo($img_id) {
        $imgdet = DB::table('dp_logo')
                    ->where('id',$img_id)
                    ->first();
                        
        return view('webpanel.update-logo',['imgdet'=>$imgdet]);
    }

    public function update(Request $req, $id) {
        $logo = ManageLogo::find($id);
        $logo->user_id = 1;
        $logo->active_type = $req->input('logo_active');
        $logo->logo_text = $req->input('logo_text');
        if($req->file('image')) {
            $req->validate(['image' => 'image|mimes:jpeg,png,jpg,gif|max:2048']);
            $logo->logo_image = $req->file('image')->getClientOriginalName();
            $req->file('image')->storeAs('public/addons/albums/images/',$logo->logo_image);
        }
        $logo->save();
        $req->session()->flash('msg','Logo Updated Successfully !!');
        return redirect('webadmin/manage-logo');
    }
}