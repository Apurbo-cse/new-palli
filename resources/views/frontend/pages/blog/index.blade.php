@extends('frontend.layouts.master')

@section('content')
<div style="width: 100%;height:50px ;">
</div>


<body class="home page-template-default page page-id-122228 ">

    <br><br>

    <div class="auto-container">
        <div class="row clearfix">

            <!--Content Side-->
            <div class="content-side col-lg-8 col-md-12 col-sm-12">

                <!--Marquee-->

                <div class="sec-news">
                    <marquee> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.
                    </marquee>
                </div>
                <div class="letest-title">
                    <p>Letest News</p>
                </div>

                <!--Marquee End-->



        <div class="content-blocks">

            <!--Post-->
            <div class="news-block-four">
                <div class="inner-box">

                    @foreach($posts as $post)
                    <div class="row clearfix">
                        <div class="image-column col-lg-6 col-md-6 col-sm-12">
                            <div class="">
                                <a href="{{route('blog.details', $post->slug)}}"><img src="{{asset($post->image)}}" alt="" /></a>
                            </div>
                        </div>
                        <div class="content-box col-lg-6 col-md-6 col-sm-12">
                            <div class="content-inner">
                                <h3><a href="{{route('blog.details', $post->slug)}}">{{$post->title}}</a></h3>
                                <ul class="post-meta">
                                    <li style=""><span class="icon fa fa-user"> </span>Admin</li>
                                    <li><span
                                            class="icon fa fa-clock-o"></span>{{date('M d, Y', strtotime($post->published_at))}}
                                    </li>
                                    <li><span class="icon fa fa-eye"></span>{{$post->view_count }}</li>
                                    <li><span class="icon fa fa-comments"></span>0</li>
                                </ul>
                                {{-- <p> {!! Str::limit($post->description, 170)!!}...</p> --}}
                                <div class="text">
                                    {{Str::limit($post->description, 170)}}...
                                    <i><a href="{{route('blog.details', $post->slug)}}" class="read-more">See more</a></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
            <!-- END Post-->


            <br><br>

            <!-- Pagination -->
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active">
                        <span class="page-link">
                            1
                            <span class="sr-only">(current)</span>
                        </span>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
            <!-- Pagination End -->

            <br><br>

        </div>
    </div>

    <!--Sidebar-->

    <!--Sidebar Side-->
    <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
        <aside class="sidebar default-sidebar">
            @include('frontend.pages.blog.sidebar')
        </aside>
    </div>

    </div>
    </div>

</body>

@endsection
