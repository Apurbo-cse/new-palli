@extends('frontend.layouts.master')
@section('title', 'JEA :: Gallery')

@section('content')

<title>JEA - | Gallery </title>
<link href="{{asset('frontend/css/bus.css')}}" rel="stylesheet">
<link href="{{asset('frontend/css/gallery.css')}}" rel="stylesheet">

<br><br>
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>JEA <span>Gallery </span></h3>
        <!--/w3_short-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">

                <ul class="w3_short">
                    <li><a href="/">Home</a><i>|</i></li>
                    <li>Gallery List</li>
                </ul>
            </div>
        </div>
        <!--//w3_short-->
    </div>
</div>
<!-- /banner_bottom_agile_info -->

<!-- gallery -->
<br><br>
<div class="inner-width">
    <div class="works">
        @foreach($galleries as $gallery)
        <a href="{{asset($gallery->image)}}" class="work">
            <img src="{{asset($gallery->image)}}" alt="">
            <div class="info">
                <h3 style="margin-right:35px;color:aqua;margin: bottom 10px;">{{$gallery->title}}</h3>
                <div class="cat" style="text-align: justify;text-justify: inter-word;margin-right:35px;">
                    {{$gallery->description}}</div>
            </div>
        </a>
        @endforeach

    </div>
</div>


@endsection
