@extends('layouts.admin')

@section('title', 'View Order Details')
@section('page-title', 'View Order Details')

@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title" style="font-weight: bold;">
                    View Orders of Customers
                </h3>
            </div>
            <div class="box-body">
                <table id="dataList" class="table table-bordered table-striped table-hover" style="border: 1px solid black;">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Order Id</th>
                            <th style="text-align: center;">Customer Name</th>
                            <th style="text-align: center;">Customer Email</th>
                            <th style="text-align: center;">Contact Info</th>
                            <th style="text-align: center;">Ordered Product</th>
                            <th style="text-align: center;">Payment Method</th>
                            <th style="text-align: center;">Order Status</th>
                            <th style="text-align: center;">Total Amount</th>
                            <th style="text-align: center;">Order Date</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @if($cus_order->count()>0) --}}
                            {{-- @php($count = 1) --}}
                                @foreach ($cus_order as $order)
                                    <tr class="col text-center">
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->customer_email}}</td>
                                        <td>{{$order->phone}}</td>

                                        <td>
                                            @foreach($order->orders as $pro)
                                                {{-- {{$pro->id}} <br> --}}
                                                {{ $pro->name }}
                                                ({{ $pro->quantity }})
                                                <br>
                                            @endforeach
                                        </td>

                                        <td>{{$order->payment_method}}</td>
                                        <td>{{$order->order_status}}</td>
                                        <td>{{$order->total_amount}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td class="center">
                                            <a href="{{route('order.listOrder',['id'=>$order->id])}}" class="btn btn-success btn-mini">View Order Details</a><br><br>
                                            <a target="_blank" href="{{route('order.invoiceOrder', ['id' => $order->id])}}" class="btn btn-success btn-mini">Invoice of Order</a>

                                        </td>
                                    </tr>
                                    {{-- @php($count++) --}}
                                @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
