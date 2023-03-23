<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductType;

class TypeController extends Controller
{
    public function getAllTypeProduct(){
        $category = ProductType::all();
        return view('index',['category' => $category]);
    }
}
