<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Section;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('section')->get();
        return view('products.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->validated());
        if (!$product) {
            session()->flash('error', 'حدث خطاء ما برجاء المحاولة لاحقاََ');
            return to_route('products.index');
        }
        session()->flash('success', 'تم اضافة المنتج بنجاح (' . $request->product_name . ')');
        return to_route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $updated = $product->update($request->validated());
        if (!$updated) {
            session()->flash('error', 'حدث خطاء ما برجاء المحاولة لاحقاََ');
            return to_route('products.index');
        }
        session()->flash('success', 'تم تعديل المنتج بنجاح (' .  $request->product_name . ')');
        return to_route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $deleted = $product->delete();
        if (!$deleted) {
            session()->flash('error', 'حدث خطاء ما برجاء المحاولة لاحقاََ');
            return to_route('products.index');
        }
        session()->flash('success', 'تم حذف المنتج بنجاح (' .  $product->product_name . ')');
        return to_route('products.index');
    }
}
