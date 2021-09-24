@extends('include.master')
@section('content')
<section class="headinner">
    <div class="container">
        <h3>Search</h3>
        <div class="breadcom">
            <a href="">Home</a><span> > </span> <a href="">Search</a>
        </div>
    </div>
</section>

<section class="listde">
    <div class="container">
        <div class="row">
            @if ($cat == 'videos')
                @foreach($vidresult as $vidrow)
                    <div class="col-lg-3 col-sm-4 col-xs-12">
                        <div class="inproduct card">
                            <div class="imageset">
                                @if (empty($vidrow->video_id))
                                    <img src="{{ asset('images/8.png') }}" style="height:300px;width:300px;">
                                @else
                                    <img class="height165"
                                         src="{{ asset('uploads/player_thumbs/'.$vidrow->video_id.'.jpg') }}" style="">
                                @endif
                            </div>
                            <div class="contimg">
                                <h3>{{ $vidrow->title }} </h3>
                                <a href="{{ url('playvideo/'.$vidrow->indexer) }}">
                                    <button class="btn readmore">Readmore</button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @elseif ($cat == 'images')
                @foreach(imgresult as $imgrow)        
                    <div class="col-lg-3 col-sm-4 col-xs-12">
                        <div class="inproduct card">
                            <div class="imageset">
                                @if (empty($imgrow->image_id))
                                    <img class="height165" src="{{ asset('images/8.png') }}" style="">
                                @else
                                    <img class="height165"
                                         src="{{ asset('addons/albums/images/'.$imgrow->image_id) }}" style="">   
                                @endif                                 
                            </div>
                            <div class="contimg">
                                <h3>{{ $imgrow->title }}</h3>
                                <a href="{{ url('galdetail/'.$imgrow->gallery_id.'/'.$imgrow->indexer)}}">
                                    <button class="btn readmore">View Detail</button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @elseif ($cat == 'members') 
                @foreach($memresult as $memrow) 
                    <div class="col-lg-3 col-sm-3 col-xs-12">
                        <div class="inproduct card">
                            <div class="imageset">
                                @if (empty($memrow->image_pro))
                                    <img class="height165" src="{{ asset('addons/albums/images/User_Circle.png') }}" style="">
                                @else
                                    <img class="height165"
                                         src="{{ asset('addons/albums/images/'.$memrow->image_pro; " style="">
                                @endif
                            </div>
                            <div class="contimg">
                                <h3>{{ $memrow->first_name; {{ $memrow->last_name; </h3>
                                <a href="memberdetail.php?mem_id={{ $memrow->user_id; ">
                                    <button class="btn readmore">View Detail</button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            
            @else 
            @endif

        </div>

    </div>


</section>
@endsection('content')
