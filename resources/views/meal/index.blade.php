@extends('master')

@section('content')
<div class="row">
                  <div class="col-sm-12">
                      <section class="panel">
                          <header class="panel-heading">
                             التصنيفات
                          </header>
                          <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix" style="margin-bottom: 5px">
                        <div class="btn-group">
                            <a id="editable-sample_new" class="btn green" href="{{ url('meal-create') }}" style="background-color: #F0F0F0;">
                                Add New <i class="fa fa-plus"></i>
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
                    </div>
                    <div class="space15"></div>
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>اسم الوجبة</th>
                                  <th>الصورة</th>
                                  <th>السعر</th>
                                  <th>وصف</th>
                                  <th>#</th>
                                  <th>الصنف</th>
                                  <th>حذف</th>
                                  <th>تعديل</th>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach($meals as $key=>$meal)
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>{{$meal->name}}</td>
                                    <td>
                                        <img width="50" src='{{asset("mealImage/{$meal->image}")}}'>
                                    </td>
                                    <td>{{$meal->price}}</td>
                                    <td>{{$meal->description}}</td>
                                    <td>{{$meal->menu_id}}</td>
                                    <td>{{$meal->menu->name}}</td>
                                    <td>
                                    <form method="post" action='{{url("meal-destroy/$meal->id}")}}'>
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                     </form>
                                    </td>
                               <td>
                                    <a href='{{url("meal-edit/{$meal->id}")}}'
                                    class="btn btn-success">تعديل</a>
                                </td>
                                </td>
                                </tr>
                                @endforeach
                           
                              </tbody>
                          </table>
                      </section>
                  </div>
                 
              </div>
@endsection