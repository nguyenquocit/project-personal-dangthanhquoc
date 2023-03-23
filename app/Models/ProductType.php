<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'type_product';
    protected $fillable = ['id','type_name','type_img'];
    public function Products()
    {
        return $this->hasMany(Product::class, 'id');
    }
}
