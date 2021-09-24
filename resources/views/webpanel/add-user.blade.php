@extends('webpanel.include.master')
@section('content')
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i>'s Information</h3>

                <div class="row">


                    <div class="col-md-12">
                        <div class="content-panel">
                            <!--p align="center"
                               style="color:#F00;">@if(session('msg')) {{ session('msg') }} @endif</p-->


                            <form class="form-horizontal style-form" name="form1" method="post" action="{{route('add-user')}}"
                                  onSubmit="return valid();">
                                <p style="color:#F00">@if(session('msg')) {{ session('msg') }} @endif</p>
                                @csrf

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Register
                                        as:</label>
                                    <div class="col-sm-10"><select class="form-control" name="mem_grp">
                                            <option value="">Please Select an Option</option>
                                            <option value="member">Member</option>
                                            <option value="breeder">Breeder</option>
                                            <option value="admin">Owner</option>
                                        </select></div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label"
                                           style="padding-left:40px;">Gender:</label>
                                        <div class="col-sm-10"><select class="form-control" name="gender">
                                            <option value="">Please Select an Option</option>
                                            <option value="member">Male</option>
                                            <option value="breeder">Female</option>
                                        </select></div>
                                </div>


                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">Name:</label>
                                    <div class="col-sm-10"><input class="form-control" type="text" name="first_name"
                                                                  value=""></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">Address:</label>
                                    <div class="col-sm-10"><input class="form-control" type="text" name="address"
                                                                  value=""></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">Directions:</label>
                                    <div class="col-sm-10"><input class="form-control" type="text" name="directions"
                                                                  value=""></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">City:</label>
                                    <div class="col-sm-10"><input class="form-control" type="text" name="current_city"
                                                                  value=""></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">State:</label>
                                    <div class="col-sm-10"><input class="form-control" type="text" name="state"
                                                                  value=""></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">Zip Code:</label>
                                    <div class="col-sm-10"><input class="form-control" type="text" name="zip_code"
                                                                  value=""></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">Country:</label>
                                    <div class="col-sm-10"><input class="form-control" type="text" name="country"
                                                                  value=""></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">About Us:</label>
                                    <div class="col-sm-10"><textarea class="form-control" style="padding: 3px;"
                                                                     class="form-control" name="about_me"
                                                                     value=""></textarea></div>
                                </div>


                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">Established Date:</label>
                                    <div class="col-sm-10"><input class="form-control" type="text" name="established"
                                                                  value=""></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">Operating Hours:</label>
                                    <div class="col-sm-10"><input class="form-control" type="text" name="hours"
                                                                  value=""></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">Work Telephone:</label>
                                    <div class="col-sm-10"><input class="form-control" type="text" name="work_tel"
                                                                  value=""></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">Cell Telephone:</label>
                                    <div class="col-sm-10"><input class="form-control" type="text" name="cell_tel"
                                                                  value=""></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">Our Website:</label>
                                    <div class="col-sm-10"><input class="form-control" type="text"
                                                                  name="personal_website" value=""></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">Email:</label>
                                    <div class="col-sm-10"><input class="form-control" type="text" name="email_address"
                                                                  value=""></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">Password:</label>
                                    <div class="col-sm-10"><input class="form-control" type="text" name="password"
                                                                  value=""></div>
                                </div>


                                <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                               style="padding-left:40px;">Registration Date </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="regdate"
                                               value="">
                                    </div>
                                </div>


                                <div style="margin-left:100px;">
                                    <input type="submit" name="update-pro" value="Update" class="btn btn-theme"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

        </section>
    </section>
@endsection('content')
