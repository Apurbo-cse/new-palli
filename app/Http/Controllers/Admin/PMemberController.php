<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PMember;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data['p_members']= PMember::orderBy('created_at', 'DESC')->paginate(20);
       $data['serial'] = 1;
        return view('admin.pages.president.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.president.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
   {
        $data =new PMember();

        $data->name = $request->input('name');
        $data->designation = $request->input('designation');
        $data->job = $request->input('job');
        $data->job_location = $request->input('job_location');
        $data->status = $request->input('status');
        $slider['published_at'] = Carbon::now();

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $path ='images/member';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path, $file_name);
            $data['image']= $path.'/'. $file_name;
        }

        $request->validate([
            'name'=>'required',
            'status'=>'required|in:'.PMember::ACTIVE_STATUS.','.PMember::INACTIVE_STATUS,
            // 'image' => 'required|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:2048',
        ]);

        $data->save();
        session()->flash('success', 'Member Created Successfully');
        return redirect()->route('admin.president.index');
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
        $president = PMember::findOrFail($id);

        return view('admin.pages.president.edit',compact('president'));
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
        $president = PMember::findOrFail($id);
        $president->name = $request->input('name');
        $president->designation = $request->input('designation');
        $president->job = $request->input('job');
        $president->job_location = $request->input('job_location');
        $president->status = $request->input('status');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $path ='images/member';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path, $file_name);
            $president['image']= $path.'/'. $file_name;
        }

        $request->validate([
            'name'=>'required',
            'status'=>'required|in:'.PMember::ACTIVE_STATUS.','.PMember::INACTIVE_STATUS,

        ]);

        $president->save();
        session()->flash('success', 'President Updated Successfully');
        return redirect()->route('admin.president.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $president = PMember::findOrFail($id);
        if($president){
            if(file_exists(($president->image))){
                unlink($president->image);
            }

            $president->delete();
            session()->flash('success', 'Slider deleted successfully');
            return back();
        }
    }
}

