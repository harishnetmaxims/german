@extends('webpanel.include.master')
@section('content')
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i> Owner's Information</h3>

                <div class="row">


                    <div class="col-md-12">
                        <div class="content-panel">
                            <p align="center"
                               style="color:#F00;">@if(session('msg')) {{ session('msg') }} @endif</p>


                            <form method="post" name="blog_form" id="blog_form" action="{{ route('add-owner') }}" enctype="multipart/form-data">
                                @csrf    
                                <ul>
                                    <input type="hidden" name="uid" value="{{ session('id') }}">
                                    <li><strong>Title:</strong><br>
                                        <input class="input form-control" type="text" name="group_name" value=""></li>

                                    <li><strong>Public / Private:</strong><br>
                                        <select class="input form-control" name="private_pub">
                                            <option value="private">Private</option>
                                            <option value="public" selected="selected">Public</option>
                                        </select></li>


                                    <li><strong>Description:</strong><br>
                                        <textarea class="form-control summernote" name="group_description"
                                                  value=""></textarea>
                                    </li>


                                    <li><strong>Owner Image:</strong><br>
                                        <label for="imageUpload" class="btn btn-primary btn-block btn-outlined">Uplaod
                                            Owner Image</label>
                                        <input type="file" id="imageUpload" accept="image/*" style="display: none"
                                               name="image"><br/>
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

                                          $("#imageUpload").change(function () {
                                            readURL(this);
                                          });
                                        </script>
                                    </li>
                                    </br>


                                    <li>
                                        <input type="submit" class="btn btn-theme" value="Add Owner" name="blog_post">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                                    </li>

                                </ul>
                            </form>


                        </div>
                    </div>
                </div>
            </section>
@endsection('content')