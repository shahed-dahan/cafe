@extends('master')
@section('content')
 <!-- invoice start-->
 <section>
                <div class="panel panel-primary">
                    <!--<div class="panel-heading navyblue"> Order</div>-->
                    <div class="panel-body">
                        <div class="row invoice-list">
                           
                            <div class="col-lg-4 col-sm-4">
                                <h3><strong>{{$order->customer->customer_name}}</strong></h3>
                                <p>       
                                    Tel: {{$order->customer->phone}}
                                </p>
                            </div>
                            <div class="col-lg-4 col-sm-4">
                            <h3><strong>ADDRESS</strong></h3>
                                <p>
                                    {{$order->customer->address}}
                                </p>
                            </div>
                            <div class="col-lg-4 col-sm-4">
                            <h3><strong>Order INFO</strong></h3>
                                <ul class="unstyled">
                                    <li>Order Number : <strong>{{$order->id}}</strong></li>
                                    <li>Order Date : {{$order->created_at->format('m/d/Y')}}</li>
                                    <form action="{{url('api/change-state')}}" method="post" id="myForm">
                                        @csrf
                                    <li>Order Status : <select name="state" class="form-control" >
                                        <option value="wait" @if($order->state=='wait') selected @endif> wait</option>
                                        <option value="accept" @if($order->state=='accept') selected @endif> accept</option>
                                        <option value="delivered" @if($order->state=='delivered') selected @endif> delivered</option>
                                        <option value="refuse" @if($order->state=='refuse') selected @endif> refuse</option>
                                          </select>
                                           </li>
                                        </form>
                                </ul>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>menu</th>
                                <th class="hidden-phone">meal</th>
                                <th class="">Unit Cost</th>
                                <th class="">Quantity</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total=0;
                                @endphp
                            @foreach($order->meals as $key=>$meal)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$meal->menu->name}}</td>
                                <td class="hidden-phone">{{$meal->name}}</td>
                                <td class="">{{$meal->pivot->price}}</td>
                                <td class="">{{$meal->pivot->quantity}}</td>
                                <td>{{$meal->pivot->price * $meal->pivot->quantity}}</td>
                                <?php
                                $total=$total+($meal->pivot->price * $meal->pivot->quantity);
                                ?>
                            </tr>
                           @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-lg-4 invoice-block pull-right">
                                <ul class="unstyled amounts">
                                    <li><strong>Grand Total :</strong> {{$total}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="text-center invoice-btn">
                            <a class="btn btn-danger btn-lg"><i class="fa fa-check"></i> Submit Invoice </a>
                            <a class="btn btn-info btn-lg" onclick="javascript:window.print();"><i
                                    class="fa fa-print"></i> Print </a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- invoice end-->
         
@endsection
@section('script')
<script>
    
$("select").on("change", function(){
    var order= {!! json_encode($order)!!};
    var urluser =$('#myForm').attr('action');
    var new_status=$(this).val();
       console.log(order,urluser,new_status);
       $.ajax({
           url: urluser,
            type: "post",
            data: {
        'id':order['id'],
        'state':new_status
       
    },
            dataType: "json",
            success: function(response) {
                console.log(response);         

            }
                    });
})

</script>
@endsection