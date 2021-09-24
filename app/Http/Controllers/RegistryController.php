<?php

namespace App\Http\Controllers;

use App\ManageRegistry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistryController extends Controller
{
    public function manage_registry() {
    	$ret = DB::table('dp_registry')
    			->simplePaginate(10);
    	return view('webpanel.manage-registry',['ret'=>$ret]);
    }

    public function add_registry() {
    	return view('webpanel.add-registry');
    }

    public function store(Request $req) {
    	$registry = new ManageRegistry;
    	$registry->title = $req->input('title');
    	$registry->save();
    	$req->session()->flash('msg','Profile Updated successfully');
    	return redirect('webadmin/manage-registry');
    }

    public function update_registry($id) {
    	$blogdet = DB::table('dp_registry')
    			->where('id', $id)
    			->first();
    	return view('webpanel.update-registry',['blogdet'=>$blogdet]);
    }

    public function update(Request $req, $id) {
    	$registry = ManageRegistry::find($id);
    	$registry->title = $req->input('title');
    	$registry->save();
    	$req->session()->flash('msg','Profile Updated Successfully !!');
    	return redirect('webadmin/manage-registry');
    }

    public function delete_registry(Request $req,$id) {
        DB::table('dp_registry')
            ->where('id',$id)
            ->delete();
        $req->session()->flash('msg','Data deleted!!');
        return redirect('webadmin/manage-registry');
    }

    public function registry(Request $req) {
        $search = $req->input('search');
        echo '
        <div class="row">
            <div class="relates">
                <div class="relatessec">
                    <ul class="serchfor">';
                    $mem = DB::table('dp_registry')
                                    ->where('title', 'like', '%' . $search .'%')
                                    ->limit(10);
                    $memresult = $mem->get();
                    $memcount = $mem->count(); 
                    if ($memcount > 0) {
                        foreach($memresult as $memrow) {
                
                        echo '<li><a href="update-registry/'.$memrow->id.'">'.utf8_decode($memrow->title).'</a></li>';
                  
                        } 
                    } else { 
                        
                    } 
                    echo '</ul> 
                </div>
            </div>
        </div>';
    }
}
