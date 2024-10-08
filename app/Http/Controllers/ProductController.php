<?php

namespace App\Http\Controllers;

use App\Http\Requests\productCreate;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

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
        $roles=Role::all();


        //$users = Product::findOrFail(10);
        //dd($users->products);
        //$user=Product::find(20)->user;
        // return response()->json($user);
        return view('layouts.users',compact('users','roles'));
    }

    public function changeroles(Request $request ,$user_id){

        $user = User::find($user_id);

        $user->syncRoles($request->input('roles'));
        return redirect('users');
    }

    public function ordercreate(Request $request){
        $customer_name = $request->input('customer_name');
        $customer_address = $request->input('customer_address');
        $product_quantity = $request->input('quantity');
        $product_id = $request->input('product_id');
        $product = Product::findOrFail($product_id);

        $total_price = $product_quantity*$product->product_price;
        $insert = Order::create([
            'customer_name' => $customer_name,
            'customer_address'=> $customer_address,
            'product_name'=> $product->id,
            'product_pieces'=> $product->product_price,
            'total_price'=> $total_price,
            'seller_id' => $product->user->id,
            //"status" => OrderStatus::where('status_name', 'pending')->first()->id;
        ]);
        return view('siparisOlusturuldu');

    }

    public function siparisler(Request $request)
    {
        if (!Auth::user()->can('edit articles')){
            abort(403);
        }
        $orderarea = $request->input('ara');
        $user_name = Auth::user()->id;
        $orders = Order::where('seller_id', $user_name);
        if (!empty($orderarea)){
            $orders = $orders->where('customer_name','like','%'.$orderarea.'%');
        }


        $orders = $orders->paginate(5);


        $orders->appends(
            [
                'ara' => $orderarea
            ]
        );
        return view('layouts.orders',compact('orders','orderarea'));
    }

}
