@extends('UserViews.master')
<!-- @section('style')
<style>
    .blog {
    position: relative;
    width: 100%;
    padding: 45px 0 0 0;
}
    </style>
@endsection
@yield('style') -->
@section('content')
<div class="page-header mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Cart</h2>
                    </div>
                  
                </div>
            </div>
</div>
  <!-- Contact Start -->
  <div class="contact">
            <div class="container">
                <div class="section-header text-center">
                    <h2>your Order</h2>
                </div>
            
                <div class="row contact-form">
                    <div class="col-md-6">
                    <table class="table">
                              <thead>
                              <tr>
                                  <th>اسم الوجبة</th>
                                  <th>الكمية</th>
                                  <th>السعر</th>
                                  <th>حذف</th>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach($carts as $cart)
                                <tr>
                                @csrf 
                                    <td>{{$cart->meal->name  ?? 'N/A'}}</td>
                                    <td>{{$cart->quantity}}</td>
                                    <td>{{$cart->meal->price  ?? 'N/A'}}</td>
                                    <td>
                                        <form method="post" action='{{url("cart-destroy/$cart->id")}}' >
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                               
                                @endforeach
                              </tbody>
                          </table>
                    </div>
                    <div class="col-md-6">
                        <div id="success"></div>
                        <form  method="POST" action="{{url('create-order')}}" >
                        @csrf   
                        <!-- <div class="control-group">
                                <input type="text" class="form-control" id="name" name="customer_name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control"  name="phone" placeholder="Your phone number" required="required"  />
                                <p class="help-block text-danger"></p>
                            </div>
                            
                            <div class="control-group">
                                <textarea class="form-control" id="message" placeholder="your address" name="address" required="required" data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div> -->
                            <div>
                                <button class="btn custom-btn" type="submit" >Send Order</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

@endsection