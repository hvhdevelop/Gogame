<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class Platform extends Model
{
    use HasFactory;

    protected $table = 'type_platforms';

    public function platforms(){
        return $this->belongsToMany( Product::class ,'product_flatforms','id_platform','id_product' );
    }

}