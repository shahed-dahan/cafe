@extends('master')
@section('content')
<div class="row">
                  <div class="col-sm-12">
                      <section class="panel">
                          <header class="panel-heading">
                             المستخدمين
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
                                  <th>اسم المستخدم</th>
                                  <th>ايميل</th>
                                  <th>ادمن</th>
                                  <th>تعديل</th>
                                  <th>حذف</th>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach($users as $key=>$user)
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td class="admin-btn" data-route='{{url("user-admin/$user->id")}}'>@if($user->is_admin) yes @else no @endif</td>
                                    <td> 
                                        <a href='{{url("user-edit/{$user->id}")}}' 
                                        class="btn btn-success">تعديل</a>
                                    </td>
                                    <td>
                                        <form method="post" action='{{url("user-destroy/$user->id")}}'>
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
<script>
$('.admin-btn').click(function(){
    var _this= $(this);
    var urluser = _this.data('route');
    $.ajax({
           url: urluser,
            type: "post",
            data: {
        "_token": "{{ csrf_token() }}"
    },
            dataType: "json",
            success: function(response) {
                            if(response==1)
                            _this.html('yes');
                        else
                        _this.html('no');

            }
                    });
})

</script>
@endsection