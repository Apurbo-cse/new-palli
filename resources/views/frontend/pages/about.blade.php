@extends('frontend.layouts.master')
@section('title', 'JEA :: About')

@section('content')

<!-- /banner_bottom_agile_info -->
<div class="banner_bottom_agile_info">
    <div class="container mt-5">
        <!---728x90--->
        <div class="agile_ab_w3ls_info row">
            <div class="col-md-6 ab_pic_w3ls">
                <img src="{{ asset('frontend/images/jeas.jpg') }}" alt=" " class="img-responsive" />
            </div>
            <div class="col-md-6 ab_pic_w3ls_text_info">
                <h5>Joypurhat Engineer's <span> Association</span> </h5>
                <p>Joypurhat Engineers Association - A single, uninterrupted and well-organized platform for all
                    Joypurhat Engineers.</p>
                <p> Where socially and culturally responsible activities are conducted for the purpose of building a
                    better Joypurhat. It is completely apolitical and non-profit. The activities are being carried out
                    in a well-planned and well-organized manner, respecting the views of the competent admin panel and
                    all the members. Self-Join the Joypurhat Engineers Association and add your familiar engineer
                    siblings. We want your help and cooperation.</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div style="background-color: rgb(9, 62, 97) " class="mt-4 p-4">
    <div class="justify-content-center d-flex">
        <div class="col-md-3 ">
            <h2 class="text-center text-bold text-light" style="border-bottom: 2px solid white">Advisor</h4>
        </div>
    </div>

    <section class="mt-4">

        @foreach ( $advisors as $advisor)
        <div class="team" style="--img: url('{{asset($advisor->image)}}')">
            <img src="{{asset($advisor->image)}}" alt="">
            <div class="info">
                <div class="text-bold text-dark mt-3"><b>{{ $advisor->name }}</b></div>
                <div class="text-center">{{ $advisor->designation }} <small
                        class="text-success">{{ $advisor->job }}</small></div>
                <div class="social">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-snapchat-ghost"></i>
                </div>
            </div>
        </div>
        @endforeach

    </section>
</div>

@endsection
