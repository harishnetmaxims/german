<?php

namespace App\Http\Controllers;

use App\ManageHips;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HipsController extends Controller
{
    public function manage_hips() {
    	$ret = DB::table('hips')
    			->simplePaginate(10);
    	return view('webpanel.manage-hips',['ret'=>$ret]);
    }

    public function add_hips() {
    	return view('webpanel.add-hips');
    }

    public function store(Request $req) {
    	$hips = new ManageHips;
    	$hips->hips_desc = $req->input('title');
        $hips->save();
    	$req->session()->flash('msg','Page Updated successfully');
    	return redirect('webadmin/manage-hips');
    }

    public function update_hips($id) {
    	$blogdet = DB::table('hips')
    			->where('hdb', $id)
    			->first();
    	return view('webpanel.update-hips',['blogdet'=>$blogdet]);
    }

    public function update(Request $req, $id) {
    	$hips = ManageHips::find($id);
    	$hips->hips_desc = $req->input('title');
    	$hips->save();
    	$req->session()->flash('msg','Profile Updated Successfully !!');
    	return redirect('webadmin/manage-hips');
    }

    public function delete_hips(Request $req,$id) {
        DB::table('hips')
            ->where('hdb',$id)
            ->delete();
        $req->session()->flash('msg','Data deleted!!');
        return redirect('webadmin/manage-hips');
    }

    public function hips(Request $req) {
        $search = $req->input('search');
        echo '
        <div class="row">
            <div class="relates">
                <div class="relatessec">
                    <ul class="serchfor">';
                    $mem = DB::table('hips')
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
