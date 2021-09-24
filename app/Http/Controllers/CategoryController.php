<?php

namespace App\Http\Controllers;

use App\ManageCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function manage_category() {
    	$ret = DB::table('channels')
    			->simplePaginate(10);
    	return view('webpanel.manage-category',['ret'=>$ret]);
    }

    public function add_category() {
    	return view('webpanel.add-category');
    }

    public function store(Request $req) {
    	$category = new ManageCategory;
    	$category->channel_name = $req->input('title');
    	$category->channel_description = $req->input('description');
    	$category->save();
    	$req->session()->flash('msg','Profile Updated successfully');
    	return redirect('webadmin/manage-category');
    }

    public function update_category($blog_id) {
    	$blogdet = DB::table('channels')
    			->where('channel_id', $blog_id)
    			->first();
    	return view('webpanel.update-category',['blogdet'=>$blogdet]);
    }

    public function update(Request $req, $id) {
    	$category = ManageCategory::find($id);
    	$category->channel_name = $req->input('title');
    	$category->channel_description = $req->input('description');
    	$category->channel_id = $req->input('uid');
    	$category->save();
    	$req->session()->flash('msg','Profile Updated Successfully !!');
    	return redirect('webadmin/manage-category');
    }

    public function delete_category(Request $req,$id) {
        DB::table('channels')
            ->where('channel_id',$id)
            ->delete();
        $req->session()->flash('msg','Data deleted!!');
        return redirect('webadmin/manage-category');
    }

    public function cat(Request $req) {
        $search = $req->input('search');
        echo '
        <div class="row">
            <div class="relates">
                <div class="relatessec">
                    <ul class="serchfor">';
                    $mem = DB::table('channels')
                                    ->where('channel_name', 'like', '%' . $search .'%')
                                    ->limit(10);
                    $memresult = $mem->get();
                    $memcount = $mem->count(); 
                    if ($memcount > 0) {
                        foreach($memresult as $memrow) {
                
                        echo '<li><a href="update-category/'.$memrow->channel_id.'">'.utf8_decode($memrow->channel_name).'</a></li>';
                  
                        } 
                    } else { 
                        
                    } 
                    echo '</ul> 
                </div>
            </div>
        </div>';
    }
}
