<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Type;
use App\Models\Product;
use App\Models\Newpost;
class HomeController extends Controller
{
    public function index(){   
        $most_buys = Product::inRandomOrder()->limit(4)->get();
        $products  = Product::limit(5)->get();
        $product_createds = Product::orderBy('created_at','desc')->get();
        $bignews   = Newpost::orderBy('created_at','desc')->limit(2)->get();
        $smailnews = Newpost::orderBy('created_at','desc')->offset(2)->limit(3)->get();
        return view('website.home.index',compact('products','product_createds','most_buys','bignews','smailnews') );
    }
    public function help(){       
        return view('website.home.help' );
    }
    public function checkout($id){
        $product  = Product::find($id);
        return view('website.home.checkout',compact('product'));
    }
    
    public function about(){
        return view('website.home.about');
    }
    public function privacy(){
        return view('website.home.privacy');
    }
    public function contacts(){
        return view('website.home.contacts');
    }
    public function error404(){
        return view('website.home.error404');
    }
    public function menu(){
        $types = Type::all();
        return view('layout.includes.menu',compact('types'));
    }
    public function search(Request $request){
        $input      = $request->input;
        $products = Product::where('name', 'like', "%$input%")->get();
        $count = count($products);
        return view('website.home.search', compact('products','count','input'));
    }
    
}
