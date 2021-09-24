@extends('webpanel.include.master')
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> {{ $blogdet->category_name }}'s Information</h3>

            <div class="row">


                <div class="col-md-12">
                    <div class="content-panel">
                        <p align="center"
                           style="color:#F00;">@if(session('msg')) {{ session('msg') }} @endif</p>

                        <form method="post" name="blog_form" id="blog_form" action="" enctype="multipart/form-data">
                            @csrf
                            <ul>
                                <input type="hidden" name="uid" value='{{ $blogdet->category_id }}'>
                                <li><strong>Title:</strong><br>
                                    <input class="input form-control" type="text" name="title"
                                           value="{{ $blogdet->category_name }}"></li>

                                    <input type="hidden" id="csrf" name="_token" value="<?php echo csrf_token(); ?>">
                                <li>
                                    <input type="submit" class="btn btn-theme" value="Submit Category" name="blog_post">

                                </li>

                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </section>
</section>
@endsection('content')