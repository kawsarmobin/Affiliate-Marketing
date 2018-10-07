<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Admin\Category\Category;
use App\Model\Admin\Article;
use App\Model\Admin\Product;
use App\Model\Admin\SliderImage;

class PublicController extends Controller
{
    public function index()
    {
      return view('public.product.index')
              ->with('sliderImage', SliderImage::take(1)->first())
              ->with('sliderImages', SliderImage::skip(1)->take(2)->get())
              ->with('articles', Article::all()->take(1))
              ->with('products', Product::all())
              ->with('features', Product::all()->take(10));
    }

    public function show($slug)
    {
      return view('public.product.show')
              ->with('product', Product::where('slug', $slug)->first());
    }

    public function categoryWise($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();

        return view('public.product.category_wise')
                ->with('category', $category)
                // ->with('products', Product::where('category_id', $category->id)->get());
                ->with('products', $category->product()->get());
    }
}
