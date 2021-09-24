@extends('webpanel.include.master')
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> 's Information</h3>

            <div class="row">


                <div class="col-md-12">
                    <div class="content-panel">
                        <!--p align="center"
                           style="color:#F00;">@if(session('msg')) {{ session('msg') }} @endif</p-->


                        <form class="form-horizontal style-form" name="form1" method="post" action="{{ route('update-profile',$userdet->user_id) }}"
                              onSubmit="return valid();">
                            <p style="color:#F00">@if(session('msg')) {{ session('msg') }} @endif</p>
                              @csrf

                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">Name:</label>
                                <div class="col-sm-10"><input class="form-control" type="text" name="first_name"
                                                              value="{{ $userdet->first_name }}"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">Address:</label>
                                <div class="col-sm-10"><input class="form-control" type="text" name="address"
                                                              value="{{ $userdet->address }}"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">Directions:</label>
                                <div class="col-sm-10"><input class="form-control" type="text" name="directions"
                                                              value="{{ $userdet->directions }}"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">City:</label>
                                <div class="col-sm-10"><input class="form-control" type="text" name="current_city"
                                                              value="{{ $userdet->current_city }}"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">State:</label>
                                <div class="col-sm-10"><input class="form-control" type="text" name="state"
                                                              value="{{ $userdet->state }}"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">Zip Code:</label>
                                <div class="col-sm-10"><input class="form-control" type="text" name="zip_code"
                                                              value="{{ $userdet->zip_code }}"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">Country:</label>
                                <div class="col-sm-10"><input class="form-control" type="text" name="country"
                                                              value="{{ $userdet->country }}"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">User Name</label>
                                <div class="col-sm-10"><input class="form-control" type="text" name="user_name"
                                                              value="{{ $userdet->user_name }}"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">About Us:</label>
                                <div class="col-sm-10"><textarea class="form-control" style="padding: 3px;"
                                                                 name="about_me"
                                                                 value="">{{ $userdet->about_me }}</textarea>
                                </div>
                            </div>


                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">Established Date:</label>
                                <div class="col-sm-10"><input class="form-control" type="text" name="established"
                                                              value="{{ $userdet->established }}"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">Operating Hours:</label>
                                <div class="col-sm-10"><input class="form-control" type="text" name="hours"
                                                              value="{{ $userdet->hours }}"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">Work Telephone:</label>
                                <div class="col-sm-10"><input class="form-control" type="text" name="work_tel"
                                                              value="{{ $userdet->work_tel }}"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">Cell Telephone:</label>
                                <div class="col-sm-10"><input class="form-control" type="text" name="cell_tel"
                                                              value="{{ $userdet->cell_tel }}"></div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">Our Website:</label>
                                <div class="col-sm-10"><input class="form-control" type="text"
                                                              name="personal_website"
                                                              value="{{ $userdet->personal_website }}">
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">Email:</label>
                                <div class="col-sm-10"><input class="form-control" type="text" name="email_address"
                                                              value="{{ $userdet->email_address }}">
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">Title:</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="account_type" id="account_type">
                                        <option value="standard" @if ($userdet->account_type === 'standard')  selected  @endif>
                                            Standard
                                        </option>
                                        <option value="moderator" @if ($userdet->account_type === 'moderator') selected @endif>
                                            Moderator
                                        </option>
                                        <option value="admin" @if ($userdet->account_type === 'admin') selected @endif>
                                            Admin
                                        </option>
                                    </select>
                                    </div>
                            </div>


                            <div class="form-group"><label class="col-sm-2 col-sm-2 control-label"
                                                           style="padding-left:40px;">Registration Date </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="regdate"
                                           value="{{ $userdet->date_created }}">
                                </div>
                            </div>


                            <div style="margin-left:100px;">
                                <input type="submit" name="update-pro" value="Update" class="btn btn-theme">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                <a href="manage-users/{{ $userdet->user_id }}">
                                    <button type="button" class="btn btn-theme"
                                            onClick="return confirm('Are you sure you want to delete user {{ $userdet->user_name}}');">
                                        Delete User
                                </a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>
</section>
@endsection('content')