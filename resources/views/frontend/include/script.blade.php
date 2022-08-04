<!-- navber--->
<script src="{{asset('frontend/js/window.js')}}"></script>

<!-- Carousel -->
<script src="{{asset('frontend/ap/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/ap/js/main.js')}}"></script>

<script>
    @if(Session::has('success'))
    toastr.success("{{ Session::get ('success')}}");
    @endif
</script>


<!-- navber--->
{{-- <script src="{{asset('frontend/js/testminial.js')}}"></script> --}}

<!-- js -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<script>
    $(document).ready(function() {
        if ($(window).width() > 991) {
            $('.navbar-light .d-menu').hover(function() {
                $(this).find('.sm-menu').first().stop(true, true).slideDown(150);
            }, function() {
                $(this).find('.sm-menu').first().stop(true, true).delay(120).slideUp(100);
            });
        }
    });
</script>
<script type="text/javascript">
    var nav = document.querySelector('nav');
    window.addEventListener('scroll', function() {
        // if (window.pageYOffset > 100) {
        //     nav.classList.add('bg-dark', 'shadow');
        // } else {
        //     nav.classList.remove('bg-dark', 'shadow');
        // }
    });
</script>

<script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
</script>

<!-- script for responsive tabs -->
{{-- <script src="{{asset('frontend/js/easy-responsive-tabs.js')}}"></script> --}}
<script>
    $(document).ready(function() {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default',
            width: 'auto',
            fit: true,
            closed: 'accordion',
            activate: function(event) {
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
        $('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });
    });
</script>
<!-- //script for responsive tabs -->


<script src="{{asset('frontend/js/responsiveslides.min.js')}}"></script>

<script>

    $(function() {

        $("#slider3").responsiveSlides({
            auto: true,
            pager: true,
            nav: false,
            speed: 500,
            namespace: "callbacks",
            before: function() {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function() {
                $('.events').append("<li>after event fired.</li>");
            }
        });
    });
</script>

<!-- js -->
<script type="text/javascript" src="{{asset('frontend/js/jquery-2.1.4.min.js')}}"></script>
<!-- //js -->

<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{asset('frontend/js/move-top.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/jquery.easing.min.js')}}"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event) {
            event.preventDefault();
            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
</script>

<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function() {
        /*
        	var defaults = {
        	containerID: 'toTop', // fading element id
        	containerHoverID: 'toTopHover', // fading element hover id
        	scrollSpeed: 1200,
        	easingType: 'linear'
        	};
        */
        $().UItoTop({
            easingType: 'easeOutQuart'
        });
    });
</script>
<!-- //here ends scrolling icon -->

<div id="v-w3layouts"></div>
<script>
    (function(v, d, o, ai) {
        ai = d.createElement('script');
        ai.defer = true;
        ai.async = true;
        ai.src = v.location.protocol + o;
        d.head.appendChild(ai);
    })(window, document, '../../../../../../../a.vdo.ai/core/v-w3layouts/vdo.ai.js');
</script>

<script src="{{asset('frontend/js/responsiveslides.min.js')}}"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function() {
        // Slideshow 4
        $("#slider3").responsiveSlides({
            auto: true,
            pager: true,
            nav: false,
            speed: 500,
            namespace: "callbacks",
            before: function() {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function() {
                $('.events').append("<li>after event fired.</li>");
            }
        });
    });
</script>

{{-- <script type='text/javascript'>//<![CDATA[
			$(window).load(function () {
				$("#slider-range").slider({
					range: true,
					min: 0,
					max: 9000,
					values: [1000, 7000],
					slide: function (event, ui) {
						$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
					}
				});
				$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

			});

		</script> --}}

<!-- navber--->

<script src="{{asset('frontend/js/window.js')}}"></script>

<!-- Carousel -->
<script src="{{asset('frontend/ap/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/ap/js/main.js')}}"></script>

<script>
    @if(Session::has('success'))
    toastr.success("{{ Session::get ('success')}}");
    @endif
</script>
