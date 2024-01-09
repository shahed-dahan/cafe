@extends('master')

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('pluggins/assets/bootstrap-datepicker/css/datepicker.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('pluggins/assets/bootstrap-daterangepicker/daterangepicker-bs3.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('pluggins/assets/select2/css/select2.min.css')}}"/>
@endsection
@yield('style')
@section('content')
<div class="row">
                  <div class="col-sm-12">
                      <section class="panel">
                          <header class="panel-heading">
                             الطلبيات
                          </header>
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
                                <form action="{{url('order')}}" class="form-horizontal tasi-form">
                                    @csrf
                               
                                    <div class="row">
                                    <div class="form-group col-md-6">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Customer</label>
                                      <div class="col-lg-10">
                                          
                                      <select class="form-control js-example-basic-single" name="customer_id">
                                        <option value="" selected>جميع الزبائن</option>
                                         @foreach($customers as $customer)
                                         <option value="{{$customer->id}}" @if(app('request')->input('customer_id')== $customer->id) selected @endif>{{$customer->customer_name}}</option>
                                         @endforeach
                                      </select>
                                          
                                      </div>
                                  </div>
                                    <div class="form-group col-md-6">
                                  <label class="control-label col-md-3">Date Range</label>
                                  <div class="col-md-4">
                                      <div class="input-group input-large" data-date="13/07/2013" data-date-format="mm/dd/yyyy">
                                          <input type="date" value="{{app('request')->input('from_date')}}" id="issueinput3" class="form-control" name="from_date" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="From Date">

                                          <span class="input-group-addon">To</span>
                                          <input type="date" id="issueinput4" value="{{app('request')->input('to_date')}}" class="form-control" name="to_date" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="To Date">

                                      </div>
                                      <span class="help-block">Select date range</span>
                                  </div>
                                
                                </div>
</div>                            <div class="row">
                                    <div class="form-group col-md-6">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Customer</label>
                                      <div class="col-lg-10">
                                          
                                      <select class="form-control js-example-basic-single" name="state">
                                        <option value="" selected>جميع الحالات</option>
                                        <option value="wait" @if(app('request')->input('state')=='wait') selected @endif> wait</option>
                                        <option value="accept" @if(app('request')->input('state')=='accept') selected @endif> accept</option>
                                        <option value="delivered" @if(app('request')->input('state')=='delivered') selected @endif> delivered</option>
                                        <option value="refuse" @if(app('request')->input('state')=='refuse') selected @endif> refuse</option>
                                        
                                      </select>
                                       
                                      </div>
                                      </div>
                                      </div>
                              
                                                <div class="form-actions center">
                                        
                                        <button type="submit" class="btn btn-primary">
                                            <i class="icon-android-search"></i> بحث
                                        </button>
                                    </div>
                                </form>
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>اسم الزبون</th>
                                  <th>التاريخ</th>
                                  <th>حالة الطلبية</th>
                                  <th>عرض</th>
                                  <th>حذف</th>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach($orders as $key=>$order)
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>{{$order->customer->customer_name}}</td>
                                    <td>
                                        {{$order->customer->address}}
                                    </td>
                                    <td>
                                        {{$order->created_at->format('d/m/Y')}}
                                    </td>
                                    <td>
                                        {{$order->state}}
                                    </td>
                                  
                                    <td><a class="btn btn-success" href='{{url("order/{$order->id}")}}'>Show</a></td>
                                    <td>
                                        <form method="post" action='{{url("order/$order->id")}}'>
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                              </tbody>
                          </table>
                      </section>
                  </div>
                 
              </div>
@endsection
@section('script')

  <!--select2-->
  <script type="text/javascript" src="{{asset('pluggins/assets/select2/js/select2.min.js')}}"></script>
<script type="text/javascript">

$(document).ready(function () {

    $('[name=from_date]').change(function(){
        _this=$(this);
        $('[name=to_date]').attr('min',_this.val());
        // $('[name=to_date]').val(_this.val());
    });
    $('[name=to_date]').change(function(){
        _this=$(this);
        $('[name=from_date]').attr('max',_this.val());
        // $('[name=from_date]').val(_this.val());
    });

});
</script>
   <!--select2-->
   <script type="text/javascript">

$(document).ready(function () {
    $(".js-example-basic-single").select2({
        dir: "rtl"
    });

});
</script>
  @endsection
