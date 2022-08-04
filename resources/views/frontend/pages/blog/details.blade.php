@extends('frontend.layouts.master')
@section('title', $post->title)
@section('content')
<title>JEA - | Blog Detailes |</title>
<link rel="stylesheet" href="{{asset('frontend/style/most.css')}}">

    <div style="width: 100%;height:50px ; background: rgb(6, 100, 121)">
    </div>
    <br><br>


    <div class="auto-container">
        <div class="row clearfix">

            <!--Content Side-->
            <div class="content-side col-lg-8 col-md-12 col-sm-12">
                <div class="content-blocks">

                    <!--News Block Four-->
                    <div class="news-block-four">
                        <div class="inner-box">
                            <div class="row clearfix">
                                <div class="image-column col-sm-12">
                                    <div class="image">
                                        <img src="{{asset($post->image)}}" alt="" width="100%" height="400"/>
                                    </div>
                                </div>
                                <div class="content-box  col-sm-12">
                                    <div class="content-inner">
                                        <h3>{{$post->title}}</h3>
                                        <ul class="post-meta">
                                            <li><span class="icon fa fa-clock-o"></span>{{date('M d, Y', strtotime($post->published_at))}}</li>
                                            <li><span class="icon fa fa-comments"></span>9</li>
                                            <li><span class="icon fa fa-eye"></span>{{$post->view_count}}</li>
                                        </ul>
                                        <div class="text-justify">
                                            <p>
                                                {!! $post->description !!}

                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END News Block Four-->
                    <!-- Contact -->
                    <section id="contact">
                        <p>Comment</p>
                        <div class="user-comment" style="padding: 10px; border-bottom: 1px solid  rgba(88, 88, 88, 0.123); ">
                            <table style="font-size: 12px;">
                                <tr>
                                    <td>
                                        <b>Apurbo Kumar </b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style=" font-size: 12px; ">&nbsp;&nbsp;<i class="fa fa-comments " aria-hidden="true " style="font-size: 10px; "></i> &nbsp;&nbsp; Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli.</li>
                                    </td>
                                    <td style="font-size: 10px; ">
                                        &nbsp;&nbsp; &nbsp;&nbsp;
                                        <li class=" fa fa-clock-o " aria-hidden="true "> </li>&nbsp; 3rd March, 2020
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <table>
                                <tr>
                                    <td style="font-size: 12px; ">
                                        <b>Akash Sarkar </b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 12px; ">&nbsp;&nbsp;<i class="fa fa-comments " aria-hidden="true " style="font-size: 10px; "></i> &nbsp;&nbsp; Cumtipsu sociis natoque penatibus et magnis dis parturient montesti .</li>
                                    </td>
                                    <td style="font-size: 10px; ">
                                        &nbsp;&nbsp; &nbsp;&nbsp;
                                        <li class=" fa fa-clock-o " aria-hidden="true "></li> &nbsp; 17th November, 2020
                                    </td>
                                </tr>
                            </table>
                            <br>
                        </div>
                        <br>


                        <div class="inner-width ">
                            <form class="contact-form ">
                                <input type="text " class="nameZone " placeholder="Name " required>
                                <input type="email " class="emailZone " placeholder="Email " required>
                                <textarea class="messageZone " placeholder="Message " required></textarea>
                                <input type="submit " value="Send Message " class="btn ">
                            </form>
                        </div>
                    </section>

                    <br><br>

                </div>
            </div>
            <!--Sidebar Side-->
            <!--Sidebar Side-->
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <aside class="sidebar default-sidebar">
                    @include('frontend.pages.blog.sidebar')
                </aside>
            </div>
        </div>
    </div>
    </div>
@endsection
