<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function list()
    {
       return view('cart');
    }
    public function add()
    {

        $product = Product::query()->find(\request('product_id'));


        $productVariant = ProductVariant::query()
            ->with(['color', 'size'])
            ->where([
                'product_id' => \request('product_id'),
                'product_size_id' => \request('product_size_id'),
                'product_color_id' => \request('product_color_id'),
            ])
            ->firstOrFail();

        $quantity = (int) \request('quantity'); // Chuyển đổi thành số nguyên
        if ($quantity <= 0) {
            return redirect()->back()->withErrors(['quantity' => 'Invalid quantity']);
        }


        $data = $product->toArray()
            + $productVariant->toArray()
            + ['quantity' => $quantity];


        $cart = session('cart', []);
        if (isset($cart[$productVariant->id])) {

            $cart[$productVariant->id]['quantity'] += $quantity;
        } else {

            $cart[$productVariant->id] = $data;
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.list');
    }


}
