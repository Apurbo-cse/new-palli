<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Eternal;
use Illuminate\Http\Request;

class EternalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $eternals= Eternal::orderBy('created_at', 'ASC')->paginate(20);
        return view('admin.pages.eternal.index',compact('eternals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.eternal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
   {
        $eternal =new Eternal();

        $eternal->name = $request->input('name');
        $eternal->designation = $request->input('designation');
        $eternal->eternal = $request->input('eternal');
        $eternal->status = $request->input('status');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $path ='images/member';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path, $file_name);
            $eternal['image']= $path.'/'. $file_name;
        }

        $request->validate([
            'name'=>'required',
            'status'=>'required|in:'.Eternal::ACTIVE_STATUS.','.Eternal::INACTIVE_STATUS,
            // 'image' => 'required|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:2048',
        ]);

        $eternal->save();
        session()->flash('success', 'Member Created Successfully');
        return redirect()->route('admin.eternal.index');
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
        $eternal = Eternal::findOrFail($id);
        return view('admin.pages.eternal.edit',compact('eternal'));
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
        $eternal = Eternal::findOrFail($id);
        $eternal->name = $request->input('name');
        $eternal->designation = $request->input('designation');
        $eternal->eternal = $request->input('eternal');
        $eternal->status = $request->input('status');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $path ='images/member';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path, $file_name);
            $eternal['image']= $path.'/'. $file_name;
        }

        $request->validate([
            'name'=>'required',
            'status'=>'required|in:'.Eternal::ACTIVE_STATUS.','.Eternal::INACTIVE_STATUS,

        ]);

        $eternal->save();
        session()->flash('success', 'eternal Updated Successfully');
        return redirect()->route('admin.eternal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $eternal = Eternal::findOrFail($id);
        if($eternal){
            if(file_exists(($eternal->image))){
                unlink($eternal->image);
            }

            $eternal->delete();
            session()->flash('success', 'Slider deleted successfully');
            return back();
        }
    }
}
