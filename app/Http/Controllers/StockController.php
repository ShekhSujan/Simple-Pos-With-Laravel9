<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class StockController extends Controller
{

    public function index()
    {
        $data['title'] = "Medicine Stock";
        $data['allMedicine'] = Medicine::where('status', '!=', Medicine::isTrash)
            ->latest()
            ->get();
        return view("stock.index")->with($data);
    }
    public function update(Request $request)
    {
        $id = $request->input("id");
        $stock = $request->input("stock");
        //stock Table
        $oldstock = Stock::where('medicine_id', $id)->first();
        $Today = date("Y-m-d");

        $stock_history = $oldstock->stock_history . ',' . $Today . '=' . $stock;
        $arr = [
            "medicine_id" => $request->input("id"),
            "stock_history" => $stock_history,
        ];
        //stock Table
        //medicine table
        $update_stk = Medicine::find($id);
        $update_stk = $update_stk->stock + $stock;
        $arr_medi = [
            "stock" => $update_stk
        ];
        //dd($arr_medi);
        if (Stock::where('medicine_id', $id)->update($arr)) {
            Medicine::where('id', $id)->update($arr_medi);
            Toastr::success('Save Successfully', 'Success');
        } else {
            Toastr::error('Some Error Occcurs', 'Danger');
        }
        return redirect()->back();
    }
    public function view($id)
    {
        $data['title'] = 'Stock View';
        $data['selected'] = Medicine::find($id);
        $data['allStock'] = Stock::where('medicine_id', $id)->get();
        $history = "";
        foreach ($data['allStock'] as $value) {
            $history = $value->stock_history;
        }
        $data['stock_history'] = explode(",", $history);
        return view("stock.show")->with($data);
    }
}
