@extends('admin.layouts.master')
@section('title', 'Create New thana')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Create New thana</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('admin.thana_type.index')}}">Thana List</a></li>
                    <li class="active">Create Thana</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title">Thana Form</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{route('admin.thana_type.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-2 control-label">Thana Type</label>
                            <div class="col-md-10">
                                <select name="thana_type" id="" class="form-control">
                                    <option value="{{old('thana_type')}}" thana_type="thana_type" selected></option>
                                    <option thana_type="thana_type" >Joypuraht Sadar</option>
                                    <option thana_type="thana_type" >Panchbibi</option>
                                    <option thana_type="thana_type" >Kalai</option>
                                    <option thana_type="thana_type" >Khetlal</option>
                                    <option thana_type="thana_type" >Akkelpur</option>
                                </select>
                                @error('thana_type')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Title</label>
                            <div class="col-md-10">
                                <input value="{{old('title')}}" name="title" type="text" id="title" class="form-control" placeholder="name">
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Description</label>
                            <div class="col-md-10">
                                <textarea name="description"  id="summernote" class="form-control" rows="5" placeholder="Content">{{ old('description') }}</textarea>
                                @error('description')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Source</label>
                            <div class="col-md-10">
                            <input value="{{old('source')}}" name="source" type="text" id="title" class="form-control" placeholder="source">
                                @error('source')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Status</label>
                            <div class="col-md-10">
                                <div class="radio radio-info radio-inline">
                                    <input type="radio" id="active" value="1" name="status">
                                    <label for="active"> Active </label>
                                </div>
                                <div class="radio radio-inline">
                                    <input type="radio" id="inactive" value="0" name="status">
                                    <label for="inactive"> Inactive </label>
                                </div>
                                @error('status')
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
