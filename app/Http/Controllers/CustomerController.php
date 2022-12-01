<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Brian2694\Toastr\Facades\Toastr;

class CustomerController extends Controller
{

    public function index()
    {
        $data['title'] = "All Customer";
        $data['allCustomer'] = Customer::where('status', '!=', Customer::isTrash)
            ->latest()
            ->get();
        return view("customer.index")->with($data);
    }
    public function create()
    {
        $data['title'] = "New Customer";
        return view("customer.create")->with($data);
    }

    public function store(CustomerRequest $request)
    {
        $arr = [
            "name" => $request->input("name"),
            "email" => $request->input("email"),
            "phone" => $request->input("phone"),
            "address" => $request->input("address"),
            "status" => Customer::isActive,
        ];
        if (Customer::create($arr)) {
            Toastr::success('Save Successfully', 'Success');
        } else {
            Toastr::error('Some Error Occcurs', 'Danger');
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $data['title'] = "Update Customer";
        $data['selected'] = Customer::find($id);
        return view("customer.edit")->with($data);
    }

    public function update(CustomerRequest $request)
    {
        $id = $request->input("id");
        $arr = [
            "name" => $request->input("name"),
            "email" => $request->input("email"),
            "phone" => $request->input("phone"),
            "address" => $request->input("address"),
            "status" => $request->input("status"),
        ];

        if (Customer::where('id', $id)->update($arr)) {
            Toastr::success('Update Successfully', 'Success');
            return redirect()->route('customer.index');
        } else {
            Toastr::error('Some Error Occcurs', 'Danger');
            return redirect()->back();
        }
    }

    public function trash_list()
    {
        $data['title'] = 'Trash List';
        $data['allCustomer'] = Customer::where('status', Customer::isTrash)
            ->get();
        $data['dataCount'] = Customer::where('status', Customer::isTrash)
            ->count();
        return view('customer.trash-list')->with($data);
    }

    public function trash(Request $request)
    {
        $id = $request->input("id");
        if (Customer::where("id", $id)->update(['status' => Customer::isTrash])) {
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
            Customer::whereIn("id", $id)->delete();
            Toastr::success('Deleted Successfully', 'Success');
        } elseif ($type == 1 && $id) {
            Customer::whereIn("id", $id)->update(['status' => Customer::isActive]);
            Toastr::success('Restored Successfully', 'Success');
        } else {
            Toastr::error('Select Some Data First', 'Danger');
        }
        return redirect()->back();
    }
}
