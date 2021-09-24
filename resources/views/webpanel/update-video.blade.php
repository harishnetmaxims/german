@extends('webpanel.include.master')
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> {{ $viddet->title }}'s Information</h3>

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
                                    <input class="input form-control" name="title" type="text"
                                           value="{{ $viddet->title }}">
                                </li>

                                <li><strong>Description:</strong>
                                    <br>
                                    <textarea class="input form-control summernote" name="description"
                                              value="">{{ $viddet->description }}</textarea>
                                </li>

                                <li><strong>Tags:</strong>
                                    <br>
                                    <input class="input form-control" name="tags" type="text"
                                           value="{{ $viddet->tags }}">
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
                                                <option value="{{ $rowcat->channel_id }}" {{ ($viddet->channel_id == $rowcat->channel_id) ? "selected" : '' }}>{{ $rowcat->channel_name }}</option>
                                        @endforeach    
                                    </select></li>

                                <li><strong>Select SubCategory:</strong>
                                    <br>
                                    <select id="sub_category" class="input form-control" value="" size="1"
                                            name="subchannel">
                                        @foreach($resultcs as $rowcats)
                                            <option value="{{ $rowcats->sub_channel_id }}" {{ ($viddet->sub_channel_id == $rowcats->sub_channel_id)  ? "selected" : '' }}>{{ $rowcats->sub_channel_name }}</option>
                                        @endforeach
                                    </select></li>

                                <li><strong>Approval:</strong><br>
                                    <select class="input form-control" name="approved">
                                        <option value="yes">Yes</option>
                                        <option value="pendingdelete" selected="selected">Pendingdelete</option>
                                    </select></li>


                                <li><strong>Video:</strong><br>
                                    
                                    {{ $viddet->video_id }}.{{ $viddet->type }}
                                    <input type="file" name="image" value="" class="input form-control"/><br>

                                </li>


                                <li>
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

<script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/froala-editor@3.0.0-beta.1/js/froala_editor.pkgd.min.js"></script>
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