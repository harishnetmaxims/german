@extends('include.master')
@section('content')
<style>
    .containernew ul {
        padding: 0;
        list-style: none;
        background: #f2f2f2;
    }

    .containernew ul li {
        display: inline-block;
        position: relative;
        line-height: 21px;
        text-align: left;
    }

    .containernew ul li a {
        display: block;
        padding: 8px 25px;
        color: #333;
        text-decoration: none;
    }

    .containernew ul li a:hover {
        color: #fff;
        background: #939393;
    }

    .containernewactive {
        color: #fff;
        background: #FF0000;
    }

    .containernewactive a {
        color: #fff;
    }

</style>

<section class="headinner">
    <div class="container">
        <h3>Member Content</h3>
        <div class="breadcom">
            <a href="">Home</a><span> > </span> <a href="">Manage Owner</a>
        </div>
    </div>
</section>

<section class="section-innerbar">
    <div class="container">
        @if (session('msg'))
            <div align="center" style="padding-bottom:10px;">{{ (session('msg')) }}</div>
        @endif
        <div class="containernew">
            <ul>
                <li><a href="manage-videos">Manage Videos</a></li>
                <li><a href="manage-images">Manage Images</a></li>
                <li><a href="manage-blogs">Manage Blogs</a></li>
                @if (session('sees_breeder') == 1) 
                    <li><a href="manage-breeder">Manage Breeder</a></li>
                @endif
                @if (session('sees_owner') == 1) 
                    <li class="containernewactive"><a href="javascript:void(0)" style="color:#fff">Manage Owner</a>
                    </li>
                @endif
                <li><a href="manage-pedigree">Manage Pedigree</a></li>
            </ul>
        </div>
    </div>
</section>

<div class="blogsecton">
    <div class="container">

        <div class="blogitem">
            @if ($resultrows > 0)
                @foreach($result as $row)
                    <a href="{{ url('editowner/'.$row->indexer) }}">
                        <div class="imageset">
                            @if (empty($row->image_pro)) 
                                <img style="" src="{{ asset('images/img/default.jpg') }}">
                            @else
                                <img src="{{ url('storage/uploads/thumbs/'.$row->image_pro) }}">
                            @endif
                        </div>
                        <p>{{ utf8_decode($row->owner_id) }}
                            &nbsp;&nbsp;{{ utf8_decode($row->group_name) }}</p>&nbsp;EDIT</a>
                @endforeach
            @else
                <div>No owner found.</div>
            @endif
        </div>
        <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
            <div class="slides"></div>
            <h3 class="title"></h3>
            <a class="prev">�</a>
            <a class="next">�</a>
            <a class="close">�</a>
            <a class="play-pause"></a>
            <ol class="indicator"></ol>
        </div>
    </div>
</div>
@endsection