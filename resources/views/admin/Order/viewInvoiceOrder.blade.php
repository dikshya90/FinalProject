<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    	    <div class="invoice-title">
    			<h2>Invoice</h2><h3 class="pull-right">Order # {{ $order_detail->id }}</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Billed To:</strong><br>
    					{{ $customer_detail->name }} <br>
		                {{ $customer_detail->email }} <br>
		                {{ $customer_detail->country }} <br>
		                {{ $customer_detail->street }} <br>
		                {{ $customer_detail->city }} <br>
		                {{ $customer_detail->postcode }} <br>
		                {{ $customer_detail->phone }} <br>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Shipped To:</strong><br>
    					{{ $order_detail->name }} <br>
		                {{ $order_detail->customer_email }} <br>
		                {{ $order_detail->country }} <br>
		                {{ $order_detail->street }} <br>
		                {{ $order_detail->city }} <br>
		                {{ $order_detail->postcode }} <br>
		                {{ $order_detail->phone }}
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Payment Method:</strong><br>
    					{{ $order_detail->payment_method }}
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					{{ $order_detail->created_at }}<br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>

    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td style="width:18%"><strong>Product Name</strong></td>
        							<td style="width:18%" class="text-center"><strong>Size</strong></td>
        							<td style="width:18%" class="text-center"><strong>Weight</strong></td>
        							<td style="width:18%" class="text-center"><strong>Price</strong></td>
        							<td style="width:18%" class="text-center"><strong>Qunatity</strong></td>
        							<td style="width:18%" class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<?php $Subtotal = 0; ?>
    							@foreach($order_detail->orders as $pro)
    							<tr>
    								<td class="text-left">{{ $pro->name }}</td>
    								<td class="text-center">{{ $pro->size }}</td>
    								<td class="text-center">{{ $pro->weight }}</td>
    								<td class="text-center">$ {{ $pro->price }}</td>
    								<td class="text-center">{{ $pro->quantity }}</td>
    								<td class="text-right">$ {{ $pro->price * $pro->quantity }}</td>
    							</tr>
    							<?php $Subtotal = $Subtotal + ($pro->price * $pro->quantity); ?>
                                @endforeach
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">$ {{ $Subtotal }}</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Shipping Charges (+)</strong></td>
    								<td class="no-line text-right">$ 0</td>
    							</tr>
    							{{-- <tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Coupon Discount (-)</strong></td>
    								<td class="no-line text-right">INR {{ $order_detail->coupon_amount }}</td>
    							</tr> --}}
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Grand Total</strong></td>
    								<td class="no-line text-right">$ {{ $order_detail->total_amount }}</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>
