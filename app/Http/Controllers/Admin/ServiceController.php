<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $services= Service::orderBy('created_at', 'ASC')->paginate(20);
        return view('admin.pages.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
   {
        $service =new Service();

        $service->title = $request->input('title');
        $service->info = $request->input('info');
        $service->status = $request->input('status');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $path ='images/member';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path, $file_name);
            $service['image']= $path.'/'. $file_name;
        }

        $request->validate([
            'info'=>'required',
            'status'=>'required|in:'.Service::ACTIVE_STATUS.','.Service::INACTIVE_STATUS,
            // 'image' => 'required|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:2048',
        ]);

        $service->save();
        session()->flash('success', 'Member Created Successfully');
        return redirect()->route('admin.service.index');
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
        $services = Service::findOrFail($id);
        return view('admin.pages.service.edit',compact('services'));
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
        $service = Service::findOrFail($id);
        $service->title = $request->input('title');
        $service->info = $request->input('info');
        $service->status = $request->input('status');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $path ='images/member';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path, $file_name);
            $service['image']= $path.'/'. $file_name;
        }

        $request->validate([
            'title'=>'required',
            'status'=>'required|in:'.Service::ACTIVE_STATUS.','.Service::INACTIVE_STATUS,

        ]);

        $service->save();
        session()->flash('success', 'service Updated Successfully');
        return redirect()->route('admin.service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $service = Service::findOrFail($id);
        if($service){
            if(file_exists(($service->image))){
                unlink($service->image);
            }

            $service->delete();
            session()->flash('success', 'Slider deleted successfully');
            return back();
        }
    }
}
