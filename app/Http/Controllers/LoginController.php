<?php

namespace App\Http\Controllers;

use App\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    public function index()
    {
        return view('login');
    }


    public function register()
    {
        return view('register');
    }


    // public function auth(Request $request)
    // {
    //     // return $request->post();
    //     $username = $request->post('username');
    //     $password = $request->post('password');
    //     // $result = Login::where(['user_name'=>$username,'password'=>$password])->get();
    //     $result = Login::where(['user_name'=>$username])->first();
    //     if($result){
    //         if(Hash::check($request->post('password'), $result->password)){
    //             $request->session()->put('LOGIN_SUC',true);
    //             $request->session()->put('name',$username);
    //             $request->session()->put('id',$result->id);

    //             return redirect('');
    //         }else{
    //             $request->session()->flash('msg','Invalid Creadentails');
    //             return redirect('login');
    //         }
    //     }
    //     else{
    //         $request->session()->flash('msg','Invalid Creadentails');
    //         return redirect('login');
    //     }
    //     // echo '<pre>';
    //     // print_r($result);
    // }

 public function auth(Request $request)
    {
        // return $request->post();
        $username = $request->post('username');
        $password = $request->post('password');

        // $result = Login::where(['user_name'=>$username,'password'=>$password])->get();
        $result = Login::where(['user_name'=>$username,'password'=>md5($password)])->first();
        if($result){
            $request->session()->put('LOGIN_SUC',true);
            $request->session()->put('name',$username);
            $request->session()->put('user_id',$result->user_id);
            $request->session()->put('sees_breeder',$result->breeder);
            $request->session()->put('sees_owner',$result->owner);
            return redirect('');
        }
        else{
            $request->session()->flash('msg','Invalid Creadentails');
            return redirect('login');
        }
        // echo '<pre>';
        // print_r($result);
    }



    public function create(Request $request)
    {
        $request->validate([
            'password'=>'required|min:8',
            'username'=>'required|min:2',
            'f_name'=>'required|min:2',
            'l_name'=>'required|min:2',
            'phone'=>'required',
            'email'=>'required',
            'zip'=>'required',
            'country'=>'required',
        ]);
        $res =new Login;
        $res->first_name=$request->input('f_name');
        $res->lastname=$request->input('l_name');
        $res->phone_no=$request->input('phone');
        $res->email=$request->input('email');
        $res->zip_code=$request->input('zip');
        $res->country=$request->input('country');
        $res->user_name=$request->input('username');
        $res_pas =Hash::make($request->input('password'));
        $res->password=$res_pas;
        $res->profile = $request->file('file')->store('profile_img');
        $res->save();
        $request->session()->flash('msg','Registerd Successfully');
        return redirect('login');
    }




    public function userdetail(Request $request)
    {
        $uname = $request->session()->get('id');
        $userdet = DB::table('member_profile')
                        ->where('user_id',$uname)
                        ->first();

        $uresultvid = DB::table('videos')
                    ->where('user_id',$uname)
                    ->where('approved', 'yes')
                    ->orderBy('indexer', 'DESC');
        $sgaldet = $uresultvid->first();
        $iNumVideos = $uresultvid->count();

        $uresultimg = DB::table('images')
                        ->where('user_id',$uname);
        $resultImg = $uresultimg->get();
        $iNumImg = $uresultimg->count();

        $uresultvid1 = DB::table('videos')
                    ->where('user_id', $uname)
                    ->where('approved','yes')
                    ->orderBy('indexer', 'DESC')
                    ->limit(10);
        $uresultvid1 = $uresultvid1->get();
        $iNumVideos1 = $uresultvid1->count();

        return view('userdetail',['userdet'=>$userdet,'sgaldet'=>$sgaldet,'iNumVideos'=>$iNumVideos,'resultImg'=>$resultImg,'iNumImg'=>$iNumImg,'uresultvid1'=>$uresultvid1,'iNumVideos1'=>$iNumVideos1,'uname'=>$uname]);
    }


    public function manage_pedigree(Login $login)
    {
        return view('manage-pedigree');
    }

    public function manage_blogs(Login $login)
    {
        return view('manage-blogs');
    }
    public function manage_videos(Login $login)
    {
        return view('manage-videos');
    }
    public function addvideo(Login $login, Request $request)
    {
        if(session()->has('name')){
            $result1 = DB::table('Channels')->get();
            $result2 = DB::table('sub_channels')->get();
            return view('addvideo',compact('result1','result2'));
        }else{
            $request->session()->flash('msg','Please Login');
            return redirect('login');
        }
    }
    public function destroy(Login $login)
    {
        //
    }

    public function show(Login $login)
    {
        //
    }


    public function edit(Login $login)
    {
        //
    }
}

