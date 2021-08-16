<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class Favourite extends Model
{
    use HasFactory;
    protected $table = 'favourites';
    public $primaryKey = 'id';
    public $timestamps      = true;
    
}
