@extends('webpanel.include.master')
@section('content')
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i> German Shepherd Pedigree Information</h3>

                <div class="row">


                    <div class="col-md-12">
                        <div class="content-panel">
                            <p align="center"
                               style="color:#F00;">@if(session('msg')) {{ session('msg') }} @endif</p>

                            <form name="add" action="{{ route('add-pedigree') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <ul>

                                    <li class="span3">
                                        <h3>Basic Information</h3>
                                        <hr>
                                    </li>
                                    <li style="" class="span3">
                                        <div class="row">
                                            <div class="col-lg-4">
                            <span>
            <label>Category:</label><br>

        <select class="form-control" value="" name="cat">

            @foreach ( $cat  as $c)
                <option value=" {{$c->channel_id}}">
                    {{$c->channel_name}}
                </option>
            @endforeach

        </select>
       </span>
                                            </div>
                                            <div class="col-lg-4">
        <span>
      <label>Breeder:</label><br>

<select class="form-control" value="" name="breeder">
    <option value="">Please Select a Breeder</option>
            @foreach ( $breeder  as $breed)
                                    <option value=" {{$breed->breeder}}">
                                        {{$breed->user_name}}
                                    </option>
                                @endforeach
</select>
          </span>
                                            </div>
                                            <div class="col-lg-4">
            <span>
            <label>Owner:</label><br>

<select class="form-control" value="" name="owner">
  <option value="">Please Select an Owner</option>
            @foreach ( $owner  as $owner)
                                <option value=" {{$owner->owner}}">
                                    {{$owner->user_name}}
                                </option>
                            @endforeach
</select>

          </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li style="">
                                        <label>Regcode #1:</label><br>
                                        <div class="row">
                                            <div class="col-lg-6">
           <span>

            <input class="input form-control" name="redcode1" id="reg1" type="text" value="">
          </span>
                                                <div class="container d-xs-none">
                                                    <div id="displayrag" style="color:#FF0000"></div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
          <span>

           <?php /*?> <select class="form-control narrow" value="" name="c1" >

              <option value="">Please Select </option>
            <?php
		    $sqlc1 = "Select DISTINCT c1 from pd_entries";
            $resultc1 = mysqli_query($con, $sqlc1);
            if (mysqli_num_rows($resultc1) > 0) {
            while($rowc1 = mysqli_fetch_assoc($resultc1)) {
                    ?>
             <option value="<?php echo $rowc1["c1"] ?>"><?php echo $rowc1["c1"] ?></option>
            <?php } } ?>
            </select><?php */ ?>

             <select class="form-control narrow" value="" name="reg1value">
            <option value="">Please Select an Option </option>
            @foreach ( $registry  as $reg)
                                    <option value=" {{$reg->title}}">
                                        {{$reg->title}}
                                    </option>
                                @endforeach

            </select>
          </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li style="">
                                        <label>Regcode #2 (optional):</label><br>
                                        <div class="row">
                                            <div class="col-lg-6">
              <span>

            <input class="input form-control" name="regcode2" type="text" value="">
          </span>
                                            </div>
                                            <div class="col-lg-6">
            <span>

           <?php /*?> <select class="form-control narrow" name="c2" >
              <option value="">Please Select </option>
            <?php
		    $sqlc1 = "Select DISTINCT c1 from pd_entries";
            $resultc1 = mysqli_query($con, $sqlc1);
            if (mysqli_num_rows($resultc1) > 0) {
            while($rowc1 = mysqli_fetch_assoc($resultc1)) {
                    ?>
             <option value="<?php echo $rowc1["c1"] ?>"><?php echo $rowc1["c1"] ?></option>
            <?php } } ?>
            </select><?php */ ?>

             <select class="form-control narrow" name="reg2vaue">
            <option value="">Please Select an Option </option>
            @foreach ( $registry  as $reg)
                                    <option value=" {{$reg->title}}">
                                        {{$reg->title}}
                                    </option>
                                @endforeach

            </select>

          </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li style="">
                                        <div class="row">
                                            <div class="col-lg-6">
             <span>
            <label>Dog Name:</label><br>
            <input class="input form-control" name="dog_name" type="text" value="">
          </span>
                                            </div>
                                            <div class="col-lg-6">
            <span>
            <label>Kennel Name:</label><br>
            <input class="input form-control" name="kennel_name" type="text" value="">
          </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li style="">
                                        <div class="row">
                                            <div class="col-lg-6">
              <span>
            <label>Father's Regcode:</label><br>
            <input class="input form-control" name="father_name" type="text" value="">
          </span>
                                            </div>
                                            <div class="col-lg-6">
              <span>
            <label>Mother's Regcode:</label><br>
            <input class="input form-control" name="mother_name" type="text" value="">
          </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="span3" style="">
                                        <div class="row">
                                            <div class="col-lg-4">
                            <span>
            <label>Gender:</label><br>
            <select class="form-control" name="gender">
              <option value="">Please Select an Option </option>
<option value="R">Male</option>
<option value="H">Female</option></select>
          </span>
                                            </div>
                                            <div class="col-lg-4">
             <span>
            <label>Title:</label><br>
            <select class="form-control" value="" name="title">
              <option value="">Please Select an Option </option>
            @foreach ( $title  as $kz)
                                <option value=" {{$kz->title}}">
                                    {{$kz->title}}
                                </option>
                            @endforeach
                    </select>
          </span>
                                            </div>
                                            <div class="col-lg-4">
           <span>
            <label>Koer:</label><br>
           <?php /*?> <select class="form-control" name="kork">
              <option value="">Please Select an Option </option>
<option value="1">Kkl 1</option>
<option value="2">Kkl 2</option></select><?php */ ?>


            <select class="form-control" name="koer">
            <option value="">Please Select an Option </option>
            @foreach ( $koer  as $kr)
                                <option value=" {{$kr->title}}">
                                    {{$kr->title}}
                                </option>
                            @endforeach

            </select>
          </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li style="">
                                        <div class="row">
                                            <div class="col-lg-6">
            <span>
            <label>Tattoo:</label><br>
            <input class="input form-control" name="tattoo" type="text" value="">
          </span>
                                            </div>
                                            <div class="col-lg-6">
              <span>
            <label>HDZW:</label><br>
            <input class="input form-control" name="hdzw" type="text" value="">
          </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="span3" style="">
                                        <div class="row">
                                            <div class="col-lg-6">
             <span>
            <label>Hips:</label><br>
            <select class="form-control" name="hips">
              <option value="">Please Select an Option </option>
            @foreach ( $hips  as $hp)
                                <option value=" {{$hp->hdb}}">
                                    {{$hp->hips_desc}}
                                </option>
                                @endforeach
            </select>
          </span>
                                            </div>
                                            <div class="col-lg-6">
           <span>
            <label>Elbow:</label>
            <br>
            <select class="form-control" name="elbow">
              <option value="">Please Select an Option </option>
            @foreach ( $hi_el  as $hi_el)
                              <option value=" {{$hi_el->hdb}}">
                                  {{$hi_el->hips_desc}}
                              </option>
                              @endforeach
            </select>
          </span>
                                            </div>
                                        </div>

                                    </li>
                                    <li style="">
                                        <div class="sm">
                                            <label>Date of Birth:</label>

                                        </div>

                                        <div class="row">

                                            <div class="col-lg-12">
                                                <input class="input form-control" name="dob" type="date" value="">
                                            </div>


                                        </div>
                                    </li>
                                    <li class="span3" style="">
                                        <div class="row">

                                            <div class="col-lg-4">
              <span>
            <label>Micro Chip:</label><br>
            <input class="input form-control" name="micro_chip" type="text" value="">
          </span>
                                            </div>
                                            <div class="col-lg-4">
                            <span>
            <label>DNA:</label><br>
            <input class="input form-control" name="dna" type="text" value="">
          </span>
                                            </div>
                                            <div class="col-lg-4">
           <span>
            <label>Degenerative Myelopathy:</label>
            <br>
            <select class="form-control" name="degenerative">
              <option value="">Please Select an Option </option>
                <option value="1">Clear</option>
                <option value="2">Normal (N/N)</option>
                <option value="3">Carrier (A/N)</option>
                <option value="4">At-Risk (A/A)</option>
</select>
          </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="span3" style="">
                                        <div class="row">

                                            <div class="col-lg-4">
           <span>
            <label>Color:</label><br>
            <input class="input form-control" name="color" type="text" value="">
          </span>
                                            </div>
                                            <div class="col-lg-4">
          <span>
            <label>Class:</label><br>
            <select class="form-control" name="class"><option value="">Please Select an Option </option>
            <option value="VA">VA</option>
            <option value="V">V</option>
            <option value="SG">SG</option>
            <option value="G">G</option>
            </select>
          </span>
                                            </div>
                                            <div class="col-lg-4">
          <span>
            <label>Coat Type:</label><br>
            <select class="form-control" name="coat-type">
                <option value="" selected="selected">Please Select an Option </option>
                <option value="0">Stock Coat (Stockhaar)</option>
                <option value="1">Long Stock Coat (Langstockhaar)</option>
                <option value="2">Long Coat (Langhaar)</option></select>


              </select> </span>
                                            </div>
                                        </div>
                                    </li>


                                    <li class="span3">
                                        <br>
                                        <h3>Koer Information</h3>
                                        <hr>
                                    </li>
                                    <li style="" class="span3">
                                        <div class="row">
                                            <div class="col-lg-6">
     <span>
     <label>Breast Depth:</label><br>
      <input class="input form-control" name="breast_depth" type="text" value="">
      </span>
                                            </div>
                                            <div class="col-lg-6">
        <span>
        <label>Breast width:</label><br>
            <input class="input form-control" name="breast_width" type="text" value="">
          </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li style="" class="span3">
                                        <div class="row">
                                            <div class="col-lg-6">
               <span>
            <label>Height/Withers:</label><br>
            <input class="input form-control" name="height-wi" type="text" value="">
          </span>
                                            </div>
                                            <div class="col-lg-6">
            <span>
            <label>Weight:</label><br>
            <input class="input form-control" name="weight" type="text" value="">
          </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="textarea">
                                        <label>Koer Report (breed certification report in English):</label>
                                        <br>
                                        <textarea name="koer_report" class="input form-control summernote" row="30" style="height: 200px"
                                                  name="koer_report"></textarea>
                                    </li>
                                    <li style="" class="span3">
                            <span>
            <label>Koer Date:</label><br>
            <input class="input form-control" name="height" type="text" name="koer_date" value="">
          </span>
                                        <span>
          </span>
                                    </li>


                                    <li style="" class="span3"><strong><label>Padigree Image:</label></strong><br>
                                        <label for="imageUpload" class="btn btn-primary btn-block btn-outlined">Upload
                                            Picture</label>
                                        <input type="file" id="imageUpload" accept="image/*" style="display: none"
                                               name="image"><br>
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


                                    <?php #NEW CODE ?>

                                    <div style="clear:both"></div>
                                    <li class="span3"><br>
                                        <h3>Health Matters</h3>
                                        <hr>

                                        <div class="col-md-12" style="">
                                            <div class="row">
                                                <div class="col-lg-4"><span><label>Insert Date:</label></span></div>
                                                <div class="col-lg-4"><span><label>Name:</label></span></div>
                                                <div class="col-lg-3"><span><label>Dosage:</label></span></div>
                                            </div>
                                        </div>

                                        <div class="col-md-12" style="">
                                            <div class="input_fields_wrap_hm">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group"><span><input class="input form-control"
                                                                                             name="insert_date_hm[]"
                                                                                             id="insert_date_hm"
                                                                                             type="date"
                                                                                             value=""></span></div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group"><span><input class="input form-control"
                                                                                             name="name_hm[]"
                                                                                             id="name_hm" type="text"
                                                                                             value=""></span></div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group"><span><input class="input form-control"
                                                                                             name="dosage_hm[]"
                                                                                             id="dosage_hm" type="text"
                                                                                             value=""></span></div>
                                                    </div>
                                                    <button style="background-color:green; height:37px;"
                                                            class="add_field_button_hm btn btn-info active">+
                                                    </button>
                                                </div>


                                            </div>
                                        </div>


                                        <div style="clear:both"></div>

                                    <li class="span3"><br/>
                                        <h3>Vaccines</h3>
                                        <hr>
                                    </li>

                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-lg-3"><span><label>Insert Date:</label></span></div>
                                            <div class="col-lg-2"><span><label>Name:</label></span></div>
                                            <div class="col-lg-2"><span><label>Dosage:</label></span></div>
                                            <div class="col-lg-2"><span><label>Date:</label></span></div>
                                            <div class="col-lg-2"><span><label>Type:</label></span></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12" style="">
                                        <div class="input_fields_wrap_vc">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group"><span><input class="input form-control"
                                                                                         name="insert_date_vaccines[]"
                                                                                         id="name_vaccines" type="date"
                                                                                         value=""></span></div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group"><span><input class="input form-control"
                                                                                         name="name_vaccines[]"
                                                                                         id="name_vaccines" type="text"
                                                                                         value=""></span></div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group"><span><input class="input form-control"
                                                                                         name="dosage_vaccines[]"
                                                                                         id="dosage_vaccines"
                                                                                         type="text" value=""></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group"><span><input class="input form-control"
                                                                                         name="due_date_vaccines[]"
                                                                                         id="due_date_vaccines"
                                                                                         type="date" value=""></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group"><span>
     <!--select name="type_vaccines[]" class="input form-control">
     <option value="1">Due date</option>
     <option value="2">End date</option>
     </select-->
     </span></div>
                                                </div>
                                                <button style="background-color:green;"
                                                        class="add_field_button_vc btn btn-info active">+
                                                </button>
                                            </div>
                                        </div>
                                    </div>


                                    <div style="clear:both"></div>
                                    <li class="span3"><br/>
                                        <h3>Rabies</h3>
                                        <hr>
                                    </li>

                                    <div class="col-md-12" style="">
                                        <div class="row">
                                            <div class="col-lg-3"><span><label>Insert Date:</label></span></div>
                                            <div class="col-lg-2"><span><label>Name:</label></span></div>
                                            <div class="col-lg-2"><span><label>Dosage:</label></span></div>
                                            <div class="col-lg-2"><span><label>Date:</label></span></div>
                                            <div class="col-lg-2"><span><label>Type:</label></span></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12" style="">
                                        <div class="input_fields_wrap_rb">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group"><span><input class="input form-control"
                                                                                         name="insert_date_rabies[]"
                                                                                         id="insert_date_rabies"
                                                                                         type="date" value=""></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group"><span><input class="input form-control"
                                                                                         name="name_rabies[]"
                                                                                         id="name_rabies" type="text"
                                                                                         value=""></span></div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group"><span><input class="input form-control"
                                                                                         name="dosage_rabies[]"
                                                                                         id="dosage_rabies" type="text"
                                                                                         value=""></span></div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group"><span><input class="input form-control"
                                                                                         name="due_date_rabies[]"
                                                                                         id="due_date_rabies"
                                                                                         type="date" value=""></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group"><span>
     <!--select name="type_rabies[]" class="input form-control">
     <option value="1">Due date</option>
     <option value="2">End date</option>
     </select-->
     </span></div>
                                                </div>
                                                <button style="background-color:green;"
                                                        class="add_field_button_rb btn btn-info active">+
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="clear:both"></div>


                                    <li class="span3"><br/>
                                        <h3>Deworming</h3>
                                        <hr>
                                    </li>

                                    <div class="col-md-12" style="">
                                        <div class="row">
                                            <div class="col-lg-3"><span><label>Insert Date:</label></span></div>
                                            <div class="col-lg-2"><span><label>Name:</label></span></div>
                                            <div class="col-lg-1"><span><label>Dosage:</label></span></div>
                                            <div class="col-lg-1"><span><label>Weight:</label></span></div>
                                            <div class="col-lg-2"><span><label>Date:</label></span></div>
                                            <div class="col-lg-2"><span><label>Type:</label></span></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12" style="">
                                        <div class="input_fields_wrap_de">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group"><span><input class="input form-control"
                                                                                         name="insert_date_deworming[]"
                                                                                         id="insert_date_deworming"
                                                                                         type="date" value=""></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group"><span><input class="input form-control"
                                                                                         name="name_deworming[]"
                                                                                         id="name_deworming" type="text"
                                                                                         value=""></span></div>
                                                </div>
                                                <div class="col-lg-1">
                                                    <div class="form-group"><span><input class="input form-control"
                                                                                         name="dosage_deworming[]"
                                                                                         id="dosage_deworming"
                                                                                         type="text" value=""></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-1">
                                                    <div class="form-group"><span><input class="input form-control"
                                                                                         name="weight_deworming[]"
                                                                                         id="weight_deworming"
                                                                                         type="text" value=""></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group"><span><input class="input form-control"
                                                                                         name="due_date_deworming[]"
                                                                                         id="due_date_deworming"
                                                                                         type="date" value=""></span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2">
                                                    <div class="form-group"><span>
     <!--select name="type_deworming[]" class="input form-control">
     <option value="1">Due date</option>
     <option value="2">End date</option>
     </select-->
     </span></div>
                                                </div>

                                                <button style="background-color:green;"
                                                        class="add_field_button_de btn btn-info active">+
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                    <div style="clear:both"></div>

                                    <li class="span3"><br/>
                                        <h3>Litters Information</h3>
                                        <hr>
                                    </li>

                                    <div class="col-md-12" style="">
                                        <div class="row">
                                            <div class="col-lg-3"><span><label>Date of Birth:</label></span></div>
                                            <div class="col-lg-3"><span><label>Breeding Partner:</label></span></div>
                                            <div class="col-lg-2"><span><label>Breed Book No.:</label></span></div>
                                            <div class="col-lg-1"><span><label>Breeder:</label></span></div>
                                            <div class="col-lg-1"><span><label>Letter:</label></span></div>
                                            <div class="col-lg-1"><span><label>Males Total:</label></span></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12" style="">
                                        <div class="input_fields_wrap_lt">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group"><span><input class="input form-control"
                                                                                         name="dateofbirth[]"
                                                                                         id="dateofbirth" type="date"
                                                                                         value=""></span></div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group"><span><input class="input form-control"
                                                                                         name="breeding_partner[]"
                                                                                         id="breeding_partner"
                                                                                         type="text" value=""></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group"><span><input class="input form-control"
                                                                                         name="breed_bookno[]"
                                                                                         id="breed_bookno" type="text"
                                                                                         value=""></span></div>
                                                </div>
                                                <div class="col-lg-1">
                                                    <div class="form-group"><span> <input class="input form-control"
                                                                                          name="breederinfo[]"
                                                                                          id="breederinfo" type="text"
                                                                                          value=""></span></div>
                                                </div>
                                                <div class="col-lg-1">
                                                    <div class="form-group"><span><input class="input form-control"
                                                                                         name="letter[]" id="letter"
                                                                                         type="text" value=""></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-1">
                                                    <div class="form-group"><span><input class="input form-control"
                                                                                         name="males_total[]"
                                                                                         id="males_total" type="text"
                                                                                         value=""></span></div>
                                                </div>
                                                <button style="background-color:green; height:37px;"
                                                        class="add_field_button_lt btn btn-info active">+
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="clear:both"></div>

                                    <li class="span3"><br/>
                                        <h3>Shows Detail</h3>
                                        <hr>
                                    </li>

                                    <div class="col-md-12" style="">
                                        <div class="row">
                                            <div class="col-lg-3"><span><label>Show:</label></span></div>
                                            <div class="col-lg-2"><span><label>Country Code:</label></span></div>
                                            <div class="col-lg-2"><span><label>Judge.:</label></span></div>
                                            <div class="col-lg-2"><span><label>Place:</label></span></div>
                                            <div class="col-lg-1"><span><label>Rank:</label></span></div>
                                            <div class="col-lg-1"><span><label>Override:</label></span></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12" style="">
                                        <div class="input_fields_wrap_sd">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group"><span><input class="input form-control"
                                                                                         name="show[]" type="text"
                                                                                         value=""></span></div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group"><span><select name="country[]" class="input form-control"><option value="">Select</option><option value="ABW">ABW</option><option value="AFG">AFG</option><option value="AGO">AGO</option><option value="AIA">AIA</option><option value="ALA">ALA</option><option value="ALB">ALB</option><option value="AND">AND</option><option value="ARE">ARE</option><option value="ARG">ARG</option><option value="ARM">ARM</option><option value="ASM">ASM</option><option value="ATA">ATA</option><option value="ATF">ATF</option><option value="ATG">ATG</option><option value="AUS">AUS</option><option value="AUT">AUT</option><option value="AZE">AZE</option><option value="BDI">BDI</option><option value="BEL">BEL</option><option value="BEN">BEN</option><option value="BFA">BFA</option><option value="BGD">BGD</option><option value="BGR">BGR</option><option value="BHR">BHR</option><option value="BHS">BHS</option><option value="BIH">BIH</option><option value="BLM">BLM</option><option value="BLR">BLR</option><option value="BLZ">BLZ</option><option value="BMU">BMU</option><option value="BOL">BOL</option><option value="BRA">BRA</option><option value="BRB">BRB</option><option value="BRN">BRN</option><option value="BTN">BTN</option><option value="BVT">BVT</option><option value="BWA">BWA</option><option value="BES">BES</option><option value="CAF">CAF</option><option value="CAN">CAN</option><option value="CCK">CCK</option><option value="CHE">CHE</option><option value="CHL">CHL</option><option value="CHN">CHN</option><option value="CIV">CIV</option><option value="CMR">CMR</option><option value="COD">COD</option><option value="COG">COG</option><option value="COK">COK</option><option value="COL">COL</option><option value="COM">COM</option><option value="CPV">CPV</option><option value="CRI">CRI</option><option value="CUB">CUB</option><option value="CUW">CUW</option><option value="CXR">CXR</option><option value="CYM">CYM</option><option value="CYP">CYP</option><option value="CZE">CZE</option><option value="DEU">DEU</option><option value="DJI">DJI</option><option value="DMA">DMA</option><option value="DNK">DNK</option><option value="DOM">DOM</option><option value="DZA">DZA</option><option value="ECU">ECU</option><option value="EGY">EGY</option><option value="ERI">ERI</option><option value="ESH">ESH</option><option value="ESP">ESP</option><option value="EST">EST</option><option value="ETH">ETH</option><option value="FIN">FIN</option><option value="FJI">FJI</option><option value="FLK">FLK</option><option value="FRA">FRA</option><option value="FRO">FRO</option><option value="FSM">FSM</option><option value="GAB">GAB</option><option value="GBR">GBR</option><option value="GEO">GEO</option><option value="GGY">GGY</option><option value="GHA">GHA</option><option value="GIB">GIB</option><option value="GIN">GIN</option><option value="GLP">GLP</option><option value="GMB">GMB</option><option value="GNB">GNB</option><option value="GNQ">GNQ</option><option value="GRC">GRC</option><option value="GRD">GRD</option><option value="GRL">GRL</option><option value="GTM">GTM</option><option value="GUF">GUF</option><option value="GUM">GUM</option><option value="GUY">GUY</option><option value="HKG">HKG</option><option value="HMD">HMD</option><option value="HND">HND</option><option value="HRV">HRV</option><option value="HTI">HTI</option><option value="HUN">HUN</option><option value="IDN">IDN</option><option value="IMN">IMN</option><option value="IND">IND</option><option value="IOT">IOT</option><option value="IRL">IRL</option><option value="IRN">IRN</option><option value="IRQ">IRQ</option><option value="ISL">ISL</option><option value="ISR">ISR</option><option value="ITA">ITA</option><option value="JAM">JAM</option><option value="JEY">JEY</option><option value="JOR">JOR</option><option value="JPN">JPN</option><option value="KAZ">KAZ</option><option value="KEN">KEN</option><option value="KGZ">KGZ</option><option value="KHM">KHM</option><option value="KIR">KIR</option><option value="KNA">KNA</option><option value="KOR">KOR</option><option value="KWT">KWT</option><option value="LAO">LAO</option><option value="LBN">LBN</option><option value="LBR">LBR</option><option value="LBY">LBY</option><option value="LCA">LCA</option><option value="LIE">LIE</option><option value="LKA">LKA</option><option value="LSO">LSO</option><option value="LTU">LTU</option><option value="LUX">LUX</option><option value="LVA">LVA</option><option value="MAC">MAC</option><option value="MAF">MAF</option><option value="MAR">MAR</option><option value="MCO">MCO</option><option value="MDA">MDA</option><option value="MDG">MDG</option><option value="MDV">MDV</option><option value="MEX">MEX</option><option value="MHL">MHL</option><option value="MKD">MKD</option><option value="MLI">MLI</option><option value="MLT">MLT</option><option value="MMR">MMR</option><option value="MNE">MNE</option><option value="MNG">MNG</option><option value="MNP">MNP</option><option value="MOZ">MOZ</option><option value="MRT">MRT</option><option value="MSR">MSR</option><option value="MTQ">MTQ</option><option value="MUS">MUS</option><option value="MWI">MWI</option><option value="MYS">MYS</option><option value="MYT">MYT</option><option value="NAM">NAM</option><option value="NCL">NCL</option><option value="NER">NER</option><option value="NFK">NFK</option><option value="NGA">NGA</option><option value="NIC">NIC</option><option value="NIU">NIU</option><option value="NLD">NLD</option><option value="NOR">NOR</option><option value="NPL">NPL</option><option value="NRU">NRU</option><option value="NZL">NZL</option><option value="OMN">OMN</option><option value="PAK">PAK</option><option value="PAN">PAN</option><option value="PCN">PCN</option><option value="PER">PER</option><option value="PHL">PHL</option><option value="PLW">PLW</option><option value="PNG">PNG</option><option value="POL">POL</option><option value="PRI">PRI</option><option value="PRK">PRK</option><option value="PRT">PRT</option><option value="PRY">PRY</option><option value="PSE">PSE</option><option value="PYF">PYF</option><option value="QAT">QAT</option><option value="REU">REU</option><option value="ROU">ROU</option><option value="RUS">RUS</option><option value="RWA">RWA</option><option value="SAU">SAU</option><option value="SDN">SDN</option><option value="SEN">SEN</option><option value="SGP">SGP</option><option value="SGS">SGS</option><option value="SSD">SSD</option><option value="SHN">SHN</option><option value="SXM">SXM</option><option value="SJM">SJM</option><option value="SLB">SLB</option><option value="SLE">SLE</option><option value="SLV">SLV</option><option value="SMR">SMR</option><option value="SOM">SOM</option><option value="SPM">SPM</option><option value="SRB">SRB</option><option value="STP">STP</option><option value="SUR">SUR</option><option value="SVK">SVK</option><option value="SVN">SVN</option><option value="SWE">SWE</option><option value="SWZ">SWZ</option><option value="SYC">SYC</option><option value="SYR">SYR</option><option value="TCA">TCA</option><option value="TCD">TCD</option><option value="TGO">TGO</option><option value="THA">THA</option><option value="TJK">TJK</option><option value="TKL">TKL</option><option value="TKM">TKM</option><option value="TLS">TLS</option><option value="TON">TON</option><option value="TTO">TTO</option><option value="TUN">TUN</option><option value="TUR">TUR</option><option value="TUV">TUV</option><option value="TWN">TWN</option><option value="TZA">TZA</option><option value="UGA">UGA</option><option value="UKR">UKR</option><option value="UMI">UMI</option><option value="URY">URY</option><option value="USA">USA</option><option value="UZB">UZB</option><option value="VAT">VAT</option><option value="VCT">VCT</option><option value="VEN">VEN</option><option value="VGB">VGB</option><option value="VIR">VIR</option><option value="VNM">VNM</option><option value="VUT">VUT</option><option value="WLF">WLF</option><option value="WSM">WSM</option><option value="YEM">YEM</option><option value="ZAF">ZAF</option><option value="ZMB">ZMB</option><option value="ZWE">ZWE</option></select></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group"><span><input class="input form-control"
                                                                                         name="judge[]" type="text"
                                                                                         value=""></span></div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group"><span><input class="input form-control"
                                                                                         name="rank[]" type="text"
                                                                                         value=""></span></div>
                                                </div>
                                                <div class="col-lg-1">
                                                    <div class="form-group"><span><input class="input form-control"
                                                                                         name="place[]" type="text"
                                                                                         value=""></span></div>
                                                </div>
                                                <div class="col-lg-1">
                                                    <div class="form-group"><span><input class="input form-control"
                                                                                         name="override" id="override1"
                                                                                         type="radio" value="1"></span>
                                                    </div>
                                                </div>
                                                <button style="background-color:green; height:37px;"
                                                        class="add_field_button_sd btn btn-info active">+
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                    <script>
                                      $(document).ready(function () {
                                        var max_fields = 15; //maximum input boxes allowed
                                        var wrapper = $(".input_fields_wrap_hm"); //Fields wrapper
                                        var add_button = $(".add_field_button_hm"); //Add button ID
                                        var x = 1; //initlal text box count
                                        $(add_button).click(function (e) { //on add input button click
                                          e.preventDefault();
                                          if (x < max_fields) { //max input box allowed
                                            x++; //text box increment
                                            $(wrapper).append('<div class="row"><div class="col-lg-4"><div class="form-group"><span><input class="input form-control" name="insert_date_hm[]" id="insert_date_hm" type="date" value=""></span></div></div><div class="col-lg-4"><div class="form-group"><span><input class="input form-control" name="name_hm[]" id="name_hm" type="text" value=""></span></div></div><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="dosage_hm[]" id="dosage_hm" type="text" value=""></span></div></div><div style="cursor:pointer;background-color:red;height:37px;" class="remove_field_hm btn btn-info">-</div></div>'); //add input box
                                          }
                                        });
                                        $(wrapper).on("click", ".remove_field_hm", function (e) { //user click on remove text
                                          e.preventDefault();
                                          $(this).parent('div').remove();
                                          x--;
                                        })
                                      });
                                    </script>

                                    <script>
                                      $(document).ready(function () {
                                        var max_fields = 15; //maximum input boxes allowed
                                        var wrapper = $(".input_fields_wrap_vc"); //Fields wrapper
                                        var add_button = $(".add_field_button_vc"); //Add button ID
                                        var x = 1; //initlal text box count
                                        $(add_button).click(function (e) { //on add input button click
                                          e.preventDefault();
                                          if (x < max_fields) { //max input box allowed
                                            x++; //text box increment
                                            $(wrapper).append('<div class="row"><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="insert_date_vaccines[]" id="insert_date_vaccines" type="date" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="name_vaccines[]" id="name_vaccines" type="text" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="dosage_vaccines[]" id="dosage_vaccines" type="text" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="due_date_vaccines[]" id="due_date_vaccines" type="date" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><select name="type_vaccines[]" class="input form-control"><option value="1">Due date</option><option value="2">End date</option>   </select></span></div></div><div style="cursor:pointer;background-color:red;height:37px;" class="remove_field_vc btn btn-info">-</div></div>'); //add input box
                                          }
                                        });
                                        $(wrapper).on("click", ".remove_field_vc", function (e) { //user click on remove text
                                          e.preventDefault();
                                          $(this).parent('div').remove();
                                          x--;
                                        })
                                      });
                                    </script>


                                    <script>
                                      $(document).ready(function () {
                                        var max_fields = 15; //maximum input boxes allowed
                                        var wrapper = $(".input_fields_wrap_rb"); //Fields wrapper
                                        var add_button = $(".add_field_button_rb"); //Add button ID
                                        var x = 1; //initlal text box count
                                        $(add_button).click(function (e) { //on add input button click
                                          e.preventDefault();
                                          if (x < max_fields) { //max input box allowed
                                            x++; //text box increment
                                            $(wrapper).append('<div class="row"><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="insert_date_rabies[]" id="insert_date_rabies" type="date" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="name_rabies[]" id="name_rabies" type="text" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="dosage_rabies[]" id="dosage_rabies" type="text" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="due_date_rabies[]" id="due_date_rabies" type="date" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><select name="type_rabies[]" class="input form-control"><option value="1">Due date</option><option value="2">End date</option> </select></span></div></div><div style="cursor:pointer;background-color:red;height:37px;" class="remove_field_rb btn btn-info">-</div></div>'); //add input box
                                          }
                                        });
                                        $(wrapper).on("click", ".remove_field_rb", function (e) { //user click on remove text
                                          e.preventDefault();
                                          $(this).parent('div').remove();
                                          x--;
                                        })
                                      });
                                    </script>


                                    <script>
                                      $(document).ready(function () {
                                        var max_fields = 15; //maximum input boxes allowed
                                        var wrapper = $(".input_fields_wrap_de"); //Fields wrapper
                                        var add_button = $(".add_field_button_de"); //Add button ID
                                        var x = 1; //initlal text box count
                                        $(add_button).click(function (e) { //on add input button click
                                          e.preventDefault();
                                          if (x < max_fields) { //max input box allowed
                                            x++; //text box increment
                                            $(wrapper).append('<div class="row"><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="insert_date_deworming[]" id="insert_date_deworming" type="date" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="name_deworming[]" id="name_deworming" type="text" value=""></span></div></div><div class="col-lg-1"><div class="form-group"><span><input class="input form-control" name="dosage_deworming[]" id="dosage_deworming" type="text" value=""></span></div></div><div class="col-lg-1"><div class="form-group"><span><input class="input form-control" name="weight_deworming[]" id="weight_deworming" type="text" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="due_date_deworming[]" id="due_date_deworming" type="date" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><select name="type_deworming[]" class="input form-control"><option value="1">Due date</option><option value="2">End date</option> </select></span></div></div><div style="cursor:pointer;background-color:red;height:37px;" class="remove_field_de btn btn-info">-</div></div>'); //add input box
                                          }
                                        });
                                        $(wrapper).on("click", ".remove_field_de", function (e) { //user click on remove text
                                          e.preventDefault();
                                          $(this).parent('div').remove();
                                          x--;
                                        })
                                      });
                                    </script>

                                    <script>
                                      $(document).ready(function () {
                                        var max_fields = 15; //maximum input boxes allowed
                                        var wrapper = $(".input_fields_wrap_lt"); //Fields wrapper
                                        var add_button = $(".add_field_button_lt"); //Add button ID
                                        var x = 1; //initlal text box count
                                        $(add_button).click(function (e) { //on add input button click
                                          e.preventDefault();
                                          if (x < max_fields) { //max input box allowed
                                            x++; //text box increment
                                            $(wrapper).append('<div class="row"><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="dateofbirth[]" id="dateofbirth" type="date" value=""></span></div></div><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="breeding_partner[]" id="breeding_partner" type="text" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="breed_bookno[]" id="breed_bookno" type="text" value=""></span></div></div><div class="col-lg-1"><div class="form-group"><span> <input class="input form-control" name="breederinfo[]" id="breederinfo" type="text" value=""></span></div></div><div class="col-lg-1"><div class="form-group"><span><input class="input form-control" name="letter[]" id="letter" type="text" value=""></span></div></div><div class="col-lg-1"><div class="form-group"><span><input class="input form-control" name="males_total[]" id="males_total" type="text" value=""></span></div></div><div style="cursor:pointer;background-color:red;height:37px;" class="remove_field_lt btn btn-info">-</div></div>'); //add input box
                                          }
                                        });
                                        $(wrapper).on("click", ".remove_field_lt", function (e) { //user click on remove text
                                          e.preventDefault();
                                          $(this).parent('div').remove();
                                          x--;
                                        })
                                      });
                                    </script>

                                    <script>
                                      $(document).ready(function () {
                                        var max_fields = 15; //maximum input boxes allowed
                                        var wrapper = $(".input_fields_wrap_sd"); //Fields wrapper
                                        var add_button = $(".add_field_button_sd"); //Add button ID
                                        var x = 1; //initlal text box count
                                        $(add_button).click(function (e) { //on add input button click
                                          e.preventDefault();
                                          if (x < max_fields) { //max input box allowed
                                            x++; //text box increment
                                            $(wrapper).append('<div class="row"><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="show[]" type="text" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><select name="country[]" class="input form-control"><option value="">Select</option></select></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="judge[]" type="text" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="rank[]" type="text" value=""></span></div></div><div class="col-lg-1"><div class="form-group"><span><input class="input form-control" name="place[]" type="text" value=""></span></div></div><div class="col-lg-1"><div class="form-group"><span><input class="input form-control" id="override' + x + '" name="override" type="radio" value="' + x + '"></span></div></div><div style="cursor:pointer;background-color:red;height:37px;" class="remove_field_sd btn btn-info">-</div></div>'); //add input box
                                          }
                                        });
                                        $(wrapper).on("click", ".remove_field_sd", function (e) { //user click on remove text
                                          e.preventDefault();
                                          $(this).parent('div').remove();
                                          x--;
                                        })
                                      });
                                    </script>

                                    <?php #END NEW CODE ?>


                                    <li style="" class="span3">
                                        <br>
                                        <input type="submit" value="Add Pedigree" name="pedigree"
                                               class="button yelsubmit">
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
            </section>


        </section>
    </section>
@endsection('content')
