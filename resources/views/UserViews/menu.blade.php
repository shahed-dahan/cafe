@extends('UserViews.master')

@section('style')
<link rel="shortcut icon" href="{{asset('userpluggins/images/favicon.png')}}" type="">

<title> cafe </title>
<link rel="stylesheet" type="css" href="{{asset('userpluggins/css/style.css')}}" />
<!-- bootstrap core css -->
<link rel="stylesheet" type="text/css" href="{{asset('userpluggins/css/bootstrap.css')}}" />

<!--owl slider stylesheet -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<!-- nice select  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
<!-- font awesome style -->
<link href="{{asset('userpluggins/css/font-awesome.min.css')}}" rel="stylesheet" />

<!-- Custom styles for this template -->
<link href="{{asset('userpluggins/css/style.css')}}" rel="stylesheet" />
<!-- responsive style -->
<link href="{{asset('userpluggins/css/responsive.css')}}" rel="stylesheet" />
<link href="{{asset('userpluggins/css/.css')}}" rel="stylesheet" />

<style>
    /* اسلوب العنوان */
.page-header h1 {
  font-size: 3em;
  color: #5d4037;
  text-align: center;
}

/* اسلوب الروابط */
.page-header a {
  margin: 0 10px;
  text-decoration: none;
  color: #666;
}

/* اسلوب عناصر الطعام */
.food-item {
  margin-bottom: 20px;
  padding: 10px;
  border: 1px dotted #ddd;
  text-align: center;
}

.food-item img {
  border-radius: 30%;
  max-width: 100%;
  height: auto;
}

.food-item h2 {
  margin: 10px 0;
  font-size: 1.6em;
  color: #333;
}

.food-item a {
  display: block;
  padding: 10px;
  background-color: #5d4037;
 
  color: #fff;
  text-decoration: none;
  transition:background-color 0.3s;
}

.food-item a:hover {
  background-color: #d7ccc8;
}

a.nav-item {
      color: black; /* لون النص */
      text-decoration: none; /* إزالة التأثيرات الافتراضية للرابط */
      margin-right: 10px; /* هامش من اليمين للفصل بين الروابط */
     
      font-family: 'Times New Roman', Times, serif;
      font-size: 20px; /* حجم الخط */
      display: inline-block; /* جعل الروابط على نفس السطر */
      text-align: center; /* وضع الروابط في المنتصف */
      padding: 10px 20px; /* إضافة حشو للروابط */
      border: 2px solid black; /* إضافة حدود */
      border-radius: 5px; /* تقويس حواف الروابط */
      background-color: white; /* لون خلفية الروابط */
    }

    a.nav-item:hover {
      background-color: lightgray; /* تغيير لون الخلفية عند تحويل الماوس فوقها */
    
    }
   
    </style>
    @yield('style')
@endsection
@section('content')

<div class="page-header mb-0" id= "menu">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1>Food Menu</h1>
                    </div>
                    <div class="col-12">
                        
                        <a href="{{url('menu')}}" class="nav-item nav-link active">Home</a>
                        <a href="{{url('cart')}}" class="nav-item nav-link ">cart</a>
                    </div>
                </div>
            </div>
</div>
 <!-- Food Start -->
 <div class="food mt-0" >
            <div class="container">
                <div class="row align-items-center">
                    @foreach($menus as $menu)
                    
                    <div class="col-md-6">
                        <div class="food-item ">
                            <img src='{{asset("menuImage/{$menu->image}")}}' width="80">
                            <h2>{{$menu->name}}</h2>
                           
                            <a href='{{ url("meal/{$menu->id}") }}'>View Menu</a>
                           
                        </div>
                        
                      </div>
                      @endforeach   
      </div>       
        </div>
     
    </div>
  </section>
  
  @endsection
  @section('script')
  <script src="{{asset('userpluggins/js/jquery-3.4.1.min.js')}}"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="{{asset('userpluggins/js/bootstrap.js')}}"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="{{asset('userpluggins/js/custom.js')}}"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  @endsection