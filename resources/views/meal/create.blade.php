
@extends('master')
@section('content')
<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              إضافة وجبة
                          </header>
                          <div class="panel-body">
                              <form role="form" method="POST" action="{{url('meal-store')}}" 
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
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="row">
                                  <div class="form-group col-md-6">
                                      <label for="exampleInputEmail1">اسم الوجبة</label>
                                      <input type="text" class="form-control" value="{{old('name')}}" name="name" id="exampleInputEmail1" >
                                 
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="form-group col-md-6">
                                      <label for="exampleInputEmail1">سعر الوجبة</label>
                                      <input type="text" class="form-control" value="{{old('price')}}" name="price" id="exampleInputEmail1" >
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="form-group col-md-6">
                                      <label for="exampleInputEmail1">شرح الوجبة</label>
                                      <textarea type="text" class="form-control" name="description" id="exampleInputEmail1" >{{old('description')}}</textarea>
                                  </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                      <label for="exampleInputEmail1">الصنف</label>
                                        <select class="form-control" name="menu_id">
                                        <option value="0">يرجى اختيار الصنف</option>
                                            @foreach($menus as $key=>$menu)
                                                    <option @if(old('menu_id')== $menu->id) selected @endif value="{{$menu->id}}">{{$menu->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                
                                  <div class="form-group col-md-6">
                                      <label for="exampleInputFile">صورة الوجبة</label>


<input type="file" name="image" id="exampleInputFile">
                                  </div>
                                </div>
                                 
                                  <button type="submit" class="btn btn-info">Submit</button>
                              </form>

                          </div>
                      </section>
                  </div>
              
              </div>
@endsection