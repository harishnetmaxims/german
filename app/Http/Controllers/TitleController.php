<?php

namespace App\Http\Controllers;

use App\ManageTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class titleController extends Controller
{
    public function manage_title() {
    	$ret = DB::table('dp_kz')
    			->simplePaginate(10);
    	return view('webpanel.manage-title',['ret'=>$ret]);
    }

    public function add_title() {
    	return view('webpanel.add-title');
    }

    public function store(Request $req) {
    	$title = new ManageTitle;
    	$title->channel_name = $req->input('title');
    	$title->save();
    	$req->session()->flash('msg','Profile Updated successfully');
    	return redirect('webadmin/manage-title');
    }

    public function update_title($id) {
    	$blogdet = DB::table('dp_kz')
    			->where('id', $id)
    			->first();
    	return view('webpanel.update-title',['blogdet'=>$blogdet]);
    }

    public function update(Request $req, $id) {
    	$title = ManageTitle::find($id);
    	$title->title = $req->input('title');
    	$title->save();
    	$req->session()->flash('msg','Profile Updated Successfully !!');
    	return redirect('webadmin/manage-title');
    }

    public function delete_title(Request $req,$id) {
        DB::table('dp_kz')
            ->where('id',$id)
            ->delete();
        $req->session()->flash('msg','Data deleted!!');
        return redirect('webadmin/manage-title');
    }

    public function title(Request $req) {
        $search = $req->input('search');
        echo '
        <div class="row">
            <div class="relates">
                <div class="relatessec">
                    <ul class="serchfor">';
                    $mem = DB::table('dp_kz')
                                    ->where('title', 'like', '%' . $search .'%')
                                    ->limit(10);
                    $memresult = $mem->get();
                    $memcount = $mem->count(); 
                    if ($memcount > 0) {
                        foreach($memresult as $memrow) {
                
                        echo '<li><a href="update-title/'.$memrow->id.'">'.utf8_decode($memrow->title).'</a></li>';
                  
                        } 
                    } else { 
                        
                    } 
                    echo '</ul> 
                </div>
            </div>
        </div>';
    }
}
