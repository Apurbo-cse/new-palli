@extends('frontend.layouts.master')
@section('css')

@endsection

@section('content')


<body style="width:100%;height:650px;background-color:#5e74efa0;">

    <div id="supervisor">

@foreach ($devjeas as $developer )
<div class="supervisor cons">

    <div class="col-left">
        <div class="supervisor-img">
            <img class="img-fluid " src="{{ asset( $developer->image) }}" alt="img" style="margin-bottom:10px">
        </div>
    </div>
    <div class="col-right">
        <h1 class="sup-title">Develo<span>per</span></h1>
        <h2 style="font-weight:1000;font-size:20px">
            {{ $developer->name }}
        </h2>
        <div>
            <b class="pro-type"> {{ $developer->designation }}</b><br>
            <b class="pro-type"> {{ $developer->job }}</b><br>
            <b class="pro-type"> {{ $developer->job_location }}
        <br>
        <!-- header-bot -->
        <div class="col-md-6 agileits-social top_content">
            <ul class="social-nav model-3d-0 footer-social w3_agile_social">
                <li>
                    <a href="{{ $developer->facebook }}" class="facebook">
                        <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                        <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>

                </li>

                <li>
                    <a href="{{ $developer->linkedin }}" class="linkedin">
                        <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                        <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div>

                </li>

                <li>
                    <a href="mailto:{{ $developer->email }}" class="email">
                        <div class="front"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                        <div class="back"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>

                </li>

                <li>
                    <a href="tel:+88{{ $developer->phone }}" class="cell">
                        <div class="front"><i class="fa fa-phone" aria-hidden="true"></i></div>
                        <div class="back"><i class="fa fa-phone" aria-hidden="true"></i></div>

                </li>

            </ul>
        </div>

    </div>
</div>
@endforeach
    </div>

</body>


@endsection
