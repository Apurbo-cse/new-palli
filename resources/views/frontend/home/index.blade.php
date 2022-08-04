@extends('frontend.layouts.master')
{{-- @section('title', 'Joypurhat Engineers Association') --}}
@push('title')
Joypurhat Engineers Association
@endpush

@section('content')
<br><br><br>

<div class="header-bot">
    <div class="header-bot_inner_wthreeinfo_header_mid row">

        <div class="col-md-4 header-middle sm-ms-2">
            <form action="#" method="post">
                <input type="search" name="search" placeholder="Search here..." required="">
                <input type="submit" value=" ">

                <div class="clearfix"></div>
            </form>
        </div>

        <!-- header-bot -->
        <div class="col-md-5" style="text-align:center;">
            {{-- @foreach($contacts as $contact) --}}
            <div>
                <h1 class="ml11">
                    <img src="{{asset('frontend/images/logo.png')}}" alt="" style="width:70px;height:70px;">
                    <span class="text-wrapper">
                        <span class="line line1"></span>
                        <span class="letters">Joypurhat Engineer's Association</span>
                    </span>
                </h1>
            </div>

        </div>

        <!-- header-bot -->
        <div class="col-md-3 agileits-social top_content">
            <ul class="social-nav model-3d-0 footer-social w3_agile_social">
                <li><a href="#" class="facebook">
                        <div class="front"><i class="fab fa-facebook-f" aria-hidden="true"></i></div>
                        <div class="back"><i class="fab fa-facebook-f" aria-hidden="true"></i></div>
                    </a></li>
                <li><a href="#" class="instagram">
                        <div class="front"><i class="fab fa-instagram" aria-hidden="true"></i></div>
                        <div class="back"><i class="fab fa-instagram" aria-hidden="true"></i></div>
                    </a></li>
                <li><a href="#" class="twitter">
                        <div class="front"><i class="fab fa-twitter" aria-hidden="true"></i></div>
                        <div class="back"><i class="fab fa-twitter" aria-hidden="true"></i></div>
                    </a></li>
                <li><a href="#" class="linkedin">
                        <div class="front"><i class="fab fa-linkedin" aria-hidden="true"></i></div>
                        <div class="back"><i class="fab fa-linkedin" aria-hidden="true"></i></div>
                    </a></li>
                <li><a href="mailto:" class="email">

                        <div class="front"><i class="fas fa-envelope" aria-hidden="true"></i></div>
                        <div class="back"><i class="fas fa-envelope" aria-hidden="true"></i></div>
                    </a></li>
                <li><a href="tel:+88" class="cell">
                        <div class="front"><i class="fa fa-phone" aria-hidden="true"></i></div>
                        <div class="back"><i class="fa fa-phone" aria-hidden="true"></i></div>
                    </a></li>
            </ul>
        </div>

        {{-- @endforeach --}}
        <div class="clearfix"></div>
    </div>
</div>
</div>

<section class="slider-area">
    <div class="sliders owl-carousel">
        @foreach($sliders as $slider)
        <div class="single-slide bg" style="background-image: url('{{asset($slider->image)}}');">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="slide-content">
                            <h4 style="color:white;">We are <span
                                    style="color:#20114b; font-weight:600;font-size:20px;text-shadow CardXS:5px slid white;">JEA</span>
                            </h4>
                            <h1 class="text-light" style="padding:15px;">{{$slider->title}}</h1>
                            <p class="text-success"style="padding:20px;">{{$slider->description}}</p>
                            {{-- <a href="about.html" class="box-btn">contact us <i
                                    class="fas fa-angle-double-right"></i></a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<div class="banner_bottom_agile_info">
    <div class="container">
        <div class="banner_bottom_agile_info_inner_w3ls">

            <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
                <figure class="effect-roxy mx-2">
                    <img src="{{ asset('frontend/images/team/team-2.jpg') }}" alt=" " class="img-responsive" />
                    <figcaption>
                        <h3><span>F</span>all Ahead</h3>
                        <p>New Arrivals</p>
                    </figcaption>
                </figure>
            </div>

            <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
                <figure class="effect-roxy mx-2">
                    <img src="{{ asset('frontend/images/team/team-2.jpg') }}" alt=" " class="img-responsive" />
                    <figcaption>
                        <h3><span>F</span>all Ahead</h3>
                        <p>New Arrivals</p>
                    </figcaption>
                </figure>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="" style="background-color: rgb(3, 78, 119)">
    <div class=" d-flex justify-content-center mb-5">
        <div id="carouselExampleIndicators" class="carousel slide col-md-8" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner ">

                <div class="carousel-item active">
                    <div class="testimonial">
                        <div class="pic">
                            <img src="http://www.markharwood.plus.com/images/people%20large/people8.jpg" alt=""
                                class="img-responsive">
                        </div>
                        <h3 class="testimonial-info">
                            Diana
                            <small>Web Designer</small>
                        </h3>
                        <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi facilisis.</p>
                    </div>
                </div>

                @foreach ($eternals as $eternal )
                <div class="carousel-item ">
                    <div class="testimonial">
                        <div class="pic">
                            <img src="{{ asset($eternal->image) }}" alt=""
                                class="img-responsive">
                        </div>
                        <h3 class="testimonial-info">
                            {{ $eternal->name }}
                            <small>{{ $eternal->designation }}</small>
                        </h3>
                        <p class="description">{{ $eternal->eternal}}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>

<div class="row mb-3">
    <section id="card" style="background-color: #fefefe !important;">
        <div class="container wrapper">
            <div class="row">
                <div class="col-md-4 d-flex align-items-stretch">
                    <div class="card mb-2">

                        <img class="img-fluid" src="{{asset('frontend/images/two.jpg')}}" alt="">

                    </div>
                </div>

                <div class="col-md-4 d-flex align-items-stretch">
                    <div class="card mb-2" style="background-color: #00add7 !important; border: 2px solid #6EBACC;">
                        <div class="card-body py-5">
                            <h4 class="text-center text-white">Best Quality</h4>
                            <p class="text-center text-white content-text">We are committed to delivering outstanding,
                                cutting-edge IT solutions that add real value that goes beyond what is expected. Our
                                trustworthy, dedicated and experienced team will go the extra mile to solve your IT issues.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 d-flex align-items-stretch">
                    <div class="card mb-2">

                        <img class="img-fluid" src="{{asset('frontend/images/three.jpg')}}" alt="">

                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-stretch">
                    <div class="card mb-2" style="background-color: #00add7 !important; border: 2px solid #6EBACC;">
                        <div class="card-body py-5">
                            <h4 class="text-center text-white">Client Oriented</h4>
                            <p class="text-center text-white content-text">We strive to provide superior customer service
                                and ensure that every client is completely satisfied with our work. Our client-oriented
                                policy is what makes us top industry player.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 d-flex align-items-stretch">
                    <div class="card mb-2">

                        <img class="img-fluid" src="{{asset('frontend/images/four.jpeg')}}" alt="">

                    </div>
                </div>

                <div class="col-md-4 d-flex align-items-stretch">
                    <div class="card mb-2" style="background-color: #00add7 !important; border: 2px solid #6EBACC;">
                        <div class="card-body py-5">
                            <h4 class="text-center text-white content-text">Rich Experience</h4>
                            <p class="text-center text-white">With 25 years of experience, we are on a mission to exceed
                                your expectations and form a long-term, mutually beneficial relationship with ours clients.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



{{-- <div style="width:100%;height:650px;background-color:#022124a0;">

    <div id="supervisor">
        @include('frontend.pages.member.president')
    </div>

</div> --}}

<section class="services mt-5 bgd">
    <div class="container">
        <div class="services-title">
            <div class="title">
                <h2 class="text-light"><span> Our </span> Services</h2>
            </div>
        </div>

        <div class="services-box">

           @foreach ( $services as $service )
           <div class="box mb-5">
            <div class="ser-box">
                <div class="icon">
                    <img src="{{ asset('frontend/img/setting.p')}}ng">
                </div>
                <h4>{{ $service->title }}</h4>
                <p>{{ $service->info }}</p>
            </div>
        </div>
           @endforeach

        </div>
    </div>
</section>


<div  style="background-color: rgb(194, 198, 201) " class=" p-4">
   <div class="justify-content-center d-flex">
    <div class="col-md-3 ">
        <h2 class="text-center text-bold text-light" style="border-bottom: 2px solid white">Advisor</h4>
    </div>
   </div>

<section class="mt-4">

    {{-- style="background-image: url('{{asset($slider->image)}}');" --}}
    @foreach ( $advisors as $advisor)
    <div class="team" style="--img: url('{{asset($advisor->image)}}')">
        <img src="{{asset($advisor->image)}}" alt="">
        <div class="info">
            <div class="text-bold text-dark mt-3"><b>{{ $advisor->name }}</b></div>
            <div class="text-center">{{ $advisor->designation }} <small class="text-success">{{ $advisor->job }}</small></div>
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
<style>
    .bgd{
        background: linear-gradient(90deg, rgba(0,0,36,0.9531162806919643) 0%, rgba(2, 64, 64, 0.939) 100%);
    }

</style>
@endsection
