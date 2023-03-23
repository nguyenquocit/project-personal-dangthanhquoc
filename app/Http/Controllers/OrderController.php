<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Wishlist;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function yourOder(Request $req){
        $firstname = $req->input('firstname');
        $lastname = $req->input('lastname');
        $address = $req->input('address');
        $phone = $req->input('phone');
        $email = $req->input('email');
        $order = new Order();    
        if(Auth::check()){
            $cart = Cart::where('user_id', Auth::id())->get();
            foreach($cart as $cart){
                $order = new Order();
                $order->name_Order = $lastname;
                $order->address_Order = $address;
                $order->phone_Order = $phone;
                $order->email_Order = $email;
                $order->prd_name = $cart->prd_name;
                $order->prd_img = $cart->prd_img;
                $order->prd_price = $cart->prd_price;
                $order->quantily = $cart->quantily;
                $order->save();

                $cart = Cart::where('id',$cart->id)->first();
                $cart->delete();
            }
        }
        else{

        }
        return redirect()->back()->with('success','order successfully');

    }
}
