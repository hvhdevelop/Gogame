<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Newpost extends Model
{
    use HasFactory;
    public $primaryKey = 'id';
    protected $table = 'news';
    public $timestamps      = true;
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}






