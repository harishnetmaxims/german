@extends('webpanel.include.master')
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div style="float:left;"><h3><i class="fa fa-angle-right"></i> Manage Breeder</h3></div>
            <div class="logout" style="float:right;"><a href="add-breeder">
                    <button class="btn logout"><i class="fa fa-plus">Add</i></button>
                </a></div>
            <div class="row">


                <div class="col-md-12">
                    <div class="content-panel">
                        <p align="center"
                           style="color:#F00;">@if(session('msg')) {{ session('msg') }} @endif</p>
                        <table class="table table-striped table-advance table-hover">
                            <div class="col-md-12" style="padding:0px;">
                                <div class="col-md-6"><h4><i class="fa fa-angle-right"></i> All Breeder Details </h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="openinput"><input type="text" class="form-control" id="sbreeder"
                                                                  placeholder="Search Here..." name="sbreeder" value="">
                                                            <input type="hidden" id="csrf" name="_token" value="<?php echo csrf_token(); ?>">
                                    </div>
                                </div>


                                <div class="container d-xs-none">
                                    <div id="displaybreeder"></div>
                                </div>
                                <hr>
                                <thead>
                                <tr>
                                    <th>Sno.</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Public / Private</th>
                                    <th>Added By</th>
                                    <th>Date of Upload</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ret as $index=>$row)
                                    <tr>
                                        <td width="5%">{{ $index+1 }}</td>
                                        <td width="20%">{{ utf8_encode($row->group_name) }}</td>
                                        <td width="20%">{!! utf8_encode(substr($row->group_description, 0, 100)) !!}</td>
                                        <td width="10%">{{ $row->public_private }}</td>
                                        <td width="10%"></td>
                                        <td width="10%">@if ($row->todays_date) {{ date('m/d/Y H:i:s', strtotime($row->todays_date)) }} @endif</td>
                                        <td width="10%">
                                            <a href="update-breeder/{{ $row->indexer }}">
                                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>
                                                </button>
                                            </a>
                                            <a href="delete-breeder/{{ $row->indexer }}">
                                                <button class="btn btn-danger btn-xs"
                                                        onClick="return confirm('Are you sure you want to delete breeder {{ $row->group_name }}');">
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