@extends('UserViews.master')

@section('content')
<!-- Page Header Start -->
<div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Food Blog</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Home</a>
                        <a href="">Blog</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-header text-center">
                    <h2>{{$meal->menu->name}}</h2>
                </div>
        <!-- Page Header End -->  
        <!-- Blog Start -->
        <div class="blog">
            <div class="container">
                <form class="form-horizontal" role="form" id="myForm" action="{{url('add-cart')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <input type="text" name="meal" value="{{$meal->id}}" hidden>

                            @if (session('success'))
                            <div class="row">
                                <div class="form-group col-md-12 " style="text-align: center;">

                                    <div class="alert alert-success">
                                        {!! session('success') !!}
                                    </div>
                                </div>
                            </div>
                            @endif
                    <div class="row">
                        <div class="offset-md-3 col-md-6">
                            <div class="blog-item">
                                <div class="blog-img">
                                    <img src='{{asset("mealImage/{$meal->image}")}}' alt="Blog">
                                </div>
                                <div class="blog-content">
                                    <h2 class="blog-title">{{$meal->name}}</h2>
                                    <div class="blog-meta">
                                    <p><i class="fas fa-cash-register   " style="padding-left:5px"></i> price : {{$meal->price}}</p>
                                    </div>
                                    <div class="blog-text">
                                        <p>
                                        {{$meal->description}}
                                        </p>
                                    </div>
                                    <div class="blog-text">
                                            <div class="menu-text">
                                                <input type="number" class="form-control" name="quantity" placeholder="quantity of meal" required="required" data-validation-required-message="Please enter quantity" aria-invalid="false">
                                            </div>
                                    </div>
                                    <button type="submit" style="margin-top: 10px;padding: 5px 15px;" class="btn" >add to cart</button>
                                   
                                    <!-- <a  class="btn custom-btn" href='{{url("create-customers")}}'>add to data</a> -->
                               
                                        <a  class="btn custom-btn" href='{{url("meal/$meal->menu_id")}}'>back</a>
                                
                                </div>
                            </div>
                        </div> 
                    </div>
                </form>
            </div>
        </div>
        <!-- Blog End -->
@endsection