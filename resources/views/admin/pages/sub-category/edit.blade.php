@extends('admin.layouts.master')

@section('title')
Role Page - Admin Panel
@endsection

@section('content')

<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-header-title">
            <h4 class="pull-left page-title">Category</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><a class="active">Edit Category</a></li>
            </ol>
            <div class="clearfix"></div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Edit Category Form</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal"
                    action="{{ route('admin.sub-category.update', $subCategory->id) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')






                    <div class="form-group">
                        <label class="col-md-2 control-label">Parent Category</label>
                        <div class="col-md-10">
                            <select name="category_id"
                                class="form-control @error('category_id') is-invalid @enderror">
                                @php
                                    if (old('category_id')){
                                    $c = old('category_id');
                                    }else {
                                    $c = $subCategory->category_id;
                                    }
                                @endphp
                                <option>Select one</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $c==$category->id ? 'selected':'' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>

                            @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-2 control-label">Name</label>
                        <div class="col-md-10">
                            <input value="{{ $subCategory->name }}" name="name" type="text" id="name"
                                class="form-control" placeholder="name">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Description</label>
                        <div class="col-md-10">
                            <input name="description" value="{{ $subCategory->description }}" class="form-control"
                                rows="5" placeholder="Content">
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Image</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control" name="image">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            @if($subCategory->image != null)
                                <img src="{{ asset($subCategory->image) }}" width="20%">
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Status</label>
                        <div class="col-md-10">
                            <div class="radio radio-info radio-inline">
                                <input @if($subCategory->status == '1') checked @endif type="radio" id="active"
                                value="1" name="status">
                                <label for="active"> Active </label>
                            </div>
                            <div class="radio radio-inline">
                                <input @if($subCategory->status == '0') checked @endif type="radio" id="inactive"
                                value="0" name="status">
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