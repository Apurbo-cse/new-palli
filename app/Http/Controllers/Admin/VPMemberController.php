<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VPMember;
use Illuminate\Http\Request;

class VPMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $v_p_members= VPMember::orderBy('created_at', 'ASC')->paginate(20);
        return view('admin.pages.vice_pre.index',compact('v_p_members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.vice_pre.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
   {
        $vice_pre =new VPMember();

        $vice_pre->name = $request->input('name');
        $vice_pre->designation = $request->input('designation');
        $vice_pre->job = $request->input('job');
        $vice_pre->job_location = $request->input('job_location');
        $vice_pre->status = $request->input('status');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $path ='images/member';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path, $file_name);
            $vice_pre['image']= $path.'/'. $file_name;
        }

        $request->validate([
            'name'=>'required',
            'status'=>'required|in:'.VPMember::ACTIVE_STATUS.','.VPMember::INACTIVE_STATUS,
            // 'image' => 'required|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:2048',
        ]);

        $vice_pre->save();
        session()->flash('success', 'Member Created Successfully');
        return redirect()->route('admin.vice-president.index');
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
        $v_p_members = VPMember::findOrFail($id);
        return view('admin.pages.vice_pre.edit',compact('v_p_members'));
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
        $vice_pre = VPMember::findOrFail($id);
        $vice_pre->name = $request->input('name');
        $vice_pre->designation = $request->input('designation');
        $vice_pre->job = $request->input('job');
        $vice_pre->job_location = $request->input('job_location');
        $vice_pre->status = $request->input('status');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $path ='images/member';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path, $file_name);
            $vice_pre['image']= $path.'/'. $file_name;
        }

        $request->validate([
            'name'=>'required',
            'status'=>'required|in:'.VPMember::ACTIVE_STATUS.','.VPMember::INACTIVE_STATUS,

        ]);

        $vice_pre->save();
        session()->flash('success', 'vice_pre Updated Successfully');
        return redirect()->route('admin.vice_president.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $vice_pre = VPMember::findOrFail($id);
        if($vice_pre){
            if(file_exists(($vice_pre->image))){
                unlink($vice_pre->image);
            }

            $vice_pre->delete();
            session()->flash('success', 'Slider deleted successfully');
            return back();
        }
    }
}
