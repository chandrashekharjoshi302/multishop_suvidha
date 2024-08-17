<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function add_brand()
    {
        return view('admin.add-brand');
    }
    public function add_category()
    {
        return view('admin.add-category');
    }
    public function add_coupon()
    {
        return view('admin.add-coupon');
    }
    public function add_product()
    {
        return view('admin.add-product');
    }
    public function slide()
    {
        return view('admin.slide');
    }
    public function brands()
    {
        return view('admin.brands');
    }
    public function categories()
    {
        return view('admin.categories');
    }

    public function coupons()
    {
        return view('admin.coupons');
    }
    public function order_details()
    {
        return view('admin.order-details');
    }

    public function order_tracking()
    {
        return view('admin.order-tracking');
    }
    public function orders()
    {
        return view('admin.orders');
    }
    public function products()
    {
        return view('admin.products');
    }
    public function settings()
    {
        return view('admin.settings');
    }
    public function slider()
    {
        return view('admin.slider');
    }

    public function index()
    {
        return view('admin.index');
    }
    public function users()
    {

        $userData = User::all();


        return view('admin.users', compact('userData'));
    }


    // to add product

    public function add_product_data(Request $request)
    {

        dd($request);
    }
}
