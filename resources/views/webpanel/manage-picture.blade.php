@extends('webpanel.include.master')
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div style="float:left;"><h3><i class="fa fa-angle-right"></i> Manage Picture</h3></div>
            <div class="logout" style="float:right;"><a href="add-picture">
                    <button class="btn logout"><i class="fa fa-plus">Add</i></button>
                </a></div>
            <div class="row">


                <div class="col-md-12">
                    <div class="content-panel">
                        <p align="center"
                           style="color:#F00;">@if(session('msg')) {{ session('msg') }} @endif</p>
                        <table class="table table-striped table-advance table-hover">
                            <div class="col-md-12" style="padding:0px;">
                                <div class="col-md-6"><h4><i class="fa fa-angle-right"></i> All Picture Details </h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="openinput">
                                        <input type="text" class="form-control" id="searchpic"
                                               placeholder="Search Here..." name="searchpic" value="">
                                        <input type="hidden" id="csrf" name="_token" value="<?php echo csrf_token(); ?>">        
                                    </div>
                                </div>


                                <div class="container d-xs-none">
                                    <div id="displaypic"></div>
                                </div>
                                <hr>
                                <thead>
                                <tr>
                                    <th>Sno.</th>
                                    <th>Gallery name</th>
                                    <th>Gallery Description</th>
                                    <th>Tags</th>
                                    <th>Added by</th>
                                    <th>Date of Upload</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ret as $index=>$row) 
                                    <tr>
                                        <td width="10%">{{ $index+1 }}</td>
                                        <td width="20%">{{ $row->gallery_name }}</td>
                                        <td width="20%">{{ substr($row->description, 0, 500) }}</td>
                                        <td width="10%">{{ $row->tags }}</td>
                                        <td width="10%"></td>
                                        <td width="10%">{{ date('m/d/Y H:i:s', strtotime($row->date_uploaded)) }}</td>
                                        <td width="10%">

                                            <a href="update-image/{{ $row->indexer }}">
                                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>
                                                </button>
                                            </a>
                                            <a href="delete-image/{{ $row->indexer }}">
                                                <button class="btn btn-danger btn-xs"
                                                        onClick="return confirm('Are you sure you want to delete picture {{ $row->gallery_name }}');">
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
