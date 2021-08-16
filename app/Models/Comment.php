<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;
use App\Models\Newpost;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    public $primaryKey = 'id';
    public $timestamps      = true;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

