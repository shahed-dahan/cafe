@extends('master')
@section('content')
<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              إضافة وجبة
                          </header>
                          <div class="panel-body">
                              <form role="form" method="POST" action='{{url("meal-update/{$meal->id}")}}' 
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
                                <div class="row">
                                  <div class="form-group col-md-6">
                                      <label for="exampleInputEmail1">اسم الوجبة</label>
                                      <input type="text" class="form-control" value="{{$meal->name}}" name="name" id="exampleInputEmail1" >
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="form-group col-md-6">
                                      <label for="exampleInputEmail1">سعر الوجبة</label>
                                      <input type="text" class="form-control" value="{{$meal->price}}" name="price" id="exampleInputEmail1" >
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="form-group col-md-6">
                                      <label for="exampleInputEmail1">شرح الوجبة</label>
                                      <textarea type="text" class="form-control" name="description" id="exampleInputEmail1" >{{$meal->description}}</textarea>
                                  </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">الصنف</label>
                                        <select class="form-control" name="menu_id">
                                        <option value="0">يرجى اختيار الصنف</option>
                                            @foreach($menus as $key=>$menu)
                                                    <option value="{{$menu->id}}" @if($menu->id == $meal->menu_id) selected @endif>{{$menu->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                
                                  <div class="form-group col-md-6">
                                      <label for="exampleInputFile">صورة الوجبة</label>
                                      <input type="file" name="image" id="exampleInputFile">
                                      <img width="50" src='{{asset("mealImage/{$meal->image}")}}'>

                                  </div>
                                </div>
                                 
                                  <button type="submit" class="btn btn-info">Submit</button>
                              </form>

                          </div>
                      </section>
                  </div>
              
              </div>
@endsection