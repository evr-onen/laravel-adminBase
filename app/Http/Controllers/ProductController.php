<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct(Request $request)
    {
        if (request()->hasCookie('lang')) {
            $lang = request()->cookie('lang');
            app()->setLocale($lang);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $text = Product::first();

        view()->share(['text' => $text]);
        return view('deneme');
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
