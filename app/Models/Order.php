<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = ['name_Order','address_Order','phone_Order','email_Order','prd_name','prd_img','prd_price', 'quantily'];
}
