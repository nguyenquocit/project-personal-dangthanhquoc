<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_id';
    protected $table = 'product';
    protected $fillable = ['product_name', 'product_price', 'product_img', 'product_color',
    'product_description', 'product_feature',
    'stock', 'sale_amount', 'expire_date', 'manufacture_id', 'type_id', 'comment_id'];

    public function productType()
    {
        return $this->belongsTo(ProductType::class, "type_id");
    }
}
