@extends('admin.layouts.master')
@section('title', 'member List')
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
                <h4 class="pull-left page-title">advisor</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="">Dashboard</a></li>
                    <li><a href="{{route('admin.advisor.create')}}">advisor Create</a></li>
                    <li class="active">advisor List</li>
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
                        <button class="btn btn-primary  mx-5"><a href="{{route('admin.advisor.index')}}" class="text-white">All</a></button>

                    </h3>
                </div>
                <div class="panel-body">



                    <table id="datatable-buttons" class="table table-striped table-bordered text-center">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 10px">SL#</th>
                            <th class="text-center" >Name</th>
                            <th class="text-center" >Degination</th>
                            <th class="text-center" >Job</th>
                            <th class="text-center" >Job Location</th>
                            <th class="text-center" style="width: 40%">Image</th>
                            <th class="text-center" >Status</th>
                            <th class="text-center" style="width: 12%">Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($advisors as $advisor)
                            <tr>
                                <td>{{$advisor->id}}</td>
                                <td>{{$advisor->name}}</td>
                                <td>{{$advisor->designation}}</td>
                                <td>{{$advisor->job}}</td>
                                <td>{{$advisor->job_location}}</td>
                                <td class="text-center"><img src="{{ asset($advisor->image) }}"  width="20%" alt=""></td>
                                <td>
                                    @if ($advisor->status == 0)
                                        <a type="button" class="btn btn-danger waves-effect waves-light">Inactive</a>
                                    @else
                                    <a type="button" class="btn btn-success waves-effect waves-light">Active</a>
                                    @endif
                                </td>
                                <td class="d-flex">
                                    <a class="btn btn-info d-inline-block" href="{{ route('admin.advisor.edit',$advisor->id) }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <form class="d-inline-block pull-right" method="post" action="{{ route('admin.advisor.destroy',$advisor->id) }}">
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
