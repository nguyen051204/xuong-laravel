<?php

namespace App\Http\Controllers;

use App\Models\BinhLuan;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function detail($slug)
    {
        $product=Product::query()->where('slug',$slug)->firstOrFail();
        $colors=ProductColor::query()->pluck('name','id')->all();
        $sizes=ProductSize::query()->pluck('name','id')->all();
        $comments = BinhLuan::where('product_id', $product->id)->get();

        return view('product-detail',compact('product','colors','sizes', 'comments'));
    }
}
