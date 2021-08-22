<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        $categories = Category::pluck('name','id');
        return view('admin.products.create', compact('categories', 'product'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([
            'slug' => Str::slug($request->input('name'))
        ]);
        $this->validate($request, Product::validate());

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $path = $file->store('/',
                [
                    'disk' => 'uploads'
                ]);
            $request->merge([
                'image_path' => $path
            ]);
        }

        $product = Product::create($request->all());

        return redirect()->route('products.index')->with([
            'message' => 'Product' . $product->name . 'Store Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json(['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $categories = Category::pluck('name','id');
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, Product::validate());

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $path = $file->store('/',
                [
                    'disk' => 'uploads'
                ]);
            $request->merge([
                'image_path' => $path
            ]);
        }
        $data = request()->except(['_token', '_method', 'image']);
        $product = Product::where('id', $id)->update($data);
        return redirect()->route('products.index')->with([
            'message' => 'Product Updated Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        Storage::disk('uploads')->delete($product->image_path);

//        unlink(public_path('uploads/' . $product->image_path)); //Native php
        return redirect()->route('products.index')->with([
            'message' => 'product ' . $product->name . ' deleted Successfully'
        ]);
    }
}
