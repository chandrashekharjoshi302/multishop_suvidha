<?php

namespace App\Http\Controllers;

use App\Models\brands;
use App\Models\categories;
use App\Models\products;
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

        $brands = brands::all(); // Retrieve all categories
        return view('admin.brands', compact('brands'));
    }
    public function categories()
    {

        $categories = categories::all(); // Retrieve all categories
        return view('admin.categories', compact('categories'));
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


        $products = products::all();


        return view('admin.products', compact('products'));
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

        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug',
            'category_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'short_description' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'regular_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'SKU' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'stock_status' => 'required|string|in:instock,outofstock',
            'featured' => 'required|boolean',
        ]);

        // Handle the main image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // Handle gallery images upload
        $galleryImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $galleryImage) {
                $galleryImages[] = $galleryImage->store('product_gallery', 'public');
            }
        }

        // Save the product to the database
        $product = new products();
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->image = $imagePath ?? null;
        $product->gallery_images = json_encode($galleryImages); // Save gallery images as JSON
        $product->regular_price = $request->regular_price;
        $product->sale_price = $request->sale_price;
        $product->SKU = $request->SKU;
        $product->quantity = $request->quantity;
        $product->stock_status = $request->stock_status;
        $product->featured = $request->featured;
        $product->save();

        return redirect()->back()->with('success', 'Product added successfully!');
    }

    // to add in category

    public function add_category_data(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $category = new categories();
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/categories'), $fileName);
            $category->image = $fileName;
        }

        $category->save();

        return redirect()->back()->with('success', 'Category added successfully!');
    }

    public function brands_data_save(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $category = new brands();
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/brands'), $fileName);
            $category->image = $fileName;
        }

        $category->save();

        return redirect()->back()->with('success', 'Category added successfully!');
    }
}
