@extends('UserViews.master')
@section('content')
@section('style')
<style>
    /* Add your custom styles here */
    .booking {
        padding: 50px 0;
        background-color: #f4f4f4;
    }

    .booking-content {
        padding: 20px;
        background-color: #fff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        color:#5d4037;
    }

    .booking-form {
        background-color: #fff;
        padding: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .booking-form input {
        margin-bottom: 10px;
        
    }

    .booking-form button {
        width: 100%;
        margin-top: 10px;
        color:#5d4037;
    }
</style>
@yield('style')
@endsection
<!-- Page Header Start -->
<div class="page-header mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Customer Info</h2>
                    </div>
                  
                </div>
            </div>
        </div>
        <!-- Page Header End -->
 <!-- Booking Start -->
 <div class="booking">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="booking-content">
                            <div class="section-header">
                                <h2>Please Enter your information before order</h2>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="booking-form">
                            <form  method="POST" action="{{url('create-customers')}}">
                            @csrf 
                            @if(session()->has('errors'))
                                <div class="row">
                                    <div class="alert alert-danger">
                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                <i class="fa fa-times"></i>
                                            </button>
                                            <strong>{{session()->get('errors')}}</strong>
                                    </div>
                                </div>
                                    
                                @endif
                                <input hidden  name="user_id" value="{{\Auth::user()->id}}">
                                <div class="control-group">
                                    <div class="input-group">
                                        <input type="text" name="customer_name" class="form-control" placeholder="Customer Name" required="required" />
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="far fa-user"></i></div>
                                        </div>
                                    </div>
                                </div>
                              
                                <div class="control-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="phone" placeholder="Mobile" required="required" />
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-mobile-alt"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="address" placeholder="Your Address" required="required" />
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-mobile-alt"></i></div>
                                        </div>
                                    </div>
                                </div>
                             
                               
                                <div>
                                    <button class="btn custom-btn" type="submit">save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Booking End -->
@endsection