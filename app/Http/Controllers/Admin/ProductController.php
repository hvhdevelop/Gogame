<?php

namespace App\Http\Controllers\Admin;

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

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $search = '';
        $products = Product::orderBy('id','desc');
        if($request->search){
            $products->where('name', 'like', "%$request->search%");
        }
        $products       = $products->paginate(10);
        
        $count_product = count(Product::all());
        
        $platforms = ProductPlatform::all();
        return view('admin.product.index',compact(['products','platforms','search','count_product']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        
        $status = Statut::all();
        
        $miniums = Minium::all();
       
        $requires = Requie::all();

        $platforms = Platform::all();
    
        return view('admin.product.create',[
            'types'             => $types,
            
            'status'            => $status,
            
            'miniums'           => $miniums,
            
            'requires'          => $requires,

            'platforms'         =>$platforms
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $types          = Type::all();       
        $status         = Statut::all();       
        $miniums        = Minium::all();            
        $requires       = Requie::all();
        $platforms      = Platform::all();
        $product        = Product::find($id);
        $extra_image    = Image::all();   
        return view('admin.product.detail',[
            'types'             => $types,            
            'status'            => $status,            
            'miniums'           => $miniums,            
            'requires'          => $requires,
            'platforms'         =>$platforms,
            'product'           =>$product,            
            'extra_image'       =>$extra_image
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $products             = new Product();
        $products->name       = $request->name;
        $products->trailer    = $request->trailer;
        $products->release    = $request->release;
        $aftersale = 0;
        $price = $request->price;
        $sale  = $request->saleoff;
        if( $sale != 0){ 
            $aftersale = $price * (( 100 - $sale) / 100);
        }  
        $products->price      = $price;
        $products->saleoff    = $sale;
        $products->aftersaleoff  = $aftersale;      
        $products->developer  = $request->developer;
        $products->publisher  = $request->publisher;
        $products->describe   = $request->describe;
        
        $products->status     = $request->status;
        $products->system_minium    = $request->system_minium;
        $products->system_require    = $request->system_require;
        if ($request->hasfile('image')) {
            $image = $request->file('image');

            //t???o ???????ng d???n  v?? t??n file ???nh
            $path = $image->store('image', 'public');

            //l??u t??n file ???nh v??o csdl
            $products->image = $path;
        }
        $products ->save();
        //l???y id c???a s???n ph???m v???a l??u
        $product_id = $products->id;
        //l???y c??c ???nh ph??? ???????c t???i l??n
        $images = $request->file('images');
        if($images != null){
            foreach ($images as $image ) { 
                //ki???m tra s??? t???n t???i c???a t???ng ???nh ph???
                if(isset($image)){
                    //t???o m???i ?????i t?????ng product_image
                    $extra_image = new Image();
                    //t???o ???????ng d???n (public/uploads/images) v?? l??u t??n file
                    $path = $image->store('images', 'public');
                    $extra_image->image = $path;
                    $extra_image->product_id = $product_id;
                    $extra_image->save();
                }
            }
        }       
        $products->platforms()->attach( $request->type_platforms );
        $products->types()->attach( $request->types );
        $message = '* ???? th??m s???n ph???m '.$request->name;
        $request->session()->flash('success', $message);
        return redirect()->route('products.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = Type::all();
        
        $status = Statut::all();
        
        $miniums = Minium::all();
       
        $requires = Requie::all();

        $platforms = Platform::all();

        $product = Product::find($id);

        $extra_image = Image::all();
    
        return view('admin.product.edit',[
            'types'             => $types,
            
            'status'            => $status,
            
            'miniums'           => $miniums,
            
            'requires'          => $requires,

            'platforms'         =>$platforms,

            'product'           =>$product,
            
            'extra_image'       =>$extra_image
        ]);
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
        $products             = Product::find($id);
        $products->name       = $request->name;
        $products->trailer    = $request->trailer;
        $products->release    = $request->release;
        $aftersale = 0;
        $price = $request->price;
        $sale  = $request->saleoff;
        if( $sale  != 0){ 
            $aftersale = $price * (( 100 - $sale) / 100);
        }  
        $products->price       = $price;
        $products->saleoff     = $sale;
        $products->aftersaleoff  = $aftersale;
        $products->developer  = $request->developer;
        $products->publisher  = $request->publisher;
        $products->describe   = $request->describe;
        
        $products->status     = $request->status;
        $products->system_minium    = $request->system_minium;
        $products->system_require    = $request->system_require;
        if ($request->hasfile('image')) {
            $image = $request->file('image');

            //t???o ???????ng d???n  v?? t??n file ???nh
            $path = $image->store('image', 'public');

            //l??u t??n file ???nh v??o csdl
            $products->image = $path;
        }
        $products ->save();
        //l???y id c???a s???n ph???m v???a l??u
        $product_id = $products->id;
        //l???y c??c ???nh ph??? ???????c t???i l??n
        $images = $request->file('images');
        if($images != null){
            foreach ($images as $image ) {
                //ki???m tra s??? t???n t???i c???a t???ng ???nh ph???
                if(isset($image)){
                    //t???o m???i ?????i t?????ng product_image
                    $extra_image = new Image();
                    //t???o ???????ng d???n (public/uploads/images) v?? l??u t??n file
                    $path = $image->store('images', 'public');
                    $extra_image->image = $path;
                    $extra_image->product_id = $product_id;
                    $extra_image->save();
                }
            }
        }  
        $products->platforms()->detach(); 
        $products->types()->detach();       
        $products->platforms()->attach( $request->type_platforms );
        $products->types()->attach( $request->types );
        $message = '???? c???p nh???t s???n ph???m '.$request->name;
        $request->session()->flash('success', $message);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $message = '* ???? x??a s???n ph???m '.$product->name;
        $product->delete();
        
        session()->flash('delete', $message);
        return redirect()->route('products.index');
    }
    
}