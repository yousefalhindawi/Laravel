@extends('cars.common_file.layout')

@section('content')

<h1>{{ $data }}</h1>



<div class="bg-light">
  <div class="container py-5">
    <div class="row h-100 align-items-center py-5">
      <div class="col-lg-6">
        <h1 class="display-4"><span style = "color: #707bfb;">SMART</span> FOR 	SMARTPHONES</h1>
        <p class="lead text-muted mb-0">SMART is the leading distributor and retailer of mobile devices in the Middle East, representing some of leading brands in the world since its inception in 2022.</p>
      </div>
      <div class="col-lg-6 d-none d-lg-block"><img src="./image/redmi_note_11_pro_front_4.png" alt="" class="img-fluid"></div>
    </div>
  </div>
</div>

<div class="bg-white py-5">
  <div class="container py-5">
    <div class="row align-items-center mb-5">
      <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
        <h2 class="font-weight-light"><span style = "color: #707bfb;">SMART</span> FOR TABLETS</h2>
        <p class="font-italic text-muted mb-4">SMART Mobile was established with a singular objective: to offer cutting edge mobile technologies to all consumer segments, making sure that we fulfill the often-ignored promise of an unparalleled customer experience.</p><a href="#" class="btn btn-light px-5 rounded-pill shadow-sm">Learn More</a>
      </div>
      <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="./image/blackview_tab_10_pro.png" alt="" class="img-fluid mb-4 mb-lg-0"></div>
    </div>
    <div class="row align-items-center">
      <div class="col-lg-5 px-5 mx-auto"><img src="./image/redmi_buds_3_front.png" alt="" class="img-fluid mb-4 mb-lg-0"></div>
      <div class="col-lg-6"><i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
        <h2 class="font-weight-light"><span style = "color: #707bfb;">SMART</span> FOR ACCESSORIES</h2>
        <p class="font-italic text-muted mb-4">Today, we serve a growing customer base through more than 3,200 points of sale, 13 showrooms and 15 service centers across Palestine, Jordan and Iraq. We also launched an online store that was conceived to elevate the online shopping experience in the region by offering choice, ease-of-use, and security.</p><a href="#" class="btn btn-light px-5 rounded-pill shadow-sm">Learn More</a>
      </div>
    </div>
  </div>
</div>

<div class="bg-light py-5 ">
  <div class="container py-5">
    <div class="row mb-4">
      <div class="col-lg-5">
        <h2 class="display-4 font-weight-light">Our team</h2>
        <p class="font-italic text-muted">CEO - FOUNDER</p>
      </div>
    </div>

    <div class="row text-center">



      <!-- End-->
      <!-- Team item-->
      <div class="col-xl-3 col-sm-6 mb-5" style="margin: 0 auto">
        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="https://bootstrapious.com/i/snippets/sn-about/avatar-1.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
          <h5 class="mb-0">YOUSEF</h5><span class="small text-uppercase text-muted">CEO - Founder</span>
          <ul class="social mb-0 list-inline mt-3">
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
      <!-- End-->

    </div>
  </div>
</div>


@endsection


