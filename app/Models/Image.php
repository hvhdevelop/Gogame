<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Image extends Model
{
    use HasFactory;
    protected $table        = 'extra_image';

    protected $primaryKey   = 'id';

    public $timestamps      = false;
    public function extra_image(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
