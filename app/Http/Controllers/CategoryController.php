<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $validator = validator()->make(request()->all(), [
            'nameTr'     => 'required | string',
            'nameEn'     => 'required | string',

        ]);

        if ($validator->fails()) {
            return response($validator->errors());
        }

        $category = new Category;
        $category->name = [
            'tr' => request()->input('nameTr'),
            'en' => request()->input('nameEn')
        ];
        $category->save();


        return response()->json(['category' => $category]);
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
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validator = validator()->make(request()->all(), [
            'id'                => 'required | numeric',
            'nameTr'              => 'required | string',
            'nameEn'              => 'required | string',
        ]);

        if ($validator->fails()) {
            return response($validator->errors());
        };

        $category = Category::find(request()->get('id'));
        $category->name = [
            'tr' => request()->input('nameTr'),
            'en' => request()->input('nameEn')
        ];
        $category->save();
        return $category;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {

        $user = Category::find(Request()->get('id'));
        return  $user->delete();
    }
}
