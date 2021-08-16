<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class Type extends Model
{
    use HasFactory;

    protected $table = 'types';

    public function products(){
        return $this->belongsToMany( Product::class ,'product_types','id_product','id_type' );
    }

}