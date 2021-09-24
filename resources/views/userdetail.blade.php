@extends('include.master')
@section('content')
<section class="headinner">
    <div class="container">
        <h3>Video</h3>
        <div class="breadcom">
            <a href="">Home</a><span> >  {{ $userdet->first_name }}</span>
        </div>
    </div>
</section>


<section class="showdetail">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xs-12">
                <div class="leftconta">
                    @if ($sgaldet->video_id)
                        <div class="carousel-container">

                            <!-- Sorry! Lightbox doesn't work - yet. -->

                            <div id="" class="slide" data-ride="carousel">
                                <div class="carousel-inner">


                                    <div class="videadimg">


                                    </div>
                                    <div class="descript">
                                        <h3>{{ utf8_decode($sgaldet->title) }}</h3>
                                        <p>{{ utf8_decode($sgaldet->description) }}</p>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- /row -->
                    @endif
                    <form action="" method="post">
                        <div class="member_info">
                            <div>
                                <h4 class="display_name">{{ utf8_decode($userdet->first_name) }}{{ utf8_decode($userdet->last_name) }}</h4>
                            </div>
                            <div id="Ajax-Aboutme">
                                <table width="100%">
                                    <tr>
                                    <tr>
                                        <td colspan="2" align="right" style="padding:20px;"><a
                                                    href="{{ url('update-profile') }}">Update Profile</a></td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <td width="40%" align="left" valign="top">
                                            @if ($userdet->image_pro) <img
                                                src="{{ asset('images/'.$userdet->image_pro) }}"
                                                style="width:300px;" />
                                            @else 
                                                <img src="{{ asset('addons/albums/images/User_Circle.png') }}"/>
                                            @endif

                                        </td>
                                        <td width="60%" align="left" valign="top">
                                            <table width="100%">
                                                <tr>
                                                    <td width="40%" style="font-weight:bold">Address:</td>
                                                    <td width="60%">{{ $userdet->address }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold">Directions:</td>
                                                    <td>{{ $userdet->directions }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold">City:</td>
                                                    <td>{{ $userdet->current_city }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold">State:</td>
                                                    <td>{{ $userdet->state }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold">Zip Code:</td>
                                                    <td>{{ $userdet->zip_code }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold">Country:</td>
                                                    <td>{{ $userdet->country }}</td>
                                                </tr>

                                                <tr>
                                                    <td style="font-weight:bold">Established Date:</td>
                                                    <td>{{ $userdet->established }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold">Operating Hours:</td>
                                                    <td>{{ $userdet->hours }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold">Work Telephone:</td>
                                                    <td>{{ $userdet->work_tel }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold">Cell Telephone:</td>
                                                    <td>{{ $userdet->cell_tel }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold">Email:</td>
                                                    <td>@if ($userdet->hideemail == '1') {{ $userdet->email_address }}@else Hide @endif</td>
                                                </tr>

                                                <tr>
                                                    <td style="font-weight:bold">Title:</td>
                                                    <td>{{ $userdet->account_type }}</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>

                            </div>


                        </div>


                        <div class="member_info">
                            <div><h4 class="display_name">About us</h4></div>
                            <div id="Ajax-Aboutme">
                                {{ utf8_decode($userdet->about_me) }}
                            </div>


                        </div>
                    </form>
                </div> <!-- /container -->
            </div>

            <div class="col-lg-4 col-xs-12">
                <div class="userright">
                    <div class="rigtshap">
                        <h3>Upload</h3>
                        <a href="{{ url('membervideo/'.$uname) }}">Videos ({{ $iNumVideos }}) </a><span>|</span> <a
                                href="{{ url('gallery') }}">Pictures ({{ $iNumImg }})</a>
                    </div>
                    <div class="related_media">


                        <div id="Ajax-Media">
                            <div style="float:left;">

                                @if ($iNumVideos1 > 0)
                                 

                                    <ul>    @foreach($uresultvid1 as $sgaldet1)
                                            <li class="related_media_thumb">
                                                <a class="popup-info_flipped"
                                                   href="{{ url('playvideo/'.$sgaldet1->indexer) }}">

                                                    <!--Thumb Overlay Title-->
                                                    <div class="related_media_title">{{ $sgaldet1->title }}</div>

                                                    <!--Thumb Overlay Duration-->
                                                    <div class="related_media_duration">{{ $sgaldet1->video_length }}</div>

                                                    <img src="{{ asset('uploads/player_thumbs/'.$sgaldet1->video_id.'.jpg') }}">

                                                    <div class="related_description">
                                                        <div class="related_view_count">
                                                            {{ $sgaldet1->number_of_views }}
                                                            Views<br/>{{ utf8_decode(trim(strip_tags(substr(strip_tags($sgaldet1->description), 0, 50)))) }}
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                        <li style="text-align:right;"><a href="{{ url('membervideo/'.$uname) }}">More
                                                Video >></a></li>
                                    </ul>
                                @endif


                            </div>

                        </div>

                        <div class="clear-fix"></div>

                    </div>

                </div>
            </div>


        </div>
    </div>
</section>

@include('include.newsletter-form')    
<script type="text/javascript">
  $('#myCarousel').carousel({
    interval: false
  });
  $('#carousel-thumbs').carousel({
    interval: false
  });

  // handles the carousel thumbnails
  // https://stackoverflow.com/questions/25752187/bootstrap-carousel-with-thumbnails-multiple-carousel
  $('[id^=carousel-selector-]').click(function () {
    var id_selector = $(this).attr('id');
    var id = parseInt(id_selector.substr(id_selector.lastIndexOf('-') + 1));
    $('#myCarousel').carousel(id);
  });
  // when the carousel slides, auto update
  $('#myCarousel').on('slide.bs.carousel', function (e) {
    var id = parseInt($(e.relatedTarget).attr('data-slide-number'));
    $('[id^=carousel-selector-]').removeClass('selected');
    $('[id=carousel-selector-' + id + ').addClass('selected');
  });
  // when user swipes, go next or previous
  $('#myCarousel').swipe({
    fallbackToMouseEvents: true,
    swipeLeft: function (e) {
      $('#myCarousel').carousel('next');
    },
    swipeRight: function (e) {
      $('#myCarousel').carousel('prev');
    },
    allowPageScroll: 'vertical',
    preventDefaultEvents: false,
    threshold: 75
  });
  /*
  $(document).on('click', '[data-toggle="lightbox', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
  });
  */

  $('#myCarousel .carousel-item img').on('click', function (e) {
    var src = $(e.target).attr('data-remote');
    if (src) $(this).ekkoLightbox();
  });
</script>

@endsection
