<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use Illuminate\Http\Request;

class AdvisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $advisors= Advisor::orderBy('created_at', 'ASC')->paginate(20);
        return view('admin.pages.advisor.index',compact('advisors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.advisor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
   {
        $advisor =new Advisor();

        $advisor->name = $request->input('name');
        $advisor->designation = $request->input('designation');
        $advisor->job = $request->input('job');
        $advisor->job_location = $request->input('job_location');
        $advisor->status = $request->input('status');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $path ='images/member';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path, $file_name);
            $advisor['image']= $path.'/'. $file_name;
        }

        $request->validate([
            'name'=>'required',
            'status'=>'required|in:'.Advisor::ACTIVE_STATUS.','.Advisor::INACTIVE_STATUS,
            // 'image' => 'required|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:2048',
        ]);

        $advisor->save();
        session()->flash('success', 'Member Created Successfully');
        return redirect()->route('admin.advisor.index');
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
        $advisors = Advisor::findOrFail($id);
        return view('admin.pages.advisor.edit',compact('advisors'));
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
        $advisor = Advisor::findOrFail($id);
        $advisor->name = $request->input('name');
        $advisor->designation = $request->input('designation');
        $advisor->job = $request->input('job');
        $advisor->job_location = $request->input('job_location');
        $advisor->status = $request->input('status');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $path ='images/member';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path, $file_name);
            $advisor['image']= $path.'/'. $file_name;
        }

        $request->validate([
            'name'=>'required',
            'status'=>'required|in:'.Advisor::ACTIVE_STATUS.','.Advisor::INACTIVE_STATUS,

        ]);

        $advisor->save();
        session()->flash('success', 'advisor Updated Successfully');
        return redirect()->route('admin.advisor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $advisor = Advisor::findOrFail($id);
        if($advisor){
            if(file_exists(($advisor->image))){
                unlink($advisor->image);
            }

            $advisor->delete();
            session()->flash('success', 'Slider deleted successfully');
            return back();
        }
    }
}
