@extends('webpanel.include.master')
@section('content')
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i>'s Information</h3>

                <div class="row">

                    <div class="col-md-12">
                        <div class="content-panel">
                            <p align="center"
                               style="color:#F00;">@if(session('msg')) {{ session('msg') }} @endif</p>


                            <form method="post" action="{{ route('add-picture') }}" enctype="multipart/form-data">
                                @csrf
                                <ul>
                                    <li><h2>Step 1: Select or create a photo album</h2></li>
                                    <input type="hidden" name="user" value=''>
                                    <input type="hidden" name="uid" value=''>
                                    <li><strong>Your Albums:</strong> <em>Select from one of your albums.</em><br>
                                        <select name="album_id" size="1" tabindex="1" class="input form-control" value="">
                                            @foreach($image_galleries as $rowcat)
                                                <option value="{{ $rowcat->gallery_id }}">
                                                    {{ $rowcat->gallery_name }}</option>
                                            @endforeach
                                        </select><br>
                                    </li>

                                    <li style="margin-bottom:2px;">
                                        <div id="photoalbum">
                                            <a href="#myModal" role="button" class="btn" data-toggle="modal">Create New
                                                Album</a>
                                        </div>
                                    </li>


                                    <span id="hidenewalbum"><li></li></span>

                                    <li><h2>Step 2: Select your image files</h2></li>

                                    <li><strong>Please Note: Image files must be jpg, gif, or png - Min Image Size: 5kb
                                            - Max Image Size: 2000kb's.</strong></li>

                                    <li><input type="file" name="image" size="50" tabindex="11"
                                               class="special_file input form-control" multiple></li>


                                    <div id="show_upload" style="visibility:hidden">
                                        <p align="center">Please Wait...&nbsp;&nbsp;
                                            <img src="{{ asset('themes/eclipse/images/icons/images_loading.gif') }}"></p>
                                    </div>

                                    <li class="submit" style="width:98%;">
                                        <input type="button" name="reset_button" value="Reset" tabindex="14"
                                               class="button-form">
                                        &nbsp;&nbsp;&nbsp;
                                        <input type="submit" name="upload_button" value="Upload New Image"
                                               class="button-form">
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