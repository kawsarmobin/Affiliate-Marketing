<?php

namespace App\Http\Controllers\Admin\SliderImage;

use Session;
use App\Model\Admin\SliderImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sliderimage.index')
                ->with('sliders', SliderImage::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliderimage.create');
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
          'image' => 'required',
        ]);

        $sliderImage = new SliderImage();

        if ($image = $request->file('image')) {
          $new_name = time(). '.' .$image->getClientOriginalExtension();
          $sliderImage['image'] = $new_name;
          $image->move('public/admin/sliderimages/', $new_name);
        }

        if ($sliderImage->save()) {
          Session::flash('success', 'Slider Image Upload Successfully');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      return view('admin.sliderimage.edit')
              ->with('slider', SliderImage::find($id));
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

      $sliderImage = SliderImage::find($id);

      if ($image = $request->file('image')) {
        $image->move('public/admin/sliderimages/', $sliderImage->image);
      }

      if ($sliderImage->save()) {
        Session::flash('success', 'Slider Image Update Successfully');
      }

      return redirect()->route('sliderimage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sliderImage = SliderImage::find($id);
        if ($sliderImage->delete()) {
            unlink('public/admin/sliderImages/' . $sliderImage->getOriginal('image'));
          Session::flash('success', 'Slider Image Deleted Successfully');
        }

        return redirect()->back();
    }
}
