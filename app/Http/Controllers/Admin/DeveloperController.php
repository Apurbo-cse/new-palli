<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Devjea;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $developers= Devjea::orderBy('created_at', 'ASC')->paginate(20);
        return view('admin.pages.developer.index',compact('developers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.developer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
   {
        $developer =new Devjea();

        $developer->name = $request->input('name');
        $developer->designation = $request->input('designation');
        $developer->job = $request->input('job');
        $developer->job_location = $request->input('job_location');
        $developer->phone = $request->input('phone');
        $developer->email = $request->input('email');
        $developer->facebook = $request->input('facebook');
        $developer->linkedin = $request->input('linkedin');

        $developer->status = $request->input('status');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $path ='images/member';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path, $file_name);
            $developer['image']= $path.'/'. $file_name;
        }

        $request->validate([
            'name'=>'required',
            'status'=>'required|in:'.Devjea::ACTIVE_STATUS.','.Devjea::INACTIVE_STATUS,
            // 'image' => 'required|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:2048',
        ]);

        $developer->save();
        session()->flash('success', 'Member Created Successfully');
        return redirect()->route('admin.developer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $developer = Devjea::findOrFail($id);
        return view('admin.pages.developer.edit',compact('developer'));
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
        $developer = Devjea::findOrFail($id);
        $developer->name = $request->input('name');
        $developer->designation = $request->input('designation');
        $developer->job = $request->input('job');
        $developer->job_location = $request->input('job_location');
        $developer->phone = $request->input('phone');
        $developer->email = $request->input('email');
        $developer->facebook = $request->input('facebook');
        $developer->linkedin = $request->input('linkedin');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $path ='images/member';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path, $file_name);
            $developer['image']= $path.'/'. $file_name;
        }

        $request->validate([
            'name'=>'required',
            'status'=>'required|in:'.Devjea::ACTIVE_STATUS.','.Devjea::INACTIVE_STATUS,

        ]);

        $developer->save();
        session()->flash('success', 'developer Updated Successfully');
        return redirect()->route('admin.developer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $developer = Devjea::findOrFail($id);
        if($developer){
            if(file_exists(($developer->image))){
                unlink($developer->image);
            }

            $developer->delete();
            session()->flash('success', 'Slider deleted successfully');
            return back();
        }
    }
}
