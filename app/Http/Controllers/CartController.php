<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CartController extends Controller
{
    public function addToCart($id)
    {
        $product = Product::where('Product_id',$id)->first();
        $cart = Cart::where('user_id', Auth::id())->get();
        $cartnameProduct = Cart::where('prd_name', $product->product_name)->first();
        $newcart = new Cart();
        $name = '';
        $quantily = 0;
        if(Auth::check()){
            if(!empty($cart)){
                foreach($cart as $key){
                    if($key->prd_name == $product->product_name){
                        $name = $product->product_name;
                    }
                }
                if($name == $product->product_name){
                    $quantily = $cartnameProduct->quantily;
                    $cartnameProduct->prd_name = $product->product_name;
                    $cartnameProduct->prd_img = $product->product_img;
                    $cartnameProduct->prd_price = $product->product_price;
                    $cartnameProduct->quantily = $quantily + 1;
                    $cartnameProduct->user_id = Auth::id();
                    $cartnameProduct->update();
                    return redirect()->back()->with('success','Product add to Cart successfully');
                }
                else{
                    $newcart->prd_name = $product->product_name;
                    $newcart->prd_img = $product->product_img;
                    $newcart->prd_price = $product->product_price;
                    $newcart->quantily = 1;
                    $newcart->user_id = Auth::id();
                    $newcart->save();
                }
            }
            else{
                $newcart->prd_name = $product->product_name;
                $newcart->prd_img = $product->product_img;
                $newcart->prd_price = $product->product_price;
                $newcart->user_id = Auth::id();
                $newcart->save();
            }
                // $data is not empty
                // $data is empty
        }else{
            return view('auth.login');
        }
        return redirect()->back()->with('success','Product add to Cart successfully');
    }

    public function showCart()
    {
        $count = [];
        $countcart = [];
        $user = [];
        if(Auth::check()){
            $user = User::where('id', Auth::id())->get();
        }
        if(Auth::check()){
            $countcart = Cart::where('user_id', Auth::id())->get();
        }
        if(Auth::check()){
            $data = Wishlist::where('user_id', Auth::id())->get();
            $count = Wishlist::where('user_id', Auth::id())->get();

        }else{
            return view('auth.login');
        }
        return view('cart', ['data' => $data, 'count' => $count, 'countcart' => $countcart, 'user' => $user]);
    }

    public function remotecart($id)
    {
        $cart = Cart::where('id',$id)->first();
        $cart->delete();
        return redirect()->back()->with('success','Wishlist Deleted successfully');
    }
}
