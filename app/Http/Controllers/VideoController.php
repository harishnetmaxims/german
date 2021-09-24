<?php

namespace App\Http\Controllers;

use App\ManageVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    
    public function manage_video() {
        $ret = DB::table('videos')
             ->orderBy('indexer','DESC')
             ->simplePaginate('10');
        $resultc = DB::table('channels')
                    ->get();     
        return view('webpanel.manage-video',['ret'=>$ret]);
    }

    public function add_video() {
        $resultc = DB::table('channels')
                    ->get();  
        return view('webpanel.add-video',['resultc'=>$resultc]);
    }
    
    public function store(Request $req) {
        $video = new ManageVideo;
        $video->title = $req->input('title');
        $video->description = $req->input('description');
        $video->tags = $req->input('tags');
        $video->channel = $req->input('channel');
        if($req->file('image')) {
            $req->validate(['image' => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts']);
            $picture->video_id = $req->file('image')->getClientOriginalName();
            $req->file('image')->storeAs('public/addons/albums/videos/',$picture->image_id);
        }
        $video->save();
        $req->session()->flash('msg','Profile Updated successfully');
        return redirect('webadmin/manage-video');
    }

    public function update_video($blog_id) {
        $viddet = DB::table('videos')
                    ->where('indexer',$blog_id)
                    ->first();
        $resultc = DB::table('channels')
                    ->get();  
        $resultcs = DB::table('sub_channels')
                    ->get();  
        return view('webpanel.update-video',['viddet'=>$viddet,'resultc'=>$resultc,'resultcs'=>$resultcs]);
    }
    
    public function update(Request $req, $id) {
        $video = ManageVideo::find($id);
        $video->title = $req->input('title');
        $video->description = $req->input('description');
        $video->tags = $req->input('tags');
        $video->channel = $req->input('channel');
        if($req->file('image')) {
            $req->validate(['video' => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts']);
            $video_name = $req->file('image')->getClientOriginalName();
            $video->video_id = pathinfo($video_name, PATHINFO_FILENAME);
            $video->type = pathinfo($video_name, PATHINFO_EXTENSION);
            $req->file('image')->storeAs('public/addons/albums/videos/',$video->video_id.'.'.$video->type);
        }
        $video->save();
        $req->session()->flash('msg','Page Updated Successfully !!');
        return redirect('webadmin/manage-video');
    }
    
    public function delete_video(Request $req,$id) {
        DB::table('videos')
            ->where('indexer',$id)
            ->delete();
        $req->session()->flash('msg','Data deleted!!');
        return redirect('webadmin/manage-video');
    }

    public function videos(Request $req) {
        $search = $req->input('search');
        echo '
        <div class="row">
            <div class="relates">
                <div class="relatessec">
                    <ul class="serchfor">';
                    $mem = DB::table('videos')
                                    ->where('title', 'like', '%' . $search .'%')
                                    ->limit(10);
                    $memresult = $mem->get();
                    $memcount = $mem->count(); 
                    if ($memcount > 0) {
                        foreach($memresult as $memrow) {
                
                        echo '<li><a href="update-video/'.$memrow->indexer.'">'.utf8_decode($memrow->title).'</a></li>';
                  
                        } 
                    } else { 
                        
                    } 
                    echo '</ul> 
                </div>
            </div>
        </div>';
    }
}
