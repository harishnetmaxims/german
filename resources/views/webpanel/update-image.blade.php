@extends('webpanel.include.master')
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> {{ $viddet->gallery_name }}'s Information</h3>

            <div class="row">


                <div class="col-md-12">
                    <div class="content-panel">
                        <p align="center"
                           style="color:#F00;">@if(session('msg')) {{ session('msg') }} @endif</p>

                        <form method="post" action="" enctype="multipart/form-data">
                            @csrf
                            <ul>
                                <li><h2>Step 1: Select a photo album</h2></li>
                                <input type="hidden" name="user" value=''>
                                <input type="hidden" name="uid" value=''>
                                <li><strong>Your Albums:</strong> <em>Select from one of your albums.</em><br>
                                    <select name="album_id" size="1" tabindex="1" class="input form-control" value="">
                                      @foreach($resultcc as $rowcat)
                                        <option value="{{ $rowcat->gallery_id }}" {{ ($viddet->gallery_id == $rowcat->gallery_id) ? "selected" : $rowcat->gallery_name }}>{{ $rowcat->gallery_name }}</option>
                                      @endforeach
                                    </select><br>
                                </li>

                                <span id="hidenewalbum"><li></li></span>

                                <li><h2>Step 2: Select your image files</h2></li>

                                <li><strong>Please Note: Image files must be jpg, gif, or png - Min Image Size: 5kb -
                                        Max Image Size: 2000kb's.</strong></li>

                                <input type="file" name="image" id="profile-img" class="input form-control"/><br>
                                <img src="{{ url('storage/addons/albums/images/'.$viddet->image_id) }}"
                                     id="profile-img-tag" width="100px" value="{{ $viddet->image_id }}"/>

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

                                <li class="submit">
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
<script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/froala-editor@3.0.0-beta.1/js/froala_editor.pkgd.min.js"></script>

<script>
  new FroalaEditor('#froala-editor', {
    // Set the file upload URL.
    imageUploadURL: 'assets/img/page-edit/upload_image.php',

    imageUploadParams: {
      id: 'my_editor'
    }
  })
</script>


