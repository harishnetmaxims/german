@extends('include.master')
@section('content')
<section class="headinner">
    <div class="container">
        <h3>Add Owner</h3>
        <div class="breadcom">
            <a href="">Home</a><span> > </span> <a href="">Add Owner</a>
        </div>
    </div>
</section>

<section class="addpadigry padding">
    <div class="container">
        <div class="form">

            <h3>Create Owner</h3>

            <form method="post" name="bree_form" id="bree_form" action="" enctype="multipart/form-data">
                @csrf
                <ul>
                    <input type="hidden" name="uid" value="{{ session('user_id') }}">
                    <li><strong>Title:</strong><br>
                        <input class="input form-control" type="text" name="title" value=""></li>

                    <li><strong>Description:</strong><br>
                        <textarea name="description" id="description" class="input form-control" rows="10"></textarea>
                    </li>

                    <li><strong>Public / Private:</strong><br>
                        <select class="input form-control" name="private_pub">
                            <option value="private">Private</option>
                            <option value="public" selected="selected">Public</option>
                        </select></li>

                    <li><strong>Owner Image:</strong>
                    <li>
                        <label for="imageUpload" class="btn btn-primary btn-block btn-outlined">Upload Picture</label>
                        <input type="file" id="imageUpload" accept="image/*" style="display: none" name="image"><br/>
                        <img src="" id="profile-img-tag" width="100px"/>
                    </li>

                    <li>
                        <input type="submit" class="button-form" value="Create Owner" name="bree_post">

                    </li>

                </ul>
            </form>

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

        </div>
    </div>
</section>

@include('include.newsletter-form')
@endsection
<script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/froala-editor@3.0.0-beta.1/js/froala_editor.pkgd.min.js"></script>
<script>
  new FroalaEditor('#froala-editor', {
    // Set the file upload URL.
    imageUploadURL: 'images/blog/upload_image.php',

    imageUploadParams: {
      id: 'my_editor'
    }
  })
</script>


