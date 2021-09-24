<?php

namespace App\Http\Controllers;

use App\Admin_blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminBlogController extends Controller
{
    
    public function manage_blog() {
        $ret = DB::table('dp_blogs')
                ->orderBy('indexer','DESC')
                ->simplePaginate('10');
        return view('webpanel.manage-blog',['ret'=>$ret]);
    }

    public function add_blog() {
        $resultcc = DB::table('blog_categories')
                    ->orderBy('category_name','ASC')
                    ->get();
        return view('webpanel.add-blog',['resultcc'=>$resultcc]);
    }

    public function store(Request $req) {
        $blog = new Admin_blog;
        $blog->title = $req->input('title');
        $blog->description = $req->input('description');
        $blog->tags = $req->input('tags');
        $blog->category = $req->input('category');
        $blog->allow_replies = $req->input('allow_replies');
        $blog->allow_ratings = $req->input('allow_rating');
        $blog->public_private = $req->input('private_pub');
        $blog->approved = $req->input('approved');
        $blog->blog_story = $req->input('story');
        $blog->blog_owner = $req->input('user');
        if($req->file('image')) {
            $req->validate(['image' => 'image|mimes:jpeg,png,jpg,gif|max:2048']);
            $blog->blog_img = $req->file('image')->getClientOriginalName();
            $req->file('image')->storeAs('public/images/blog/',$blog->blog_img);
        }

        $blog->save();
        $req->session()->flash('msg','Profile Updated successfully');
        return redirect('webadmin/manage-blog');
    }

    public function update_blogs($blog_id) {
        $resultcc = DB::table('blog_categories')
                    ->get();
        $blogdet = DB::table('dp_blogs')
                    ->where('indexer',$blog_id)
                    ->first();
        return view('webpanel.update-blogs',['blogdet'=>$blogdet,'resultcc'=>$resultcc]);
    }

    public function update(Request $req, $id) {
        $blog = Admin_blog::find($id);
        $blog->title = $req->input('title');
        $blog->description = $req->input('description');
        $blog->tags = $req->input('tags');
        $blog->category = $req->input('category');
        $blog->allow_replies = $req->input('allow_replies');
        $blog->allow_ratings = $req->input('allow_rating');
        $blog->public_private = $req->input('private_pub');
        $blog->approved = $req->input('approved');
        $blog->blog_story = $req->input('story');
        $blog->blog_owner = $req->input('user');
        if($req->file('image')) {
            $req->validate(['image' => 'image|mimes:jpeg,png,jpg,gif|max:2048']);
            $blog->blog_img = $req->file('image')->getClientOriginalName();
            $req->file('image')->storeAs('public/images/blog/',$blog->blog_img);
        }
        $blog->save();
        $req->session()->flash('msg','Page Updated Successfully !!');
        return redirect('webadmin/manage-blog');
    }

    public function delete_blog(Request $req,$id) {
        DB::table('dp_blogs')
            ->where('indexer',$id)
            ->delete();
        $req->session()->flash('msg','Data deleted!!');
        return redirect('webadmin/manage-blog');
    }

    public function blog(Request $req) {
        $search = $req->input('search');
        echo '
        <div class="row">
            <div class="relates">
                <div class="relatessec">
                    <ul class="serchfor">';
                    $mem = DB::table('dp_blogs')
                                    ->where('title', 'like', '%' . $search .'%')
                                    ->limit(10);
                    $memresult = $mem->get();
                    $memcount = $mem->count(); 
                    if ($memcount > 0) {
                        foreach($memresult as $memrow) {
                
                        echo '<li><a href="update-blogs/'.$memrow->indexer.'">'.utf8_decode($memrow->title).'</a></li>';
                  
                        } 
                    } else { 
                        
                    } 
                    echo '</ul> 
                </div>
            </div>
        </div>';
    }

}
