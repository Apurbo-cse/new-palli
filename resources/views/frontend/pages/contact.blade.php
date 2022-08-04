@extends('frontend.layouts.master')
@section('css')

@endsection

@section('content')
  <!-- contact1 -->
    <div class=" section-gap"></div>
      <div class="wrapper mb-5">
        <h4 class="sub-title text-center">Find us</h4>
        <h3 class="global-title text-center">Contact us</h3>
        <div class="d-grid contact-view">
          <div class="cont-details">


            <div class="cont-top">

              <div class="cont-left text-center">
                <span class="fa fa-phone text-primary"></span>
              </div>

              <div class="cont-right">
                <h6>Call Us</h6>
                <p><a href="#">+123 45 67 89</a></p>
              </div>

            </div>


            <div class="cont-top margin-up">

              <div class="cont-left text-center">
                <span class="fa fa-envelope-o text-primary"></span>
              </div>
              <div class="cont-right">
                <h6>Email Us</h6>
                <p><a href="mailto:example@mail.com" class="mail">example@mail.com</a></p>
              </div>

            </div>


            <div class="cont-top margin-up">
              <div class="cont-left text-center">
                <span class="fa fa-map-marker text-primary"></span>
              </div>
              <div class="cont-right">
                <h6>Address</h6>
                <p>Address here, Alwar Rajasthan India.</p>
              </div>
            </div>
          </div>



          <div class="map-content">
            <form action="#" method="post">
              <div class="twice-two">
                <input type="text" class="form-control" name="w3lName" id="w3lName" placeholder="Name" required="">
                <input type="email" class="form-control" name="w3lSender" id="w3lSender" placeholder="Email"
                  required="">
              </div>

              <div class="twice">
                <input type="text" class="form-control" name="w3lSubject" id="w3lSubject" placeholder="Subject"
                  required="">
              </div>

              <textarea name="w3lMessage" class="form-control" id="w3lMessage" placeholder="Message"
                required=""></textarea>
              <button type="submit" class="btn btn-contact">Send Message</button>
            </form>
          </div>



        </div>
      </div>
@endsection
