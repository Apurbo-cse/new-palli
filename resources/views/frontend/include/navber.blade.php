<div class="mobile-fixed-toolbar">
    <ul class="top-nav-mobile-left">
        <li style="width:50%;">
            <a href="{{ url('/') }}"><img src="{{asset('frontend/images/logo.png')}}"
                    style="width:60px;padding-top:2px;"></a>
        </li>
    </ul>
    <ul class="top-nav-mobile">
        <li><a href="" id="pull" class="toggle-mobile-menu"><i class="uil uil-apps" aria-hidden="true"
                    style="color:black;margin-top:-20px;"></i></a></li>
    </ul>
</div>
<style>
    .menu li a,
    .dropdown .dropdown-content a {
        color: black;
        font-weight: 600px;
        font-size: 14px;
    }

    .clearfixX {
        list-style: none !important;
    }

</style>
<nav id="navigation" class="primary-navigation mobile-menu-wrapper" role="navigation">
    <div id="nav-container">
        <ul id="menu-header-menu" class="menu clearfixX">
            <li><a href="{{ route('index') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li>
                <div class="dropdown">
                    <a class="dropbtn" style="color:black;">Engineer's</a>
                    <div class="dropdown-content">
                        <a href="{{ route('msc') }}">MSc in Engineer</a>
                        <a href="{{ route('bsc') }}">BSc in Engineer</a>
                        <a href="{{ route('bsc_diploma') }}">BSc in Engineer (Diploma)</a>
                        <a href="{{ route('diploma') }}">Diploma in Engineer</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="dropdown">
                    <a class="dropbtn" style="color:black;">Info</a>
                    <div class="dropdown-content">
                        <a href="{{ url('central-committee') }}">Central Committee</a>

                        <a data-bs-toggle="collapse" href="#collapseExampleq" role="button" aria-expanded="false"
                            aria-controls="collapseExample">
                            Thana Committee
                        </a>

                        <div class="collapse" id="collapseExampleq">
                            <a href="{{ route('joypurhat') }}">Joypurhat Sadar</a>
                            <a href="{{ route('panchbibi') }}">Panchbibi</a>
                            <a href="{{ route('kalai') }}">Kalai</a>
                            <a href="{{ route('khetlal') }}">Khetlal</a>
                            <a href="{{ route('akkelpur') }}">Akkelpur</a>
                        </div>

                        <a href="{{ url('developer') }}">Developer Info</a>

                    </div>
                </div>
            </li>
            <li><a href="{{ route('gallery') }}">Gallery</a></li>
            <li><a href="{{ route('blog') }}">Blog</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>

            <!-- Authentication Links -->
            @guest
            <li>
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>

            @else

            <li>
                <div class="dropdown">
                    <a class="LogInF mb-3">
                        <img src="{{asset(Auth::user()->image)}}" class="ProImg" />&nbsp;{{ Auth::user()->name }}
                        {{-- <i class="fa fa-user" aria-hidden="true"></i> --}}
                    </a>

                    <div class="dropdown-content">
                        <a href="{{ route('web.profile') }}">My Profile</a>
                        <a href="myprofile">Settings</a>

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                </div>
            </li>
            @endguest

        </ul>

        <div id="header-user-info-container" class="hidden-to-guest">
            <span id="robi-header-logo">
                <a href=""> <img src="{{asset('frontend/images/logo.png')}}" style="width:50px; padding-top:5px;"></a>
            </span>
        </div>

    </div>
</nav>

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

<style>
    .ml11 {
        font-weight: 700;
        font-size: 20px;
        color: #095271;
    }

    .ml11 .text-wrapper {
        position: relative;
        display: inline-block;
        padding-top: 0.1em;
        padding-right: 0.05em;
        padding-bottom: 0.15em;
    }

    .ml11 .line {
        opacity: 0;
        position: absolute;
        left: 0;
        height: 100%;
        width: 3px;
        background-color: #fff;
        transform-origin: 0 50%;
    }

    .ml11 .line1 {
        top: 0;
        left: 0;
    }

    .ml11 .letter {
        display: inline-block;
        line-height: 1em;
    }

    @media (max-width: 480px) {

        .header-middle form {
            width: 95% !important;
            margin-left: 20px;
        }
    }
</style>

<script>
    // Wrap every letter in a span
    var textWrapper = document.querySelector('.ml11 .letters');
    textWrapper.innerHTML = textWrapper.textContent.replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>");
    anime.timeline({
            loop: true
        })
        .add({
            targets: '.ml11 .line',
            scaleY: [0, 1],
            opacity: [0.5, 1],
            easing: "easeOutExpo",
            duration: 700
        })
        .add({
            targets: '.ml11 .line',
            translateX: [0, document.querySelector('.ml11 .letters').getBoundingClientRect().width + 10],
            easing: "easeOutExpo",
            duration: 700,
            delay: 100
        }).add({
            targets: '.ml11 .letter',
            opacity: [0, 1],
            easing: "easeOutExpo",
            duration: 600,
            offset: '-=775',
            delay: (el, i) => 34 * (i + 1)
        }).add({
            targets: '.ml11',
            opacity: 0,
            duration: 1000,
            easing: "easeOutExpo",
            delay: 1000
        });
</script>
