<?php

namespace App\Http\Controllers;

use App\Models\LicenseKeys;
use App\Models\Products;
use Illuminate\Http\Request;

class LicenseKeysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $licenseKeys = LicenseKeys::orderBy('Status', 'ASC')->orderBy('ID', 'ASC')->latest()->paginate(20);
        return view('crud.LicenseKeys.Index', compact('licenseKeys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Products::all();
        return view('crud.LicenseKeys.Create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ProductID.*' => 'required',
            'LicenseKeys.*' => 'required'
        ]);

        $licenseKeysData = [];

        foreach ($request->input('ProductID') as $index => $ProductID) {
            $licenseKeyData = [
                'ProductID' => $ProductID,
                'LicenseKeys' => $request->input('LicenseKeys')[$index],
                'created_at' => now(),
                'updated_at' => now()
            ];

            $licenseKeysData[] = $licenseKeyData;
        }

        LicenseKeys::insert($licenseKeysData);

        return redirect()->route('LicenseKeys.Index')->with('alert', 'Create data successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(LicenseKeys $licenseKeys)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LicenseKeys $licenseKeys)
    {
        $products = Products::all();
        return view('crud.LicenseKeys.Edit',compact('products','licenseKeys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LicenseKeys $licenseKeys)
    {
        $request->validate([
            'ProductID.*' => 'required',
            'LicenseKeys.*' => 'required'
        ]);

        $input = $request->all();
        $licenseKeys->update($input);

        return redirect()->route('LicenseKeys.Index')->with('alert','Update data successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LicenseKeys $licenseKeys)
    {
        $licenseKeys->delete();
        return redirect()->route('LicenseKeys.Index')->with('alert','Delete data successfully!');
    }
}
