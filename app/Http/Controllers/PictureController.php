<?php

namespace App\Http\Controllers;

use App\ManagePicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PictureController extends Controller
{
    
    public function manage_picture() {
        $ret = DB::table('images')
             ->orderBy('indexer','DESC')
             ->simplePaginate('10');
        return view('webpanel.manage-picture',['ret'=>$ret]);
    }

    public function add_picture() {
        $image_galleries = DB::table('image_galleries')
                    ->groupBy('gallery_name')
                    ->get();
        return view('webpanel.add-picture',['image_galleries'=>$image_galleries]);
    }
    
    public function store(Request $req) {
        $picture = new ManagePicture;
        $picture->gallery_id = $req->input('album_id');
        $iatdetail = DB::table('image_galleries')
                        ->where('gallery_id',$picture->gallery_id)
                        ->first();
        $picture->gallery_name = $iatdetail->gallery_name;
        $picture->description = $iatdetail->gallery_description;
        $picture->tags = $iatdetail->gallery_tags;
        if($req->file('image')) {
            $req->validate(['image' => 'image|mimes:jpeg,png,jpg,gif|max:2048']);
            $picture->image_id = $req->file('image')->getClientOriginalName();
            $req->file('image')->storeAs('public/addons/albums/images/',$picture->image_id);
        }
        $picture->save();
        $req->session()->flash('msg','Profile Updated successfully');
        return redirect('webadmin/manage-picture');
    }

    public function update_picture($blog_id) {
        $viddet = DB::table('images')
                    ->where('indexer',$blog_id)
                    ->first();
        $resultcc = DB::table('image_galleries')
                    ->groupBy('gallery_name')
                    ->get();
        return view('webpanel.update-image',['viddet'=>$viddet,'resultcc'=>$resultcc]);
    }
    
    public function update(Request $req, $id) {
        $picture = ManagePicture::find($id);
        $picture->gallery_id = $req->input('album_id');
        $iatdetail = DB::table('image_galleries')
                        ->where('gallery_id',$picture->gallery_id)
                        ->first();
        $picture->gallery_name = $iatdetail->gallery_name;
        $picture->description = $iatdetail->gallery_description;
        $picture->tags = $iatdetail->gallery_tags;
        if($req->file('image')) {
            $req->validate(['image' => 'image|mimes:jpeg,png,jpg,gif|max:2048']);
            $picture->image_id = $req->file('image')->getClientOriginalName();
            $req->file('image')->storeAs('public/addons/albums/images/',$picture->image_id);
        }//$picture->image_id = $image;
        $picture->save();
        $req->session()->flash('msg','Page Updated Successfully !!');
        return redirect('webadmin/manage-picture');
    }
    
    public function delete_picture(Request $req,$id) {
        DB::table('images')
            ->where('indexer',$id)
            ->delete();
        $req->session()->flash('msg','Data deleted!!');
        return redirect('webadmin/manage-picture');
    }

    public function images(Request $req) {
        $search = $req->input('search');
        echo '
        <div class="row">
            <div class="relates">
                <div class="relatessec">
                    <ul class="serchfor">';
                    $mem = DB::table('images')
                                    ->where('gallery_name', 'like', '%' . $search .'%')
                                    ->limit(10);
                    $memresult = $mem->get();
                    $memcount = $mem->count(); 
                    if ($memcount > 0) {
                        foreach($memresult as $memrow) {
                
                        echo '<li><a href="update-image/'.$memrow->indexer.'">'.utf8_decode($memrow->gallery_name).'</a></li>';
                  
                        } 
                    } else { 
                        
                    } 
                    echo '</ul> 
                </div>
            </div>
        </div>';
    }

}
