<?php

namespace App\Http\Controllers\Website;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Product;
use App\Models\Platform;
use App\Models\Image;
use App\Models\Statut;
use App\Models\Minium;
use App\Models\Requie;
use App\Models\ProductPlatform;
use App\Models\ProductType;
use App\Models\Favourite;
use App\Models\Purchan;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $products  = Product::paginate(10);
        
        $count_product = count(Product::all());
        
        $platforms = ProductPlatform::all();
        $status    = Statut::all();
        $types     = Type::all();     
      return view('website.product.index',compact('products','platforms','status','types','count_product'));
    }
   
    public function favorites(){ 
        /*
        SELECT *
        FROM favourites
        INNER JOIN products ON favourites.product_id=products.id
        WHERE favourites.user_id = 26
        */
        $user       = Auth::user();
        $products = Favourite::join('products','favourites.product_id','=','products.id')
        ->select('products.*', 'favourites.id as fv_id','favourites.product_id')
        ->where('favourites.user_id','=',$user->id)
        ->groupBy('favourites.product_id')
        ->get();
        return view('website.product.favorites',compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $product    = Product::find($id);
        $types      = Type::all();
        $status     = Statut::all();
        $miniums    = Minium::all();
        $requires   = Requie::all();
        $platforms  = Platform::all();
        $extra_image    = Image::all();
        $products  = Product::inRandomOrder()->limit(5)->get();
        
        return view('website.product.detail',[
            'types'             => $types,        
            'status'            => $status,         
            'miniums'           => $miniums,          
            'requires'          => $requires,
            'platforms'         =>$platforms,
            'product'           =>$product,            
            'extra_image'       =>$extra_image,
            'products'          =>$products
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function add_favorites(Request $request,$id){
        $product     = Product::find($id);
        $user = Auth::user();
        $favourite   = new Favourite;
        $favourite->user_id        = $user->id;
        $favourite->product_id     = $product->id;
        $favourite->save();
        $message = '* Đã thêm '.$product->name.' vào Yêu thích!';
        $request->session()->flash('addtofavourite', $message);
        return redirect()->back();       
    }
    public function delete_favourites(Request $request,$id){       
        $favourite      = Favourite::find($id);
        $product     = Product::find($favourite->product_id);
        $user = Auth::user();
        $favourite->delete();
        $message = '* Đã xóa '.$product->name.' khỏi Yêu thích!';
        $request->session()->flash('deletefavourite', $message);
        return redirect()->back();
        
    }
    public function purchans(Request $request,$id){
        $product     = Product::find($id);
        $user = Auth::user();
        $purchan   = new Purchan;
        $purchan->user_id        = $user->id;
        $purchan->product_id     = $product->id;
        $purchan->save();
        return redirect()->route('Payment_success');       
    }
    public function payment_success(){
        return view('website.home.payment_success');
    }
}
