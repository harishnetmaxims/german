@extends('webpanel.include.master')
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Manage Users</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="content-panel">
                        <p align="center"
                           style="color:#F00;">@if(session('msg')) {{ session('msg') }} @endif</p>
                        <table class="table table-striped table-advance table-hover">
                            <div class="col-md-12" style="padding:0px;">
                                <div class="col-md-6"><h4><i class="fa fa-angle-right"></i> All User Details </h4></div>
                                <div class="col-md-6">
                                    <div class="openinput">
                                        <input type="text" class="form-control" id="search" placeholder="Search Here..."
                                               name="search" value="">
                                        <input type="hidden" id="csrf" name="_token" value="<?php echo csrf_token(); ?>">

                                    </div>
                                </div>


                                <div class="container d-xs-none">
                                    <div id="display"></div>
                                </div>
                                <hr>
                                <thead>
                                <tr>
                                    <th>Sno.</th>
                                    <th class="hidden-phone">First Name</th>
                                    <th> Last Name</th>
                                    <th> Username</th>
                                    <th> Account Type</th>
                                    <th>Country</th>
                                    <th>Reg. Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($ret as $index => $row)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $row->first_name }}</td>
                                        <td>{{ $row->last_name }}</td>
                                        <td>{{ $row->user_name }}</td>
                                        <td>{{ ucwords($row->account_type) }}</td>
                                        <td>{{ $row->country }}</td>
                                        <td>{{ date('m/d/Y : H:i:s', strtotime($row->date_created)) }}</td>
                                        <td>

                                            <a href="update-profile/{{ $row->user_id }}">
                                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>
                                                </button>
                                            </a>
                                            <a href="delete-user/{{ $row->user_id }}">
                                                <button class="btn btn-danger btn-xs"
                                                        onClick="return confirm('Are you sure you want to delete user {{ $row->user_name }}');">
                                                    <i class="fa fa-trash-o "></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                    {{ $ret->links() }}
                </div>
            </div>
        </section>
    </section>
</section>
@endsection('content')