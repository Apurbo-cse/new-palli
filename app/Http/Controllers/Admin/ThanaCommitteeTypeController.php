<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ThanaCommitteeType;

class ThanaCommitteeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { $data['thana_committee_types'] = ThanaCommitteeType::orderBy('created_at', 'ASC')->paginate(20);
        return view('admin.pages.thana_type.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.thana_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $thana =new ThanaCommitteeType();
        $thana->thana_type = $request->input('thana_type');
        $thana->title = $request->input('title');
        $thana->description = $request->input('description');
        $thana->source = $request->input('source');
        $thana->status = $request->input('status');

        $request->validate([
            'thana_type'=>'required',
            'description'=>'required',
            'source'=>'required',
            'status'=>'required|in:'.ThanaCommitteeType::ACTIVE_STATUS.','.ThanaCommitteeType::INACTIVE_STATUS,
        ]);

        $thana->save();
        session()->flash('success', 'thana Created Successfully');
        return redirect()->route('admin.thana_type.index');
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
        $thana =ThanaCommitteeType::findOrFail($id);
        return view('admin.pages.thana_type.edit', compact('thana'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

        {$thana = ThanaCommitteeType::findOrFail($id);
        $thana->thana_type = $request->input('thana_type');
        $thana->title = $request->input('title');
        $thana->description = $request->input('description');
        $thana->source = $request->input('source');
        $thana->status = $request->input('status');

        $request->validate([
            'thana_type'=>'required',
            'description'=>'required',
            'source'=>'required',
            'status'=>'required|in:'.ThanaCommitteeType::ACTIVE_STATUS.','.ThanaCommitteeType::INACTIVE_STATUS,
        ]);

        $thana->save();
        session()->flash('success', 'thana Created Successfully');
        return redirect()->route('admin.thana_type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thana = ThanaCommitteeType::findOrFail($id);
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
