
 @foreach($p_members as $president)
 <div class="supervisor cons">

     <div class="col-left">
         <div class="supervisor-img">
             <img class="img-fluid " src="{{ asset( $president->image) }}" alt="img" style="margin-bottom:10px">
         </div>
     </div>
     <div class="col-right">
         <h1 class="sup-title">Presid<span>ent</span></h1>
         <h2 style="font-weight:1000;font-size:20px">
             {{ $president->name }}
         </h2>
         <div>
             <b class="pro-type"> {{ $president->designation }}</b><br>
             <b class="pro-type"> {{ $president->job }}</b><br>
             <b class="pro-type"> {{ $president->job_location }}
         <br>
         <!-- header-bot -->
         <div class="col-md-6 agileits-social top_content">
             <ul class="social-nav model-3d-0 footer-social w3_agile_social">
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
         </div>

     </div>
 </div>
 @endforeach
