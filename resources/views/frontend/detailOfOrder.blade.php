@extends('layouts.front')
@section('title', 'Order Details')

@section('content')

<section id="do_action" style="margin-top: 5%; margin-bottom: 6%;">
	<div class="container">
		<div class="heading" align="center">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Product Size</th>
                        <th>Product Weight</th>
                        <th>Price</th>
                        <th>Product Qantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($myOrderDetails->orders as $pro_detail)
                    <tr>
                        <td>{{ $pro_detail->name }}</td>
                        <td>{{ $pro_detail->size }}</td>
                        <td>{{ $pro_detail->weight }}</td>
                        <td>{{ $pro_detail->price }}</td>
                        <td>{{ $pro_detail->quantity }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
		</div>
	</div>
</section>

@endsection
