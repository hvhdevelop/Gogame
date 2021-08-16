<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductPlatform extends Model
{
    use HasFactory;
    public $primaryKey = 'id';
    protected $table = 'product_platforms';
    
}
