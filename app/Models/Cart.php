<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    protected $fillable = ['prd_name','prd_img','prd_price', 'quantily','user_id'];
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
