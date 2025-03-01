<?php

namespace App\Http\Controllers;

use App\Models\SlideShow;
use App\Models\Products;
use App\Models\ProductTypes;
use Illuminate\Http\Request;

class KmeowKeyShopController extends Controller
{
    public function Index()
    {
        // $products = Products::select('products.*')->join('license_keys', 'products.id', '=', 'license_keys.productid')->where('license_keys.status', 'Available')->latest()->paginate(24);

        $productTypes = ProductTypes::all();
        $products = Products::latest()->paginate(24);
        $slideShow = SlideShow::latest()->get();
        return view('KmeowKeyShop.Index',compact('products', 'productTypes','slideShow'));
    }
    public function Products($Type)
    {
        // $products = Products::whereHas('productTypes', function ($query) use ($Type) {$query->where('name', $Type);})->latest()->paginate(24);
        $products = Products::whereRelation('productTypes', 'name', $Type)->latest()->paginate(24);
        $productTypes = ProductTypes::all();
        return view('KmeowKeyShop.Products', compact('Type', 'products', 'productTypes'));
    }

    public function ProductDetail($Type, $product)
    {
        $count = Products::where('id', $product)->whereRelation('productTypes', 'name', $Type)->count();

        if($count > 0){
            $productDetail = Products::find($product);
            $productTypes = ProductTypes::all();

            return view('KmeowKeyShop.ProductDetail', compact('productDetail', 'Type', 'productTypes'));
        }
        else{
            return abort(404);
        }
    }

    public function Games()
    {
        $products = Products::latest()->where('TypeID', 1)->paginate(24);
        $productTypes = ProductTypes::all();
        return view('KmeowKeyShop.Products',compact('products','productTypes'));
    }
    public function Software()
    {
        $products = Products::latest()->where('TypeID', 2)->paginate(24);
        $productTypes = ProductTypes::all();
        return view('KmeowKeyShop.Products',compact('products','productTypes'));
    }
    public function GameDetail(Products $products)
    {
        return view('KmeowKeyShop.ProductDetail',compact('products'));
    }
    public function SoftwareDetail(Products $products)
    {
        return view('KmeowKeyShop.ProductDetail',compact('products'));
    }
    public function CreditCard()
    {
        $productTypes = ProductTypes::all();
        return view('KmeowKeyShop.CreditCard',compact('productTypes'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        $results = Products::where('Name', 'LIKE', '%' . $query . '%')->with('productTypes')->get();

        return response()->json($results);
    }

    public function Cart()
    {
        $productTypes = ProductTypes::all();
        return view('KmeowKeyShop.Cart',compact('productTypes'));
    }

    public function addToCart($id)
    {
        $product = Products::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($_GET['quantity'])) {
            $quantity = intval($_GET['quantity']);
        } else {
            $quantity = 1;
        }

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                "Name" => $product->Name,
                "Image" => $product->Image,
                "Price" => $product->Price,
                "quantity" => $quantity
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart');
    }


    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            // session()->flash('success', 'Cart successfully updated!');
        }
    }

    public function removeCart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
                return response()->json(['status' => 'success']);
            }
        }
        return response()->json(['status' => 'error']);
    }
}
