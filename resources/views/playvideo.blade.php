@extends('include.master')
@section('content')
<section class="headinner">
    <div class="container">
        <h3>Video</h3>
        <div class="breadcom">
            <a href="">Home</a><span> > </span> <a href="">{{ utf8_encode($sgaldet->title) }}</a>
        </div>
    </div>
</section>


<section class="showdetail">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xs-12 ">
                <div class="leftconta">
                    <div class="carousel-container">

                        <!-- Sorry! Lightbox doesn't work - yet. -->

                        <div id="" class="slide" data-ride="carousel">
                            <div class="carousel-inner">
                                


                                <div class="descript">
                                    <h3>{{ utf8_encode($sgaldet->title) }}</h3>
                                    <p>{{ utf8_encode($sgaldet->description) }}</p>
                                </div>
                            </div>
                        </div>

                    </div> <!-- /row -->
                    <div class="optionset">
                        
                        <div id="comments" class="comments-area xs-comments-area">
                            @if(session('msg'))
                                <div align="center" style="color:#FF0000">session('msg')</div>
                            @endif
                            <h4 class="comments-title">Comments</h4>
                            <ul class="comments-list">
                                @foreach($resultcom as $rowcom)
                                    <li class="comment" style="min-height:150px;">
                                        <a href="{{ url('memberdetail/'.$rowcom->user_id) }}">
                                            @if($rowcom->image_pro)
                                                <img src="{{ asset('images/'.$rowcom->image_pro) }}"
                                                     alt="commentor avatar image" draggable="false" align="left"
                                                     style="margin-right:10px;width:120px;border:solid 1px #CCCCCC">
                                            @else 
                                                <img src="{{ asset('webpanel/assets/img/ui-sam.jpg') }}"
                                                     alt="commentor avatar image" draggable="false" align="left"
                                                     style="margin-right:10px;width:120px;border:solid 1px #CCCCCC">
                                            @endif
                                        </a>
                                        <a href="{{ url('memberdetail/'.$rowcom->user_id) }} ">{{ $rowcom->by_username }}</a><br/>
                                        <span class="comment-date"
                                              style="font-size:11px;font-style:italic;">{{ $rowcom->todays_date }}</span><br/>

                                        {{ $rowcom->comments }}
                                     </li>

                                  @endforeach
                                
                            </ul>
                        </div>

                        <div id="respond" class="comment-respond">
                            <form action="{{ route('vid-comment') }}" method="POST" class="xs-form" id="comment-form">
                                @csrf
                                <h4 class="comment-reply-title">Leave a comment</h4>
                                <input type="hidden" name="user" value='{{ session("name") }}'>
                                <input type="hidden" name="uid" value='{{ session("id") }}'>
                                <input type="hidden" name="vid" value='{{ $sgaldet->indexer }}'>
                                <input type="hidden" name="actual_link" value='{{ $actual_link }}'>
                                <div class="row">

                                </div>
                                <textarea name="comments" placeholder="Comments" class="form-control message-box"
                                          cols="30" rows="10"></textarea>
                                <p class="form-submit">
                                    <input name="post-comment" type="submit" class="xs-btn" value="LEAVE COMMENT">
                                </p>

                            </form>
                        </div>
                    </div>

                </div> <!-- /container -->
            </div>

            <div class="col-lg-4 col-xs-12">
                <div class="rightshow">
                    <h3>Browse Video</h3>
                    <ul>
                        <li>
                            <a href="{{ url('video-gallery') }}">All Video</a>
                        </li>
                        <li>
                            <a href="{{ url('manage-videos') }}">Your Videos</a>
                        </li>

                    </ul>
                </div>
            </div>


        </div>
    </div>
</section>


<section>
    <div class="newesletter">
       @include('include.newsletter-form')  
    </div>
</section>
@endsection

