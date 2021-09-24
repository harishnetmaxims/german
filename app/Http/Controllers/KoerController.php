<?php

namespace App\Http\Controllers;

use App\Managekoer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class koerController extends Controller
{
    public function manage_koer() {
    	$ret = DB::table('dp_koer')
    			->simplePaginate(10);
    	return view('webpanel.manage-koer',['ret'=>$ret]);
    }

    public function add_koer() {
    	return view('webpanel.add-koer');
    }

    public function store(Request $req) {
    	$koer = new Managekoer;
    	$koer->title = $req->input('title');
    	$koer->save();
    	$req->session()->flash('msg','Profile Updated successfully');
    	return redirect('webadmin/manage-koer');
    }

    public function update_koer($id) {
    	$blogdet = DB::table('dp_koer')
    			->where('id', $id)
    			->first();
    	return view('webpanel.update-koer',['blogdet'=>$blogdet]);
    }

    public function update(Request $req, $id) {
    	$koer = Managekoer::find($id);
    	$koer->title = $req->input('title');
    	$koer->save();
    	$req->session()->flash('msg','Profile Updated Successfully !!');
    	return redirect('webadmin/manage-koer');
    }

    public function delete_koer(Request $req,$id) {
        DB::table('dp_koer')
            ->where('id',$id)
            ->delete();
        $req->session()->flash('msg','Data deleted!!');
        return redirect('webadmin/manage-koer');
    }

    public function koer(Request $req) {
        $search = $req->input('search');
        echo '
        <div class="row">
            <div class="relates">
                <div class="relatessec">
                    <ul class="serchfor">';
                    $mem = DB::table('dp_koer')
                                    ->where('title', 'like', '%' . $search .'%')
                                    ->limit(10);
                    $memresult = $mem->get();
                    $memcount = $mem->count(); 
                    if ($memcount > 0) {
                        foreach($memresult as $memrow) {
                
                        echo '<li><a href="update-koer/'.$memrow->id.'">'.utf8_decode($memrow->title).'</a></li>';
                  
                        } 
                    } else { 
                        
                    } 
                    echo '</ul> 
                </div>
            </div>
        </div>';
    }
}
