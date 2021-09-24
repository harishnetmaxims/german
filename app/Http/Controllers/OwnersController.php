<?php

namespace App\Http\Controllers;

use App\Webpanel_owners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OwnersController extends Controller
{
    public function addowner() {
        return view('addowner');
    }

    public function front_store(Request $req) {
        $owner = new Webpanel_owners;
        $owner->group_name = $req->input('title');
        $owner->group_description = $req->input('description');
        $owner->public_private = $req->input('private_pub');
        $owner->todays_date = date('Y-m-d H:i:s');
        $owner->admin_id = $req->input('uid');

        if($req->file('image')) {
            $req->validate(['image' => 'image|mimes:jpeg,png,jpg,gif|max:2048']);
            $owner->image_pro = $req->file('image')->getClientOriginalName();
            $req->file('image')->storeAs('public/uploads/thumbs/',$owner->image_pro);
        }
        $owner->save();
        $req->session()->flash('msg','owner Updated successfully');
        return redirect('manage-owner');
    }

    public function manageowner(Request $req) {
        $ret = DB::table('group_owner')
                ->where('admin_id', $req->session()->get('user_id'));

        $result = $ret->simplePaginate(10);
        $resultrows = $ret->count();
        return view('manage-owner',['result'=>$result,'resultrows'=>$resultrows]);
    }

    public function editowner($blog_id) {
        $breedet = DB::table('group_owner')
                ->where('indexer', $blog_id)
                ->first();
        return view('editowner',['breedet'=>$breedet]);
    }

    public function fornt_update(Request $req, $id) {
        $owner = Webpanel_owners::find($id);
        $owner->group_name = $req->input('title');
        $owner->group_description = $req->input('description');
        $owner->public_private = $req->input('private_pub');
        if($req->file('image')) {
            $req->validate(['image' => 'image|mimes:jpeg,png,jpg,gif|max:2048']);
            $owner->image_pro = $req->file('image')->getClientOriginalName();
            $req->file('image')->storeAs('public/uploads/thumbs/',$owner->image_pro);
        }
        $owner->save();
        $req->session()->flash('msg','owner Updated Successfully !!');
        return redirect('manage-owner');
    }



    public function manage_owner() {
    	$ret = DB::table('group_owner')
    			->orderBy('indexer', 'DESC')
    			->simplePaginate(10);
    	return view('webpanel.manage-owner',['ret'=>$ret]);
    }

    public function add_owner() {
    	return view('webpanel.add-owner');
    }

    public function store(Request $req) {
    	$owner = new Webpanel_owners;
    	$owner->group_name = $req->input('group_name');
        $owner->group_description = $req->input('group_description');
        $owner->public_private = $req->input('private_pub');
        $owner->todays_date = date('Y-m-d H:i:s');
        $owner->admin_id = $req->input('uid');

        if($req->file('image')) {
            $req->validate(['image' => 'image|mimes:jpeg,png,jpg,gif|max:2048']);
            $owner->image_pro = $req->file('image')->getClientOriginalName();
            $req->file('image')->storeAs('public/uploads/thumbs/',$owner->image_pro);
        }
    	$owner->save();
    	$req->session()->flash('msg','owner Updated successfully');
    	return redirect('webadmin/manage-owner');
    }

    public function update_owner($blog_id) {
    	$blogdet = DB::table('group_owner')
    			->where('indexer', $blog_id)
    			->first();
    	return view('webpanel.update-owner',['blogdet'=>$blogdet]);
    }

    public function update(Request $req, $id) {
    	$owner = Webpanel_owners::find($id);
    	$owner->group_name = $req->input('group_name');
        $owner->group_description = $req->input('group_description');
        $owner->public_private = $req->input('private_pub');
        if($req->file('image')) {
            $req->validate(['image' => 'image|mimes:jpeg,png,jpg,gif|max:2048']);
            $owner->image_pro = $req->file('image')->getClientOriginalName();
            $req->file('image')->storeAs('public/uploads/thumbs/',$owner->image_pro);
        }
    	$owner->save();
    	$req->session()->flash('msg','owner Updated Successfully !!');
    	return redirect('webadmin/manage-owner');
    }

    public function delete_owner(Request $req,$id) {
        DB::table('group_owner')
            ->where('indexer',$id)
            ->delete();
        $req->session()->flash('msg','Data deleted!!');
        return redirect('webadmin/manage-owner');
    }

    public function owner(Request $req) {
        $search = $req->input('search');
        echo '
        <div class="row">
            <div class="relates">
                <div class="relatessec">
                    <ul class="serchfor">';
                    $mem = DB::table('group_owner')
                                    ->where('group_name', 'like', '%' . $search .'%')
                                    ->orwhere('owner_id', 'like', '%' . $search .'%')
                                    ->limit(10);
                    $memresult = $mem->get();
                    $memcount = $mem->count(); 
                    if ($memcount > 0) {
                        foreach($memresult as $memrow) {
                
                        echo '<li><a href="update-owner/'.$memrow->indexer.'">'.utf8_decode($memrow->group_name).'('.$memrow->owner_id.')</a></li>';
                  
                        } 
                    } else { 
                        
                    } 
                    echo '</ul> 
                </div>
            </div>
        </div>';
    }
}
