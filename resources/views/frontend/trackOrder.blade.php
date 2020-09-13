@extends('layouts.front')
@section('title', 'My Orders')

@section('content')

<section id="do_action" style="margin-bottom: 6%; margin-top: 5%;">
	<div class="container">
		<div class="heading" align="center">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Ordered Painting</th>
                        <th>Payment Method</th>
                        <th>Grand Total</th>
                        <th>Ordered On</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($myOrder as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>
                                @foreach($order->orders as $paintOrder)
                                    <a href="{{ url('/orderProductDetail/'.$order->id) }}">{{ $paintOrder->name }}</a><br>
                                @endforeach
                            </td>
                            <td>{{ $order->payment_method }}</td>
                            <td>{{ $order->total_amount }}</td>
                            <td>{{ $order->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
		</div>
	</div>
</section>

@endsection
