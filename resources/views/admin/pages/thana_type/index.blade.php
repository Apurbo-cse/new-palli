@extends('admin.layouts.master')
@section('title', 'thana List')
@section('table_css')
    <!-- DataTables -->
    <link href="{{asset('admin/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/plugins/datatables/buttons.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/plugins/datatables/fixedHeader.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/plugins/datatables/responsive.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/plugins/datatables/scroller.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Thana Committee</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="">Dashboard</a></li>
                    <li><a href="{{route('admin.thana_type.create')}}">Thana Committee Create</a></li>
                    <li class="active">Thana Committee List</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading text-end">
                    <h3 class="panel-title">
                        <button class="btn btn-primary  mx-5"><a href="{{route('admin.thana_type.index')}}" class="text-white">All</a></button>
                        {{-- <button class="btn"> <a href="{{route('admin.int_thana_type.joypurhat')}}" class="active">Joypurhat</a></button>
                        <button class="btn"> <a href="{{route('admin.int_thana_type.panchbibi')}}" class="active">Panchbibi</a></button>
                        <button class="btn"> <a href="{{route('admin.int_thana_type.kalai')}}" class="active">Kalai</a></button>
                        <button class="btn"> <a href="{{route('admin.int_thana_type.khetlal')}}" class="active">Khetlal</a></button>
                        <button class="btn"> <a href="{{route('admin.int_thana_type.akkelpur')}}" class="active">Akkelpur</a></button> --}}
                    </h3>
                </div>
                <div class="panel-body">
                    <?php
                    $currentDate = date("l, F j, Y");
                    $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
                    'May','June','July','August','September','October','November','December','Saturday','Sunday',
                    'Monday','Tuesday','Wednesday','Thursday','Friday');
                    // $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
                    // 'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
                    // বুধবার','বৃহস্পতিবার','শুক্রবার'
                    // );
                    // $convertedDATE = str_replace($engDATE,
                    // $bangDATE,
                    // $currentDate);
                    echo "$currentDate";
                    ?>

                    <table id="datatable-buttons" class="table table-striped table-bordered text-center">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 10px">SL#</th>
                            <th class="text-center" >Thana Type</th>
                            <th class="text-center" >Title</th>
                            <th class="text-center" >Description</th>
                            <th class="text-center" >Source</th>
                            <th class="text-center" >Publish Date</th>
                            <th class="text-center" >Status</th>
                            <th class="text-center" style="width: 12%">Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($thana_committee_types as $thana)
                            <tr>
                                <td>{{$thana->id}}</td>
                                <td>{{$thana->thana_type}}</td>
                                <td>{{$thana->title}}</td>
                                <td>{{$thana->description}}</td>
                                <td>{{$thana->source}}</td>
                                <td>{{$thana->created_at}}</td>
                                <td>
                                    @if ($thana->status == 0)
                                        <a type="button" class="btn btn-danger waves-effect waves-light">Inactive</a>
                                    @else
                                    <a type="button" class="btn btn-success waves-effect waves-light">Active</a>
                                    @endif
                                </td>
                                <td class="d-flex">
                                    <a class="btn btn-info d-inline-block" href="{{ route('admin.thana_type.edit',$thana->id) }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <form class="d-inline-block pull-right" method="post" action="{{ route('admin.thana_type.destroy',$thana->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" onclick="return confirm('Are you confirm to delete?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
    <!-- End Row -->

@endsection

@section('table_script')
    <!-- Datatables-->
    <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables/jszip.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables/responsive.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables/dataTables.scroller.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{asset('admin/pages/datatables.init.js')}}"></script>

@endsection
