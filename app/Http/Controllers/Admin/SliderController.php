<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'required|mimes:jpg,png,bmp,jpeg',
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->title);
        
        if(isset($image)){

            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if(!file_exists('uploads/slider')){
                mkdir('uploads/slider', 0777, true);
            }
            $image->move('uploads/slider',$imageName);
            // if(!Storage::disk('public')->exists('sliders')){
            //     Storage::disk('public')->makeDirectory('sliders');
            // }
            // Storage::disk('public')->put('sliders/'.$imageName,$image);
        }else{
            $imageName = "default.png";
        }

        $sliders = new Slider();
        $sliders->title = $request->title;
        $sliders->sub_title = $request->sub_title;
        $sliders->image = $imageName;
        $sliders->save();

        return redirect()->route('slider.index')->with('successMsg','Slider Successfully Added!');
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
        $slider = Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
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
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'mimes:jpg,png,bmp,jpeg',
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->title);
        $slider = Slider::find($id);
        
        if(isset($image)){

            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if(!file_exists('uploads/slider')){
                mkdir('uploads/slider', 0777, true);
            }
            $image->move('uploads/slider',$imageName);
            // if(!Storage::disk('public')->exists('sliders')){
            //     Storage::disk('public')->makeDirectory('sliders');
            // }
            // Storage::disk('public')->put('sliders/'.$imageName,$image);
        }else{
            $imageName = $slider->image;
        }

        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->image = $imageName;
        $slider->save();

        return redirect()->route('slider.index')->with('successMsg','Slider Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        
        if(file_exists('uploads/slider/'.$slider->image)){
            unlink('uploads/slider/'.$slider->image);
        }
        
        $slider->delete();

        return redirect()->back()->with('SuccessMsg','Slider Delete Successfully!');
    }
}
