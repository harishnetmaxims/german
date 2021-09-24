@extends('webpanel.include.master')
@section('content')
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Breeder's Information</h3>

				<div class="row">



                  <div class="col-md-12">
                      <div class="content-panel">
                      <p align="center" style="color:#F00;">@if(session('msg')) {{ session('msg') }} @endif</p>

            
            <form method="post" name="blog_form" id="blog_form" action="" enctype="multipart/form-data">
              @csrf
         <ul>
            <input type="hidden" name="user_id" value='{{ $blogdet->indexer }}'>
             <input type="hidden" name="uid" value='{{ $blogdet->admin_id }}'>

            <li><strong>ID:</strong><br>
                <input class="input form-control" type="text" name="breeder_id" value="{{ utf8_decode($blogdet->breeder_id) }}" disabled="disabled"></li>

            <li><strong>Title:</strong><br>
                <input class="input form-control" type="text" name="group_name" value="{{ utf8_encode($blogdet->group_name) }}"></li>

            <li><strong>Public / Private:</strong><br>
                <select class="input form-control" name="private_pub">
                    <option value="private">Private</option>
                    <option value="public" selected="selected">Public</option>
                </select></li>


              <li><strong>Description:</strong><br>
                 <textarea  class="form-control summernote"  name="group_description" value="">{{ utf8_encode($blogdet->group_description) }}</textarea>
                 </li>


                <li><strong>Breeder Image:</strong><br>
                 <label for="imageUpload" class="btn btn-primary btn-block btn-outlined">Uplaod Breeder Image</label>
                    <input type="file" id="imageUpload" accept="image/*" style="display: none" name="image"><br />

   @if($blogdet->image_pro) <img src="{{ url('storage/uploads/thumbs/'.$blogdet->image_pro) }}" id="profile-img-tag" width="100px" /> @else
   <img src="" id="profile-img-tag" width="100px" />
   @endif



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
                                        $("#imageUpload").change(function(){
                                            readURL(this);
                                        });
                                    </script>
                 </li> </br>



             <li>
               <input type="submit" class="btn btn-theme" value="Update Breeder" name="blog_post">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <a href="manage-breeder.php?id={{ $blogdet->indexer }}">
                                    <button type="button" class="btn btn-theme" onClick="return confirm('Are you sure you want to delete breeder {{ $blogdet->group_name }}');">Delete Breeder</button></a>

             </li>

         </ul>
         </form>
 </div>
                  </div>
              </div>
		</section>

      </section></section>
@endsection('content')