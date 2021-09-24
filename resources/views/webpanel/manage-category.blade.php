@extends('webpanel.include.master')
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div style="float:left;"><h3><i class="fa fa-angle-right"></i> Manage Category</h3></div>
            <div class="logout" style="float:right;"><a href="add-category">
                    <button class="btn logout"><i class="fa fa-plus">Add</i></button>
                </a></div>
            <div class="row">


                <div class="col-md-12">
                    <div class="content-panel">
                        <p align="center"
                           style="color:#F00;">@if(session('msg')) {{ session('msg') }} @endif</p>
                        <table class="table table-striped table-advance table-hover">
                            <div class="col-md-12" style="padding:0px;">
                                <div class="col-md-6"><h4><i class="fa fa-angle-right"></i> All Category Details </h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="openinput">
                                        <input type="text" class="form-control" id="scat"
                                                                  placeholder="Search Here..." name="scat" value="">
                                        <input type="hidden" id="csrf" name="_token" value="<?php echo csrf_token(); ?>">
                                    </div>
                                </div>


                                <div class="container d-xs-none">
                                    <div id="displaycat"></div>
                                </div>
                                <hr>
                                <thead>
                                <tr>
                                    <th>Sno.</th>
                                    <th>Name</th>
                                    <th> Content</th>
                                    <th> Added By</th>
                                    <th>Date of Upload</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                
                                @foreach($ret as $index=>$row)

                                    <tr>
                                        <td width="5%">{{ $index+1 }}</td>
                                        <td width="20%">{{ $row->channel_name }}</td>
                                        <td width="30%">{{ substr($row->channel_description, 0, 100) }}</td>
                                        <td width="10%">@if(!empty($row->added_by)) {{ $row->added_by }} @endif</td>
                                        <td width="10%">@if($row->date_created) 
                                            {{ date('m/d/Y H:i:s', strtotime($row->date_created)) }} 
                                        @endif</td>
                                        <td width="10%">
                                            <a href="update-category/{{ $row->channel_id }}">
                                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>
                                                </button>
                                            </a>
                                            <a href="delete-category/{{ $row->channel_id }}">
                                                <button class="btn btn-danger btn-xs"
                                                        onClick="return confirm('Are you sure you want to delete category {{ $row->channel_name }}@if(!empty($row->lastname)){{ $row->lastname }}@endif')">
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