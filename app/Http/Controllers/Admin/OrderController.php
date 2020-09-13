<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Customer\Customer;
use App\Model\Customer\Order;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // to view order of customers

        if (!Gate::allows('order-view')) {
            return abort(401);
        }

        $cus_order = Order::with('orders')->orderBy('id', 'Desc')->get();
        $cus_order = json_decode(json_encode($cus_order));
        return view('admin.Order.viewOrder')->with(['cus_order'=>$cus_order]);

    }

    // view the details of order
    public function listOrder($order_id){
        if (!Gate::allows('order-view')) {
            return abort(401);
        }
        $order_detail = Order::with('orders')->where('id',$order_id)->first();
        $order_detail = json_decode(json_encode($order_detail));

        $customer_id = $order_detail->customer_id;
        $customer_detail = Customer::where('id',$customer_id)->first();

        return view('admin.Order.viewDetailOfOrder')->with(['order_detail'=>$order_detail])
                                                    ->with(['customer_detail'=>$customer_detail]);
    }

    // change the status of order
    public function updateOrderStatus(Request $request){

        if($request->isMethod('post')){
            $data = $request->all();
            Order::where('id', $data['order_id'])->update(['order_status'=>$data['order_status']]);
            return redirect()->back()->with('message', 'Order Status Updated!');
        }
    }

    // function to view the invoice details of order
    public function invoiceOrder($order_id){
        if (!Gate::allows('order-view')) {
            return abort(401);
        }

        $order_detail = Order::with('orders')->where('id', $order_id)->first();
        $order_detail = json_decode(json_encode($order_detail));

        $customer_id = $order_detail->customer_id;
        $customer_detail = Customer::where('id', $customer_id)->first();

        return view('admin.Order.viewInvoiceOrder')->with(['order_detail' => $order_detail])
                                                    ->with(['customer_detail' => $customer_detail]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
