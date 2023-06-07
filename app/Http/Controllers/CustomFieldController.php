<?php

namespace App\Http\Controllers;

use App\Models\CustomField;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CustomFieldController extends Controller
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
    public function create(Request $request)
    {


        $validator = validator()->make(request()->all(), [
            'data'      => 'required | string',
        ]);

        if ($validator->fails()) {
            return response($validator->errors());
        };

        $field = CustomField::create([
            'name'           => request()->get('name'),
            'section'        => request()->get('section'),
            'data'           => request()->get('data'),
        ]);

        return $field;
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
    public function show(CustomField $customField)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomField $customField)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomField $customField)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomField $customField)
    {
        //
    }
}
