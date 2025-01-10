<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CommerceController extends Controller
{
    private $products, $text;
    public  function index()
    {
        return view('website.home.index',[
            // 'categories' => Category::all(),
            'products' => Product:: orderBy('id','desc')->take('8')->get(['id','category_id','name','selling_price','image']),
        ]);
    }

    public  function category($id)
    {
        return view('website.category.index',[
        'products' => Product::where('category_id',$id)->orderBy('id','desc')->get()
    ]);
    }

    public  function details($id)
    {
        return view('website.details.index',['product'=> Product::find($id)]);
    }

    public function ajaxSearch(){
        $this ->text = $_GET['text'];
        $this ->products = Product::where('name', 'LIKE',"%{$this ->text}%")->get(['id','category_id','name','image','selling_price']);
        foreach($this ->products as $product)
        {
            $product->image = asset($product->image);
            $product->category_name = $product->category->name;
        }
        return response()->json( $this->products);
    }
}
