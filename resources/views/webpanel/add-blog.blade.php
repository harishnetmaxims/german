@extends('webpanel.include.master')
@section('content')
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> 's Information</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="content-panel">
                    <p align="center"
                       style="color:#F00;">@if(session('msg')) {{ session('msg') }} @endif</p>
                    <form method="post" name="blog_form" id="blog_form" action="{{ route('add-blog') }}" enctype="multipart/form-data">
                        @csrf
                        <ul>
                            <input type="hidden" name="user" value=''>
                            <input type="hidden" name="uid" value=''>
                            <li><strong>Title:</strong><br>
                                <input class="input form-control" type="text" name="title" value=""></li>
                            <li><strong>Description:</strong><br>
                                <input class="input form-control" type="text" name="description" value=""></li>
                            <li><strong>Tags:</strong><br>
                                <input class="input form-control" type="text" name="tags" value="">
                                <div class="upload-video-tags">Enter tag words - more than 1 word, separated by
                                    spaces - (NO COMMAS).<br>
                                    Tags are keywords used to describe your media.
                                </div>
                            </li>
                            <li><strong>Category:</strong><br>
                                <select class="input form-control" name="category" value="">
                                  @foreach($resultcc as $rowcat)
                                    <option value="{{ $rowcat->category_id }}">{{ $rowcat->category_name }}</option>
                                  @endforeach    
                                </select>
                            </li>

                            <li><strong>Allow replies:</strong><br>
                                <select class="input form-control" name="allow_replies">
                                    <option value="no">No</option>
                                    <option value="yes" selected="selected">Yes</option>
                                </select></li>

                            <li><strong>Allow ratings:</strong><br>
                                <select class="input form-control" name="allow_rating">
                                    <option value="no">No</option>
                                    <option value="yes" selected="selected">Yes</option>
                                </select></li>

                            <li><strong>Public / Private:</strong><br>
                                <select class="input form-control" name="private_pub">
                                    <option value="private">Private</option>
                                    <option value="public" selected="selected">Public</option>
                                </select></li>

                            <li><strong>Approval:</strong><br>
                                <select class="input form-control" name="approved">
                                    <option value="yes" selected="selected">Yes</option>
                                    <option value="pendingdelete">Pendingdelete</option>
                                </select></li>

                            <li><strong>Blog Story:</strong><br>
                                <textarea class="form-control summernote" name="story" value=""></textarea>
                            </li>


                            <li><strong>Blog Image:</strong><br>
                                <input type="file" name="image" id="profile-img" class="input form-control"><br>
                                <img src="" id="profile-img-tag" width="100px"/>

                                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                                <script type="text/javascript">
                                  function readURL(input) {
                                    if (input.files && input.files[0]) {
                                      var reader = new FileReader();

                                      reader.onload = function (e) {
                                        $('#profile-img-tag').attr('src', e.target.result);
                                      }
                                      reader.readAsDataURL(input.files[0]);
                                    }
                                  }

                                  $("#profile-img").change(function () {
                                    readURL(this);
                                  });
                                </script>
                            </li>


                            <li>
                                <input type="submit" class="button-form" value="Submit Article"
                                       name="blog_post">

                            </li>

                        </ul>
                    </form>


                </div>
            </div>
        </div>
    </section>
@endsection('content')