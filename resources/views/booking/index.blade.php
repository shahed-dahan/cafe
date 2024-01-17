@extends('master')

@section('content')
<div class="row">
                  <div class="col-sm-12">
                      <section class="panel">
                          <header class="panel-heading">
                     حجز الطاولة
                          </header>
                          <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix" style="margin-bottom: 5px">
                        <div class="btn-group">
                            <a id="editable-sample_new" class="btn green" href="{{ url('booking-create') }}" style="background-color: #F0F0F0;">
                                Add table <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <div class="btn-group pull-right">
                            <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="#">Print</a></li>
                                <li><a href="#">Save as PDF</a></li>
                                <li><a href="#">Export to Excel</a></li>
                            </ul>
                        </div>
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
                    <div class="space15"></div>
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>اسم الزبون</th>
                                  <th>ايميل</th>
                                  <th>الهاتف</th>
                                  <th>رقم الطاولة</th>
                                  <th>تاريخ</th>
                                  <th>الساعة</th>
                                 
                                  <th>حذف</th>
                                  <th>تعديل</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($booking as $key=>$booking)
                                    <tr>
                                @csrf 
                                <td>{{$key}}</td>
                                <td>{{$booking->name}}</td>
                                <td>{{$booking->email}}</td>
                                <td>{{$booking->phone}}</td>
                                    <td>{{$booking->table_number}}</td>
                                    <td>{{$booking->date}}</td>
                                   
                                    <td>{{$booking->time }}</td>
                                   
                                    <td>
                                    <form method="post" action='{{url("booking-destroy/$booking->id}")}}'>
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">delete</button>
                                     </form>
                                    </td>
                                  <td>
                                    <a href='{{url("booking-edit/{$booking->id}")}}'
                                    class="btn btn-success">تعديل</a>
                                  </td>
                                    <td>
                                  
                               
                                </tr>
                                @endforeach
                           
                              </tbody>
                          </table>
                      </section>
                  </div>
                 
              </div>
@endsection