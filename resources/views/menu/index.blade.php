@extends('master')
@section('content')
<div class="row">
                  <div class="col-sm-12">
                      <section class="panel">
                          <header class="panel-heading">
                             التصنيفات
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
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>اسم الصنف</th>
                                  <th>الصورة</th>
                                  <th>تعديل</th>
                                  <th>حذف</th>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach($menus as $key=>$menu)
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>{{$menu->name}}</td>
                                    <td>
                                        <img width="50" src='{{asset("menuImage/{$menu->image}")}}'>
                                    </td>
                                    <td> 
                                        <a href='{{url("menu-edit/{$menu->id}")}}' 
                                        class="btn btn-success">تعديل</a>
                                    </td>
                                    <td>
                                        <form method="post" action='{{url("menu-destroy/$menu->id")}}'>
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">حذف</button>
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