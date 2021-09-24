<?php

namespace App\Http\Controllers;

use App\album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlbumController extends Controller
{



    // public function uploadimg(Request $request)
    // {
    //     if(session()->has('name')){

    //         return view('uploadimg')->with('alb',album::all());
    //     }else{
    //         $request->session()->flash('msg','Please Login');
    //         return redirect('login');
    //     }
    // }



public function uploadimg(Request $request)
    {
        if(session()->has('name')){


            $a = DB::table('member_profile')->where('user_name',session()->get('name'))->get();
            foreach($a as $c){
                // echo '<pre>';
                // print_r($c->user_id);
                // die();
                $user_id = $c->user_id;
            }

            $alb = DB::table('image_galleries')->where('user_id',$user_id)->get();

                // foreach($alb as $abm){
                //     echo '<pre>';
                //     print_r($abm->gallery_id);
                //     die();
                // }
                // $_SESSION['login'] = $num['user_name'];
                // $_SESSION['user_id'] = $num['user_id'];
                // $_SESSION['sees_breeder'] = $num['breeder'];
                // $_SESSION['sees_owner'] = $num['owner'];



            $result = DB::table('member_profile')->where('user_id',$user_id)->get();
            $result2 = DB::table('pd_entries')->get();

            // echo session()->get('name');
            // die();

            $result1 = DB::table('pd_entries')->where('owner',session()->get('name'))->get();
            // return view('uploadimg',compact('result','result1','result2'))->with('alb',album::all());
            return view('uploadimg',compact('result','result1','result2','alb'));
        }else{
            $request->session()->flash('msg','Please Login');
            return redirect('login');
        }
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $res =new album;
        // $res->albumn_name=$request->input('album_name');
        // $res->albumn_desc=$request->input('alb_description');
        // $res->tags=$request->input('alb_tag');
        // $res->album_type=$request->input('alb_type');
        // $res->album_ratings =$request->input('rat_yes');
        // $res->album_comments=$request->input('comment');
        // $res->user_name=$request->session()->get('name');
        // $res->blog_images = $request->file('file')->store('album_img');
        // $res->save();
        // $request->session()->flash('msg','Album Created!!');
        // return redirect('uploadimg');

dd($request->input());

        $res =new album;
        $res->gallery_name=$request->input('album_name');
        $res->gallery_description=$request->input('alb_description');
        $res->gallery_tags=$request->input('alb_tag');
        $res->public_private=$request->input('alb_type');
        $res->allow_ratings =$request->input('rat_yes');
        $res->allow_comments=$request->input('comment');
        $res->user_id=$request->input('user_id');
        $res->viewtime= Carbon::now();
        // $res->gallery_picture = $request->file('file')->store('album_img');
        if(isset($res->gallery_picture)){
            $res->has_images = '0';
        }else{
            $res->has_images = '1';
        }
        $res->save();
        $request->session()->flash('msg','Album Created!!');
        return redirect('uploadimg');
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, album $album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(album $album)
    {
        //
    }
}
