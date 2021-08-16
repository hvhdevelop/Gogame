<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Requie extends Model
{
    use HasFactory;
    public $primaryKey = 'id';
    protected $table = 'system_require';
    public $timestamps      = true;
}
