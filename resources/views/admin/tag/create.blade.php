@extends('admin.layouts.master')
@section('title', 'Create Tag')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Create New Tag</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="">Dashboard</a></li>
                    <li class="active">Create Tag</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title">Tag Form</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{route('admin.tag.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-2 control-label">Tag Name</label>
                            <div class="col-md-10">
                                <input value="{{old('name')}}" name="name" type="text" id="name" class="form-control" placeholder="Tag Name">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Tag Description</label>
                            <div class="col-md-10">
                                <textarea name="description" class="form-control" rows="5" placeholder="Tag Description">{{ old('description') }}</textarea>
                                @error('description')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="pull-right">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                        </div>

                    </form>
                </div> <!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col -->
    </div>
    <!-- End Row -->

@endsection
