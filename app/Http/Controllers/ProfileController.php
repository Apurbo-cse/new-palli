<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class ProfileController extends Controller
{
    public function profile(){
        $user = Auth::user();
        return view('frontend.pages.profile.profile', compact('user'));
    }

    // public function profile($id){
    //     $data['user'] = User::where('id', $id)->first();
    //     return view('frontend.pages.profile.profile', $data);
    // }

    public function profileEdit(){
        $user = Auth::user();
        return view('frontend.pages.profile.profileEdit', compact('user'));
    }

    public function profileIndex($id)
    {
        $user=User::findOrFail($id);
        return view('frontend.pages.profile.profileIndex', compact('user'));
    }
    // public function detailes($id)
    // {

    //     $user=User::findOrFail($id);
    //     $data['user']=$user;
    //     return view('frontend.user.detailes',$data);
    // }
    public function profileUpdate(Request $request){
    //    dd($request->all());
        $user = Auth::user();

        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');

        // $user->email = $request->email;
        $user->phone = $request->input('phone');
        $user->user_type = $request->input('user_type');

        // $user->password = $request->input('password');


        $user->facebook = $request->input('facebook');
        $user->linkedin = $request->input('linkedin');

        $user->description = $request->input('description');


        if ($request->hasFile('image')) {
            if($user->image != null){
                File::delete(public_path($user->image));
            }
            $image             = $request->file('image');
            $folder_path       = 'images/user/';
            $image_new_name    = Str::random(10) . '-' . now()->timestamp . '.' . $image->getClientOriginalExtension();
            $image->move( $folder_path,$image_new_name);
            $user->image   = $folder_path . $image_new_name;
        }

        $user->course_subject = $request->input('course_subject');
        $user->course_status = $request->input('course_status');
        $user->course_name = $request->input('course_name');
        $user->permanent_add = $request->input('permanent_add');
        $user->present_add = $request->input('present_add');

        $user->job_type = $request->input('job_type');
        $user->job_designation = $request->input('job_designation');
        $user->job_work = $request->input('job_work');

        $user->hsc_group = $request->input('hsc_group');
        $user->hsc_institute = $request->input('hsc_institute');
        $user->hsc_status = $request->input('hsc_status');
        $user->hsc_passing_year = $request->input('hsc_passing_year');

        $user->diploma_subject = $request->input('diploma_subject');
        $user->diploma_institute = $request->input('diploma_institute');
        $user->diploma_status = $request->input('diploma_status');
        $user->diploma_passing_year = $request->input('diploma_passing_year');

        $user->bsc_subject = $request->input('bsc_subject');
        $user->bsc_institute = $request->input('bsc_institute');
        $user->bsc_status = $request->input('bsc_status');
        $user->bsc_passing_year = $request->input('bsc_passing_year');

        $user->msc_subject = $request->input('msc_subject');
        $user->msc_institute = $request->input('msc_institute');
        $user->msc_status = $request->input('msc_status');
        $user->msc_passing_year = $request->input('msc_passing_year');

        $user->mba_subject = $request->input('mba_subject');
        $user->mba_institute = $request->input('mba_institute');
        $user->mba_status = $request->input('mba_status');
        $user->mba_passing_year = $request->input('mba_passing_year');

        $user->father_name = $request->input('father_name');
        $user->mother_name = $request->input('mother_name');

        $user->district = $request->input('district');
        $user->thana = $request->input('thana');

        $user->course_name = $request->input('course_name');

        $user->nid = $request->input('nid');
        $user->dob = $request->input('dob');
        $user->gender = $request->input('gender');
        $user->religion = $request->input('religion');
        $user->blood = $request->dfghjkl;

        $user->save();

        return redirect()->back();
    }
}
