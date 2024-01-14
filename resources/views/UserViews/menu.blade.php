@extends('UserViews.master')

@section('style')



   
@endsection
 @yield('style')
@section('content')
 <div class="page-header mb-0" id= "menu">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1>Food Menu</h1>
                    </div>
                    <div class="col-12" id="smalllist">
                        
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