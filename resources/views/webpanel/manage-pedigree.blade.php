@extends('webpanel.include.master')
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div style="float:left;"><h3><i class="fa fa-angle-right"></i> Manage Pedigree</h3></div>
            <div class="logout" style="float:right;"><a href="add-pedigree">
                    <button class="btn logout"><i class="fa fa-plus">Add</i></button>
                </a></div>

            <div class="row">


                <div class="col-md-12">
                    <div class="content-panel">
                        <table class="table table-striped table-advance table-hover">
                            <div class="col-md-12" style="padding:0px;">
                                <div class="col-md-6"><h4><i class="fa fa-angle-right"></i> All Pedigree Details </h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="openinput">
                                        <input type="text" class="form-control" id="searchpedi"
                                               placeholder="Search Here..." name="searchpedi" value="">
                                        <input type="hidden" id="csrf" name="_token" value="<?php echo csrf_token(); ?>">
                                    </div>
                                </div>


                                <div class="container d-xs-none">
                                    <div id="displaypedi"></div>
                                </div>
                                <hr>
                                <thead>
                                <tr>
                                    <th>Sno.</th>
                                    <th>Name</th>
                                    <th>Added By</th>
                                    <th>Date of Upload</th>
                                    <th> About</th>
                                    <th> Birth Date</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ret as $index=>$row) 
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $row->name }} {{ $row->lastname }}</td>
                                        <td>{{ $row->added_by }}</td>
                                        <td>@if ($row->added_date) {{ date('m/d/Y', strtotime($row->added_date)) }} @endif</td>
                                        <td>{{ $row->c1 }} - {{ $row->reg1 }}</td>
                                        <td>{{ date('m/d/Y', strtotime($row->dob)) }}</td>

                                        <td>
                                            <a href="update-pedigree/{{ $row->reg1 }}">
                                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>
                                                </button>
                                            </a>
                                            <a href="delete-pedigree/{{ $row->indexer }}/{{ $row->reg1 }}">
                                                <button class="btn btn-danger btn-xs"
                                                        onClick="return confirm('Are you sure you want to delete pedigree {{ $row->name }}');">
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