@extends('admin.layouts.master')
@section('title', 'Post List')
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
                <h4 class="pull-left page-title">Post</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{route('admin.dashboard')}}">Home</a></li>
                    <li><a href="{{route('admin.post.create')}}">Post Create</a></li>
                    <li class="active">Post List</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row m-b-15">
        <div class="col-sm-12">
            <a class="btn btn-primary" href="{{route('admin.post.create')}}"><i class="fa fa-plus"></i> Create New Post</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Post List</h3>
                </div>
                <div class="panel-body">


                    <table id="datatable-buttons" class="table table-striped table-bordered text-center">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 10px">SL#</th>
                            <th class="text-center" >Title</th>
                            <th class="text-center" >Tags</th>
                            <th class="text-center" >Create Date</th>
                            <th class="text-center" >Featured</th>
                            <th class="text-center" >Status</th>
                            <th class="text-center" >Image</th>
                            <th class="text-center" style="width: 18.5%">Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$serial++ }}</td>
                                <td>{{$post->title}}</td>
                                <td>
                                    @foreach($post->tags as $tag)
                                        <span class="badge badge-primary">{{ $tag->name }} </span>
                                    @endforeach
                                </td>
                                <td>{{$post->published_at->format('d M, Y')}}</td>
                                <td>{{$post->is_featured}}</td>
                                <td>{{ucfirst($post->status)}}</td>
                                <td class="text-center">
                                    <div  style="max-width: 70px; max-height:70px;overflow:hidden">
                                        <img src="{{ asset($post->image) }}" class="img-fluid img-rounded" alt="">
                                    </div>
                                </td>
                                <td class="d-flex">
                                    <a class="btn btn-success d-inline-block" href="{{ route('admin.post.show', $post->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a class="btn btn-info d-inline-block" href="{{ route('admin.post.edit', $post->id) }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <form class="d-inline-block pull-right" method="post" action="{{ route('admin.post.destroy', $post->id) }}">
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
