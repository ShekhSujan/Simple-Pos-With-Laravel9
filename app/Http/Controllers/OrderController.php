<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Customer;
use App\Models\Medicine;
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
    public function create() {
        $data['title'] = "Pos";
        $data['allMedicine'] = Medicine::get();
        $data['allCustomer']=Customer::all();
        return view("order.create")->with($data);
      }
}
