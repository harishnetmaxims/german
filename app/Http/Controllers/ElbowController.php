<?php

namespace App\Http\Controllers;

use App\ManageElbow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ElbowController extends Controller
{
    public function manage_elbows() {
    	$ret = DB::table('hips_elbow')
    			->simplePaginate(10);
    	return view('webpanel.manage-elbows',['ret'=>$ret]);
    }

    public function add_elbows() {
    	return view('webpanel.add-elbows');
    }

    public function store(Request $req) {
    	$elbows = new ManageElbow;
    	$elbows->hips_desc = $req->input('title');
        $elbows->save();
    	$req->session()->flash('msg','Page Updated successfully');
    	return redirect('webadmin/manage-elbows');
    }

    public function update_elbows($id) {
    	$blogdet = DB::table('hips_elbow')
    			->where('hdb', $id)
    			->first();
    	return view('webpanel.update-elbows',['blogdet'=>$blogdet]);
    }

    public function update(Request $req, $id) {
    	$elbows = ManageElbow::find($id);
    	$elbows->hips_desc = $req->input('title');
    	$elbows->save();
    	$req->session()->flash('msg','Profile Updated Successfully !!');
    	return redirect('webadmin/manage-elbows');
    }

    public function delete_elbows(Request $req,$id) {
        DB::table('hips_elbow')
            ->where('hdb',$id)
            ->delete();
        $req->session()->flash('msg','Data deleted!!');
        return redirect('webadmin/manage-elbows');
    }

    public function elbow(Request $req) {
        $search = $req->input('search');
        echo '
        <div class="row">
            <div class="relates">
                <div class="relatessec">
                    <ul class="serchfor">';
                    $mem = DB::table('hips_elbow')
                                    ->where('hips_desc', 'like', '%' . $search .'%')
                                    ->limit(10);
                    $memresult = $mem->get();
                    $memcount = $mem->count(); 
                    if ($memcount > 0) {
                        foreach($memresult as $memrow) {
                
                        echo '<li><a href="update-hips/'.$memrow->hdb.'">'.utf8_decode($memrow->hips_desc).'</a></li>';
                  
                        } 
                    } else { 
                        
                    } 
                    echo '</ul> 
                </div>
            </div>
        </div>';
    }
}
