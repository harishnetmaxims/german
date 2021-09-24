@extends('webpanel.include.master')
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Logo's Information</h3>

            <div class="row">

                <div class="col-md-12">
                    <div class="content-panel">
                        <p align="center"
                           style="color:#F00;"></p>

                        <form method="post" action="" enctype="multipart/form-data">
                            @csrf
                            <ul>
                                <input type="hidden" name="user" value=''>
                                <input type="hidden" name="uid" value=''>
                                <li><strong>Active Type:</strong><br>
                                    <select name="logo_active" size="1" tabindex="1" class="input form-control" value="">
                                        <option value="Image" {{ ($imgdet->active_type == 'Image') ? "selected": "" }} >
                                            Image
                                        </option>
                                        <option value="Text" {{ ($imgdet->active_type == 'Text') ? "selected":"" }}>
                                            Text
                                        </option>

                                    </select><br>
                                </li>

                                <li><strong>Logo Text:</strong><br>
                                    <input type="text" name="logo_text" size="1" tabindex="1" class="input form-control"
                                           value="{{ $imgdet->logo_text }}">

                                </li>


                                <span id="hidenewalbum"><li></li></span>

                                <li><h2>Select your image Logo (232*72px)</h2></li>

                                <input type="file" name="image" id="profile-img"/><br>
                                <img src="{{url('storage/addons/albums/images/'.$imgdet->logo_image) }}"
                                     id="profile-img-tag" width="100px" value="{{ $imgdet->logo_image }}"/>

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
                                    <div style="margin-left:100px;">
                                        <input type="submit" name="upload_button" value="Upload Logo"
                                               class="btn btn-theme"></div>

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
