@extends('include.master')
@section('content')
<section class="headinner">
    <div class="container">
        <h3>{{ $pageData->title }}</h3>
        <div class="breadcom">
            <a href="">Home</a><span> > </span> <a href=""> {{ $pageData->title }} </a>
        </div>
    </div>
</section>

<section class="section-innerbar">
    <div class="container">
        {!! $pageData->text !!}
    </div>
</section>
@endsection