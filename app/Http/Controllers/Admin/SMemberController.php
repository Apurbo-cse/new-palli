<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SMember;
use Illuminate\Http\Request;

class SMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $s_members= SMember::orderBy('created_at', 'ASC')->paginate(20);
        return view('admin.pages.secretary.index',compact('s_members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.secretary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
   {
        $secretary =new SMember();

        $secretary->name = $request->input('name');
        $secretary->designation = $request->input('designation');
        $secretary->job = $request->input('job');
        $secretary->job_location = $request->input('job_location');
        $secretary->status = $request->input('status');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $path ='images/member';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path, $file_name);
            $secretary['image']= $path.'/'. $file_name;
        }

        $request->validate([
            'name'=>'required',
            'status'=>'required|in:'.SMember::ACTIVE_STATUS.','.SMember::INACTIVE_STATUS,
            // 'image' => 'required|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:2048',
        ]);

        $secretary->save();
        session()->flash('success', 'Member Created Successfully');
        return redirect()->route('admin.secretary.index');
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
        $secretary = SMember::findOrFail($id);
        return view('admin.pages.secretary.edit',compact('secretary'));
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
        $secretary = SMember::findOrFail($id);
        $secretary->name = $request->input('name');
        $secretary->designation = $request->input('designation');
        $secretary->job = $request->input('job');
        $secretary->job_location = $request->input('job_location');
        $secretary->status = $request->input('status');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $path ='images/member';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path, $file_name);
            $secretary['image']= $path.'/'. $file_name;
        }

        $request->validate([
            'name'=>'required',
            'status'=>'required|in:'.SMember::ACTIVE_STATUS.','.SMember::INACTIVE_STATUS,

        ]);

        $secretary->save();
        session()->flash('success', 'secretary Updated Successfully');
        return redirect()->route('admin.secretary.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $secretary = SMember::findOrFail($id);
        if($secretary){
            if(file_exists(($secretary->image))){
                unlink($secretary->image);
            }

            $secretary->delete();
            session()->flash('success', 'Slider deleted successfully');
            return back();
        }
    }
}
