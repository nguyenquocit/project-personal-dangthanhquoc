<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addwl($id){
        $product = Product::where('Product_id',$id)->first();
        $wl = Wishlist::where('user_id', Auth::id())->get();
        $wishlist = new Wishlist();
        $name = '';
        if(Auth::check()){
            if(!empty($wl)){
                foreach($wl as $key){
                    if($key->prd_name == $product->product_name){
                        $name = $product->product_name;
                    }
                }
                if($name == $product->product_name){
                    return redirect()->back()->with('success','Product exits in wishlist');
                }
                else{
                    $wishlist->prd_name = $product->product_name;
                    $wishlist->prd_img = $product->product_img;
                    $wishlist->prd_price = $product->product_price;
                    $wishlist->user_id = Auth::id();
                    $wishlist->save();
                }
            }
            else{
                $wishlist->prd_name = $product->product_name;
                $wishlist->prd_img = $product->product_img;
                $wishlist->prd_price = $product->product_price;
                $wishlist->user_id = Auth::id();
                $wishlist->save();
            }
                // $data is not empty
                // $data is empty
        }else{
            return view('auth.login');
        }
        session()->put('countwishlist', $wishlist);
        return redirect()->back()->with('success','Product add to wishlist successfully');
    }

    public function remoteWl($id)
    {
        $wl = Wishlist::where('id',$id)->first();
        $wl->delete();
        return redirect()->back()->with('success','Wishlist Deleted successfully');
    }
}
