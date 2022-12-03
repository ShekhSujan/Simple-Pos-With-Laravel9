<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Stock;
use App\Models\Customer;
use App\Models\Medicine;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class OrderController extends Controller
{

    public function index()
    {
        $data['title'] = "Medicine Stock";
        $data['allMedicine'] = Medicine::where('status', '!=', Medicine::isTrash)
            ->latest()
            ->get();
        return view("stock.index")->with($data);
    }
    public function create()
    {
        $data['title'] = "Pos";
        $data['allMedicine'] = Medicine::get();
        $data['allCustomer'] = Customer::all();
        return view("order.create")->with($data);
    }

    public function store(Request $request)
    {

        $order = new Order();
        $order->customer_id = $request->customer_id;
        $order->total = $request->total;
        $order->qty = $request->totalqty;
        $order->date = date("Y-m-d");
        $order->save();

        $id = $request->id;
        $qty = $request->qty;
        $unit_price = $request->unit_price;
        $total_price = $request->total_price;

        foreach ($id as $key => $value) {
            $orderDetails = new OrderDetail();
            $orderDetails->order_id = $order->id;
            $orderDetails->medicine_id = $id[$key];
            $orderDetails->qty = $qty[$key];
            $orderDetails->price = $unit_price[$key];
            $orderDetails->total = $total_price[$key];
            $orderDetails->save();

            $medi_stock = Medicine::where('id', $id[$key])->first();
            $medi_stock = $medi_stock->stock;
            $update_stk = $medi_stock - $qty[$key];
            Medicine::where('id', $id[$key])->update(["stock" => $update_stk]);
        }
        Toastr::success('Save Successfully', 'Success');
        return redirect()->back();
    }
}
