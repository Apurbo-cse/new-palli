<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ThanaCommittee;

class ThanaCommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['thana_committees'] = ThanaCommittee::orderBy('created_at', 'ASC')->paginate(20);
        return view('admin.pages.thana.index',$data);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.thana.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $thana =new ThanaCommittee();
        $thana->title = $request->input('title');
        $thana->description = $request->input('description');
        $thana->name = $request->input('name');
        $thana->department = $request->input('department');
        $thana->thana_type = $request->input('thana_type');
        $thana->status = $request->input('status');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $path ='images/thana';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path, $file_name);
            $thana['image']= $path.'/'. $file_name;
        }

        $request->validate([
            'name'=>'required',
            'department'=>'required',
            'status'=>'required|in:'.ThanaCommittee::ACTIVE_STATUS.','.ThanaCommittee::INACTIVE_STATUS,
            // 'image' => 'required|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:2048',
        ]);

        $thana->save();
        session()->flash('success', 'thana Created Successfully');
        return redirect()->route('admin.thana.index');
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
        $thana = ThanaCommittee::findOrFail($id);
        return view('admin.pages.thana.edit', compact('thana'));
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
        $thana = ThanaCommittee::findOrFail($id);

        $thana->title = $request->input('title');
        $thana->description = $request->input('description');
        $thana->name = $request->input('name');
        $thana->department = $request->input('department');
        $thana->thana_type = $request->input('thana_type');
        $thana->status = $request->input('status');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $path ='images/thana';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path, $file_name);
            $thana['image']= $path.'/'. $file_name;
        }

        $request->validate([
            'name'=>'required',
            'department'=>'required',
            'status'=>'required|in:'.ThanaCommittee::ACTIVE_STATUS.','.ThanaCommittee::INACTIVE_STATUS,
            // 'image' => 'required|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:2048',
        ]);

        $thana->save();
        session()->flash('success', 'thana Updated Successfully');
        return redirect()->route('admin.thana.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thana = ThanaCommittee::findOrFail($id);
        if($thana){
            if(file_exists(($thana->image))){
                unlink($thana->image);
            }
            $thana->delete();
            session()->flash('success', 'thana deleted successfully');
            return back();
        }
    }
}
