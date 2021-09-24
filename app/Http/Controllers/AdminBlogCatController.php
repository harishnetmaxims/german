<?php

namespace App\Http\Controllers;

use App\Admin_blogcat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminBlogCatController extends Controller
{
    
    public function manage_blogcat() {
        $ret=DB::table('blog_categories')
             ->orderBy('category_name','ASC')
             ->simplePaginate('10');
        return view('webpanel.manage-blogcat',['ret'=>$ret]);
    }

    public function add_blogcat() {
        return view('webpanel.add-blogcat');
    }
    
    public function store(Request $req) {
        $blog_cat = new Admin_blogcat;
        $blog_cat->category_name = $req->input('title');
        $blog_cat->date_created = date('Y-m-d H:i:s');
        $blog_cat->save();
        $req->session()->flash('msg','Profile Updated successfully');
        return redirect('webadmin/manage-blogcat');
    }

    public function update_blogcat($blog_id) {
        $blogdet = DB::table('blog_categories')
                    ->where('category_id',$blog_id)
                    ->first();
        return view('webpanel.update-blogcat',['blogdet'=>$blogdet]);
    }
    
    public function update(Request $req, $id) {
        $blog_cat = Admin_blogcat::find($id);
        $blog_cat->category_name = $req->input('title');
        $blog_cat->date_created = date('Y-m-d H:i:s');
        $blog_cat->save();
        $req->session()->flash('msg','Page Updated Successfully !!');
        return redirect('webadmin/manage-blogcat');
    }
    
    public function delete_blogcat(Request $req,$id) {
        DB::table('blog_categories')
            ->where('category_id',$id)
            ->delete();
        $req->session()->flash('msg','Data deleted!!');
        return redirect('webadmin/manage-blogcat');
    }

    public function blogcat(Request $req) {
        $search = $req->input('search');
        echo '
        <div class="row">
            <div class="relates">
                <div class="relatessec">
                    <ul class="serchfor">';
                    $mem = DB::table('blog_categories')
                                    ->where('category_name', 'like', '%' . $search .'%')
                                    ->limit(10);
                    $memresult = $mem->get();
                    $memcount = $mem->count(); 
                    if ($memcount > 0) {
                        foreach($memresult as $memrow) {
                
                        echo '<li><a href="update-blogcat/'.$memrow->category_id.'">'.utf8_decode($memrow->category_name).'</a></li>';
                  
                        } 
                    } else { 
                        
                    } 
                    echo '</ul> 
                </div>
            </div>
        </div>';
    }
}
