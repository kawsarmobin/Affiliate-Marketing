<?php

namespace App\Http\Controllers\Admin\Product;

use Session;
use App\Model\Admin\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Category\Category;

class ProductsController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('admin.product.index')
                ->with('products', Product::all());
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('admin.product.create')
                ->with('categories', Category::all());
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $this->validate($request, [
            'picture' => 'required',
            'name' => 'required|min:2',
            'category' => 'required',
            // 'product_dimensions' => 'required',
            'about' => 'required|min:2',
            'price' => 'required|min:2',
        ]);

        $product= new Product();

        $product->name = $request->name;
        $product->slug = str_slug($request->name .' '. time());
        $product->category_id = $request->category;
        $product->product_dimensions = $request->product_dimensions;
        $product->about = $request->about;
        $product->price = $request->price;

        if ($image = $request->file('picture')) {
            $new_name = time(). '.' .$image->getClientOriginalExtension();
            $image->move('public/admin/products/', $new_name);
            $product->picture = $new_name;
        }

        if ($product->save()) {
            Session::flash('success', 'Product Create Successfully');
        }

        return redirect()->back();
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        return view('admin.product.show')
                ->with('product', Product::find($id));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        return view('admin.product.edit')
                ->with('categories', Category::all())
                ->with('product', Product::find($id));
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
        $this->validate($request, [
            'picture' => 'image',
            'name' => 'required|min:2',
            'category' => 'required',
            // 'product_dimensions' => 'required',
            'about' => 'required|min:2',
            'price' => 'required|min:2',
        ]);

        $product= Product::find($id);

        $product->name = $request->name;
        $product->slug = str_slug($request->name .' '. time());
        $product->category_id = $request->category;
        $product->product_dimensions = $request->product_dimensions;
        $product->about = $request->about;
        $product->price = $request->price;

        if ($image = $request->file('picture')) {
            $image->move('public/admin/products/', $product->picture);
        }

        if ($product->save()) {
            Session::flash('success', 'Product Update Successfully');
        }

        return redirect()->route('product.index');
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

        if ($product->delete()) {

            unlink('public/admin/products/' . $product->getOriginal('picture'));

            Session::flash('success', 'Product Deleted Successfully');
        }

        return redirect()->back();
    }
}
