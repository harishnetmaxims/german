@extends('include.master')
@section('content')
<section class="headinner">
    <div class="container">
        <h3>
            @if(!empty($showccdetail->rank))
                {{ $showccdetail->rank }} 
            @endif
            @if(!empty($showccdetail->place))
                {{ $showccdetail->place }} 
            @endif  
            @if(!empty($szccdetail->name))
                {{ $szccdetail->name }} 
            @endif
            @if(!empty($szccdetail->lastname))
                {{ $szccdetail->lastname }} 
            @endif    
        </h3>
        <div class="breadcom"><a href="">Home</a><span> > </span> 
            <a href="">
                @if(!empty($showccdetail->rank))
                {{ $showccdetail->rank }} 
                @endif
                @if(!empty($showccdetail->place))
                    {{ $showccdetail->place }} 
                @endif  
                @if(!empty($szccdetail->name))
                    {{ $szccdetail->name }} 
                @endif
                @if(!empty($szccdetail->lastname))
                    {{ $szccdetail->lastname }} 
                @endif
            </a>
        </div>
    </div>
</section>
<div class="width980">
    <div class="listdetail dtail-main" style="">
            
        <div class="row" style="margin:0px;">
            <div class="col-lg-7 col-sm-6 col-xs-12">
                @if (empty($szccdetail->picture))
                    <img class="heightvid defimg" src="{{asset('pictures/'.$szccdetail->reg1.'.jpg')}}"
                         style="width:100%;">
                @else
                    <img class="heightvid defimg" style="width:100%;"
                         src="{{asset('pictures/'.$szccdetail->picture)}}">
                @endif
            </div>
            <div class="col-lg-5 col-sm-6 col-xs-12">
                <div class="moredetail">
                    <h3 style="text-align: center;">
                        @if(!empty($showccdetail->rank))
                            {{ $showccdetail->rank }} 
                        @endif
                        @if(!empty($showccdetail->place))
                            {{ $showccdetail->place }} 
                        @endif  
                        @if(!empty($szccdetail->name))
                            {{ $szccdetail->name }} 
                        @endif
                        @if(!empty($szccdetail->lastname))
                            {{ $szccdetail->lastname }} 
                        @endif
                        @if ($szccdetail->gender == 'R')
                             &#9794; 
                        @else
                            &#9792;
                        @endif
                    </h3>
                    <br>
                    <div class="clearboth">
                        <div class="table-cell">Category</div>
                        <div class="table-cell">
                            @if (empty($pgd_cat_ccdetail->channel_name))
                                N/A
                            @else
                                {{ $pgd_cat_ccdetail->channel_name }}
                            @endif
                        </div>
                    </div>
                    <div class="clearboth">
                        <div class="table-cell">Reg. No. 1</div>
                        <div class="table-cell">
                            @if (empty($szccdetail->c1))
                                N/A
                            @else
                                {{ $szccdetail->c1 }}
                            @endif
                            @if (empty($szccdetail->reg1))
                               N/A
                            @else
                                {{ $szccdetail->reg1 }}
                            @endif
                        </div>
                    </div>
                    <div class="clearboth">
                        <div class="table-cell">Reg. No. 2</div>
                        <div class="table-cell">
                            @if (empty($szccdetail->c2))
                               N/A
                            @else
                               {{ $szccdetail->c2 }}
                            @endif
                                {{ $szccdetail->reg2 }}
                            
                        </div>
                    </div>

                    <div class="clearboth">


                        <div class="table-cell">DOB</div>
                        <div class="table-cell">
                            @if (empty($szccdetail->dob))
                                N/A
                            @else
                                {{ date('F j, Y', strtotime($szccdetail->dob)) }}
                            @endif
                        </div>
                    </div>

                    <div class="clearboth">
                        <div class="table-cell">Tattoo</div>
                        <div class="table-cell">
                            @if (empty($szccdetail->tattoo_nr))
                                N/A
                            @else
                                {{ $szccdetail->tattoo_nr }}
                            @endif
                        </div>
                    </div>

                    <div class="clearboth">
                        <div class="table-cell">Micro Chip</div>
                        <div class="table-cell">
                            @if (empty($szccdetail->micro_chip))
                                N/A
                            @else
                                {{ $szccdetail->micro_chip }}
                            @endif
                        </div>
                    </div>

                    <div class="clearboth">
                        <div class="table-cell">Coat Type</div>
                        <div class="table-cell">
                            @if ($szccdetail->coat == 0)
                                Stock Coat (Stockhaar)
                            @elseif ($szccdetail->coat == 1)
                                Long Stock Coat (Langstockhaar)
                            @elseif ($szccdetail->coat == 2)
                                Long Coat (Langhaar)
                            @else
                                N/A
                            @endif
                        </div>
                    </div>

                    <div class="clearboth">
                        <div class="table-cell">Color</div>
                        <div class="table-cell">
                            @if (empty($szccdetail->color))
                                N/A
                            @else
                                {{ $szccdetail->color }}
                            @endif
                        </div>
                    </div>

                    <div class="clearboth">
                        <div class="table-cell">Title</div>
                        <div class="table-cell">
                            @if (empty($szccdetail->kz))
                                N/A
                            @else
                                {{ $szccdetail->kz }}
                            @endif
                        </div>
                    </div>

                    <div class="clearboth">
                        <div class="table-cell">Show Rank</div>
                        <div class="table-cell">
                            @if (!empty($showccdetail->rank))
                                {{ $showccdetail->rank }}
                            @endif
                            @if (!empty($showccdetail->place))
                                {{ $showccdetail->place }}
                            @endif
                            @if (!empty($showccdetail->country))
                                {{ '(' . $showccdetail->country . ')' }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="tabings">
                <div class="tabspdg">
                    <div class="">
                        <ul class="pdgnav nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" data-toggle="pill" href="#pedigery1"
                                                    role="tab" aria-controls="pills-flamingo" aria-selected="true">Pedigree</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#VideosNew" role="tab"
                                                    aria-controls="pills-cuckoo" aria-selected="false">Videos</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#PhotosNew" role="tab"
                                                    aria-controls="pills-cuckoo" aria-selected="false">Photos</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#CommentNew" role="tab"
                                                    aria-controls="pills-cuckoo" aria-selected="false">Comments</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#progeny1" role="tab"
                                                    aria-controls="pills-cuckoo" aria-selected="false">Progeny</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#sibling1" role="tab"
                                                    aria-controls="pills-cuckoo" aria-selected="false">Siblings</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#shows1" role="tab"
                                                    aria-controls="pills-cuckoo" aria-selected="false">Shows</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#mating1" role="tab"
                                                    aria-controls="pills-cuckoo" aria-selected="false">Mating</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#Deworming" role="tab"
                                                    aria-controls="pills-cuckoo" aria-selected="false">Deworming</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#Rabies" role="tab"
                                                    aria-controls="pills-cuckoo" aria-selected="false">Rabies</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#Vaccines" role="tab"
                                                    aria-controls="pills-cuckoo" aria-selected="false">Vaccines</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#health" role="tab"
                                                    aria-controls="pills-cuckoo" aria-selected="false">Health</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#Litters" role="tab"
                                                    aria-controls="pills-cuckoo" aria-selected="false">Litters</a></li>
                        </ul>
                        <div class="tab-content">
                            <!--pgd detail tab-->
                            <div role="tabpanel" class="tab-pane show fade in active" id="pedigery1">

                                <div class="">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6 col-xs-12">
                                            <div class="card avilable pdgdetail">
                                                <h3 style="text-align: center;">Genetic Health</h3>
                                                <div class="d-table">
                                                    <div class="clearboth">
                                                        <div class="table-cell">Hips (HD)</div>
                                                        <div class="table-cell">
                                                            @if (empty($szhipccdetail->hips_desc))
                                                                N/A
                                                            @else
                                                                {{ $szhipccdetail->hips_desc }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="clearboth">
                                                        <div class="table-cell">Elbows (ED)</div>
                                                        <div class="table-cell">
                                                            @if (empty($szelccdetail->hips_desc))
                                                                N/A
                                                            @else
                                                                {{ $szelccdetail->hips_desc }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="clearboth">
                                                        <div class="table-cell">Breed Value</div>
                                                        <div class="table-cell">
                                                            @if (empty($szccdetail->hdzw))
                                                                N/A
                                                            @else
                                                                {{ $szccdetail->hdzw }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="clearboth">
                                                        <div class="table-cell">DM</div>
                                                        <div class="table-cell">
                                                            @if (empty($szccdetail->dm))
                                                                N/A
                                                            @elseif ($szccdetail->dm == 1)
                                                                Clear
                                                            @elseif ($szccdetail->dm == 2)
                                                                Normal (N/N)
                                                            @elseif ($szccdetail->dm == 3)
                                                                Carrier (A/N)
                                                            @elseif ($szccdetail->dm == 4)
                                                                At-Risk (A/A)
                                                            @else
                                                                N/A
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="clearboth">
                                                        <div class="table-cell">DNA Profile</div>
                                                        <div class="table-cell">
                                                            @if (empty($szccdetail->dna))
                                                                N/A
                                                            @else 
                                                                {{ utf8_encode($szccdetail->dna) }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-xs-12">
                                            <div class="card avilable pdgdetail">
                                                <h3 style="text-align: center;">Anatomy Data</h3>
                                                <div class="d-table">
                                                    <div class="clearboth">
                                                        <div class="table-cell">Date</div>
                                                        <div class="table-cell">
                                                            @if (empty($szccdetail->height))
                                                                N/A
                                                            @else
                                                                {{ $szccdetail->height }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="clearboth">
                                                        <div class="table-cell">Height/Withers</div>
                                                        <div class="table-cell">
                                                            @if (empty($szccdetail->height_withers))
                                                                N/A
                                                            @else
                                                                {{ $szccdetail->height_withers }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="clearboth">
                                                        <div class="table-cell">Breast Depth</div>
                                                        <div class="table-cell">
                                                            @if (empty($szccdetail->breast_depth))
                                                                N/A
                                                            @else
                                                                {{ $szccdetail->breast_depth }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="clearboth">
                                                        <div class="table-cell">Breast Width</div>
                                                        <div class="table-cell">
                                                            @if (empty($szccdetail->breast_width))
                                                                N/A
                                                            @else
                                                                {{ $szccdetail->breast_width }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="clearboth">
                                                        <div class="table-cell">Weight</div>
                                                        <div class="table-cell">
                                                            @if (empty($szccdetail->weight))
                                                                N/A
                                                            @else
                                                                {{ $szccdetail->weight }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="" style="margin-top:20px;">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6 col-xs-12">
                                            <div class="card avilable pdgdetail">
                                                <h3 style="text-align: center;">Line Breeding</h3>
                                                <div class="d-table">
                                                   {!! $line_breeding !!} 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-xs-12">
                                            <div class="card avilable pdgdetail">
                                                <h3 style="text-align: center;">Owner/Breeder Information</h3>
                                                <div class="d-table">
                                                    @if ($szccdetail->owner != '' || $szccdetail->breeder != '')
                                                    @if($obq_count>0)
                                                    @foreach($obq as $obr)
                                                                $obf = $obr->first_name;
                                                                $obl = $obr->last_name;
                                                                $obu = $obr->user_name;
                                                                @if ( false === mb_check_encoding($szccdetail->lastname, 'UTF-8') )
                                                                    $szLastname = utf8_encode($szccdetail->lastname);    
                                                                @else
                                                                    $szLastname = $szccdetail->lastname;
                                                                @endif                
                                                                $ownName = utf8_encode($szccdetail->name) . ' ' . $szLastname;
                                                                @if ($obr->user_id == $szccdetail->owner) 
                                                                     $owner = "<a href=\"memberdetail/$obr->user_id]\" title=\"$obf $obl, owner of $ownName\">$obf $obl</a><br>";
                                                                     {{ $owner }}
                                                                @endif
                                                                @if ($obr->user_id == $szccdetail->breeder)
                                                                    $breeder = "<a href=\"memberdetail/$obr->user_id]\" title=\"$obf $obl, breeder of $ownName\">$obf $obl</a><br>";
                                                                    {{ $breeder }}
                                                                @endif
                                                            @endforeach
                                                        @else 
                                                            No connected owner account.<br>
                                                            No connected breeder account.<br>
                                                        @endif

                                                    @else
                                                        No connected owner account.<br>
                                                        No connected breeder account.<br>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                

                                <style>
                                    .mid {
                                        vertical-align: middle !important;
                                    }

                                    .centerdiv {
                                        display: table;
                                        width: 100%;
                                        text-align: center;
                                    }
                                </style>

                                <div class="">
                                    <div class="tablelist pdgscroll">
                                        <h3>Grand Parents:</h3>
                                        <div class="tab-class">
                                            {!! $pedigree !!}
                                            <div style="clear:both"></div>
                                            
                                        </div>
                                    </div>
                                </div>
                              </div>
                              <!--pgd Videos tab-->
                            <div role="tabpanel" class="tab-pane fade" id="VideosNew">
                                <div class="videostabs">

                                    <div class="row">
                                        @if($videosCount>0)
                                                @foreach($videos as $rowcat)
                                                <div class="col-lg-6 col-sm-6 col-xs-12">
                                                    <div class="card avilable pdgdetail">
                                                        <h3 style="text-align: center;">{{ $rowcat->title }}</h3>
                                                        <div class="d-table"><a
                                                                    href="playvideo/{{ $rowcat->indexer }}">
                                                                <img src="{{ asset('uploads/player_thumbs/'.$rowcat->video_id.'.jpg') }}"
                                                                     style="width:100%">
                                                                <p align="center">
                                                                    <span>{{ $rowcat->channel }}</span></p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                        @else
                                        <div style="padding:20px;text-align:center;width:1000%" align="center">No
                                                video found.
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            </div> 

                            <!--pgd Photos tab-->
                            <div role="tabpanel" class="tab-pane fade" id="PhotosNew">
                                <div class="videostabs">
                                    <div class="row" style="margin:0px;">
                                        @if($imagesCount>0)
                                                @foreach($images as $rowcat)
                                                <div class="thumb"><a
                                                            href="galdetail/{{ $ccdetail->gallery_id }}/{{ $rowcat->indexer }}"><img
                                                                style="height:44px;"
                                                                src="{{ asset('addons/albums/images/'.$rowcat->image_id) }}"
                                                                class="img-fluid" alt="..."></a></div>
                                                @endforeach
                                        @else
                                            <div style="padding:20px;text-align:center;width:1000%" align="center">No photo found.
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div> 
                            <!--pgd Comments tab-->
                            <div role="tabpanel" class="tab-pane fade" id="CommentNew">
                                <div class="videostabs">
                                    <div class="row" style="margin:0px;">
                                        <div id="photoalbum" align="right" style="margin:20px;width:100%">
                                            @if(session('user_id'))
                                            <a href="#myModal" role="button"
                                                                                   class="button-form"
                                                                                   data-toggle="modal">Write a
                                                Comment</a> @else 
                                                <a href="{{ url('login') }}" class="button-form">Write a Comment</a>
                                            @endif

                                        </div>
                                        <div style="clear:both"></div>
                                        @if($commentsCount>0)
                                                @foreach($comments as $rowcat)

                                                <div class="row" style="margin-bottom:10px;">
                                                    <div class="col-lg-12 col-sm-12 col-xs-12">
                                                        <div class="card avilable pdgdetail">
                                                            <div class="d-table">
                                                                <a href="memberdetail/{{ $rowcom->by_id }}">
                                                                    @if ($userdet->image_pro)
                                                                        <img src="{{ asset('images/'.$userdet->image_pro) }}"
                                                                             alt="commentor avatar image"
                                                                             draggable="false" align="left"
                                                                             style="margin-right:10px;width:120px;border:solid 1px #CCCCCC">
                                                                    @else
                                                                        <img src="{{ asset('webpanel/assets/img/ui-sam.jpg') }}"
                                                                             alt="commentor avatar image"
                                                                             draggable="false" align="left"
                                                                             style="margin-right:10px;width:120px;border:solid 1px #CCCCCC">
                                                                    @endif         
                                                                </a>
                                                                {{ htmlentities($rowcom->comments) }}<br/><br/>
                                                                <a href="memberdetail/{{ htmlentities($rowcom->by_id) }}">{{ htmlentities($rowcom->by_username) }}</a> <!-- XSS Vulnerability Patched SiteLock -->
                                                                -
                                                                {{ date('F j, Y', strtotime($rowcom->todays_date)) }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                             @endforeach
                                        @else
                                            <div align="center" style="padding:20px;width:100%;">No comment found</div>
                                        @endif


                                    </div>
                                </div>
                            </div>
                            <!--pgd Progeny tab-->
                            <div role="tabpanel" class="tab-pane fade" id="progeny1">
                                <div class="videostabs">
                                    <div class="row" style="margin:0px;">
                                        @if($entriesCount>0)
                                            @foreach($entries as $rowprog)
                                                if ( false === mb_check_encoding($rowprog->lastname, 'UTF-8') ) {
                                                    $rLastname = utf8_encode($rowprog->lastname);    
                                                } else {
                                                    $rLastname = $rowprog->lastname;
                                                }
                                                ?>
                                                <div class="col-lg-6 col-sm-6 col-xs-12 padmoblesleft"
                                                     style="padding-right: 0px;">
                                                    <div class="card avilable">
                                                        <h3>{{ $rowprog->name }} {{ $rLastname }}</h3>
                                                        <a href="pdgdetail/{{ $rowprog->reg1 }}/{{ $rowprog->c1 }}">
                                                            @if (empty($rowprog->picture))
                                                                <img src="{{ asset('pictures/'.$rowprog->reg1.'.jpg') }}"
                                                                     class="img-responsive heightpdg defimg">
                                                            @else
                                                                <img src="{{ asset('pictures/'.$rowprog->picture) }}"
                                                                     class="img-responsive heightpdg defimg">
                                                            @endif
                                                        </a></div>
                                                </div>
                                            @endforeach
                                        @endif    
                                    </div>
                                </div>
                            </div>
                            <!--pgd Sibling tab-->
                            <div role="tabpanel" class="tab-pane fade" id="sibling1">
                                <div class="videostabs">
                                    <div class="row" style="margin:0px;">
                                        @if($rowsibprogCount>0)
                                            @foreach($resultsibprog as $rowsibprog)
                                                <div class="col-lg-6 col-sm-6 col-xs-12 padmoblesleft"
                                                     style="padding-right: 0px;">
                                                    <div class="card avilable">
                                                        <h3>{{ $rowsibprog->name }} @if ( false === mb_check_encoding($rowsibprog->lastname, 'UTF-8') )
                                                    {{ utf8_encode($rowsibprog->lastname) }} 
                                                @else
                                                    {{ $rowsibprog->lastname }}
                                                @endif</h3>
                                                        <a href="pdgdetail/{{ $rowsibprog->reg1 }}/{{ $rowsibprog->c1 }}">
                                                            @if (empty($rowsibprog->picture))
                                                                <img src="{{ asset('pictures/'.$rowsibprog->reg1.'.jpg') }}"
                                                                     class="img-responsive heightpdg defimg">
                                                            @else
                                                                <img src="{{ asset('pictures/'.$rowsibprog->picture) }}"
                                                                     class="img-responsive heightpdg defimg">
                                                            @endif
                                                        </a></div>
                                                </div>
                                                @endforeach
                                        @endif
                                    </div>
                                    <div class="row" style="margin:0px;">
                                        <h3>Half Siblings (same sire)</h3>
                                    </div>
                                    <div class="row" style="margin:0px;">
                                        @if($rowsibprogCount>0)
                                            @foreach($resultsibprog as $rowprog)
                                                <div class="col-lg-6 col-sm-6 col-xs-12 padmoblesleft"
                                                     style="padding-right: 0px;">
                                                    <div class="card avilable">
                                                        <h3>{{ $rowprog->name }} @if ( false === mb_check_encoding($rowprog->lastname, 'UTF-8') )
                                                     {{ utf8_encode($rowprog->lastname) }}    
                                                @else 
                                                     {{ $rowprog->lastname }}
                                                @endif</h3>
                                                        <a href="pdgdetail/$rowprog->reg1/{{ $rowprog->c1 }}">
                                                            @if (empty($rowprog->picture))
                                                                <img src="{{ asset('pictures/'.$rowprog->reg1.'.jpg') }}"
                                                                     class="img-responsive heightpdg defimg">
                                                            @else
                                                                <img src="{{ asset('pictures/'.$rowprog->picture) }}"
                                                                     class="img-responsive heightpdg defimg">
                                                            @endif
                                                        </a></div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!--pgd shows tab-->
                            <div role="tabpanel" class="tab-pane fade" id="shows1">
                                <div class="pedigree_table">
                                    <form class="form">
                                        <ul>
                                             @if($resultsCount>0)
                                                <li class="span5 no-border"><span>&nbsp;&nbsp;<b>Show</b></span> <span>&nbsp;&nbsp;<b>Country</b></span>
                                                    <span>&nbsp;&nbsp;<b>Judge</b></span> <span>&nbsp;&nbsp;<b>Place</b></span>
                                                    <span>&nbsp;&nbsp;<b>Rank</b></span></li>
                                                @foreach($results as $rowshow)
                                                    <li class="span5"> <span>
                                                    <input class="input" readonly="readonly" name="" type="text"
                                                           value="{{ $rowshow->cat }}">
                                                    </span> <span>
                                                    <input class="input" readonly="readonly" name="" type="text"
                                                           value="{{ $rowshow->country }}">
                                                    </span> <span>
                                                    <input class="input" readonly="readonly" name="" type="text"
                                                           value="{{ $rowshow->judge }}">
                                                    </span> <span>
                                                    <input class="input" readonly="readonly" name="" type="text"
                                                           value="{{ $rowshow->rank }}">
                                                    </span> <span>
                                                    <input class="input" readonly="readonly" name="" type="text"
                                                           value="{{ $rowshow->place }}">
                                                    </span></li>
                                                    
                                                @endforeach
                                            @else
                                                <li class="span5 no-border" style="padding:20px;text-align:center;">No record found
                                                </li>
                                            @endif
                                        </ul>
                                    </form>
                                </div>
                            </div>
                            <!--pgd Mating tab-->
                            <div role="tabpanel" class="tab-pane fade" id="mating1">
                                <div class="boxy browse_media" id="pd_mating" style="display: block;">
                                    <h4 class="parents_name">Mating</h4>
                                    <div class="pedigree_table">
                                        <form action="mating.php" method="post">
                                            <input type="hidden" id="csrf" name="_token" value="<?php echo csrf_token(); ?>">
                                            <ul>
                                                <li class="span5 no-border" style="line-height:24px">
                                                    <div id="pd_mates"></div>
                                                    <input type="hidden" class="input" name="pgd_regcode"
                                                           id="pgd_regcode" value="{{ $szccdetail->reg1 }}">
                                                    <input type="hidden" class="input" name="pgd_c1" id="pgd_c1"
                                                           value="{{ $szccdetail->c1 }}">
                                                    <input type="text" class="input" name="mating_regcode"
                                                           id="mating_regcode" value="">
                                                    <input type="hidden" class="input" name="pedgen" id="pedgen"
                                                           value="{{ $szccdetail->gender }}">
                                                    <b>Enter the name or regcode of the dog you would like to breed
                                                        with {{ $szccdetail->name }}: </b>
                                                    <div class="container d-xs-none">
                                                        <div id="displayAuto"></div>
                                                    </div>
                                                </li>
                                                <!-- <li class="span5 no-border">
                                                   <input type="submit" value="Process" style="float:right">
                                                 </li>-->
                                            </ul>
                                        </form>


                                    </div>

                                </div>

                                <div style="clear:"></div>

                                <div class="pedigree_table" id="pd_mating_results"></div>
                            </div>

                            <!--pgd Deowarming tab-->
                            <div role="tabpanel" class="tab-pane fade" id="Deworming">
                                <div class="pedigree_table">
                                    <table width="100%" style="border:1px solid #ddd;">
                                        @if($resultdewormCount>0)
                                            <tr style="border-bottom:1px solid #ddd;">
                                                <td style="padding:10px;"><b>Insert Date</b></td>
                                                <td style="padding:10px;"><b>Name</b></td>
                                                <td style="padding:10px;"><b>Dosage</b></td>
                                                <td style="padding:10px;"><b>Due Date</b></td>
                                                <td style="padding:10px;"><b>Weight</b></td>
                                            </tr>
                                            @foreach($resultdeworming as $rowdeworming)

                                                <tr>
                                                    <td style="padding:10px;">{{ date('F j, Y', strtotime($rowdeworming->insert_date)) }}</td>
                                                    <td style="padding:10px;">{{ $rowdeworming->name }}</td>
                                                    <td style="padding:10px;">{{ $rowdeworming->dosage }}</td>
                                                    <td style="padding:10px;">{{ date('F j, Y', strtotime($rowdeworming->due_date)) }}</td>
                                                    <td style="padding:10px;">{{ $rowdeworming->weight }}</td>
                                                </tr>

                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5" style="padding:20px;" align="center">No record found
                                                </td>
                                            </tr>
                                        @endif

                                    </table>
                                </div>
                            </div>
                            <!--pgd Rabbies tab-->
                            <div role="tabpanel" class="tab-pane fade" id="Rabies">
                                <div class="pedigree_table">

                                    <table width="100%" style="border:1px solid #ddd;">

                                        @if($resultrabiesCount>0)
                                            <tr style="border-bottom:1px solid #ddd;">
                                                <td style="padding:10px;"><b>Insert Date</b></td>
                                                <td style="padding:10px;"><b>Name</b></td>
                                                <td style="padding:10px;"><b>Dosage</b></td>
                                                <td style="padding:10px;"><b>Due Date</b></td>
                                            </tr>
                                            @foreach($resultrabies as $rowrabies)
                                                <tr>
                                                    <td style="padding:10px;">{{ date('F j, Y', strtotime($rowrabies->insert_date)) }}</td>
                                                    <td style="padding:10px;">{{ $rowrabies->name }}</td>
                                                    <td style="padding:10px;">{{ $rowrabies->dosage }}</td>
                                                    <td style="padding:10px;">{{ date('F j, Y', strtotime($rowrabies->due_date)) }}</td>
                                                </tr>

                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="4" style="padding:20px;" align="center">No record found
                                                </td>
                                            </tr>
                                        @endif

                                    </table>
                                </div>
                            </div>
                            <!--pgd Vaccines tab-->
                            <div role="tabpanel" class="tab-pane fade" id="Vaccines">
                                <div class="pedigree_table">

                                    <table width="100%" style="border:1px solid #ddd;">

                                        @if($resultvaccinesCount>0)
                                            <tr style="border-bottom:1px solid #ddd;">
                                                <td style="padding:10px;"><b>Insert Date</b></td>
                                                <td style="padding:10px;"><b>Name</b></td>
                                                <td style="padding:10px;"><b>Dosage</b></td>
                                                <td style="padding:10px;"><b>Due Date</b></td>
                                            </tr>
                                            @foreach($resultvaccines as $rowvaccines)
                                                <tr>
                                                    <td style="padding:10px;">{{ date('F j, Y', strtotime($rowvaccines->insert_date)) }}</td>
                                                    <td style="padding:10px;">{{ $rowvaccines->name }}</td>
                                                    <td style="padding:10px;">{{ $rowvaccines->dosage }}</td>
                                                    <td style="padding:10px;">{{ date('F j, Y', strtotime($rowvaccines->due_date)) }}</td>
                                                </tr>
                                            @endforeach    
                                        @else
                                            <tr>
                                                <td colspan="4" style="padding:20px;" align="center">
                                                    No record found
                                                </td>
                                            </tr>
                                        @endif

                                    </table>
                                </div>
                            </div>
                            <!--pgd Health tab-->
                            <div role="tabpanel" class="tab-pane fade" id="health">
                                <div class="pedigree_table">

                                    <table width="100%" style="border:1px solid #ddd;">
                                        @if($resultvaccinesCount>0)
                                            <tr style="border-bottom:1px solid #ddd;">
                                                <td style="padding:10px;"><b>Insert Date</b></td>
                                                <td style="padding:10px;"><b>Name</b></td>
                                                <td style="padding:10px;"><b>Dosage</b></td>
                                                <td style="padding:10px;"><b>Due Date</b></td>
                                            </tr>
                                            @foreach($resultvaccines as $rowvaccines)
                                                <tr>
                                                    <td style="padding:10px;">{{ date('F j, Y', strtotime($rowhm->insert_date)) }}</td>
                                                    <td style="padding:10px;">{{ $rowhm->name }}</td>
                                                    <td style="padding:10px;">{{ $rowhm->dosage }}</td>
                                                    <td style="padding:10px;">{{ date('F j, Y', strtotime($rowhm->due_date)) }}</td>
                                                </tr>
                                            @endforeach    
                                        @else
                                            <tr>
                                                <td colspan="4" style="padding:20px;" align="center">No record found
                                                </td>
                                            </tr>
                                        @endif

                                    </table>
                                </div>

                            </div>
                            <!--pgd Litters tab-->
                            <div role="tabpanel" class="tab-pane fade" id="Litters">
                                <div class="pedigree_table">

                                    <table width="100%" style="border:1px solid #ddd;">

                                        @if($resultvaccinesCount>0)
                                            <tr style="border-bottom:1px solid #ddd;">
                                                <td style="padding:10px;"><b>Date of Birth</b></td>
                                                <td style="padding:10px;"><b>Breeding Partner</b></td>
                                                <td style="padding:10px;"><b>Breed Book Number</b></td>
                                                <td style="padding:10px;"><b>Breeder</b></td>
                                                <td style="padding:10px;"><b>Letter</b></td>
                                                <td style="padding:10px;"><b>Males Total</b></td>
                                            </tr>
                                            @foreach($resultvaccines as $rowvaccines)

                                                <tr>
                                                    <td style="padding:10px;">{{ date('F j, Y', strtotime($rowlitter->dateofbirth)) }}</td>
                                                    <td style="padding:10px;">{{ $rowlitter->breeding_partner }}</td>
                                                    <td style="padding:10px;">{{ $rowlitter->breed_bookno }}</td>
                                                    <td style="padding:10px;">{{ $rowlitter->breeder }}</td>
                                                    <td style="padding:10px;">{{ $rowlitter->letter }}</td>
                                                    <td style="padding:10px;">{{ $rowlitter->males_total }}</td>
                                                </tr>
                                                @endforeach
                                        @else
                                            <tr>
                                                <td colspan="6" style="padding:20px;" align="center">No record found
                                                </td>
                                            </tr>
                                            @endif

                                    </table>
                                </div>

                            </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" style="z-index: 999999;">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-body">
                <form id="myForm" method="post" action="" enctype="multipart/form-data">
                @csrf
                <span>
                <input type="hidden" name="user" value='{{ session("name") }}'>
                <input type="hidden" name="uid" value='{{ session("id") }}'>
                <input type="hidden" name="pdgid" value='{{ request()->pdgid }}'>  <!-- XSS Vulnerability Patched SiteLock -->
                <input type="hidden" name="pdgcat" value='{{ request()->pdgcat }}'> <!-- XSS Vulnerability Patched SiteLock -->

                <div><strong>Write Comment:</strong><br>
                    <textarea name="comments" tabindex="3" value="" class="input form-control"
                              style="height:300px;"></textarea>
                    <br><font size="1">&nbsp;&nbsp;(BBC or HTML code is not allowed)</font>
                </div>




                <div>
                 <input type="button" data-dismiss="modal" value="Close" tabindex="14" class="button-form close">

                    <input type="submit" name="create_category" value="Give Comment" class="button-form">
                    </div>
                </span>


                </form>
            </div>

        </div>

    </div>
</div>
<script type="text/javascript">

  function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
</script>
@endsection
