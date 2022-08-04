@section('css')


@endsection

<div class="sidebar-inner">

    <!-- Search -->
    <div class="sidebar-widget search-box">
        <form method="post" action="contact.html">
            <div class="form-group">
                <input type="search" name="search-field" value="" placeholder="Search" required>
                <button type="submit"><span class="icon fa fa-search"></span></button>
            </div>
        </form>
    </div>

    <!--Adds Widget-->
    <div class="sidebar-widget sidebar-adds-widget">
        <div class="adds-block" style="background-image:url(images/noid.jpg);">
            <div class="inner-box">
                <b style="color: white;">No ID No Service</b>
            </div>

        </div> <br>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident ut quam cumque a itaque voluptatum iure
            possimus amet molestias inventore voluptate tempora explicabo iusto omnis, ipsam quod non ratione nesciunt.
        </p>
    </div>
    <!--Ends Adds Widget-->

    <!--Social Widget-->
    <div class="sidebar-widget sidebar-social-widget">
        <!--Sec Title-->
        <div class="sec-title">
            <h2>Follow Us</h2>
        </div>
        <ul class="social-icon-one alternate">
            <li><a href="https://www.facebook.com/daffodilvarsity.edu.bd"><span></span><i
                        class="fab fa-facebook"></i></a></li>
            <li class="twitter"><a href="http://localhost/automated%20transport/home.html"><span></span><i
                        class="fab fa-twitter"></i></a></li>
            <li class="g_plus"><a href="https://www.instagram.com/daffodil.university/"><span></span> <i
                        class="fab fa-instagram"></i></a></li>
        </ul>
    </div>
    <!--End Social Widget-->

    <!-- Mostrecent head -->

    <div class="mostrecent wrapper">
        <!-- Sidebar Block Head Start -->
        <div class="head education-head">

            <!-- Tab List -->
            <div class="sidebar-tab-list education-sidebar-tab-list nav">
                <a class="tab-button active" data-id="home" href="#latest-news" style="list-style: none;">Latest
                    News</a>
                <a href="#popular-news" class="tab-button" data-id="about">Popular News</a>
            </div>

        </div>
        <!-- Sidebar Block Head End -->

        <!-- Sidebar Block Body Start -->
        <div class="body">

            <div class="tab-content">
                <div class="contentX active" id="home">
                    @foreach($latest_news as $post)
                    <!-- Small Post Start -->
                    <div class="post post-small post-list education-post post-separator-border">
                        <div class="postwrap">

                            <!-- Image -->
                            <a class="image" href=""><img src="{{asset($post->image)}}" alt="post" width="100%"
                                    height="80"></a>
                            <!-- Content -->
                            <div class="content">
                                <!-- Title -->
                                <h5>
                                    <a href="">{{$post->title}}</a>
                                </h5>

                                <!-- Meta -->
                                <div class="meta fix">
                                    <span class="meta-item date"><i
                                            class="fa fa-clock-o"></i>{{date('M d, Y', strtotime($post->published_at))}}</span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Small Post End -->
                    @endforeach
                </div>

                <div class="contentX" id="about">
                    @foreach($popular_posts as $post)
                    <!-- Small Post Start -->
                    <div class="post post-small post-list education-post post-separator-border">
                        <div class="postwrap">

                            <!-- Image -->
                            <a class="image" href=""><img src="{{asset($post->image)}}" alt="post" width="100%"
                                    height="80"></a>

                            <!-- Content -->
                            <div class="content">

                                <!-- Title -->
                                <h5>
                                    <a href="">{{$post->title}}</a>
                                </h5>

                                <!-- Meta -->
                                <div class="meta fix">
                                    <span class="meta-item date"><i
                                            class="fa fa-clock-o"></i>{{date('M d, Y', strtotime($post->published_at))}}</span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Small Post End -->

                    @endforeach
                </div>

            </div>
        </div>
        <!-- Sidebar Block Body End -->

    </div>

    <!-- Sidebar End -->
</div>&nbsp;
<!--Social Widget-->
<!--Facebook Widget-->
<div class="sidebar-widget facebook-widget">
    <div class="sec-title">
        <h2>Facebook Page</h2>
    </div>
    <div class="widget-content">
        <div class="image">
            <a href="https://www.facebook.com/theofficialjea" target="_blank"><img
                    src="{{ asset('images/Screenshot 2022-05-03 113345.png') }}" /></a>
        </div>
    </div>
</div>
<!--End Social Widget-->
<script>
    const tabs = document.querySelector(".wrapper");
    const tabButton = document.querySelectorAll(".tab-button");
    const contents = document.querySelectorAll(".contentX");
    tabs.onclick = e => {
        const id = e.target.dataset.id;
        if (id) {
            tabButton.forEach(btn => {
                btn.classList.remove("active");
            });
            e.target.classList.add("active");
            contents.forEach(content => {
                content.classList.remove("active");
            });
            const element = document.getElementById(id);
            element.classList.add("active");
        }
    }
</script>
<style>
    .contentX {
        display: none;
    }

    .contentX.active {
        display: block;
    }
</style>

@section('css')

{{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
</script>
@endsection
