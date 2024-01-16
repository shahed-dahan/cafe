@extends('UserViews.master')
@section('content')
@section('style')


 
 
@endsection
 @yield('style')
<div class="page-header mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Food Meal</h2>
                    </div>
                    <div class="col-12">
                        <a href="#">Home</a>
                        <a href="#menu">Meal</a>
                        <a href="{{url('cart')}}">cart</a>
                    </div>
                </div>
            </div>
</div>
<div class="menu">
            <div class="container">
                
                <div class="menu-tab">
                    <div class="tab-content">
                        <div id="burgers" class="container tab-pane active">
                            <div class="row">
                                <div class="col-lg-7 col-md-12">
                                    @foreach( $meals as $meal )
                                    <div class="menu-item">
                                        <div class="menu-img">
                                            <img width="80" src='{{asset("mealImage/{$meal->image}")}}'>
                                           </div>  
                                        <div class="menu-text">
                                        <h3><a href='{{url("meal-detail/$meal->id")}}'><span><strong>{{$meal->name}}</a></strong></span>
                                        <div class="col-lg-5 d-none d-lg-block">
                                       </div>

                                
                                        <strong>{{$meal->price}}$</strong></h3>
                                            <p>{{$meal->description}}</p>
                                        </div>
                              
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-lg-5 d-none d-lg-block">
                                <div class="section-header text-center">
                    
                    <h3>{{$menu->name}}</h3>
                </div>
                <div class="img1">
                                <img  src='{{asset("menuImage/{$menu->image}")}}'>
</div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
@endsection
