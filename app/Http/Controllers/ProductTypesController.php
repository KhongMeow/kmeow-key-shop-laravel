<?php

namespace App\Http\Controllers;

use App\Models\ProductTypes;
use Illuminate\Http\Request;

class ProductTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function Index()
    {
        // $productTypes = ProductTypes::all();
        $productTypes = ProductTypes::latest()->paginate(20);
        // dd($productTypes);
        return view('crud.ProductTypes.Index',compact('productTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function Create()
    {
        return view('crud.ProductTypes.Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function Store(Request $request)
    {
        $request->validate([
            'Name.*' => 'required',
        ]);

        $productTypesData = [];

        foreach ($request->input('Name') as $name) {
            $productData = [
                'Name' => $name,
                'created_at' => now(),
                'updated_at' => now()
            ];
            $productTypesData[] = $productData;
        }

        ProductTypes::insert($productTypesData);

        return redirect()->route('ProductTypes.Index')->with('alert', 'Create data successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductTypes $productTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function Edit(ProductTypes $productTypes)
    {
        return view('crud.ProductTypes.Edit',compact('productTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function Update(Request $request, ProductTypes $productTypes)
    {
        $request->validate([
            'Name' => 'required'
        ]);

        $input = $request->all();
        $productTypes->update($input);

        return redirect()->route('ProductTypes.Index')->with('alert','Update data successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function Delete(ProductTypes $productTypes)
    {
        $productTypes->delete();
        return redirect()->route('ProductTypes.Index')->with('alert','Delete data successfully!');
    }
}
