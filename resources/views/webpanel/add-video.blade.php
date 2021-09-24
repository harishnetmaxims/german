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


                            <form name="form_upload" action="" method="post" enctype="multipart/form-data">
                                @csrf
                                <ul>

                                    <input type="hidden" name="user" value=''>
                                    <input type="hidden" name="uid" value=''>

                                    <li><strong>Title:</strong>
                                        <br>
                                        <input class="input form-control" name="title" type="text" value="">
                                    </li>

                                    <li><strong>Description:</strong>
                                        <br>
                                        <textarea class="input form-control summernote" name="description"
                                                  value=""></textarea>
                                    </li>

                                    <li><strong>Tags:</strong>
                                        <br>
                                        <input class="input form-control" name="tags" type="text" value="">
                                        <div class="upload-video-tags">Enter tag words - more than 1 word, separated by
                                            spaces - (NO COMMAS).
                                            <br> Tags are keywords used to describe your media.
                                        </div>
                                    </li>

                                    <li><strong>Select Category:</strong>
                                        <br>
                                        <select id="category" class="input form-control" size="1" name="channel">
                                            <option value="">Select Category</option>
                                            
                                            @foreach($resultc as $rowcat) 
                                                <option value="{{ $rowcat->channel_id }}">{{ $rowcat->channel_name }}</option>
                                            @endforeach
                                        </select></li>

                                    <li><strong>Select SubCategory:</strong>
                                        <br>
                                        <select id="sub_category" class="input form-control" value="" size="1"
                                                name="subchannel">

                                        </select></li>

                                    <li><strong>Video:</strong><br>
                                        <input type="file" name="image" value="" class="input form-control"><br>


                                    </li>


                                    <li>
                                        <!--<div id="options"><a style="cursor:pointer;">Show Optional Info</a>, or</div>-->
                                        <!--<br>-->
                                        <div class="submit">
                                            <input type="submit" class="yelsubmit" value="Continue to Upload >>"
                                                   name="video_upload">
                                        </div>
                                    </li>


                                </ul>
                            </form>


                        </div>
                    </div>
                </div>
            </section>

        </section>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#category').on('change', function () {
          var category_id = this.value;
          $.ajax({
            url: "../function/get_subcat.php",
            type: "POST",
            data: {
              category_id: category_id
            },
            cache: false,
            success: function (dataResult) {
              $("#sub_category").html(dataResult);
            }
          });


        });
      });
    </script>
@endsection('content')