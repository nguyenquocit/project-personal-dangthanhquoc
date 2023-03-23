<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = 'wishlist';
    protected $fillable = ['prd_name','prd_img','prd_price','user_id'];
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
