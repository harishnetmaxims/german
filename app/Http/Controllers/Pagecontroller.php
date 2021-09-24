<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Pagecontroller extends Controller
{
    public function home() {
        $rH1 = DB::table('mm_pages')
                ->where('page_id',22)
                ->first();
        
        $rH3 = DB::table('mm_pages')
                ->where('page_id',24)
                ->first();
        
        $rH2 = DB::table('mm_pages')
                ->where('page_id',25)
                ->first();

        $todoArr = DB::table('images')
                        ->where('gallery_id',1)
                    ->get(); 
        $resultcc = DB::table('pd_entries as pde')->select('pds.rank', 'pds.place', 'pde.picture', 'pde.name', 'pde.lastname', 'pde.reg1', 'pde.c1')
                        ->leftJoin('pd_show as pds', 'pds.sz', '=', 'pde.reg1')
                        ->orderBy('pde.indexer','desc')
                        ->where('pds.cat', '!=', '')
                        ->orderBy('pds.override', 'DESC')
                        ->orderBy('pds.cat', 'DESC')
                        ->limit(12)
                        ->get();

    	return view('home',['rH1'=>$rH1,'rH2'=>$rH2,'rH3'=>$rH3,'todoArr'=>$todoArr,'resultcc'=>$resultcc]);
    }

    public function about() {
    	//$result = DB::table('mm_pages')->where('page_id',1);
    	$result = DB::select('select * from mm_pages where page_id=1');
    	return view('about',['pageData'=>$result]);
    }

    public function advertise() {
    	$result = DB::table('mm_pages')->where('page_id',4)->first();
    	return view('advertise',['pageData'=>$result]);
    }

    public function blog() {
    	return view('blog');
    }

    public function contact() {
    	$result = DB::select('select * from mm_pages where page_id=2');
    	return view('copyright-info',['pageData'=>$result]);
    }

    public function faq() {
    	$result = DB::select('select * from mm_pages where page_id=11');
    	return view('faq',['pageData'=>$result]);
    }

    public function privacy_policy() {
    	$result = DB::select('select * from mm_pages where page_id=12');
    	return view('privacy-policy',['pageData'=>$result]);
    }

    public function site_news() {
    	$result = DB::select('select * from mm_pages where page_id=10');
    	return view('site-news',['pageData'=>$result]);
    }

    public function terms_of_use() {
    	$result = DB::select('select * from mm_pages where page_id=3');
    	return view('terms-of-use',['pageData'=>$result]);
    }

    public function copyright_info() {
    	$result = DB::select('select * from mm_pages where page_id=13');
    	return view('copyright-info',['pageData'=>$result]);
    }

    public function gallery() {
        $result = DB::table('image_galleries')->simplePaginate(15);
        return view('gallery',['gallery'=>$result]);
    }
        
    public function pedigree() {
        $result = DB::table('pd_entries')
                    ->leftJoin('pd_show', 'pd_entries.reg1', '=', 'pd_show.sz')
                    ->where('pd_show.cat', '!=', '')
                    ->orderBy('override', 'desc')
                    ->orderBy('cat', 'desc')
                    //->limit(1)
                    ->simplePaginate(15);
        //print_r($result);
        return view('pedigree',['pedigree'=>$result]);
    }

    public function galdetail($id,$imgid=null) {
        $result = DB::table('image_galleries')
                    ->where('gallery_id',$id)
                    ->first(); 

        $gallery = DB::table('image_galleries')
                    ->groupBy('gallery_name')
                    ->get(); 
        $sinimgdet = DB::table('images')
                    ->where('gallery_id',$id)
                    ->first();  
        $rowcat = DB::table('images')
                    ->where('gallery_id',$id)
                    ->get();      
        $imgdetail = DB::table('images')
                    ->where('indexer',$imgid)
                    ->first();            
        return view('galdetail',['gal'=>$result,'gallery'=>$gallery,'sinimgdet'=>$sinimgdet, 'resultcc'=>$rowcat, 'imgdetail'=>$imgdetail]);
    }

    public function breeders() {
        $result = DB::table('group_profile')->simplePaginate(15);
        return view('breeders', ['breeders'=>$result]);
    }

    public function memberdetail($uname) {
        //DB::enableQueryLog();
        $userdet = DB::table('member_profile')
                    ->where('user_id',$uname)
                    ->first();

        $sgaldet = DB::table('videos')
                    ->where('user_id',$uname)
                    ->where('approved','yes')
                    ->orderBy('indexer','DESC')
                    ->first();

        $iNumVideos = DB::table('videos')
                    ->where('user_id',$uname)
                    ->where('approved','yes')
                    ->orderBy('indexer','DESC')
                    ->count();

        $resultImg = DB::table('images')
                    ->where('user_id',$uname)
                    ->where('approved','yes')
                    ->first();

        $iNumImg =  DB::table('images')
                    ->where('user_id',$uname)
                    ->where('approved','yes')
                    ->count();  

        //dd(DB::getQueryLog());
        return view('memberdetail',['userdet'=>$userdet,'sgaldet'=>$sgaldet,'resultImg'=>$resultImg,'id'=>$uname,'iNumVideos'=>$iNumVideos,'iNumImg'=>$iNumImg]);
    }
        
    public function membervideo($vgalid) {
        $userdet = DB::table('member_profile')
                    ->where('user_id',$vgalid)
                    ->first();

        $rowcat = DB::table('videos')
                    ->where('user_id',$vgalid)
                    ->where('approved','yes')
                    ->orderBy('indexer','DESC')
                    ->get(); 

        $iNumVideos = DB::table('videos')
                    ->where('user_id',$vgalid)
                    ->where('approved','yes')
                    ->orderBy('indexer','DESC')
                    ->count();

        return view('membervideo',['userdet'=>$userdet,'rowcat'=>$rowcat,'iNumVideos'=>$iNumVideos,'vgalid'=>$vgalid]);
    }
        
    public function video_subgallery($vgalid) {
        $sgaldet = DB::table('channels')
                    ->where('channel_id',$vgalid)
                    ->first();

        $resultcc = DB::table('sub_channels')
                    ->where('parent_channel_id',$vgalid)
                    ->get(); 

        return view('video-subgallery',['sgaldet'=>$sgaldet,'resultcc'=>$resultcc,'vgalid'=>$vgalid]);
    }

    public function videopage($channel_id,$sub_channel_id) {
        $resultcc = DB::table('videos')
                    ->where('sub_channel_id',$sub_channel_id)
                    ->where('channel_id',$channel_id)
                    ->where('approved','yes')
                    ->get();

        $sgaldet = DB::table('sub_channels')
                    ->where('sub_channel_id',$sub_channel_id)
                    ->first(); 

        return view('videopage',['sgaldet'=>$sgaldet,'resultcc'=>$resultcc]);
    }

    public function people() {
        $result = DB::table('member_profile')->simplePaginate(12);
        return view('people',['people'=>$result]);
    }

    public function video_gallery() {
        $result = DB::table('channels')->simplePaginate(15);
        return view('video-gallery',['video'=>$result]);
    }

    public function is_odd($i)
    {
        if(is_int($i)) {
            return (boolean)($i % 2);
        } else {
            return null;
        }
    }

    public function addPedigrees($level,$pedigrees)
    {
        $limits = array(1 => 2, 2 => 4, 3 => 8, 4 => 16, 5 => 32);
        $level++;
        for ($i = 0; $i < $limits[$level]; $i++) {
            $id = ($this->is_odd($i) ? 'mo' : 'fa') . 'ther_id';
            $key = ($this->is_odd($id) ? ($i - 1) / 2 : $i / 2);
            if(!empty($pedigrees[$level - 1][$key][$id])) {
                $pedigrees[$level][$i]['self'] = $pedigrees[$level - 1][$key][$id];
                if ($pedigrees[$level][$i]['self'] > 0) {
                    $query = DB::table('pd_entries')
                                ->where('reg1',$pedigrees[$level][$i]['self'])
                                ->limit('1');

                        $result = $query->first();
                        $pedigrees[$level][$i]['father_id'] = $result['father_id'];
                        $pedigrees[$level][$i]['mother_id'] = $result['mother_id'];
                } else {
                    $pedigrees[$level][$i]['father_id'] = 0;
                    $pedigrees[$level][$i]['mother_id'] = 0;
                }
            }
        
        }
        return $level;
    }

    public function getData($pedigree)
    {

        if (isset($pedigree['self']) && $pedigree['self'] == 0) return false;
        global $dogs, $pedigrees, $base_url;
        $fields = 'pd.reg1, pd.c1, pd.name, pd.lastname';
        if (is_array($pedigree) && !isset($pedigree['self'])) {


            foreach ($pedigree as $pd) {

                $this->getData($pd);
            }
        } elseif (isset($pedigree['self'])) {
            if (!isset($dogs[$pedigree['self']])) {
                $level = 3;
                foreach ($pedigrees[2] as $p2) {
                    if ($p2['self'] == $pedigree['self']) {
                        $level = 2;
                    }
                }
                foreach ($pedigrees[1] as $p1) {
                    if ($p1['self'] == $pedigree['self']) {
                        $level = 1;
                    }
                }
                //$sql_join = '';
                //if($level < 3){
                $fields .= ', pd.picture, pd.title, pd.class, pd.kz, kork.kork';
                //$sql_join = 'LEFT JOIN pd_kork kork ON pd.reg1 = kork.pd';
                //}
                //if($level < 2){
                $fields .= ', pd.dob, pd.tattoo_nr, pd.color, pd.hdzw';
                //}

                $sSQL = DB::table('pd_entries as pd')
                        ->select($ields)
                        ->leftjoin('pd_kork as kork', 'kork.pd', '=', 'pd.reg1')
                        ->where('vc.reg1',$pedigree['self'])
                        ->limit('1');
                        
                $iNumRows = $sSQL->count();

                $dog = $sSQL->get();

                $dog['cc'] = $dog['c1'];

                //if($level < 3){


                $dog['picture'] = $this->pic($dog['reg1'], $dog['picture']);
                $dog['kork'] = (empty($dog['kork']) ? '' : '/Kkl' . $dog['kork']);
                $dog['rank'] = $this->pd_rank($dog['reg1']);

                //}
                //if($level < 2){

                $dog['dob'] = $this->dob($dog['dob']);
                $dog['color'] = ($this->gettype($dog['color']) != 'string' ? 'N/A' : $dog['color']);
                //  }

                $dogs[$pedigree['self']] = $dog;

            }
        }


    }


    public function pd_rank($reg)
    {

        $aVar = dbConnect();

        global $dogs;
        if (isset($dogs[$reg]['rank'])) {
            $rank = $dogs[$reg]['rank'];
        } else {

            $show = 0;
            //echo '<br>'."SELECT cat, rank, place, override FROM pd_show WHERE sz='".mysqli_real_escape_string($aVar,$reg)."'  ORDER BY override DESC, cat DESC LIMIT 1";
            $shows = mysqli_query($aVar, "SELECT cat, rank, place, override FROM pd_show WHERE sz='" . mysqli_real_escape_string($aVar, $reg) . "'  ORDER BY override DESC, cat DESC LIMIT 1");
            $rank = '';
            while ($shw = mysqli_fetch_array($shows)) {
                if (!empty($shw['override'])) {
                    $rank = $shw['rank'] . $shw['place'];
                    break;
                }
                list(, $year) = explode('-', $shw['cat']);
                if ($year > $show) {
                    $show = $year;
                    $rank = $shw['rank'] . $shw['place'];
                }
            }
        }


        $dogs[$reg]['rank'] = $rank;
        return $rank;
    }

    public function find_pd($array, $key)
    {
        foreach ($array as $subarray) {
            if (is_array($subarray)) {
                $subarray = find_pd($subarray);
            }
            if (isset($subarray[$key])) {
                return $subarray;
            }
            return false;
        }
    }

    public function tmp($ids)
    {
        $tmp = array();
        $iteration = 0;
        while (is_array($ids[0][0])) $ids = $ids[0];
        for ($i = 0; $i < count($ids); $i++) {
            $tmp[$iteration + $i] = $ids[$i][1];
            $tmp[$iteration + $i + 1] = $ids[$i][2];
            $iteration++;
        }
        return $tmp;
    }

    public function find_key($pd, $array)
    {
        foreach ($array as $key => $value) {
            $current = $key;
            if ($pd === $value || (is_array($value) && find_key($pd, $value) !== false)) {
                return $current;
            }
        }
        return false;
    }

    public function cc($cc)
    {
        global $country_regs;
        if (in_array($cc, $country_regs)) $cc = array_search($cc, $country_regs);
        return strtoupper($cc);
    }

    public function pdgdetail($pdgid,$pdgcat) {
        $szccdetail = DB::table('pd_entries')
                        ->where('reg1',$pdgid)
                        ->where('c1',$pdgcat)
                        ->first();
        
        $showccdetail = DB::table('pd_show')
                        ->where('sz',$pdgid)
                        ->where('cat', '!=', '')
                        ->orderBy('override','DESC')
                        ->orderBy('cat','DESC')
                        ->limit(1)
                        ->first();

        $korkcdetail = DB::table('pd_kork')
                        ->where('pd',$pdgid)
                        ->first();

        $szhipccdetail = DB::table('hips')
                         ->where('hdb',$szccdetail->title)
                         ->first();
        
        $ob = DB::table('member_profile')
                ->where('user_id',$szccdetail->owner)
                ->orwhere('user_id',$szccdetail->breeder)
                ->limit(2);
        $obq = $ob->get();
        $obq_count = $ob->count();

        $koerccdetail = DB::table('pd_koer')
                            ->where('sz',$szccdetail->reg1)
                            ->first();

        $video = DB::table('videos')
                    ->where('pd',$pdgid);
        $videos = $video->get();
        $videosCount = $video->count();

        $image = DB::table('images')
                    ->where('pd',$pdgid);
        $images = $image->get();
        $imagesCount = $image->count(); 

        $comment = DB::table('pd_comments')
                    ->where('group_id',$pdgid)
                    ->orderBy('indexer','DESC');
        $comments = $comment->get();
        $commentsCount = $comment->count();

        $entry = DB::table('pd_entries')
                    ->where('mother_id',$pdgid);
        $entries = $entry->get();
        $entriesCount = $entry->count();                            
        
        $rowsib = DB::table('pd_entries')
                    ->where('mother_id',$szccdetail->mother_id)
                    ->where('father_id',$szccdetail->father_id);
        $resultsibprog = $rowsib->get();
        $rowsibprogCount = $rowsib->count();
        //print_r($rowsibprogCount); die;
        $results = DB::table('pd_show')
                    ->where('sz',$pdgid)
                    ->orderBy('override','DESC')
                    ->orderBy('cat','DESC');
        $results = $results->get();
        $resultsCount = $results->count();

        $resultdeworm = DB::table('dp_deworming')
                    ->where('pd',$pdgid)
                    ->orderBy('insert_date','DESC');
        $resultdeworming = $resultdeworm->get();
        $resultdewormCount = $resultdeworm->count();

        $resultrab = DB::table('dp_rabies')
                    ->where('pd',$pdgid)
                    ->orderBy('insert_date','DESC');
        $resultrabies = $resultrab->get();
        $resultrabiesCount = $resultrab->count();

        $resultvacc = DB::table('dp_vaccines')
                    ->where('pd',$pdgid)
                    ->orderBy('insert_date','DESC');
        $resultvaccines = $resultvacc->get();
        $resultvaccinesCount = $resultvacc->count();

        $resulth = DB::table('dp_health_matters')
                    ->where('pd',$pdgid)
                    ->orderBy('insert_date','DESC');
        $resulthm = $resulth->get();
        $resulthmCount = $resulth->count();

        $resultli = DB::table('dp_litters')
                    ->where('pd',$pdgid);
        $resultlitter = $resultli->get();
        $resultlitterCount = $resultli->count();

        $safe = array('g', 'cc', 'pd', 'dam', 'sire', 'name', 'pdf');

        $pdf = '{"sire":"'.$szccdetail->father_id.'","dam":"'.$szccdetail->mother_id.'","name":"","breed":"German%20Shepherd%20Dogs","gender":"","dob":"","regcode":"","micro_chip":""}';
        $data = false;
        if($pdf){
            $pdf = stripslashes($pdf);
            $data = json_decode($pdf, true);
            $sire = $data['sire'];
            $dam = $data['dam'];
        }

        if($sire && $dam){
            $level = 0;
            $pedigrees = array();
            $pedigrees[$level][0] = array('father_id' => $sire, 'mother_id' => $dam);
            $level = $this->addPedigrees($level,$pedigrees);
            $level = $this->addPedigrees($level,$pedigrees);
            $level = $this->addPedigrees($level,$pedigrees);
            $level = $this->addPedigrees($level,$pedigrees);
            $level = $this->addPedigrees($level,$pedigrees);

            $dogs = array();
            $this->getData($pedigrees);
            if(!empty($dogs[$sire])) {
                $sr = $dogs[$sire];
            }
            if(!empty($dogs[$dam])) {
                $dm = $dogs[$dam];
            }
            $keys = array(
                'reg1' => 0,
                'cc' => 'cc',
                'c1' => 9,
                'name' => 3,
                'lastname' => 4,
                'url' => 'url',
                'rank' => 'rank',
                'picture' => 5,
                'dob' => 11,
                'kz' => 8,
                'kork' => 10,
                'tattoo_nr' => 12,
                'color' => 13,
                'hdzw' => 14,
            );
            
            foreach($pedigrees as $level => $array){
                $sire_range = (count($array) / 2) - 1;
                foreach($array as $number => $dog){
                    if($number <= $sire_range){
                        $line_sire[$dog['self']][] = $level;
                    }else{
                        if(!empty($dog['self'])) {
                            $line_dam[$dog['self']][] = $level;
                        }
                    }
                }
            }
            $line[] = array();
            if(!empty($line_sire)) {
                foreach($line_sire as $dog => $level){
                    if(empty($dog)) continue;
                    $sire_breeding = $dam_breeding = '';
                    if(array_key_exists($dog, $line_dam)){  
                        foreach($level as $num) $sire_breeding .= ($sire_breeding == '' ? $num : ",$num");
                        foreach($line_dam[$dog] as $num) $dam_breeding .= ($dam_breeding == '' ? $num : ",$num");
                        $breeding = $sire_breeding.'-'.$dam_breeding;
                        foreach($dogs as $possibility){
                            if($possibility['reg1'] == $dog){
                                $line_name = $possibility['name'].' '.$possibility['lastname'];
                                $line_url = $possibility['url'];
                                $line_rank = pd_rank($dog);
                                $line_c1 = $possibility['c1'];
                                break;
                            }
                        }
                        $line[] = array('regcode' => $dog,'c1' => $line_c1, 'name' => $line_name, 'url' => $line_url, 'rank' => $line_rank, 'breeding' => $breeding);
                    }
                }
            }

            if(count($line) < 1) { 
                $line_breeding = '<p>&nbsp;No line breeding results to display.<br /><br /></p>';
            } else{
                
                foreach($line as $lb){
                    //$line_breeding .= '<span>'.$lb['rank'].' <a href="pdgdetail/'.$lb['regcode'].'&pdgcat='.$lb['c1'].'">'.utf8_encode($lb['name']).'</a> ... '.$lb['breeding'].'</span><br>';
                    $line_breeding ='';
                }
                
            }
            
        }


        $pedigree = '<div class="pd_mating_4">';

        for($i = 1; $i < 5; $i++){
            $d = 1;
             $pedigree .= '<div class="pd_mating_1">';
             echo $pedigrees[$i + 1];
             if(count($pedigrees[$i])>0) {
                foreach($pedigrees[$i + 1] as $dog){
                    $padding = ($i < 2 ? 30 : ($i < 3 ? 45 : ($i < 4 ? 15 : 0)));
                    $height = ($i < 2 ? 210 : ($i < 3 ? 75 : ($i < 4 ? 45 : 30)));;
                    $background = ($d % 2 ? 'transparent' : '#444');
                    $cell_dam = ($d % 2 ? '' : ' cell_dam');
                    
                    
                    $pedigree .= '<div class="pd_mating_cell cell_'.$i.$cell_dam.'">';
                    if(count($dogs[$dog['self']]) > 2){
                        $dog = $dogs[$dog['self']];
                        
                        if ( false === mb_check_encoding($dog['lastname'], 'UTF-8') ) {
                            $dogLastName = utf8_encode($dog['lastname']);    
                        } else {
                            $dogLastName = $dog['lastname'];
                        }
                        if($i == 1){
                            
                            if(!empty($dog['picture'])){
                                $pedigree .= '<a href="pdgdetail/'.$dog['reg1'].'/'.$dog['cc'].'">';
                                $pedigree .= '<img src="'.$dog['picture'].'" style="width: 50%;" />';
                                $pedigree .= '</a>';
                            }else $pedigree .= $dog['picture'];
                            $pedigree .= '<h6>'.$dog['rank'].' '.utf8_encode($dog['name']).' '.$dogLastName.'</a></h6>';
                            $pedigree .= '<h6><a href="pdgdetail/'.$dog['reg1'].'/'.$dog['cc'].'">'.$dog['cc'].': '.$dog['reg1'].'</a></h6>';
                            $kzkork = $dog['kz'].(empty($dog['kz']) || empty($dog['kork']) ? '' : '/').$dog['kork'];
                            $kzkork = str_replace('//', '/', trim($kzkork, '/'));
                            $pedigree .= '<h6>'.$kzkork.'</h6>';
                            
                        }
                        else if($i == 2){
                        if(!empty($dog['picture'])){
                                $pedigree .= '<a href="pdgdetail/'.$dog['reg1'].'/'.$dog['cc'].'">';
                                $pedigree .= '<img src="'.$dog['picture'].'" style="width: 50%;" />';
                                $pedigree .= '</a>';
                            }else $pedigree .= $dog['picture'];
                            
                            $pedigree .= '<h6>'.$dog['rank'].' '.utf8_encode($dog['name']).' '.$dogLastName.'</a></h6>';
                            $pedigree .= '<h6><a href="/'.$dog['reg1'].'/'.$dog['cc'].'">'.$dog['cc'].': '.$dog['reg1'].'</a></h6>';
                            $kzkork = $dog['kz'].(empty($dog['kz']) || empty($dog['kork']) ? '' : '/').$dog['kork'];
                            $kzkork = str_replace('//', '/', trim($kzkork, '/'));
                            $pedigree .= '<h6>'.$kzkork.'</h6>';
                        }else{
                            $pedigree .= $dog['rank'].' '.utf8_encode($dog['name']).' '.$dogLastName.' <br />';
                            $pedigree .= '<a class="pd_mating_name" href="pdgdetail/'.$dog['reg1'].'/'.$dog['cc'].'" target="_blank"> '.$dog['cc'].': '.$dog['reg1'].'</a>';
                        }
                    }else{
                        $pedigree .= ($i == 1 ? '<br /><br /><br />' : '').'<i style="color:#999;line-height:28px">No data available.</i>';
                    }
                    $d++;
                    $pedigree .= '</div>';
                }
            }
            $pedigree .= '</div>';
        }
        $pedigree .= '</div>';


        return view('pdgdetail',['szccdetail'=>$szccdetail,'showccdetail'=>$showccdetail,'szhipccdetail'=>$szhipccdetail,'obq'=>$obq,'obq_count'=>$obq_count,'koerccdetail'=>$koerccdetail,'videos'=>$videos,'videosCount'=>$videosCount,'images'=>$images,'imagesCount'=>$imagesCount,'comments'=>$comments,'commentsCount'=>$commentsCount,'entries'=>$entries,'entriesCount'=>$entriesCount,'resultsibprog'=>$resultsibprog,'rowsibprogCount'=>$rowsibprogCount,'results'=>$results,'resultsCount'=>$resultsCount,'resultdeworming'=>$resultdeworming,'resultdewormCount'=>$resultdewormCount,'resultrabies'=>$resultrabies,'resultrabiesCount'=>$resultrabiesCount,'resultvaccines'=>$resultvaccines,'resultvaccinesCount'=>$resultvaccinesCount,'resulthm'=>$resulthm,'resulthmCount'=>$resulthmCount,'resultlitter'=>$resultlitter,'resultlitterCount'=>$resultlitterCount,'line_breeding'=>$line_breeding,'pedigree'=>$pedigree]);   

    }

    public function search(Request $req) {
        $search = $req->input('search');
        echo '
        <div class="row">';
                    $mem = DB::table('pd_entries')
                                    ->where('name', 'like', '%' . $search .'%')
                                    ->orwhere('lastname', 'like', '%' . $search .'%')
                                    ->orwhere('reg1', 'like', '%' . $search .'%')
                                    ->limit(10);
                    $mempedigreeult = $mem->get();
                    $memcount = $mem->count(); 
                    if ($memcount > 0) {
                        foreach($mempedigreeult as $memrow) {
                        echo '<div class="col-lg-3 col-sm-3 col-xs-12">
                            <div class="inproduct card">
                                <div class="imgsetsearch">';
                                    if (empty($memrow->picture)) {
                                        echo '<img class="height165" src="http://127.0.0.1:8000/images/8.png" style="">';
                                    } else {
                                        echo '<img class="height165 defimg" src="{{ asset(pictures/'.$memrow->picture.') }}" style="">';
                                    }
                                echo '</div>
                                <div class="contimg">
                                    <h3>';
                                    utf8_encode($memrow->name) . ' ' . utf8_encode($memrow->lastname); 
                                    echo'</h3>
                                    <input type="hidden" name="pedid" id="pedid" value="'.$memrow->reg1.'"/>
                                    <a href="javascript:void();" class="btn readmore" id="btnprocess">Process</a>
                                </div>
                            </div>
                        </div>';
                  
                        } 
                    } else { 
                        
                    } 
                    echo '
        </div>
        <script>
  $(document).ready(function () {
    $("#btnprocess").click(function () {
      var name = $("#pedid").val();
      var pgd_regcode = $("#pgd_regcode").val();
      var pgd_c1 = $("#pgd_c1").val();

      if (name == "") {
        $("#displayAuto").html("Search Item Not Found");
      }
      else {
        $.ajax({
          type: "POST",
          url: "function/mating.php",
          data: {
            search: name, pgd_regcode: pgd_regcode, pgd_c1: pgd_c1
          },
          success: function (html) {
            $("#pd_mating_results").html(html).show();
          }
        });
      }
    });
  });

</script>';
    }

    public function newsletter(Request $req) {
        $email = $req->input('search');
        $result = DB::table('newsletter_subscription')
                    ->where('email', $email);

        $resulCheck = $result->first();
        $resulCount = $result->count();
        if ($resulCount > 0) {
            echo 'Already subscribed.';
        } else {
            DB::table('newsletter_subscription')
                ->insert(
                    array(
                        'email' =>$email,
                        'date'  => date('Y-m-d H:i:s')
                    )
                );
            echo 'Thanks for subscribed.';
        }
    }

    public function ajax(Request $req) {
        $search = $req->input('search');
        $cat = $req->input('categ');

        echo '
        <div class="row">
           ';
            if ($cat == 'videos') {
                $vid = DB::table('videos')
                        ->where('title', 'LIKE', '%' . $search . '%')
                        ->orwhere('channel', 'LIKE', '%' . $search . '%')
                        ->limit(10);
                $vidresult = $vid->get();
                $vidCount  = $vid->count();
                if ($vidCount > 0) {
                    foreach($vidresult as $vidrow) {
                    echo '<div class="col-lg-2 col-sm-3 col-xs-12">
                            <div class="inproduct card">
                                <div class="imgsetsearch">';
                                    if (empty($vidrow->video_id)) { 
                                    echo '<img src="images/8.png" style="height:300px;width:300px;">';
                                    } else { 
                                    echo '<img class="height165 defimg"
                                             src="uploads/player_thumbs/'.$vidrow->video_id.'.jpg" style="">';
                                    } 
                                echo '</div>
                                <div class="contimg">
                                    <h3>'.$vidrow->title.'</h3>
                                    
                                </div>
                            </div>
                        </div>';
                    }
                }
            } elseif ($cat == 'images') {
                $img = DB::table('images')
                        ->where('title', 'LIKE', '%' . $search . '%')
                        ->orwhere('gallery_name', 'LIKE', '%' . $search . '%')
                        ->limit(10);
                $imgresult = $img->get();
                $imgcount = $img->count();
                if ($imgcount > 0) {
                    foreach($imgresult as $imgrow) {
                    echo '<div class="col-lg-2 col-sm-3 col-xs-12">
                            <div class="inproduct card">
                                <div class="imgsetsearch">';
                                    if (empty($imgrow->image_id)) {
                                        echo '<img class="height165" src="images/8.png" style="">';
                                    } else {
                                        echo '<img class="height165 defimg"
                                             src="addons/albums/images/'.$imgrow->image_id.'" style="">';
                                    }
                            echo '</div>
                                <div class="contimg">
                                    <h3>'.$imgrow->title.'</h3>
                                        <button class="btn readmore">View Detail</button>
                                    </a>
                                </div>
                            </div>
                        </div>';
                    }
                }
            } elseif ($cat == 'members') {
                $mem = DB::table('member_profile')
                            ->where('first_name', 'LIKE', '%' . $search . '%')
                            ->orwhere('last_name', 'LIKE', '%' . $search . '%')
                            ->limit(10);
                $memresult = $mem->get();
                $memcount = $mem->count();
                if ($memcount > 0) {
                    foreach($memresult as $memrow) {                    
                    echo '<div class="col-lg-2 col-sm-3 col-xs-12">
                            <div class="inproduct card">
                                <div class="imgsetsearch">';
                                    if (empty($memrow->image_pro)) {
                                        echo '<img class="height165" src="addons/albums/images/User_Circle.png" style="">';
                                    } else {
                                        echo '<img class="height165 defimg"
                                             src="addons/albums/images/'.$memrow->image_pro.'" style="">';
                                    }
                                echo '</div>';
                                
                                if ( false === mb_check_encoding($memrow->last_name, 'UTF-8') ) {
                                    $last_name = utf8_encode($memrow->last_name);    
                                } else {
                                    $last_name = $memrow->last_name;
                                }
                                
                                echo '<div class="contimg">
                                    <h3>'.$memrow->first_name.' '.$last_name.'</h3>
                                    
                                </div>
                            </div>
                        </div>';
                    }
                }
            } elseif ($cat == 'breeders') {
                $bree = DB::table('group_profile')
                            ->where('group_name', 'LIKE', '%' . $search . '%')
                            ->orwhere('group_description', 'LIKE', '%' . $search . '%')
                            ->limit(10);
                $breeresult = $bree->get();
                $breeCount = $bree->count();
                if ($breeCount > 0) {
                    foreach($breeresult as $breerow) {
                    echo '<div class="col-lg-2 col-sm- col-xs-12">
                            <div class="inproduct card">
                                <div class="imgsetsearch">';
                                    $uname = $breerow->admin_id;
                                    $userdetail = DB::table('member_profile')
                                                    ->where('user_id',$uname);
                                    $uresultdetail = $userdetail->get();
                                    foreach($userdetail as $userdet)
                                    if (empty($userdet->picture)) {
                                        echo '<img class="height165" src="images/img/default.jpg" style="">';
                                    } else {
                                        echo '<img class="height165 defimg" src="uploads/thumbs/'. $userdet->image_pro.'"
                                             style="">';
                                    }
                                echo '</div>
                                <div class="admintile">
                                    <a href="memberdetail/'.$breerow->admin_id.'">'.$breerow->group_name.'</a><a
                                            href="membervideo'.$breerow->admin_id.'" class="videolink"
                                            style="float: right;">Video--></a>
                                </div>
                                <div class="admintile">
                                    <a href="memberdetail'.$breerow->admin_id.' '.$breerow->group_description.'</a>
                                </div>
                            </div>
                        </div>';
                    }
                }
            } elseif ($cat === 'blogs') {
                $blog = DB::table('blogs')
                            ->where('title', 'LIKE', '%' . $search . '%') 
                            ->orwhere('tags', 'LIKE', '%' . $search . '%')
                            ->limit(10);
                $blogresult = $blog->get();
                $blogcount = $blog->count();
                if ($blogcount > 0) {
                    foreach($blogresult as $blogrow) {
                    echo'<div class="col-lg-2 col-sm-3 col-xs-12">
                            <div class="inproduct card">
                                <div class="imgsetsearch">';
                                    if (empty($blogrow->blog_img)) {
                                        echo '<img class="height165 " src="images/img/default.jpg" style="">';
                                    } else { 
                                        echo '<img class="height165 defimg" src="images/blog/'. $blogrow->blog_img.'"
                                             style="">';
                                    }
                                echo '</div>
                                <div class="contimg">
                                    <h3>'.$blogrow->title.'</h3>
                                    <a href="blogdetail/'.$blogrow->indexer.'">
                                        <button class="btn readmore">View Detail</button>
                                    </a>
                                </div>
                            </div>
                        </div>';

                    }
                }
            } elseif ($cat == 'pedigree') {
                $search_lower = mb_strtolower($search, 'UTF-8');
                $pedi = DB::table('pd_entries')
                            ->where('name', 'LIKE', '%' . $search_lower . '%')
                            ->orwhere('lastname', 'LIKE', '%' . $search_lower . '%')
                            ->orwhere('reg1', 'LIKE', '%' . $search_lower . '%')
                            ->limit(10);
                $pediresult = $pedi->get();
                $pedicount = $pedi->count();
                if ($pedicount > 0) {
                    foreach($pediresult as $pedirow) {
                    echo '<div class="col-lg-2 col-sm-3 col-xs-12">
                            <div class="inproduct card">
                                <div class="imgsetsearch">';
                                    if (empty($pedirow->picture)) { 
                                        echo '<img class="height165" src="images/8.png" style="">';
                                    } else { 
                                        echo '<img class="height165 defimg" src="pictures/'.$pedirow->picture.'"
                                             style="">';
                                    }
                            echo'</div>';
                                if ( false === mb_check_encoding($pedirow->lastname, 'UTF-8') ) {
                                    $last_name = utf8_encode($pedirow->lastname);    
                                } else {
                                    $last_name = $pedirow->lastname;
                                }
                                
                            echo'<div class="contimg">
                                    <h3>'.utf8_encode($pedirow->name) . ' ' . $last_name.'</h3>
                                    <a href="pdgdetail/'.$pedirow->reg1.'/'.$pedirow->c1.'">
                                        <button class="btn readmore">View Detail</button>
                                    </a>
                                </div>
                            </div>
                        </div>';
                    }
                }
            } else {
            }
            echo '</ul>';
        echo '</div>';
        
    }

    public function search_header(Request $req) {
        $search = $req->input('search');
        $cat = $req->input('cat');
        
        $vid = DB::table('videos')
                ->where('title', 'LIKE', '%' . $search . '%')
                ->orwhere('channel', 'LIKE', '%' . $search . '%')
                ->limit(10);
        $vidresult = $vid->get();

        $img = DB::table('images')
                ->where('title', 'LIKE', '%' . $search . '%')
                ->orwhere('gallery_name', 'LIKE', '%' . $search . '%')
                ->limit(10);
        $imgresult = $img->get();
            
        $mem = DB::table('member_profile')
                    ->where('first_name', 'LIKE', '%' . $search . '%')
                    ->orwhere('last_name', 'LIKE', '%' . $search . '%')
                    ->limit(10);
        $memresult = $mem->get();
            
        $bree = DB::table('group_profile')
                    ->where('group_name', 'LIKE', '%' . $search . '%')
                    ->orwhere('group_description', 'LIKE', '%' . $search . '%')
                    ->limit(10);
        $breeresult = $bree->get();
            
        /*$blog = DB::table('blogs')
                    ->where('title', 'LIKE', '%' . $search . '%') 
                    ->orwhere('tags', 'LIKE', '%' . $search . '%')
                    ->limit(10);
        $blogresult = $blog->get();
            */
        $pedi = DB::table('pd_entries')
                    ->where('name', 'LIKE', '%' . $search . '%')
                    ->orwhere('lastname', 'LIKE', '%' . $search . '%')
                    ->orwhere('reg1', 'LIKE', '%' . $search . '%')
                    ->limit(10);
        $pediresult = $pedi->get();

        return view('search',['pediresult'=>$pediresult,'breeresult'=>$breeresult,'memresult'=>$memresult,'imgresult'=>$imgresult,'vidresult'=>$vidresult,'cat'=>$cat]);
    }

    public function playvideo($vid) {
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $sgaldet = DB::table('videos')
                        ->where('indexer',$vid)
                        ->first();

        $resultcom = DB::table('videocomments as vc')
                        ->select('mp.image_pro','mp.user_id','vc.comments','vc.todays_date','vc.by_username')
                        ->leftjoin('member_profile as mp', 'mp.user_name', '=', 'vc.by_username')
                        ->where('vc.video_id',$vid)
                        ->orderBy('vc.indexer','DESC')
                        ->get();
        return view('playvideo',['actual_link'=>$actual_link,'sgaldet'=>$sgaldet,'resultcom'=>$resultcom]);
    }

    public function vid_comment(Request $req) {
        if (empty(session('id'))) {
            return redirect('login'); 
        }

        if ($req->input('post-comment')) {
            $vid = $req->input('vid');
            $comments = addslashes($req->input('comments'));
            $uname = $req->input('user');
            $u_id = $req->input('uid');
            $actual_link = $req->input('actual_link');
            $que = DB::table('videocomments')
                    ->insert(
                            array(
                                'by_id'=>$u_id, 
                                'by_username'=>$uname, 
                                'video_id'=>$vid, 
                                'comments'=>$comments, 
                                'todays_date'=>date('Y-m-d H:i:s')
                            )
                        );

            $req->session()->flash('msg', "Comment added successfully");
            return redirect($actual_link);
        }

    }

    public function update_profile(Request $req){
        $user_id = $req->session()->get('id');
        $userdet = DB::table('member_profile')
                    ->where('user_id',$user_id)
                    ->first();
        return view('update-profile',['userdet'=>$userdet]);
    }

    public function update_user_profile(Request $req){
        $user_id = $req->session()->get('id');
        $breeder = $req->input("breeder");
        if ($breeder > 0) {
            $breeder = $breeder;
        } else {
            $breeder = 0;
        }
        $owner = $req->input("owner");
        if ($owner > 0) {
            $owner = $owner;
        } else {
            $owner = 0;
        }

    $first_name = $req->input("first_name");
    $last_name = $req->input("last_name");
    $address = $req->input("address");
    $directions = $req->input("directions");
    $current_city = $req->input("current_city");
    $state = $req->input("state");
    $zip_code = $req->input("zip_code");
    $country = $req->input("country");
    $about_me = $req->input("about_me");
    $established = $req->input("established");
    $hours = $req->input("hours");
    $work_tel = $req->input("work_tel");
    $cell_tel = $req->input("cell_tel");
    $personal_website = $req->input("personal_website");
    $user_name = $req->input("user_name");
    $hideemail = $req->input("hideemail");

    if($req->file('image')) {
        $req->validate(['image' => 'image|mimes:jpeg,bmp,png,jpg,gif|max:2048']);
        $image = $req->file('image')->getClientOriginalName();
        $req->file('image')->storeAs('public/images/',$image);

        DB::table('member_profile')
        ->where('user_id', $user_id)
        ->update(['first_name' => $first_name, 'last_name'=>$last_name, 'address'=>$address, 'directions'=>$directions, 'current_city'=>$current_city, 'state'=>$state, 'zip_code'=>$zip_code, 'country'=>$country, 'about_me'=>$about_me, 'established'=>$established, 'hours'=>$hours, 'work_tel'=>$work_tel, 'cell_tel'=>$cell_tel, 'personal_website'=>$personal_website, 'hideemail'=>$hideemail, 'image_pro'=>$image, 'breeder'=>$breeder, 'owner'=>$owner]);
    } else {
        DB::table('member_profile')
        ->where('user_id', $user_id)
        ->update(['first_name' => $first_name, 'last_name'=>$last_name, 'address'=>$address, 'directions'=>$directions, 'current_city'=>$current_city, 'state'=>$state, 'zip_code'=>$zip_code, 'country'=>$country, 'about_me'=>$about_me, 'established'=>$established, 'hours'=>$hours, 'work_tel'=>$work_tel, 'cell_tel'=>$cell_tel, 'personal_website'=>$personal_website, 'hideemail'=>$hideemail, 'breeder'=>$breeder, 'owner'=>$owner]);
    }

    
    

        $req->session()->flash('msg', "Profile Updated successfully");
        return redirect('userdetail');
    }


}
