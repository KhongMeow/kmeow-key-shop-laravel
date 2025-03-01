<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\OrderItems;
use App\Models\LicenseKeys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderItemsController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userID = Auth::id();
        $latestOrder = Orders::where('UserID', $userID)->latest()->value('id');

        $orderItems = session('cart');
        // $results = [];
        foreach ($orderItems as $id => $product) {
            $count = LicenseKeys::where('ProductID', $id)->where('Status', 'Available')->count('LicenseKeys');
            if($count >= $product['quantity']){
                $input = [
                    'OrderID' => $latestOrder,
                    'ProductID' => $id,
                    'Quantity' => $product['quantity'],
                ];
            }
            else{
                $input = [
                    'OrderID' => $latestOrder,
                    'ProductID' => $id,
                    'Quantity' => $count,
                ];
            }
            OrderItems::create($input);
            // $results[] = $input;
        }
        // foreach ($results as $id => $product) {
        //     echo "OrderID = ". $product['OrderID']."<br>";
        //     echo "ProductID = ". $product['ProductID']."<br>";
        //     echo "Quantity = ". $product['Quantity']."<br>";
        //     echo "<br>";
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderItems $orderItems)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderItems $orderItems)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderItems $orderItems)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderItems $orderItems)
    {
        //
    }
}
