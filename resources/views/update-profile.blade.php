@extends('include.master')
@section('content')

<link href="{{ asset('webpanel/assets/editor/css/summernote.css') }}" rel="stylesheet">
<link href="{{ asset('webpanel/assets/editor/css/font-awesome.css') }}" rel="stylesheet">
<section class="headinner">
    <div class="container">
        <h3>Update Profile</h3>
        <div class="breadcom">
            <a href="">Home</a><span> > </span> <a href="">Update Profile</a>
        </div>
    </div>
</section>

<section class="addpadigry padding">
    <div class="container">
        <div class="form">

            <h3>Update Profile</h3>

            <form method="post" name="bree_form" id="bree_form" action="{{ route('update-user-profile') }}" enctype="multipart/form-data">
                <input type="hidden" name="cimage" id="cimage" value="{{ $userdet->image_pro }}"/>
                @csrf
                <ul>

                    <li><strong>First Name:</strong><br><input class="input form-control" type="text" name="first_name"
                                                               value="{{ $userdet->first_name }}"></li>
                    <li><strong>Last Name:</strong><br><input class="input form-control" type="text" name="last_name"
                                                              value="{{ $userdet->last_name }}"></li>

                    <li><strong>Address:</strong><br><input class="input form-control" type="text" name="address"
                                                            value="{{ $userdet->address }}"></li>
                    <li><strong>City:</strong><br><input class="input form-control" type="text" name="current_city"
                                                         value="{{ $userdet->current_city }}"></li>
                    <li><strong>State:</strong><br><input class="input form-control" type="text" name="state"
                                                          value="{{ $userdet->state }}"></li>
                    <li><strong>Zipcode:</strong><br><input class="input form-control" type="text" name="zip_code"
                                                            value="{{ $userdet->zip_code }}"></li>
                    <li><strong>Country:</strong><br><input class="input form-control" type="text" name="country"
                                                            value="{{ $userdet->country }}"></li>


                    <li><strong>Directions:</strong><br><input class="input form-control" type="text" name="directions"
                                                               value="{{ $userdet->directions }}"></li>
                    <li><strong>Established Date:</strong><br><input class="input form-control" type="text"
                                                                     name="established"
                                                                     value="{{ $userdet->established }}">
                    </li>
                    <li><strong>Operating Hours:</strong><br><input class="input form-control" type="text" name="hours"
                                                                    value="{{ $userdet->hours }}"></li>
                    <li><strong>Work Telephone:</strong><br><input class="input form-control" type="text"
                                                                   name="work_tel"
                                                                   value="{{ $userdet->work_tel }}"></li>
                    <li><strong>Cell Telephone:</strong><br><input class="input form-control" type="text"
                                                                   name="cell_tel"
                                                                   value="{{ $userdet->cell_tel }}"></li>
                    <li><strong>Our Website:</strong><br><input class="input form-control" type="text"
                                                                name="personal_website"
                                                                value="{{ $userdet->personal_website }}">
                    </li>


                    <li><strong>Show/Hide Email:</strong><br>
                        <select class="input form-control" name="hideemail" id="hideemail">
                            <option value="">Select</option>
                            <option value="1"  {{ ($userdet->hideemail === '1') ? "selected": "" }}>Show</option>
                            <option value="2" {{ ($userdet->hideemail === '2') ? "selected": "" }}>Hide</option>
                        </select></li>

                    @if ($userdet->image_pro) 
                        <li><strong>Current Profile Image:</strong><br><img src="{{ asset('public/images/'.$userdet->image_pro) }}" style="width:200px;"/></li>
                    @endif        
                    <li><strong>Profile Image:</strong><br>
                        <label for="imageUpload" class="btn btn-primary btn-block btn-outlined">Uplaod Profile
                            Image</label>
                        <input type="file" id="imageUpload" accept="image/*" style="display: none" name="image"><br/>
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

                    <li><strong>About Me:</strong><br><textarea class="form-control summernote"
                                                                name="about_me">{{ $userdet->about_me }}</textarea>
                    </li>
                    <li>
                        <div class="btnradios" style="min-height:100px;">
                            <h5>Want to Add Breeder/Owner Information:</h5>

                            <div class="form-check col-md-6" style="float:left">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="breeder"
                                           value="1" {{ ($userdet->breeder == 1) ? "checked='checked'" : "" }}> Add
                                    Breeder
                                </label>
                            </div>


                            <div class="form-check col-md-6" style="float:left">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="owner"
                                           value="1" {{ ($userdet->owner == 1) ? "checked='checked'" : "" }}> Add
                                    Owner
                                </label>
                            </div>

                        </div>

                    </li>

                    <li>
                        <input type="submit" class="button-form" value="Update Profile" name="bree_post">

                    </li>

                </ul>
            </form>


        </div>
    </div>
</section>
@include('include.newsletter-form')
@endsection


<script src="{{ asset('webpanel/assets/editor/js/jquery.js') }}"></script>
<script src="{{ asset('webpanel/assets/editor/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('webpanel/assets/editor/js/summernote.js') }}"></script>
<script type="text/javascript">

  $(document).ready(function () {

    $('.summernote').summernote({
      height: 200
    });

    $('#submitBtn').click(function () {
      var summernoteContent = $('.summernote').summernote('code');
      $('#result').val(summernoteContent);
    });
  });
</script>
