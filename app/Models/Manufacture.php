<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'manufacture';
    protected $fillable = ['id','manufacture_name'];
    public function Products()
    {
        return $this->hasMany(Product::class, 'id');
    }
}