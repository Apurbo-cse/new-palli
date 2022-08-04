<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $members= Member::orderBy('created_at', 'ASC')->paginate(20);
        return view('admin.pages.member.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
   {
        $member =new Member();

        $member->member_type = $request->input('member_type');
        $member->name = $request->input('name');
        $member->designation = $request->input('designation');
        $member->job = $request->input('job');
        $member->job_location = $request->input('job_location');
        $member->status = $request->input('status');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $path ='images/member';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path, $file_name);
            $member['image']= $path.'/'. $file_name;
        }

        $request->validate([
            'name'=>'required',

            'status'=>'required|in:'.Member::ACTIVE_STATUS.','.Member::INACTIVE_STATUS,
            // 'image' => 'required|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:2048',
        ]);

        $member->save();
        session()->flash('success', 'Member Created Successfully');
        return redirect()->route('admin.member.index');
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
        $member = Member::findOrFail($id);
        return view('admin.pages.member.edit',compact('member'));
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
        $member = Member::findOrFail($id);

        $member->member_type = $request->input('member_type');
        $member->name = $request->input('name');
        $member->designation = $request->input('designation');
        $member->job = $request->input('job');
        $member->job_location = $request->input('job_location');
        $member->status = $request->input('status');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $path ='images/member';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path, $file_name);
            $member['image']= $path.'/'. $file_name;
        }

        $request->validate([
            'name'=>'required',

            'status'=>'required|in:'.Member::ACTIVE_STATUS.','.Member::INACTIVE_STATUS,
            // 'image' => 'required|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:2048',
        ]);

        $member->save();
        session()->flash('success', 'Member Updated Successfully');
        return redirect()->route('admin.member.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $member = Member::findOrFail($id);
        if($member){
            if(file_exists(($member->image))){
                unlink($member->image);
            }

            $member->delete();
            session()->flash('success', 'Slider deleted successfully');
            return back();
        }
    }
}
