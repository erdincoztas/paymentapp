<?php

namespace App\Http\Controllers;

use App\Http\Requests\productCreate;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function create(productCreate $request){

        $product_name = $request->input('product_name');
        $product_price = $request->input('product_price');
        $user_id = Auth::user()->id;

        $insert = Product::create([
            'product_name' => $product_name,
            'product_price'=> $product_price,
            'user_id' => $user_id
        ]);


        return redirect()->route('urunekle')->with('success','Product created successfully');


    }

    public function index(){
        $user_id = Auth::user()->id;
        $products = Product::where('user_id', $user_id)->get();
        return view('dashboard',compact('products'));

    }

    public function urunler(){
        $user_id = Auth::user()->id;
        $products = Product::where('user_id', $user_id)->get();
        return view('layouts.products',compact('products'));

    }


    public function urunlistele()
    {
        $products = Product::all();
        return view('welcome',compact('products'));

    }


    public function siparisdetay($id)
    {

        $product = Product::findOrFail($id);

        return view('siparisDetay',compact('product'));


    }

    public function delete($id){

        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('urunler')->with('success', 'Ürün başarıyla silindi.');

    }

    public function users()
    {
        $users = User::all();
        //$users = Product::findOrFail(10);
        //dd($users->products);
        $products = User::find(1)->products;
        $user=Product::find(20)->user;
        return response()->json($user);
    }
}
