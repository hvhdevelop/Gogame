<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;
use App\Models\Platform;
use App\Models\Statut;
use App\Models\SystemMinium;
use App\Models\SystemRequie;
use App\Models\Image;
use App\Models\Minium;
use App\Models\Requie;
use App\Models\Purchan;
class Product extends Model
{
    use HasFactory;

    protected $table        = 'products';

    protected $primaryKey   = 'id';

    public $timestamps      = true;

    public function types(){
        return $this->belongsToMany( Type::class ,'product_types','id_product','id_type' );
    }
    public function platforms(){
        return $this->belongsToMany( Platform::class ,'product_platforms','id_product','id_platform' );
    }
    public function statuts(){
        return $this->belongsTo( Statut::class , 'status', 'id' );
    }
    public function system_miniums(){
        return $this->belongsTo( Minium::class , 'system_minium', 'id' );
    }
    public function system_requires(){
        return $this->belongsTo( Requie::class , 'system_require', 'id' );
    }
    public function images()
    {
        return $this->hasMany(Image::class, 'product_id', 'id');
    }
    public function favourites(){
        return $this->belongsToMany( Favourite::class ,'favourites','product_id','user_id' );
    }
    public function purchans(){
        return $this->belongsToMany( Purchan::class ,'purchans','product_id','user_id' );
    }
}
