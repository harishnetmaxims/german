<?php

namespace App\Http\Controllers;

use App\ManagePedigree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedigreeController extends Controller
{
    
    public function manage_pedigree() {
        $ret = DB::table('pd_entries')
             ->orderBy('indexer','DESC')
             ->simplePaginate('10');
        return view('webpanel.manage-pedigree',['ret'=>$ret]);
    }

    public function add_pedigree() {
        $cat = DB::table('channels')->get();
        $breeder = DB::table('member_profile')->where('breeder',1)->get();
        $owner = DB::table('member_profile')->where('owner',1)->get();
        $registry = DB::table('dp_registry')->get();
        $title = DB::table('dp_kz')->get();
        $koer = DB::table('dp_koer')->get();
        $hips = DB::table('hips')->get();
        $hi_el = DB::table('hips_elbow')->get();
        return view('webpanel.add-pedigree',compact('cat','breeder','owner','registry','title','koer','hips','hi_el'));
    }
    
    public function store(Request $request) {
        $pedigree = new ManagePedigree;
        $pedigree->reg1=$request->input('redcode1');
        $pedigree->c1=$request->input('reg1value');
        $pedigree->reg2=$request->input('redcode2');
        $pedigree->c2=$request->input('reg2value');
        $pedigree->name=$request->input('dog_name');
        $pedigree->lastname=$request->input('kennel_name');
        $pedigree->gender=$request->input('gender');
        $pedigree->dob=$request->input('dob');
        $pedigree->tattoo_nr=$request->input('tatto');
        $pedigree->color=$request->input('color');
        $pedigree->class=$request->input('class');
        $pedigree->title=$request->input('title');
        $pedigree->father_id=$request->input('father_name');
        $pedigree->mother_id=$request->input('mother_name');
        $pedigree->hdzw=$request->input('hdzw');
        $pedigree->owner_name=$request->input('owner');
        $pedigree->kz=$request->input('title');
        $pedigree->height_withers=$request->input('height-wi');
        $pedigree->breast_depth=$request->input('breast_depth');
        $pedigree->breast_width=$request->input('breast_width');
        $pedigree->height=$request->input('height');
        $pedigree->elbow=$request->input('elbow');
        $pedigree->cid=$request->input('cat');
        $pedigree->owner=$request->input('owner');
        $pedigree->breeder=$request->input('breeder');
        $pedigree->micro_chip=$request->input('micro_chip');
        $pedigree->dna=$request->input('dna');
        $pedigree->coat=$request->input('coat-type');
        $pedigree->number_of_views='0';
        $pedigree->kork=$request->input('koer');
        $pedigree->breeding=$request->input('koer_report');
        $pedigree->added_by=$request->input('cat');
        $pedigree->added_date= date('Y-m-d H:i');
        
        $pd = $request->input('redcode1');
        
        // for health matters
        if(isset($request->insert_date_hm)){
            $iHMData = count( $request->input('insert_date_hm'));
            
            if($iHMData>0){
                for ($hm = 0; $hm < $iHMData; $hm++) {
                    $insert_date_hm =  $request->input('insert_date_hm')[$hm];
                    $name_hm =  $request->input('name_hm')[$hm];
                    $dosage_hm =  $request->input('dosage_hm')[$hm];
                    $due_date_hm =  $request->input('due_date_hm')[$hm];
                    if ($insert_date_hm != '' and $name_hm != '') {
                        $q = DB::table('dp_health_matters')->max('hm_id');
                        $q1 = $q+'1';
                        DB::table('dp_health_matters')->insert([
                            'pd' => $pd,
                            'hm_id'=>$q1,
                            'insert_date'=>$insert_date_hm,
                            'name'=>$name_hm,
                            'dosage'=>$dosage_hm,
                            'due_date'=>$due_date_hm,
                        ]);
                    }
                }
            }
        }

         // for health matters
         if(isset($request->insert_date_vaccines)){
            $iVMData = count( $request->input('insert_date_vaccines'));
            
            if($iVMData>0){
                for ($hv = 0; $hv < $iVMData; $hv++) {
                    $insert_date_vaccines =  $request->input('insert_date_vaccines')[$hv];
                    $name_vaccines =  $request->input('name_vaccines')[$hv];
                    $dosage_vaccines =  $request->input('dosage_vaccines')[$hv];
                    $due_date_vaccines =  $request->input('due_date_vaccines')[$hv];
                    if ($insert_date_vaccines != '' and $name_vaccines != '') {
                        $q = DB::table('dp_vaccines')->max('vaccines_id');
                        $q1 = $q+'1';
                        DB::table('dp_vaccines')->insert([
                            'pd' => $pd,
                            'vaccines_id'=>$q1,
                            'insert_date'=>$insert_date_vaccines,
                            'name'=>$name_vaccines,
                            'dosage'=>$dosage_vaccines,
                            'due_date'=>$due_date_vaccines,
                        ]);
                    }
                }
            }
        }

         // for health matters
         if(isset($request->insert_date_rabies)){
            $iRMData = count( $request->input('insert_date_rabies'));
            
            if($iRMData>0){
                for ($hr = 0; $hr < $iRMData; $hr++) {
                    $insert_date_rabies =  $request->input('insert_date_rabies')[$hr];
                    $name_rabies =  $request->input('name_rabies')[$hr];
                    $dosage_rabies =  $request->input('dosage_rabies')[$hr];
                    $due_date_rabies =  $request->input('due_date_rabies')[$hr];
                    
                    if ($insert_date_rabies != '' and $name_rabies != '') {
                        $r= DB::table('dp_rabies')->max('rabies_id');
                        $r1 = $r+'1';
                        DB::table('dp_rabies')->insert([
                            'pd' => $pd,
                            'rabies_id'=>$r1,
                            'insert_date'=>$insert_date_rabies,
                            'name'=>$name_rabies,
                            'dosage'=>$dosage_rabies,
                            'due_date'=>$due_date_rabies,
                        ]);
                    }
                }
            }
        }

         // for health matters
         if(isset($request->insert_date_deworming)){
            $deRMData = count( $request->input('insert_date_deworming'));
   
            if($deRMData>0){
                for ($hde = 0; $hde < $deRMData; $hde++) {
                    $insert_date_deworming =  $request->input('insert_date_deworming')[$hde];
                    $name_deworming =  $request->input('name_deworming')[$hde];
                    $dosage_deworming =  $request->input('dosage_deworming')[$hde];
                    $due_date_deworming =  $request->input('due_date_deworming')[$hde];
                    $weight_deworming =  $request->input('weight_deworming')[$hde];
                    if ($insert_date_deworming != '' and $name_deworming != '') {
                        $de= DB::table('dp_deworming')->max('deworming_id');
                        $de1 = $de+'1';
                        DB::table('dp_deworming')->insert([
                            'pd' => $pd,
                            'deworming_id'=>$de1,
                            'weight'=>$weight_deworming,
                            'insert_date'=>$insert_date_deworming,
                            'name'=>$name_deworming,
                            'dosage'=>$dosage_deworming,
                            'due_date'=>$due_date_deworming,
                        ]);
                    }
                }
            }
        }

           // for health matters
           if(isset($request->dateofbirth)){
            $liRMData = count( $request->input('dateofbirth'));
            
            if($liRMData>0){
                for ($hli = 0; $hli < $liRMData; $hli++) {
                    $dateofbirth =  $request->input('dateofbirth')[$hli];
                    $breeding_partner =  $request->input('breeding_partner')[$hli];
                    $breed_bookno =  $request->input('breed_bookno')[$hli];
                    $breederinfo =  $request->input('breederinfo')[$hli];
                    $letter =  $request->input('letter')[$hli];
                    $males_total =  $request->input('males_total')[$hli];
                    if ($dateofbirth != '' and $breeding_partner != '') {
                        $li= DB::table('dp_litters')->max('litter_id');
                        $li1 = $li+'1';
                        DB::table('dp_litters')->insert([
                            'pd' => $pd,
                            'males_total' => $males_total,
                            'litter_id'=>$li1,
                            'letter'=>$letter,
                            'dateofbirth'=>$dateofbirth,
                            'breeding_partner'=>$breeding_partner,
                            'breed_bookno'=>$breed_bookno,
                            'breeder'=>$breederinfo,
                        ]);
                    }
                }
            }
        }

           // for health matters
           if(isset($request->show)){
            $dtMData = count( $request->input('show'));

            if($dtMData>0){
                for ($hdt = 0; $hdt < $dtMData; $hdt++) {
                    $show =  $request->input('show')[$hdt];
                    $country =  $request->input('country')[$hdt];
                    $judge =  $request->input('judge')[$hdt];
                    $rank =  $request->input('rank')[$hdt];
                    $place =  $request->input('place')[$hdt];
                    $ov =$hdt+1;
                    $override = $request->input('override')[$hdt];

                    if (isset($_POST['override']) && $_POST['override'] == $ov) {
                        $override =$request->input('override');
                    } else {
                        $override = 0;
                    }

                    if ($show != '' and $country != '') {
                        DB::table('dp_pd_show')->insert([
                            'sz' => $pd,
                            'override' => $override,
                            'place'=>$place,
                            'cat'=>$show,
                            'country'=>$country,
                            'judge'=>$judge,
                            'rank'=>$rank,
                        ]);
                    }
                }
            }
        }
        if($request->file('image')) {
            $request->validate(['image' => 'image|mimes:jpeg,png,jpg,gif|max:2048']);
            $pedigree->image_id = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/addons/albums/images/',$pedigree->image_id);
        }
        $pedigree->save();
        $request->session()->flash('msg','Pedigree Added!!');
        return redirect('webadmin/manage-pedigree');
    }

    public function update_pedigree($blog_id) {
        $viddet = DB::table('pd_entries')
                    ->where('indexer',$blog_id)
                    ->first();
        $pedigreeultcc = DB::table('image_galleries')
                    ->groupBy('gallery_name')
                    ->get();
        return view('webpanel.update-image',['viddet'=>$viddet,'pedigreeultcc'=>$pedigreeultcc]);
    }
    
    public function update(Request $req, $id) {
        $pedigree = ManagePedigree::find($id);
        $pedigree->gallery_id = $req->input('album_id');
        $iatdetail = DB::table('image_galleries')
                        ->where('gallery_id',$pedigree->gallery_id)
                        ->first();
        $pedigree->gallery_name = $iatdetail->gallery_name;
        $pedigree->description = $iatdetail->gallery_description;
        $pedigree->tags = $iatdetail->gallery_tags;
        if($req->file('image')) {
            $req->validate(['image' => 'image|mimes:jpeg,png,jpg,gif|max:2048']);
            $pedigree->image_id = $req->file('image')->getClientOriginalName();
            $req->file('image')->storeAs('public/addons/albums/images/',$pedigree->image_id);
        }//$pedigree->image_id = $image;
        $pedigree->save();
        $req->session()->flash('msg','Page Updated Successfully !!');
        return redirect('webadmin/manage-pedigree');
    }
    
    public function delete_pedigree(Request $req,$id,$reg_id) {
        DB::table('pd_koer')
            ->where('sz',$reg_id)
            ->delete();
        DB::table('pd_kork')
            ->where('pd',$reg_id)
            ->delete();
        DB::table('pd_show')
            ->where('sz',$reg_id)
            ->delete();
        DB::table('dp_rabies')
            ->where('pd',$reg_id)
            ->delete();
        DB::table('dp_litters')
            ->where('pd',$reg_id)
            ->delete();
        DB::table('dp_health_matters')
            ->where('pd',$reg_id)
            ->delete();
        DB::table('dp_deworming')
            ->where('pd',$reg_id)
            ->delete();    
        DB::table('dp_vaccines')
            ->where('pd',$reg_id)
            ->delete();
        DB::table('pd_entries')
            ->where('indexer',$id)
            ->delete();
        $req->session()->flash('msg','Pedigree deleted');
        return redirect('webadmin/manage-pedigree');
    }

    public function pedi(Request $req) {
        $search = $req->input('search');
        echo '
        <div class="row">
            <div class="relates">
                <div class="relatessec">
                    <ul class="serchfor">';
                    $mem = DB::table('pd_entries')
                                    ->where('name', 'like', '%' . $search .'%')
                                    ->orwhere('lastname', 'like', '%' . $search .'%')
                                    ->orwhere('reg1', 'like', '%' . $search .'%')
                                    ->limit(10);
                    $mempedigreeult = $mem->get();
                    $memcount = $mem->count(); 
                    if ($memcount > 0) {
                        foreach($mempedigreeult as $memrow) {
                
                        echo '<li><a href="update-pedigree/'.$memrow->reg1.'">'.utf8_decode($memrow->name) .utf8_decode($memrow->lastname).'('.$memrow->reg1.')</a></li>';
                  
                        } 
                    } else { 
                        
                    } 
                    echo '</ul> 
                </div>
            </div>
        </div>';
    }


}
