<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ThanaCommittee;
use Illuminate\Http\Request;

class IntThanaController extends Controller
{
    public function joypurhat()
    {
        $thana_committees = ThanaCommittee::where('thana_type', 'Joypuraht Sadar',)->orderBy('created_at', 'DESC')->get();
        return view('admin.pages.thana.joypurhat',compact('thana_committees'));
    }

    public function panchbibi()
    {
        $thana_committees = ThanaCommittee::where('thana_type', 'Panchbibi',)->orderBy('created_at', 'DESC')->get();
        return view('admin.pages.thana.panchbibi',compact('thana_committees'));
    }

    public function kalai()
    {
        $thana_committees = ThanaCommittee::where('thana_type', 'Kalai',)->orderBy('created_at', 'DESC')->get();
        return view('admin.pages.thana.kalai',compact('thana_committees'));
    }

    public function khetlal()
    {
        $thana_committees = ThanaCommittee::where('thana_type', 'Khetlal',)->orderBy('created_at', 'DESC')->get();
        return view('admin.pages.thana.khetlal',compact('thana_committees'));
    }

    public function akkelpur()
    {
        $thana_committees = ThanaCommittee::where('thana_type', 'Akkelpur',)->orderBy('created_at', 'DESC')->get();
        return view('admin.pages.thana.akkelpur',compact('thana_committees'));
    }


}
