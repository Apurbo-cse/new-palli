@foreach($s_members as $member)
<div class="col-md-3">
    <div class="card mb-4 mx-2">
        <img  class="PreImg" src="{{ asset( $member->image )}}" alt="">
            <h4 class="pre sup-title">Secre<span>tary</span></h4>
            <p class=" ght text-center">{{ $member->name }}</p>
            <b class="text-center text-success mb-2">{{ $member->designation }}</b>
            <!-- header-bot -->
            {{-- <div class=" ">
                <ul class="social-nav bgs model-3d-0 footer-social w3_agile_social">
                    <li>
                        <a href="#" class="facebook">
                            <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                            <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                        </a>
                    </li>

                    <li>
                        <a href="" class="linkedin">
                            <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                            <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                        </a>
                    </li>

                    <li>
                        <a href="mailto:" class="email">
                            <div class="front"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                            <div class="back"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                        </a>
                    </li>

                    <li>
                        <a href="tel:+88" class="cell">
                            <div class="front"><i class="fa fa-phone" aria-hidden="true"></i></div>
                            <div class="back"><i class="fa fa-phone" aria-hidden="true"></i></div>
                        </a>
                    </li>

                </ul>
            </div> --}}

    </div>

</div>
@endforeach
