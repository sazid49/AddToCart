<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {   

        $products = Product::query()->orderby('id','desc')->get();
        return view('products',compact('products'));
    }

    public function addtocart($id)
    {
        $product = Product::find($id);
        
        if(!$product)
        {
           abort(404);
        }

        $cart = Session()->get('cart');

        if(!$cart)
        {
             $cart = [
                $id = [
                    'name'=>$product->name,
                    'quantity'=>1,
                    'price'=>$product->price,
                    'image'=>$product->image,

                ]

            ];
         session()->put('cart',$cart); 
        return redirect()->route('cart')->with('success','Product Add to Cart');
            
        }

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
            session()->put('cart',$cart);
            return redirect()->route('cart')->with('success','Product Add to Cart');
        }

        $cart[$id] = [
            'name'=>$product->name,
            'quantity'=>1,
            'price'=>$product->price,
            'image'=>$product->image,
        ] ;
        
        session()->put('cart',$cart);
        return redirect()->route('cart')->with('success','Product Add to Cart');

    
    }

    public function cart()
    {
        return view('cart');
    }
}
