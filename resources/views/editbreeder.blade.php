@extends('include.master')
@section('content')
<section class="headinner">
    <div class="container">
        <h3>Update Breeder</h3>
        <div class="breadcom">
            <a href="">Home</a><span> > </span> <a href="">Update Breeder</a>
        </div>
    </div>
</section>

<section class="addpadigry padding">
    <div class="container">
        <div class="form">
            
            <h3>Update Breeder</h3>

            <form method="post" name="bree_form" id="bree_form" action="" enctype="multipart/form-data">
                @csrf
                <ul>

                    <li><strong>ID:</strong><br>
                        <input class="input form-control" type="text" name="breeder_id"
                               value="{{ utf8_decode($breedet->breeder_id) }}" disabled="disabled"></li>

                    <li><strong>Title:</strong><br>
                        <input class="input form-control" type="text" name="title"
                               value="{{ utf8_decode($breedet->group_name) }}"></li>

                    <li><strong>Description:</strong><br>
                        <textarea name="description" id="description" class="input form-control"
                                  rows="10">{{ utf8_decode($breedet->group_description) }}</textarea>
                    </li>


                    <li><strong>Public / Private:</strong><br>
                        <select class="input form-control" name="private_pub">
                            <option value="private" {{ ($breedet->public_private == 'private') ? 'selected="selected"': '' }}>
                                Private
                            </option>
                            <option value="public" {{ ($breedet->public_private == 'public') ? 'selected="selected"':'' }}>
                                Public
                            </option>
                        </select></li>

                    <li><strong>Owner Image:</strong><br>
                        @if ($breedet->image_pro) 
                            <img src="{{ url('storage/uploads/thumbs/'.$breedet->image_pro) }}" id="profile-img-tag" width="100px" />
                        @else 
                        <img src="" id="profile-img-tag" width="100px"/>
                        @endif
                    </li>

                    <li>

                        <label for="imageUpload" class="btn btn-primary btn-block btn-outlined">Upload Picture</label>
                        <input type="file" id="imageUpload" accept="image/*" style="display: none" name="image">
                    </li>

                    <li>
                        <input type="submit" class="button-form" value="Create Breeder" name="bree_post">

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


