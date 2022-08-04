<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Support\Str;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sliders = Slider::orderBy('created_at', 'DESC')->paginate(20);
        $data['serial'] = 1;
        return view('admin.slider.index',$data,compact('sliders'));

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

        $slider =new Slider();
        $slider->title = $request->input('title');
        $slider->description = $request->input('description');
        $slider->status = $request->input('status');
        $slider['published_at'] = Carbon::now();



        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $path ='images/slider';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path, $file_name);
            $slider['image']= $path.'/'. $file_name;
        }

        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'status'=>'required|in:'.Slider::ACTIVE_STATUS.','.Slider::INACTIVE_STATUS,
            // 'image' => 'required|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:2048',
        ]);

        $slider->save();
        session()->flash('success', 'Slider Updated Successfully');
        return redirect()->route('admin.slider.index');
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
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
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
        $slider = Slider::findOrFail($id);
        $slider->title = $request->input('title');
        $slider->description = $request->input('description');
        $slider->status = $request->input('status');


        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $path ='images/slider';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path, $file_name);
            $slider['image']= $path.'/'. $file_name;
        }

        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'status'=>'required|in:'.Slider::ACTIVE_STATUS.','.Slider::INACTIVE_STATUS,
            // 'image' => 'required|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:2048',
        ]);

        $slider->save();
        session()->flash('success', 'Slider Updated Successfully');
        return redirect()->route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        if($slider){
            if(file_exists(($slider->image))){
                unlink($slider->image);
            }

            $slider->delete();
            session()->flash('success', 'Slider deleted successfully');
            return back();
        }
    }
}
