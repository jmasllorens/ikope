<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return Inertia::render('Products', ['products' => $products]);
    }

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
       /*  dd($request->session()->get('cart'));  */
        return redirect()->route('products');
    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return Inertia::render('Cart', ['products' => null]);
        }
       $oldCart = Session::get('cart');
       $cart = new Cart($oldCart);
       return Inertia::render('Cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
}
