@extends('frontend.layouts.master')

@section('css')
<link rel="stylesheet" href="{{ asset('frontend/profile.css') }}">

<!-- CSS Libraries -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Core CSS -->
<link href="https://students.yesinstitutebd.com/admin/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">

@endsection

@section('content')

<br><br><br><br><br>

<form action="{{route('web.profileUpdate')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- ======= About Sectionn ======= -->
    <section id="about" style="margin-top:30px;">

        <!-- ======= About Me ======= -->
        <div class="about-me container">

            <div class="sectionn-title">

                <p style="color:#038b77;font-size:28px;" class="mb-3">Update Profile</p>
                <h2>Hello!!! I'm</h2>
                <p style="color:#007B98;font-size:25px;">{{ $user->name}} {{ $user->last_name}}</p>
            </div>

            <div class="row">
                <div class="col-lg-4" data-aos="fade-right">
                    <img src="{{asset($user->image)}}" class="img-fluid object-fit" alt=""
                        style="height:350px; width:330px; "> <br> <br>
                    <input type="file" name="image" id="">
                </div>
                <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                    <h3 style="color:#DE3163;font-size:18px;">{{ $user->job_digination }}</h3>
                    <br>
                    <div class="row">
                        <div class="row form-group">
                            <div class="col-md-2"><label for="father_name">Frist Name </label></div>
                            <div class="col-md-4"><input class="form-control" name="name" type="text" value="{{ $user->name }}"
                                    id="father_name"></div>
                            <div class="col-md-2"><label for="mother_name">Last Name </label></div>
                            <div class="col-md-4"><input class="form-control" name="last_name" type="text" value="{{ $user->last_name }}"
                                    id="mother_name">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-2"><label for="father_name">Email </label></div>
                            <div class="col-md-4"><input class="form-control" name="email" type="text" value="{{ $user->email }}" disabled
                                    id="father_name"></div>
                            <div class="col-md-2"><label for="mother_name">Phone </label></div>
                            <div class="col-md-4"><input class="form-control" name="phone" type="text" value="{{ $user->phone }}"
                                    id="mother_name">
                            </div>
                        </div>

                        <div class="row form-group">
                           <div class="col-12">
                            <label for="father_name">Description </label>
                            <textarea name="description" class="form-control text-left">{{ $user->description }}</textarea>
                           </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <!-- End About Me -->

    </section>
    <!-- End About Sectionn -->

    <div class="container">
        <hr>

        <div class='col-lg-12 col-lg-offset-4' style="margin-bottom: 20px">

            <div class="row form-group">
                <div class="col-md-1"><label for="course_id">Engineer <span style="color: red;">*</span></label>
                </div>
                <div class="col-md-3">
                    <select name="course_name" id="" class="form-control" required>
                        <option value="Diploma in Engineering" @if ($user->course_name == 'Diploma in Engineering') selected @endif >Diploma in Engineering</option>
                        <option value="BSc in Engineering (Diploma)" @if ($user->course_name == 'BSc in Engineering (Diploma)') selected @endif >BSc in Engineering (Diploma)</option>
                        <option value="BSc in Engineering" @if ($user->course_name == 'BSc in Engineering') selected @endif >BSc in Engineering</option>
                        <option value="MSc in Engineering / MBA" @if ($user->course_name == 'MSc in Engineering / MBA') selected @endif >MSc in Engineering / MBA</option>
                    </select>
                </div>
                <div class="col-md-1"><label for="admission_date">Subject <span style="color: red;">*</span></label>
                </div>
                <div class="col-md-4"><input class="form-control" name="course_subject" type="text" required
                        value="{{ $user->course_subject }}" placeholder="Computer Science & Engineering"></div>
                <div class="col-md-1"><label for="admission_date">Course <span style="color: red;">*</span></label>
                </div>
                <div class="col-md-2">
                    <select name="course_status" id="" class="form-control required">
                        <option value="Complete" @if ($user->course_status == 'Complete') selected @endif >Complete</option>
                        <option value="Running" @if ($user->course_status == 'Running') selected @endif >Running</option>
                    </select>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2"><label for="genderd">Gender <span style="color: red;">*</span></label></div>
                <div class="col-md-4"> <select class="form-control" id="genderd" name="gender" required>
                        <option value="Male" @if ($user->gender == 'Male') selected @endif >Male</option>
                        <option value="Female" @if ($user->gender == 'Female') selected @endif >Female</option>
                    </select></div>
                <div class="col-md-2"><label for="date_of_birth">Date Of Birth</label></div>
                <div class="col-md-4"><input class="form-control" name="dob" type="date" value="{{ Carbon\Carbon::parse($user->dob)->format('m/d/Y') }}"
                        id="date_of_birth"></div>
            </div>

            <div class="row form-group">
                <div class="col-md-2"><label for="father_name">Father&#039;s Name </label></div>
                <div class="col-md-4"><input class="form-control" name="father_name" type="text" value="{{ $user->father_name }}"
                        id="father_name"></div>
                <div class="col-md-2"><label for="mother_name">Mother&#039;s Name </label></div>
                <div class="col-md-4"><input class="form-control" name="mother_name" type="text" value="{{ $user->mother_name }}"
                        id="mother_name"></div>
            </div>


            <div class="row form-group">

                <div class="col-md-2">
                    <label for="present_address">Permanent Address
                </label>
                </div>
                <div class="col-md-4">
                    <input class="form-control" name="permanent_add" type="text"value="{{ $user->permanent_add }}" id="present_address">
                </div>

                <div class="col-md-2">
                    <label for="permanent_address">Present Address</label>
                </div>
                <div class="col-md-4">
                    <input class="form-control" name="present_add" type="text" value="{{ $user->present_add }}" id="permanent_address">
                </div>
            </div>

            <div class="row form-group">

                <div class="col-md-2"><label for="blood_group">Blood Group </label>
                </div>
                <div class="col-md-4">
                    <select class="form-control" id="blood_group" name="dfghjkl">
                        <option value="A+" @if ($user->blood == 'A+') selected @endif >A+</option>
                        <option value="A-" @if ($user->blood == 'A-') selected @endif >A-</option>
                        <option value="B+" @if ($user->blood == 'B+') selected @endif >B+</option>
                        <option value="B-" @if ($user->blood == 'B-') selected @endif >B-</option>
                        <option value="O+" @if ($user->blood == 'O+') selected @endif >O+</option>
                        <option value="O-" @if ($user->blood == 'O-') selected @endif >O-</option>
                        <option value="AB+" @if ($user->blood == 'AB+') selected @endif >AB+</option>
                        <option value="AB-" @if ($user->blood == 'AB-') selected @endif >AB-</option>
                    </select>
                </div>
                <div class="col-md-2"><label for="blood_group">Religion </label>
                </div>
                <div class="col-md-4">
                    <select class="form-control" id="blood_group" name="religion">
                        <option value="Islam" @if ($user->religion == 'Islam') selected @endif >Islam</option>
                        <option value="Hindusim" @if ($user->religion == 'Hindusim') selected @endif >Hindusim</option>
                        <option value="Christian" @if ($user->religion == 'Christian') selected @endif >Christian</option>
                        <option value="Buddhism" @if ($user->religion == 'Buddhism') selected @endif >Buddhism</option>
                    </select>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2"><label for="nationality">Facbook Link</label>
                </div>
                <div class="col-md-4"><input class="form-control" name="facebook" type="text" value="{{ $user->facebook }}"
                        id="nationality">
                </div>
                <div class="col-md-2"><label for="home_telephone">Linkedin Link</label></div>
                <div class="col-md-4"><input class="form-control" name="linkedin" type="text" value="{{ $user->linkedin }}"
                        id="home_telephone"></div>

            </div>


            <div class="row form-group">
                <div class="col-md-1"><label for="nid_no">NID No</span> </label></div>
                <div class="col-md-3"><input class="form-control" name="nid" type="text" value="{{ $user->nid }}" id="nid_no">
                </div>
                <div class="col-md-1"><label for="zip_code">District</label>
                </div>
                <div class="col-md-3">
                    <input class="form-control" name="district" type="text" value="Joypurhat" disabled>

                </div>
                <div class="col-md-1"><label for="zip_code">Thana</label>
                </div>
                <div class="col-md-3">
                    <select class="form-control" id="blood_group" name="thana">
                        <option value="{{ $user->thana }}">{{ $user->thana }}</option>
                        <option value="Joypurhat Sadar" @if ($user->job_type == 'Joypurhat Sadar') selected @endif >Joypurhat Sadar</option>
                        <option value="Panchbibi" @if ($user->job_type == 'Panchbibi') selected @endif >Panchbibi</option>
                        <option value="Kalai" @if ($user->job_type == 'Kalai') selected @endif >Kalai</option>
                        <option value="Khetlal" @if ($user->job_type == 'Khetlal') selected @endif >Khetlal</option>
                        <option value="Akkelpur" @if ($user->job_type == 'Akkelpur') selected @endif >Akkelpur</option>
                    </select>
                </div>
            </div>



            <div class="row form-group">
                <div class="col-md-1"><label for="course_id"> Job</label>
                </div>
                <div class="col-md-3">
                    <select name="job_type" id="" class="form-control">
                        <option value="Govt" @if ($user->job_type == 'Govt') selected @endif >Govt</option>
                        <option value="Company" @if ($user->job_type == 'Company') selected @endif >Company</option>
                        <option value="Student" @if ($user->job_type == 'Student') selected @endif >Student</option>
                    </select>
                </div>
                <div class="col-md-1"><label for="email">Digination</label></div>
                <div class="col-md-3"><input class="form-control" name="job_designation" type="text" value="{{ $user->job_designation }}" id="email">
                </div>
                <div class="col-md-1"><label for="email">
                        Workplace</label></div>
                <div class="col-md-3"><input class="form-control" name="job_work" type="text" value="{{ $user->job_work }}" id="email">
                </div>
            </div>

            <!-- ======= Counts ======= -->
        <div class="counts container">

            <div class="row">
                <div class="sectionn-title" style="margin-bottom:20px;">
                    <h2 style="font-size: 20px">Education</h2>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                    <div class="count-box">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        <b style="color:white;font-size:12px;">HSC</b>

                        <input type="text" name="hsc_group" class="mt-2 Pls" value="{{ $user->hsc_group}}" placeholder="Enter Subject">
                        <input type="text" name="hsc_institute" class="mt-2 Pls" value="{{$user->hsc_institute }}" placeholder="Enter Institu">
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        <b style="color:white;font-size:12px;">Diploma in Engineering</b>

                        <input type="text" name="diploma_subject" class="mt-2 Pls" value="{{$user->diploma_subject }}" placeholder="Enter Institu">
                        <input type="text" name="diploma_institute" class="mt-2 Pls" value="{{$user->diploma_institute }}" placeholder="Enter Institu">
                    </div>
                </div>


                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        <b style="color:white;font-size:12px;">BSc in Engineering</b>

                        <input type="text" name="bsc_subject" class="mt-2 Pls" value="{{ $user->bsc_subject}}" placeholder="Enter Subject">
                        <input type="text" name="bsc_institute" class="mt-2 Pls" value="{{$user->bsc_institute }}" placeholder="Enter Institu">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        <b style="color:white;font-size:12px;">MSc in Engineering</b>

                        <input type="text" name="msc_subject" class="mt-2 Pls" value="{{ $user->msc_subject}}" placeholder="Enter Subject">
                        <input type="text" name="msc_institute" class="mt-2 Pls" value="{{$user->msc_institute }}" placeholder="Enter Institu">
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 md-lg-0">
                    <div class="count-box">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        <b style="color:white;font-size:12px;">EMBA / MBA</b>

                        <input type="text" name="mba_subject" class="mt-2 Pls" value="{{ $user->mba_subject}}" placeholder="Enter Subject">
                        <input type="text" name="mba_institute" class="mt-2 Pls" value="{{$user->mba_institute }}" placeholder="Enter Institu">
                    </div>
                </div>

            </div>

        </div><!-- End Counts -->


            <br>


            <center>
                <button class="btn bg-warning px-5" type="reset">Clear</button>
                <button class="btn bg-primary px-5" type="submit">Update</button>
            </center>
            <br><br>

        </div>

    </div>

</form>

{{-- <div class="container">
        <form action="{{route('web.profileUpdate')}}" method="POST" enctype="multipart/form-data">
@csrf
<input type="text" class="bg-dark" name="name" value="{{ $user->name }}">
<input type="text" class="bg-dark" name="last_name" id="" value="{{ $user->last_name }}">
<button type="submit" class="btn-success">submit</button>
</form>
</div> --}}
<style>
    .Pls::placeholder{
        font-size: 12px;
        padding-left: 5px;
    }
</style>

@endsection
