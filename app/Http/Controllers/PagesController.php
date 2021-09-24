<?php

namespace App\Http\Controllers;

use App\ManagePages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
	public function manage_pages() {
        $ret = DB::table('mm_pages')
                    ->get();  
        return view('webpanel.manage-pages',['ret'=>$ret]);
    }

    public function update_pages($id) {
        $row = DB::table('mm_pages')
                ->where('page_id', $id)
                ->first();
        return view('webpanel.update-pages',['row'=>$row]);
    }

    public function update(Request $req, $id) {
        $breeder = ManagePages::find($id);
        $breeder->title = $req->input('title');
        $breeder->text = $req->input('text');
        $breeder->public_private = $req->input('status');
        $breeder->save();
        $req->session()->flash('msg','Page Updated Successfully !!');
        return redirect('webadmin/manage-pages');
    }

    public function delete_pages(Request $req,$id) {
        DB::table('mm_pages')
            ->where('page_id',$id)
            ->delete();
        $req->session()->flash('msg','Data deleted!!');
        return redirect('webadmin/manage-pages');
    }
}