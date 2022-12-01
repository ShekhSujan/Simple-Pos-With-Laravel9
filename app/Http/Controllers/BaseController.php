<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Setting;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class BaseController extends Controller
{
    public function index()
    {
        $data['title'] = 'Home Page';
        return view('index')->with($data);
    }
    public function setting()
    {
        $data['title'] = 'Settings';
        $data['selected'] = Setting::first();
        return view('setting.setting')->with($data);
    }
    public function update(Request $request)
    {
        $id = $request->input("id");
        $photo = $request->file("logo");
        if ($photo) {
            $ext = strtolower($photo->getClientOriginalExtension());
        } else {
            $ext = $request->input("ext");
        }
        $photo2 = $request->file("favicon");
        if ($photo2) {
            $ext2 = strtolower($photo2->getClientOriginalExtension());
        } else {
            $ext2 = $request->input("ext2");
        }

        $arr = [
            "title" => $request->input('title'),
            "email" => $request->input('email'),
            "phone" => $request->input('phone'),
            "address" => $request->input('address'),
            "logo" => $ext,
            "favicon" => $ext2,
        ];

        if (Setting::where('id', $id)->update($arr)) {
            $path = "assets/images/logo/{$id}-logo.{$ext}";
            $path2 = "assets/images/logo/{$id}-favicon.{$ext2}";
            if ($photo) {
                if (is_file($path)) {
                    unlink($path);
                }
                $photo->move("assets/images/logo/", "{$id}-logo.{$ext}");
            }
            if ($photo2) {
                if (is_file($path2)) {
                    unlink($path2);
                }
                $photo2->move("assets/images/logo/", "{$id}-favicon.{$ext2}");
            }
            Toastr::success('Logo Updated Successfully', 'Success');
        } else {
            Toastr::error('Some Error Occcurs', 'Danger');
        }

        return redirect()->back();
    }
}
