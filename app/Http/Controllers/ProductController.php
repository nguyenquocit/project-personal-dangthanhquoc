<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Wishlist;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Manufacture;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function showAllProduct(){
        $count = [];
        $countcart = [];
        $user = [];
        if(Auth::check()){
            $user = User::where('id', Auth::id())->get();
        }
        if(Auth::check()){
            $count = Wishlist::where('user_id', Auth::id())->get();
        }
        if(Auth::check()){
            $countcart = Cart::where('user_id', Auth::id())->get();
        }
        $prdfeature = Product::where('product_feature', 'like',1)->paginate(8); 
        $products = Product::orderBy('created_at','DESC')->paginate(8); 
        $category = ProductType::all();
        $category1 = ProductType::all();
        return view('index',['category' => $category,'category1' => $category1, 'products' => $products, 'prdfeature' => $prdfeature, 'count' => $count, 'countcart' => $countcart, 'user' => $user  ]);
    }

    public function getProductById($id){
        $products = Product::where('product_id', $id)->get();
        $count = [];
        $countcart = [];
        $user = [];
        if(Auth::check()){
            $user = User::where('id', Auth::id())->get();
        }
        if(Auth::check()){
            $count = Wishlist::where('user_id', Auth::id())->get();
        }
        if(Auth::check()){
            $countcart = Cart::where('user_id', Auth::id())->get();
        }
        return view('shop-details', ['products' => $products,'count' => $count, 'countcart' => $countcart, 'user' => $user]);
    }

    public function searchProduct(Request $request){
        $count = [];
        $countcart = [];
        $user = [];
        if(Auth::check()){
            $user = User::where('id', Auth::id())->get();
        }
        if(Auth::check()){
            $count = Wishlist::where('user_id', Auth::id())->get();
        }
        if(Auth::check()){
            $countcart = Cart::where('user_id', Auth::id())->get();
        }
        $search = $request->input('keysearch');
        $min = $request->input('min');
        $min = $request->input('max');
        $result = Product::where('product_name', 'like', '%'. $search . '%')->paginate(6); 
        return view('search-result',['result' => $result, 'count' => $count, 'countcart' => $countcart, 'user' => $user]);
    }

    public function getProductByTypeId($id){
        $products = Product::where('type_id', $id)->paginate(6);
        $count = [];
        $countcart = [];
        $user = [];
        if(Auth::check()){
            $user = User::where('id', Auth::id())->get();
        }
        if(Auth::check()){
            $count = Wishlist::where('user_id', Auth::id())->get();
        }
        if(Auth::check()){
            $countcart = Cart::where('user_id', Auth::id())->get();
        }
        return view('category', ['products' => $products, 'count' => $count, 'countcart' => $countcart, 'user' => $user]);
    }

    public function showWishlist()
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
        return view('listw', ['data' => $data, 'count' => $count, 'countcart' => $countcart, 'user' => $user]);
    }

    public function order(){
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
        return view('checkout', ['data' => $data, 'count' => $count, 'countcart' => $countcart, 'user' => $user]);
    }

    public function homeadmin(){
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                return view('admin/index');
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }
    }

    public function showAllProducts(){
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                $prd = Product::paginate(10);
                return view('admin/pages/tables/product', ['prd' => $prd]);
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }
    }

    public function showAllProductsType(){
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                $type = ProductType::paginate(10);
                return view('admin/pages/tables/type-product', ['type' => $type]);
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }
    }
    public function showAllorder(){
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                $order = Order::paginate(10);
                return view('admin/pages/tables/order', ['order' => $order]);
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }
    }
    public function showAllUsers(){
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                $User = User::paginate(10);
                return view('admin/pages/tables/user', ['User' => $User]);
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }
    }
    public function addNewProduct(){
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                $manu = Manufacture::all();
                $type = ProductType::all();
                return view('admin/pages/forms/addproduct',['manu' => $manu, 'type' => $type ]);
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }
    }

    public function editProduct($id){
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                $product = Product::where('product_id',$id)->get();
                $manu = Manufacture::all();
                $type = ProductType::all();
                return view('admin/pages/forms/editproduct',['product' => $product, 'manu' => $manu, 'type' => $type ]);
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }
    }
    public function remoteProduct($id){
        $product = Product::where('product_id',$id)->first();
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                if($product){
                    $product->delete();
                }
                return redirect()->back()->with('success','Delete Product successfully');
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }
    }

    public function editProducts(Request $req){
        $id = $req->input('idedit');
        $name = $req->input('nameeidt');
        $price = $req->input('priceeidt');
        $color = $req->input('coloreidt');
        $desc = $req->input('desceidt');
        $feature = $req->input('featureeidt');
        $stock = $req->input('stockeidt');
        $sale = $req->input('saleeidt');
        $exp = $req->input('expeidt');
        $manu = $req->input('manueidt');
        $type = $req->input('typeeidt');
        $img = $req->input('imgeidt');
        $product = Product::where('product_id',$id)->first();
        $img_default = $product->product_img;
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                $product->product_name = $name;
                $product->product_price = $price;
                if($img == ''){
                    $product->product_img = $img_default;
                }
                else{
                    $product->product_img = $img;
                }
                $product->product_color = $color;
                $product->product_description = $desc;
                $product->product_feature = $feature;
                $product->stock = $stock;
                $product->sale_amount = $sale;
                $product->expire_date = $exp;
                $product->manufacture_id = $manu;
                $product->type_id = $type;
                $product->update();
                return redirect('/admin/pages/tables/product')->with('success','Edit Product successfully');
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }

    }

    public function addProducts(Request $req){
        $name = $req->input('namepr');
        $price = $req->input('pricepr');
        $color = $req->input('colorpr');
        $desc = $req->input('descpr');
        $feature = $req->input('featurepr');
        $stock = $req->input('stockpr');
        $sale = $req->input('salepr');
        $exp = $req->input('exppr');
        $manu = $req->input('manupr');
        $type = $req->input('typepr');
        $img = $req->input('imgpr');
        $product = new Product();
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                $product->product_name = $name;
                $product->product_price = $price;
                $product->product_img = $img;
                $product->product_color = $color;
                $product->product_description = $desc;
                $product->product_feature = $feature;
                $product->stock = $stock;
                $product->sale_amount = $sale;
                $product->expire_date = $exp;
                $product->manufacture_id = $manu;
                $product->type_id = $type;
                $product->comment_id = '1';
                $product->save();
                return redirect('/admin/pages/tables/product')->with('success','Add Product successfully');
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }

    }


    public function addNewTypeProduct(){
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                return view('admin/pages/forms/add-type');
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }
    }

    public function addTypes(Request $req){
        $name = $req->input('typename');
        $img = $req->input('imgtype');
        $type = new ProductType();
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                $type->type_name = $name;
                $type->type_img = $img;
                $type->save();
                return redirect('/admin/pages/tables/type-product')->with('success','Add Type Product successfully');
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }

    }

    public function editType($id){
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                $ProductType = ProductType::where('id',$id)->get();
                return view('admin/pages/forms/edit-type',['ProductType' => $ProductType ]);
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }
    }
    
    public function editTypeprd(Request $req){
        $name = $req->input('typenameed');
        $img = $req->input('imgtyped');
        $id = $req->input('idtype');
        $ProductType = ProductType::where('id',$id)->first();
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                $ProductType->type_name = $name;
                $ProductType->type_img = $img;
                $ProductType->update();
                return redirect('/admin/pages/tables/type-product')->with('success','Edit Type Product successfully');
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }

    }

    public function remotetype($id){
        $ProductType = ProductType::where('id',$id)->first();
        $Product = Product::where('type_id',$id)->get();
        $productcount = $Product->count();
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                if($Product){
                    if($productcount < 1){
                        $ProductType->delete();
                    }
                    else{
                        return redirect()->back()->with('success','Can not delete successfully');
                    }
                }
                return redirect()->back()->with('success','Delete Product successfully');
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }
    }

    //manu
    public function showAllManufacture(){
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                $Manufacture = Manufacture::paginate(10);
                return view('admin/pages/tables/manufacture', ['Manufacture' => $Manufacture]);
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }
    }

    public function addmanufacture(){
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                return view('admin/pages/forms/addfacture');
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }
    }

    public function addManus(Request $req){
        $name = $req->input('manuname');
        $Manufacture = new Manufacture();
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                $Manufacture->manufacture_name = $name;
                $Manufacture->save();
                return redirect('/admin/pages/tables/manufacture')->with('success','Add Manufacture successfully');
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }

    }

    public function remotemanu($id){
        $Manufacture = Manufacture::where('id',$id)->first();
        $Product = Product::where('manufacture_id',$id)->get();
        $productcount = $Product->count();
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                if($Product){
                    if($productcount < 1){
                        $Manufacture->delete();
                    }
                    else{
                        return redirect()->back()->with('success','Can not delete successfully');
                    }
                }
                return redirect()->back()->with('success','Delete Product successfully');
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }
    }

    public function editmanufacture(Request $req){
        $id = $req->input('idmunu');
        $name = $req->input('manuname');
        $Manufacture = new Manufacture();
        $Manufacture = Manufacture::where('id',$id)->first();
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                $Manufacture->manufacture_name = $name;
                $Manufacture->update();
                return redirect('/admin/pages/tables/manufacture')->with('success','Edit Manufacture successfully');
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }

    }

    public function editmanu($id){
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                $Manufacture = Manufacture::where('id',$id)->get();
                return view('admin/pages/forms/editfacture',['Manufacture' => $Manufacture ]);
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }
    }
    //order
    public function changestatus($id){
        $order = Order::where('id', $id)->first();
        if($order->status == 0){
            $order->status = 1;
            $order->update();
            return redirect()->back()->with('success','Change status successfully');
        }
        else{
            $order->status = 0;
            $order->update();
            return redirect()->back()->with('success','Change status successfully');
        }
    }

    public function addOrder(){
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                return view('admin/pages/forms/addorder');
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }
    }

    public function addnewOrder(Request $req){
        $nameuser = $req->input('name');
        $address = $req->input('address');
        $phone = $req->input('phone');
        $email = $req->input('email');
        $nameprd = $req->input('nameprd');
        $imgpr = $req->input('imgpr');
        $pricepr = $req->input('pricepr');
        $quantily = $req->input('quantily');
        $status = $req->input('status');
        $Order = new Order();
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                $Order->name_Order = $nameuser;
                $Order->address_Order = $address;
                $Order->phone_Order = $phone;
                $Order->email_Order = $email;
                $Order->prd_name = $nameprd;
                $Order->prd_img = $imgpr;
                $Order->prd_price = $pricepr;
                $Order->quantily = $quantily;
                $Order->status = $status;
                $Order->save();
                return redirect('/admin/pages/tables/order')->with('success','Add new order successfully');
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }

    }

    public function getorderedit($id){
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                $Order = Order::where('id',$id)->get();
                return view('admin/pages/forms/editorder',['Order' => $Order ]);
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }
    }

    public function editorder(Request $req){
        $id = $req->input('id');
        $nameuser = $req->input('name');
        $address = $req->input('address');
        $phone = $req->input('phone');
        $email = $req->input('email');
        $nameprd = $req->input('nameprd');
        $imgpr = $req->input('imgpr');
        $pricepr = $req->input('pricepr');
        $quantily = $req->input('quantily');
        $status = $req->input('status');
        $Order = Order::where('id',$id)->first();
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                $Order->name_Order = $nameuser;
                $Order->address_Order = $address;
                $Order->phone_Order = $phone;
                $Order->email_Order = $email;
                $Order->prd_name = $nameprd;
                $Order->prd_img = $imgpr;
                $Order->prd_price = $pricepr;
                $Order->quantily = $quantily;
                $Order->status = $status;
                $Order->update();
                return redirect('/admin/pages/tables/order')->with('success','Edit order successfully');
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }

    }

    public function remoteorder($id){
        $Order = Order::where('id',$id)->first();
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                if($Order){
                    $Order->delete();
                }
                return redirect()->back()->with('success','Delete order successfully');
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }
    }

    //user
    public function adduser(){
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                return view('admin/pages/forms/adduser');
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }
    }

    public function addnewuser(Request $req){
        $nameuser = $req->input('name');
        $email = $req->input('email');
        $password = $req->input('password');
        $User = new User();
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                $User->name = $nameuser;
                $User->email = $email;
                $User->password = $password;
                $User->save();
                return redirect('/admin/pages/tables/user')->with('success','Add new user successfully');
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }

    }

    public function getuseredit($id){
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                $User = User::where('id',$id)->get();
                return view('admin/pages/forms/edituser',['User' => $User ]);
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }
    }

    public function edituser(Request $req){
        $id = $req->input('id');
        $nameuser = $req->input('name');
        $email = $req->input('email');
        $password = $req->input('password');
        $User = User::where('id',$id)->first();
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                $User->name = $nameuser;
                $User->email = $email;
                $User->password = $password;
                $User->update();
                return redirect('/admin/pages/tables/user')->with('success','Edit users successfully');
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }

    }

    public function remoteuser($id){
        $User = User::where('id',$id)->first();
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                if($User){
                    $User->delete();
                }
                return redirect()->back()->with('success','Delete order successfully');
            }
            else{
                return redirect('/')->with('success','You are not Admin');
            }
        }
        else{
            return view('/login');
        }
    }
} 
