<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;

use App\Http\Requests\StoreProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\Section;
use App\Category;
use App\Thumbnail;
use App\Brand;
use Validator;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $products = Product::with('thumbnails')->paginate(20);

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::select('id', 'title')->get();
        $brands = Brand::select('id', 'title')->get();

        return view('admin.product.create', compact('sections', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        // creates an array of selected Ids f categories
        $categoryIds = explode(',', $request->categories);
        $product = Product::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'status' => $request->status,
            'options' => isset($request->extras) ? json_encode($request->extras) : null,
            'brand_id' => $request->brand_id,
            'featured' => isset($request->featured) ? 1 : 0,
            'price' => $request->price,
            'discount' => $request->discount ? $request->discount : 0,
        ]);
 

        // attach categories in pivot table 
$product->categories()->attach($categoryIds);

        if (isset($request->thumbnails)) {
            foreach ($request->thumbnails as $thumbnail) {
                $extension = "." . $thumbnail->getClientOriginalExtension();
                $name = basename($thumbnail->getClientOriginalName(), $extension) . time();
                $name = $name . $extension;
                $path = $thumbnail->storeAs('products/thumbnails', $name, 'local');
                $thumb = Thumbnail::create([
                    'path' => 'uploads/' . $path,
                    'product_id' => $product->id,
                ]);
            }

            if ($product) {
                return back()->with('message', 'Product has been added successfully');
            } else {
                return back()->with('error', 'Error adding product');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $sections = Section::select('id', 'title')->get();
        $brands = Brand::select('id', 'title')->get();
        $options = json_decode($product->options);
        $CategoryIDs = Arr::pluck($product->categories, 'id');
      $IDStoString=implode(", ",$CategoryIDs); 
      
        return view('admin.product.edit', compact('product', 'sections', 'brands', 'options', 'CategoryIDs', 'IDStoString'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'price' => 'required|numeric',
            'discount' => 'numeric',


        ]);

        if (isset($request->thumbnails)) {
            foreach ($request->thumbnails as $thumbnail) {
                $extension = "." . $thumbnail->getClientOriginalExtension();
                $name = basename($thumbnail->getClientOriginalName(), $extension) . time();
                $name = $name . $extension;
                $path = $thumbnail->storeAs('products/thumbnails', $name, 'local');
                $thumb = Thumbnail::create([
                    'path' => 'uploads/' . $path,
                    'product_id' => $product->id,
                ]);
            }
        }
            $updateProduct = Product::where("id", $product->id)->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'description' => $request->description,
                'status' => $request->status,
                'options' => isset($request->extras) ? json_encode($request->extras) : null,
                'brand_id' => $request->brand_id,
                'featured' => isset($request->featured) ? 1 : 0,
                'price' => $request->price,
                'discount' => $request->discount ? $request->discount : 0,
            ]);

        $categories = explode(",", $request->categories);
        // detach previously saved categories
        $product->categories()->detach();
       
        // attach updated categories 
         $product->categories()->attach($categories);

        if ($updateProduct) {
            return back()->with('message', 'Section has been updated success fully :)');
        } else {
            return back()->with('error', 'error updating Section');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        $res = Product::where('id', $request->record_id)->update(['status' => $request->currentstatus == 1 ? 0 : 1]);
     
        $obj = array();
        $obj['msg'] = 'Error Updating Record';
        $obj['type'] = 'danger';

        if ($res) {

            $obj['msg'] = 'Record has been Updated successfully';
            $obj['type'] = 'success';
        }

        return $obj;
    }

    public function destroy(Request $request)
    {

        //$res = Product::where('id', $request->record_id)->delete();
        //$res2 = Thumbnail::where('product_id', $request->record_id)->delete();
        $res = true;
        $obj = array();
        $obj['msg'] = 'Error deleting Record';
        $obj['type'] = 'danger';

        if ($res) {
            $obj['msg'] = 'Record has been deleted successfully';
            $obj['type'] = 'success';
        }
        return $obj;
    }


    


}
