@extends('UserViews.master')

@section('content')
@section('style')
<style>

.booking {
    position: relative;
    width: 100%;
    margin-bottom: 45px;
    
    background: rgba(0, 0, 0, .04);
}

.booking .booking-content {
    padding: 45px 0 15px 0;
}

.booking .booking-content .section-header {
    margin-bottom: 30px;
}

.booking .booking-form {
    padding: 60px 30px;
    background: #fbaf32;
}

.booking .booking-form .control-group {
    margin-bottom: 15px;
}

.booking .booking-form .input-group-text {
    position: absolute;
    padding: 0;
    border: none;
    background: none;
    top: 15px;
    right: 15px;
    color: #ffffff;
    font-size: 14px;
}

.booking .booking-form .form-control {
    height: 45px;
    font-size: 14px;
    color: #ffffff;
    padding: 0 15px;
    border-radius: 5px !important;
    border: 1px solid #ffffff;
    background: transparent;
}

.booking .booking-form select.form-control {
    padding: 0 10px;
}

.booking .booking-form .form-control::placeholder {
    color: #ffffff;
    opacity: 1;
}

.booking .booking-form .form-control:-ms-input-placeholder,
.booking .booking-form .form-control::-ms-input-placeholder {
    color: #ffffff;
}

.booking .booking-form .input-group [data-toggle="datetimepicker"] {
    cursor: default;
}
.booking-form .btn.custom-btn {
    width: 100%;
    color: #fbaf32;
    background: #ffffff;
    border: 1px solid #ffffff;
}

.booking .booking-form .btn.custom-btn:hover {
    color: #ffffff;
    background: transparent;
}
[type=button]:not(:disabled), [type=reset]:not(:disabled), [type=submit]:not(:disabled), button:not(:disabled) {
    cursor: pointer;
}
.btn {
    display: inline-block;
    font-weight: 400;
    color: #212529;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: .25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
button, input, optgroup, select, textarea {
    margin: 0;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}

button {
    border-radius: 0;
    background-color:;
}


button, select {
    text-transform: none;
}
button, input {
    overflow: visible;
}
option{
    background:black;
}

 </style>
 
@endsection
 @yield('style')
 
 <div class="page-header mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>booking table</h2>
                    </div>
                  
                </div>
            </div>
        </div>
<div class="booking">
            <div class="container">
            <form role="form" method="POST" action="{{url('booking-store')}}" 
                              enctype="multipart/form-data">
                                @csrf
                                @if(session()->has('success'))
                                <div class="row">
                                    <div class="alert alert-success fade in">
                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                <i class="fa fa-times"></i>
                                            </button>
                                            <strong>{{session()->get('success')}}</strong>
                                    </div>
                                </div>
                                @endif
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="booking-content">
                            <div class="section-header">
                                <h3>Book A Table</h3><br>
                                <h2>Book Your Table For Private caffoe &amp; Happy Hours</h2>
                            </div>
                       
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="booking-form">
                            <form>
                                <div class="control-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{old('name')}}" name="name"  placeholder="Name" required="required">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="far fa-user"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="input-group">
                                    
                                        <input type="email" id="exampleInputEmail1" class="form-control" value="{{old('email')}}"name="email" placeholder="Email" required="required">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="far fa-envelope"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="input-group">
                                    
                                        <input type="text" class="form-control"name="phone" placeholder="Mobile" required="required">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-mobile-alt"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="input-group-append">
                                    <div class="input-group-text"><i class="fa fa-mobile-alt"></i></div>
                                    <select class="custom-select form-control" name="table_number">
                                            <option selected="">table_number</option>
                                            <option value="1">1 table_number</option>
                                            <option value="2">2 table_number</option>
                                            <option value="3">3 table_number</option>
                                            <option value="4">4 table_number</option>
                                            <option value="5">5 table_number</option>
                                            <option value="6">6 table_number</option>
                                            <option value="7">7 table_number</option>
                                            <option value="8">8 table_number</option>
                                            <option value="9">9 table_number</option>
                                            <option value="10">10 table_number</option>
                                        </select>
                                      
                                    </div>
                                </div>
                                <form action="{{url('api/change-state')}}" method="post" id="myForm">
                                        @csrf
                                  <select name="state" class="form-control" >
                                        <option value="empty"> empty</option>
                                        <option value="reserved" >  reserved</option>
                                        <option value="waiting"> waiting</option>
                                       
                                          </select>
                                        
                                        </form>
                                <div class="control-group">
                                   
                                    <div class="input-group input-large" data-date="13/07/2013" data-date-format="mm/dd/yyyy" >
                                        <input type="date" class="form-control datetimepicker-input" name="date" placeholder="Date" data-target="#date" data-toggle="datetimepicker">
                                        <div class="input-group-append" data-target="#date" data-toggle="datetimepicker">     
                                            <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="input-group time " id="time" data-target-input="nearest">
                                    <input type="time" class="form-control" name="time" placeholder="Time" required="required">
                                        <div class="input-group-append" data-target="#time" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        </div>
                                    </div>
                                </div>
                              
                                <div>
                                    <button class="mx-auto block"  type="secondary" on >Book Now</button>
                                </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        @endsection
        @section('script')


@endsection