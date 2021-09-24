<?php

namespace App\Http\Controllers;

use App\ManageBreeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BreederController extends Controller
{

    public function addbreeder() {
        return view('addbreeder');
    }

    public function front_store(Request $req) {
        $breeder = new ManageBreeder;
        $breeder->group_name = $req->input('title');
        $breeder->group_description = $req->input('description');
        $breeder->public_private = $req->input('private_pub');
        $breeder->todays_date = date('Y-m-d H:i:s');
        $breeder->admin_id = $req->input('uid');
        if($req->file('image')) {
            $req->validate(['image' => 'image|mimes:jpeg,png,jpg,gif|max:2048']);
            $breeder->image_pro = $req->file('image')->getClientOriginalName();
            $req->file('image')->storeAs('public/uploads/thumbs/',$breeder->image_pro);
        }
        $breeder->save();
        $req->session()->flash('msg','Breeder Updated successfully');
        return redirect('manage-breeder');
    }

    public function managebreeder(Request $req) {
        $ret = DB::table('group_profile')
                ->where('admin_id', $req->session()->get('user_id'));

        $result = $ret->simplePaginate(10);
        $resultrows = $ret->count();
        return view('manage-breeder',['result'=>$result,'resultrows'=>$resultrows]);
    }

    public function editbreeder($blog_id) {
        $breedet = DB::table('group_profile')
                ->where('indexer', $blog_id)
                ->first();
        return view('editbreeder',['breedet'=>$breedet]);
    }

    public function fornt_update(Request $req, $id) {
        $breeder = ManageBreeder::find($id);
        $breeder->group_name = $req->input('title');
        $breeder->group_description = $req->input('description');
        $breeder->public_private = $req->input('private_pub');
        if($req->file('image')) {
            $req->validate(['image' => 'image|mimes:jpeg,png,jpg,gif|max:2048']);
            $breeder->image_pro = $req->file('image')->getClientOriginalName();
            $req->file('image')->storeAs('public/uploads/thumbs/',$breeder->image_pro);
        }
        $breeder->save();
        $req->session()->flash('msg','breeder Updated Successfully !!');
        return redirect('manage-breeder');
    }

    public function manage_breeder() {
    	$ret = DB::table('group_profile')
    			->simplePaginate(10);
    	return view('webpanel.manage-breeder',['ret'=>$ret]);
    }

    public function add_breeder() {
    	return view('webpanel.add-breeder');
    }

    public function store(Request $req) {
    	$breeder = new ManageBreeder;
    	$breeder->group_name = $req->input('group_name');
        $breeder->group_description = $req->input('group_description');
        $breeder->public_private = $req->input('private_pub');
        if($req->file('image')) {
            $req->validate(['image' => 'image|mimes:jpeg,png,jpg,gif|max:2048']);
            $breeder->image_pro = $req->file('image')->getClientOriginalName();
            $req->file('image')->storeAs('public/uploads/thumbs/',$breeder->image_pro);
        }
        $breeder->save();
    	$req->session()->flash('msg','Breeder Updated successfully');
    	return redirect('webadmin/manage-breeder');
    }

    public function update_breeder($id) {
    	$blogdet = DB::table('group_profile')
    			->where('indexer', $id)
    			->first();
    	return view('webpanel.update-breeder',['blogdet'=>$blogdet]);
    }

    public function update(Request $req, $id) {
    	$breeder = ManageBreeder::find($id);
    	$breeder->group_name = $req->input('group_name');
        $breeder->group_description = $req->input('group_description');
        $breeder->public_private = $req->input('private_pub');
        if($req->file('image')) {
            $req->validate(['image' => 'image|mimes:jpeg,png,jpg,gif|max:2048']);
            $breeder->image_pro = $req->file('image')->getClientOriginalName();
            $req->file('image')->storeAs('public/uploads/thumbs/',$breeder->image_pro);
        }
        $breeder->save();
    	$req->session()->flash('msg','Breeder Updated Successfully !!');
    	return redirect('webadmin/manage-breeder');
    }

    public function delete_breeder(Request $req,$id) {
        DB::table('group_profile')
            ->where('indexer',$id)
            ->delete();
        $req->session()->flash('msg','Data deleted!!');
        return redirect('webadmin/manage-breeder');
    }

    public function breeder(Request $req) {
        $search = $req->input('search');
        echo '
        <div class="row">
            <div class="relates">
                <div class="relatessec">
                    <ul class="serchfor">';
                    $mem = DB::table('group_profile')
                                    ->where('group_name', 'like', '%' . $search .'%')
                                    ->orwhere('breeder_id', 'like', '%' . $search .'%')
                                    ->limit(10);
                    $memresult = $mem->get();
                    $memcount = $mem->count(); 
                    if ($memcount > 0) {
                        foreach($memresult as $memrow) {
                
                        echo '<li><a href="update-breeder/'.$memrow->indexer.'">'.utf8_decode($memrow->group_name).'('.$memrow->breeder_id.')</a></li>';
                  
                        } 
                    } else { 
                        
                    } 
                    echo '</ul> 
                </div>
            </div>
        </div>';
    }
}
