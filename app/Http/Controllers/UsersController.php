<?php

namespace App\Http\Controllers;

use App\Webpanel_users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function manage_users() {
    	$ret = DB::table('member_profile')
    			->orderBy('user_id', 'DESC')
    			->simplePaginate(10);
    	return view('webpanel.manage-users',['ret'=>$ret]);
    }

    public function add_user() {
    	return view('webpanel.add-user');
    }

    public function store(Request $req) {
    	$user = new Webpanel_users;
    	$user->first_name = $req->input('first_name');
    	$user->address = $req->input('address');
    	$user->directions = $req->input('directions');
    	$user->current_city = $req->input('current_city');
    	$user->state = $req->input('state');
    	$user->zip_code = $req->input('zip_code');
    	$user->country = $req->input('country');
    	$user->about_me = $req->input('about_me');
    	$user->established = $req->input('established');
    	$user->hours = $req->input('hours');
    	$user->work_tel = $req->input('work_tel');
    	$user->cell_tel = $req->input('cell_tel');
    	$user->personal_website = $req->input('personal_website');
    	$user->email_address = $req->input('email_address');
    	$user->password = $req->input('password');
    	$user->save();
    	$req->session()->flash('msg','Profile Updated successfully');
    	return redirect('webadmin/manage-users');
    }

    public function update_profile($uname) {
    	$userdet = DB::table('member_profile')
    			->where('user_id', $uname)
    			->first();
    	return view('webpanel.update-profile',['userdet'=>$userdet]);
    }

    public function update(Request $req, $id) {
    	$user = Webpanel_users::find($id);
    	$user->first_name = $req->input('first_name');
    	$user->address = $req->input('address');
    	$user->directions = $req->input('directions');
    	$user->current_city = $req->input('current_city');
    	$user->state = $req->input('state');
    	$user->zip_code = $req->input('zip_code');
    	$user->country = $req->input('country');
    	$user->about_me = $req->input('about_me');
    	$user->established = $req->input('established');
    	$user->hours = $req->input('hours');
    	$user->work_tel = $req->input('work_tel');
    	$user->cell_tel = $req->input('cell_tel');
    	$user->personal_website = $req->input('personal_website');
    	$user->email_address = $req->input('email_address');
    	$user->password = $req->input('password');
    	$user->user_name = $req->input('user_name');
    	$user->account_type = $req->input('account_type');
    	$user->save();
    	$req->session()->flash('msg','Profile Updated Successfully !!');
    	return redirect('webadmin/manage-users');
    }

    public function delete_user(Request $req,$id) {
        DB::table('member_profile')
            ->where('user_id',$id)
            ->delete();
        $req->session()->flash('msg','Data deleted!!');
        return redirect('webadmin/manage-users');
    }

    public function ajax(Request $req) {
        $search = $req->input('search');
        echo '
        <div class="row">
            <div class="relates">
                <div class="relatessec">
                    <ul class="serchfor">';
                    $mem = DB::table('member_profile')
                                    ->where('first_name', 'like', '%' . $search .'%')
                                    ->orwhere('last_name', 'like', '%' . $search .'%')
                                    ->limit(10);
                    $memresult = $mem->get();
                    $memcount = $mem->count(); 
                    if ($memcount > 0) {
                        foreach($memresult as $memrow) {
                
                        echo '<li><a href="update-profile/'.$memrow->user_id.'">'.utf8_decode($memrow->first_name).' '.utf8_decode($memrow->last_name).'</a></li>';
                  
                        } 
                    } else { 
                        
                    } 
                    echo '</ul> 
                </div>
            </div>
        </div>';
    }
}
