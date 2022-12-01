<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MedicineRequest;
use App\Http\Controllers\Controller;
use App\Models\Medicine;
use App\Models\Stock;
use Brian2694\Toastr\Facades\Toastr;

class MedicineController extends Controller
{

    public function index()
    {
        $data['title'] = "All Medicine";
        $data['allMedicine'] = Medicine::where('status', '!=', Medicine::isTrash)
            ->latest()
            ->get();
        return view("medicine.index")->with($data);
    }
    public function create()
    {
        $data['title'] = "New Medicine";
        return view("medicine.create")->with($data);
    }

    public function store(MedicineRequest $request)
    {
        $Today = date("Y-m-d");
        $Medicine = new Medicine;
        $Medicine->title = $request->title;
        $Medicine->unit_price = $request->unit_price;
        $Medicine->stock = $request->stock;
        $Medicine->company = $request->company;
        $Medicine->dosage = $request->dosage;
        $Medicine->strength = $request->strength;
        $Medicine->generic = $request->generic;
        $Medicine->status = Medicine::isActive;
        $Medicine->save();

        if ($Medicine) {
            $Stock = new Stock;
            $Stock->medicine_id  = $Medicine->id;
            $Stock->stock_history = $Today . '=' . $request->stock;
            $Stock->save();
            Toastr::success('Save Successfully', 'Success');
        } else {
            Toastr::error('Some Error Occcurs', 'Danger');
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $data['title'] = "Update Medicine";
        $data['selected'] = Medicine::find($id);
        return view("medicine.edit")->with($data);
    }

    public function update(MedicineRequest $request)
    {
        $id = $request->input("id");
        $arr = [
            "title" => $request->input("title"),
            "unit_price" => $request->input("unit_price"),
            "stock" => $request->input("stock"),
            "dosage" => $request->input("dosage"),
            "strength" => $request->input("strength"),
            "generic" => $request->input("generic"),
            "company" => $request->input("company"),
            "status" => $request->input("status"),
        ];

        if (Medicine::where('id', $id)->update($arr)) {
            Toastr::success('Update Successfully', 'Success');
            return redirect()->route('medicine.index');
        } else {
            Toastr::error('Some Error Occcurs', 'Danger');
            return redirect()->back();
        }
    }

    public function trash_list()
    {
        $data['title'] = 'Trash List';
        $data['allMedicine'] = Medicine::where('status', Medicine::isTrash)
            ->get();
        $data['dataCount'] = Medicine::where('status', Medicine::isTrash)
            ->count();
        return view('medicine.trash-list')->with($data);
    }

    public function trash(Request $request)
    {
        $id = $request->input("id");
        if (Medicine::where("id", $id)->update(['status' => Medicine::isTrash])) {
            Toastr::error('Moved To Trash Successfully', 'Warning');
        } else {
            Toastr::error('Some Error Occcurs', 'Danger');
        }
        return redirect()->back();
    }

    public function bulk_action(Request $request)
    {
        $type = $request->input("type");
        $id = $request->input("chk");

        if ($type == 0 && $id) {
            Medicine::whereIn("id", $id)->delete();
            Toastr::success('Deleted Successfully', 'Success');
        } elseif ($type == 1 && $id) {
            Medicine::whereIn("id", $id)->update(['status' => Medicine::isActive]);
            Toastr::success('Restored Successfully', 'Success');
        } else {
            Toastr::error('Select Some Data First', 'Danger');
        }
        return redirect()->back();
    }
}
