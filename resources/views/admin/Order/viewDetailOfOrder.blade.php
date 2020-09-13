@extends('layouts.admin')

@section('title', 'Order Details')
@section('page-title', 'Details of Order')

@section('content')

    <div class="row" style="background-color: #c5e1ce;">
        @if(Session::has('message'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{!! session('message') !!}</strong>
                </div>
            @endif
        <div class="col-xs-12">
            <h2 style="font-weight: bold;">
                Order #{{ $order_detail->id }}
            </h2>
            <div class="container-fluid" style="background-color: #c5e1ce;">
                <hr>
                <div class="row float-left">
                    <div class="col-md-8">
                        <h3>Order Details</h3>
                        <table id="dataList" class="table table-bordered table-striped" style="border: 2px solid #d3d3d3; background-color: white;">
                            <tbody>
                                <tr>
                                    <td class="taskDesc">Order Date</td>
                                    <td class="taskStatus">{{ $order_detail->created_at }}</td>
                                </tr>
                                <tr>
                                    <td class="taskDesc">Order Status</td>
                                    <td class="taskStatus">{{ $order_detail->order_status }}</td>
                                </tr>
                                <tr>
                                    <td class="taskDesc">Order Total</td>
                                    <td class="taskStatus">INR {{ $order_detail->total_amount }}</td>
                                </tr>
                                <tr>
                                    <td class="taskDesc">Payment Method</td>
                                    <td class="taskStatus">{{ $order_detail->payment_method }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4" style="margin-top: 4%;">
                        <h3>Update Order Status</h3>
                        <div class="collapse in accordion-body" id="collapseGOne">
                            <div class="widget-content">
                                <form action="{{route('order.updateOrderStatus')}}" method="POST">
                                    @csrf
                                    {{-- @method('put') --}}
                                    <input type="hidden" name="order_id" value="{{ $order_detail->id }}">
                                        <table width="100%">
                                            <tr>
                                                <td>
                                                    <select name="order_status" id="order_status" class="control-label" required="">
                                                        <option value="New" @if($order_detail->order_status == "New") selected @endif>New</option>
                                                        <option value="Pending" @if($order_detail->order_status == "Pending") selected @endif>Pending</option>
                                                        <option value="Cancelled" @if($order_detail->order_status == "Cancelled") selected @endif>Cancelled</option>
                                                        <option value="In Process" @if($order_detail->order_status == "In Process") selected @endif>In Process</option>
                                                        <option value="Shipped" @if($order_detail->order_status == "Shipped") selected @endif>Shipped</option>
                                                        <option value="Delivered" @if($order_detail->order_status == "Delivered") selected @endif>Delivered</option>
                                                        <option value="Paid" @if($order_detail->order_status == "Paid") selected @endif>Paid</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="submit" value="Update Status">
                                                </td>
                                            </tr>
                                        </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid justify-content-center" style="background-color:#c5e1ce;">
                <div class="row float-left">
                    <div class="col-md-5"  style="margin-left: 8%;">
                        <div class="accordion-heading">
                            <div class="widget-title">
                                <h3>Billing Address</h3>
                                <hr>
                            </div>
                        </div>
                        <div class="collapse in accordion-body" id="collapseGOne">
                            <div class="widget-content">
                                {{ $customer_detail->name }} <br>
                                {{ $customer_detail->email }} <br>
                                {{ $customer_detail->country }} <br>
                                {{ $customer_detail->street }} <br>
                                {{ $customer_detail->city }} <br>
                                {{ $customer_detail->postcode }} <br>
                                {{ $customer_detail->phone }} <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="accordion-heading">
                            <div class="widget-title">
                                <h3>Shipping Address</h3>
                            </div>
                        </div>
                        <hr>
                        <div class="collapse in accordion-body" id="collapseGOne">
                            <div class="widget-content">
                                {{ $order_detail->name }} <br>
                                {{ $order_detail->customer_email }} <br>
                                {{ $order_detail->country }} <br>
                                {{ $order_detail->street }} <br>
                                {{ $order_detail->city }} <br>
                                {{ $order_detail->postcode }} <br>
                                {{ $order_detail->phone }} <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid" style="background-color: #c5e1ce; margin-top: 3%;">
                <div class="widget-title">
                    <h3>Customer Details</h3>
                </div>
                <hr>
                <table class="table table-bordered table-striped" style="border: 2px solid #d3d3d3; background-color: white;">
                    <tbody>
                        <tr>
                            <td>Customer Name</td>
                            <td class="taskStatus">{{ $order_detail->name }}</td>
                        </tr>
                        <tr>
                            <td>Customer Email</td>
                            <td class="taskStatus">{{ $order_detail->customer_email }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="container-fluid">
                <div class="widget-title">
                    <h3>Product Details</h3>
                </div>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Size</th>
                            <th>Product Weight</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order_detail->orders as $pro)
                            <tr>
                                    {{-- <td>{{ $pro->product_code }}</td> --}}
                                <td>{{ $pro->name }}</td>
                                <td>{{ $pro->size }}</td>
                                <td>{{ $pro->weight }}</td>
                                <td>{{ $pro->price }}</td>
                                <td>{{ $pro->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
