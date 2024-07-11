<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Product;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Log;
// use Illuminate\Support\Facades\Session;
// use Illuminate\Database\QueryException;
// use App\Http\Requests\ProductRequest ;
// use Barryvdh\DomPDF\Facade\Pdf;
// use Image;


namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    public function index(){
         //$products= Product::all();
         //$products = Product::orderBy('created_at','desc')->paginate(10);
         $products = Product::with('category')->latest()->paginate(10);
         return view ('admin.pages.products.index',compact('products'));
        //dd('product list dekhabe');
    }

    public function create(){
        return view ('admin.pages.products.create');

   }
   public function store(ProductRequest $request){
    $imageName = time().'.'.$request->image->extension();
    $request->image->storeAs('public/images', $imageName);


        try{
            Product::create([
                'title'=>$request->title,
                'price'=>$request->price,
                'description'=>$request->description,
                'is_active'=>$request->is_active ?? 0,
                'image'=> $imageName

            ]);
            return redirect()->route('products.index')->withstatus('data inserted successfully') ;

        }catch(QueryException $e){
            return redirect()->back()->withErrors($e->getMessage())->withInput() ;
        }


          //dd($request->all());

}
public function show($id){
    $product= Product::findOrFail($id);
    return view ('admin.pages.products.show',compact('product'));

}
    public function edit($id){
        $product= Product::findOrFail($id);
        return view('admin.pages.products.edit',compact('product'));

    }

    public function update(ProductRequest $request,$id){


        try{
            $product= Product::findOrFail($id);

            if($request->hasFile('image')){
                $imageName = time().'.'.$request->image->extension();
                $request->image->storeAs('public/images', $imageName);
            }
            $product->update([
                'title'=>$request->title,
                'price'=>$request->price,
                'description'=>$request->description,
                'is_active'=>$request->is_active ?? 0 ,
                'image'=> $imageName ?? $product->image
            ]);

            return redirect()->route('products.index')->withstatus('data Updated successfully') ;

        }catch(QueryException $e){
            return redirect()->back()->withErrors($e->getMessage())->withInput() ;
        }


          //dd($request->all());

}
public function destroy($id){
 Product::destroy($id);
 return redirect()->route('products.index')->withstatus('data deleted successfully') ;
}

//trash
public function trash(){

    $this->authorize('product-trash-list');
    $products = Product::latest()->onlyTrashed()->paginate(10);



    return view('admin.pages.products.trash', compact('products'));
    }

     //Store Data
     public function restore($id){
        $product = Product::onlyTrashed()->find($id);
        $product-> restore();
        return redirect()->route('products.trash')->withStatus('Data Restore Sucessfully');


        }

        // Final Delete
     public function delete($id){
        $product = Product::onlyTrashed()->find($id);
        $product->colors()->detach();
        $product-> forceDelete();

        return redirect()->route('products.trash')->withStatus('Data Deleted Sucessfully');
    }
    //downloaad pdf

    public function downloadPdf(){

        $products = Product::latest()->take(10)->get();
         $pdf = Pdf::loadView('admin.pages.products.pdf', compact('products'));
         return $pdf->download('product-list.pdf');
    }

}
