<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\ProductTypes;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function Index()
    {
        $products = Products::with('productTypes')->latest()->paginate(20);
        $productTypes = ProductTypes::all();
        return view('crud.Products.Index', compact('products', 'productTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function Create()
    {
        $productTypes = ProductTypes::all();
        return view('crud.Products.Create',compact('productTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function Store(Request $request)
    {
        $request->validate([
            'Name.*' => 'required',
            'TypeID.*' => 'required',
            'Detail.*' => 'required',
            'Description.*' => 'required',
            'Image.*' => 'required|mimes:png,jpg|max:2048',
            'Price.*' => 'required'
        ]);

        $productsData = [];

        foreach ($request->input('Name') as $index => $name) {
            $productData = [
                'Name' => $name,
                'TypeID' => $request->input('TypeID')[$index],
                'Detail' => $request->input('Detail')[$index],
                'Description' => $request->input('Description')[$index],
                'Price' => $request->input('Price')[$index],
                'created_at' => now(),
                'updated_at' => now()
            ];

            if ($image = $request->file('Image')[$index]) {
                $path = 'ProductImages/';
                $tImage = date('YmdHis') . '_' . $index . '.' . $image->getClientOriginalExtension();
                $image->move($path, $tImage);
                $productData['Image'] = $tImage;
            }

            $productsData[] = $productData;
        }

        Products::insert($productsData);

        return redirect()->route('Products.Index')->with('alert', 'Create data successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function Edit(Products $products)
    {
        $productTypes = ProductTypes::all();
        return view('crud.Products.Edit',compact('products','productTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $products)
    {
        $request->validate([
            'Name' => 'required',
            'TypeID' => 'required',
            'Detail' => 'required',
            'Description' => 'required',
            'Price' => 'required',
            'Image' => 'nullable|mimes:png,jpg|max:2048'
        ]);

        $input = $request->all();

        if ($request->hasFile('Image')) {
            $Image = $request->file('Image');
            $path = 'ProductImages/';
            $tImage = date('YmdHis').'.'.$Image->getClientOriginalExtension();
            $Image->move($path, $tImage);
            $input['Image'] = $tImage;
        } else {
            // No new image provided, keep the existing image
            $input['Image'] = $products->Image;
        }

        $products->update($input);
        return redirect()->route('Products.Index')->with('alert', 'Update data successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function Delete(Products $products)
    {
        $products->delete();
        return redirect()->route('Products.Index')->with('alert','Delete data successfully!');
    }
}
