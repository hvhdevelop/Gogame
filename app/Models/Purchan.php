<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class Purchan extends Model
{
    use HasFactory;
    protected $table = 'purchans';
    public $primaryKey = 'id';
    public $timestamps      = true;
    
}
