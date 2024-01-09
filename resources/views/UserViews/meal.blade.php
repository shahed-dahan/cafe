@extends('UserViews.master')
@section('content')
@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('userpluggins/css/style1.css')}}" />
<!-- kkkk -->
<link rel="stylesheet" type="text/css" href="{{asset('userpluggins/css/style.css')}}" />
<style>
 body {
    font-family: 'Roboto', sans-serif;
    background-color: #f4f4f4;
    color: #333;
}

.page-header {
    background-color:browen;
    color: #fff;
    padding: 20px;
    text-align: center;
}

.page-header h2 {
    margin: 0;
}

.menu {
    background-color: #fff;
    padding: 40px;
    border-radius: 1200px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.menu-item {
    margin-bottom: 20px;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.menu-img img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
    margin-right: 20px;
}

.menu-item h3 {
    margin-top: 0;
}

.menu-item p {
    margin-bottom: 0;
}

/* تنسيقات خاصة بالأحرف الكبيرة (uppercase) */
.menu-item h3 strong {
    text-transform: uppercase;
    font-family: 'Dancing Script', cursive;
}

/* تنسيقات خاصة بالعناوين (headers) */
.section-header h3 {
  
    color: browen;
    font-family: 'Dancing Script', cursive;
}
.img1 img {
    
    width: 400px;
    height: 400px;
    border-radius: 40%;
    object-fit: cover;
    display: block;
    margin: 20px; /* يوضع الصورة في الوسط أفقياً */
}
.row h2,strong{
    color: brown;
}

  

    </style>
  @yield('style')
@endsection

<div class="page-header mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Food Meal</h2>
                    </div>
                    <div class="col-12">
                        <a href="#">Home</a>
                        <a href="#menu">Meal</a>
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
