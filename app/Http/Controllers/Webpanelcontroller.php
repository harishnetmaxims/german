<?php

namespace App\Http\Controllers;

use App\WebLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Webpanelcontroller extends Controller
{
    public function show() {
    	return view('webpanel.login');
    }

    public function auth(Request $request)
    {
        $username = $request->post('username');
        $password = $request->post('password');
        $result = WebLogin::where(['user_name'=>$username,'password'=>md5($password),'account_type'=>'admin'])
        					->first();
                            
        if($result){
            $request->session()->put('LOGIN_SUC',true);
            $request->session()->put('name',$username);
            $request->session()->put('id',$result->user_id);

            return redirect('webadmin/home');
        }
        else{
            $request->session()->flash('msg','Invalid Creadentails');
            return redirect('webadmin');
        }
    }

    public function home() {
    	$member_profile = DB::table('member_profile')
    			->orderBy('user_id', 'desc')
    			->limit(5)
    			->get();

    	$pd_entries = DB::table('pd_entries')
    			->orderBy('indexer', 'desc')
    			->limit(5)
    			->get();

    	$dp_blogs = DB::table('dp_blogs')
    			->orderBy('indexer', 'desc')
    			->limit(5)
    			->get();
    			
    	$images = DB::table('images')
    			->orderBy('indexer', 'desc')
    			->limit(5)
    			->get();						
    	
    	$mm_pages = DB::table('mm_pages')
    			->limit(5)
    			->get();

    	$videos = DB::table('videos')
    			->limit(5)
    			->get();

    	return view('webpanel.home',['member_profile'=>$member_profile,'pd_entries'=>$pd_entries,'dp_blogs'=>$dp_blogs,'images'=>$images,'mm_pages'=>$mm_pages,'videos'=>$videos]);
    }

    

    public function social_profiles() {
        $resProfile = DB::table('social')
                        ->where('id','1')
                        ->first();
        return view('webpanel.manage-social-profiles',['resProfile'=>$resProfile]);
    }

    public function manage_subscriber() {
        $ret = DB::table('newsletter_subscription')
                        ->orderBy('id','DESC')
                        ->simplePaginate(10);
        return view('webpanel.manage-subscriber',['ret'=>$ret]);
    }

    public function delete_subscriber(Request $req,$id) {
        DB::table('newsletter_subscription')
            ->where('id',$id)
            ->delete();
        $req->session()->flash('msg','Data deleted!!');
        return redirect('webadmin/manage-subscriber');
    }

    public function change_password() {
        return view('webpanel.change-password');
    }

    public function update_password(Request $req) {
        $oldpassword = md5($req->input('oldpass'));
        $num = DB::table('member_profile')
            ->where('password',$oldpassword)
            ->count();
        if($num>0) {
            $newpass = md5($req->input('newpass'));
            DB::table('member_profile')
            ->where('user_id','1')
            ->update(['password'=>$newpass]);  
            $req->session()->flash('msg','Password Changed Successfully !!');
            return redirect('webadmin/change-password'); 
        } else {
            $req->session()->flash('msg','Old Password not match !!');
            return redirect('webadmin/change-password'); 
        }
    }

}
