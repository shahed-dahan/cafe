<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from thevectorlab.net/flatlab-rtl/ by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 13 Apr 2017 09:53:31 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="{{asset('img/favicon.html')}}">

    <title>FlatLab - Flat & Responsive Bootstrap Admin Template</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('pluggins/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Bootstrap RTL CSS -->
    <link href="{{asset('pluggins/css/bs-rtl/bootstrap-rtl.min.css')}}" rel="stylesheet">
    <link href="{{asset('pluggins/css/bs-rtl/bootstrap-flipped.min.css')}}" rel="stylesheet">

    <link href="{{asset('pluggins/css/bootstrap-reset.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('pluggins/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{asset('pluggins/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')}}" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="{{asset('pluggins/css/owl.carousel.css')}}" type="text/css">

    <!--right slidebar-->
    <link href="{{asset('pluggins/css/slidebars.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="{{asset('pluggins/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('pluggins/css/style-responsive.css')}}" rel="stylesheet" />


@yield('style')
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container">
    @include('partials.header')
    @include('partials.sidebar')
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            @yield('content')

          </section>
      </section>
      <!--main content end-->

      <!-- Right Slidebar start -->
      <div class="sb-slidebar sb-left sb-style-overlay">
          <h5 class="side-title">Online Customers</h5>
          <ul class="quick-chat-list">
              <li class="online">
                  <div class="media">
                      <a href="#" class="pull-left media-thumb">
                          <img alt="" src="img/chat-avatar2.jpg" class="media-object">
                      </a>
                      <div class="media-body">
                          <strong>John Doe</strong>
                          <small>Dream Land, AU</small>
                      </div>
                  </div><!-- media -->
              </li>
              <li class="online">
                  <div class="media">
                      <a href="#" class="pull-left media-thumb">
                          <img alt="" src="img/chat-avatar.jpg" class="media-object">
                      </a>
                      <div class="media-body">
                          <div class="media-status">
                              <span class=" badge bg-important">3</span>
                          </div>
                          <strong>Jonathan Smith</strong>
                          <small>United States</small>
                      </div>
                  </div><!-- media -->
              </li>

              <li class="online">
                  <div class="media">
                      <a href="#" class="pull-left media-thumb">
                          <img alt="" src="img/pro-ac-1.png" class="media-object">
                      </a>
                      <div class="media-body">
                          <div class="media-status">
                              <span class=" badge bg-success">5</span>
                          </div>
                          <strong>Jane Doe</strong>
                          <small>ABC, USA</small>
                      </div>
                  </div><!-- media -->
              </li>
              <li class="online">
                  <div class="media">
                      <a href="#" class="pull-left media-thumb">
                          <img alt="" src="img/avatar1.jpg" class="media-object">
                      </a>
                      <div class="media-body">
                          <strong>Anjelina Joli</strong>
                          <small>Fockland, UK</small>
                      </div>
                  </div><!-- media -->
              </li>
              <li class="online">
                  <div class="media">
                      <a href="#" class="pull-left media-thumb">
                          <img alt="" src="img/mail-avatar.jpg" class="media-object">
                      </a>
                      <div class="media-body">
                          <div class="media-status">
                              <span class=" badge bg-warning">7</span>
                          </div>
                          <strong>Mr Tasi</strong>
                          <small>Dream Land, USA</small>
                      </div>
                  </div><!-- media -->
              </li>
          </ul>
          <h5 class="side-title"> pending Task</h5>
          <ul class="p-task tasks-bar">
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Dashboard v1.3</div>
                          <div class="percent">40%</div>
                      </div>
                      <div class="progress progress-striped">
                          <div style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-success">
                              <span class="sr-only">40% Complete (success)</span>
                          </div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Database Update</div>
                          <div class="percent">60%</div>
                      </div>
                      <div class="progress progress-striped">
                          <div style="width: 60%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-warning">
                              <span class="sr-only">60% Complete (warning)</span>
                          </div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Iphone Development</div>
                          <div class="percent">87%</div>
                      </div>
                      <div class="progress progress-striped">
                          <div style="width: 87%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info">
                              <span class="sr-only">87% Complete</span>
                          </div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Mobile App</div>
                          <div class="percent">33%</div>
                      </div>
                      <div class="progress progress-striped">
                          <div style="width: 33%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" role="progressbar" class="progress-bar progress-bar-danger">
                              <span class="sr-only">33% Complete (danger)</span>
                          </div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Dashboard v1.3</div>
                          <div class="percent">45%</div>
                      </div>
                      <div class="progress progress-striped active">
                          <div style="width: 45%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" role="progressbar" class="progress-bar">
                              <span class="sr-only">45% Complete</span>
                          </div>
                      </div>

                  </a>
              </li>
              <li class="external">
                  <a href="#">See All Tasks</a>
              </li>
          </ul>
      </div>
      <!-- Right Slidebar end -->
    @include('partials.footer')
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{asset('pluggins/js/jquery.js')}}"></script>
    <script src="{{asset('pluggins/js/bootstrap.min.js')}}"></script>
    <script class="include" type="text/javascript" src="{{asset('pluggins/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{asset('pluggins/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('pluggins/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script src="{{asset('pluggins/js/jquery.sparkline.js')}}" type="text/javascript"></script>
    <script src="{{asset('pluggins/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js')}}"></script>
    <script src="{{asset('pluggins/js/owl.carousel.js')}}" ></script>
    <script src="{{asset('pluggins/js/jquery.customSelect.min.js')}}" ></script>
    <script src="{{asset('pluggins/js/respond.min.js')}}" ></script>

    <!--right slidebar-->
    <script src="{{asset('pluggins/js/slidebars.min.js')}}"></script>

    <!--common script for all pages-->
    <script src="{{asset('pluggins/js/common-scripts.js')}}"></script>

    <!--script for this page-->
    <script src="{{asset('pluggins/js/sparkline-chart.js')}}"></script>
    <script src="{{asset('pluggins/js/easy-pie-chart.js')}}"></script>
    <script src="{{asset('pluggins/js/count.js')}}"></script>

  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
			  autoPlay:true,
              rtl:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

      $(window).on("resize",function(){
          var owl = $("#owl-demo").data("owlCarousel");
          owl.reinit();
      });

  </script>
  @yield('script')

  </body>

<!-- Mirrored from thevectorlab.net/flatlab-rtl/ by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 13 Apr 2017 09:53:31 GMT -->
</html>
