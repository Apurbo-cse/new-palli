@extends('admin.layouts.master')
@section('title', 'Update Post')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Update Post</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('admin.post.index')}}">Post List</a></li>
                    <li class="active">Update Post</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title">Post Form</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{route('admin.post.update', $post->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label class="col-md-2 control-label">Post Title</label>
                            <div class="col-md-10">
                                <input value="{{$post->title}}" name="title" type="text" id="title" class="form-control" placeholder="Post title">
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Post Description</label>
                            <div class="col-md-10">
                                <textarea name="description" id="summernote" class="form-control" rows="5" placeholder="Post Description">{{$post->description}}</textarea>
                                @error('description')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Choose Tags</label>
                            <div class="col-md-10">
                                @foreach($tags as $tag)
                                    <div class="checkbox checkbox-inline">
                                        <input name="tags[]" type="checkbox" id="tag{{ $tag->id}}" value="{{ $tag->id }}"
                                           @foreach($post->tags as $t)
                                                  @if($tag->id == $t->id) checked @endif
                                            @endforeach
                                        >
                                        <label for="tag{{ $tag->id}}"> {{ $tag->name }} </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Featured</label>
                            <div class="col-md-10">
                                <div class="checkbox checkbox-success">
                                    <input @if($post->is_featured == 1) checked @endif  value="1" type="checkbox" class="form-check-input" name="is_featured" id="is_featured">
                                    <label for="checkbox">
                                        Yes
                                    </label>
                                </div>
                                @error('is_featured')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Post Status</label>
                            <div class="col-md-10">
                                <div class="radio radio-info radio-inline">
                                    <input @if($post->status == 'active') checked   @endif type="radio" id="active" value="active" name="status">
                                    <label for="active"> Active </label>
                                </div>
                                <div class="radio radio-inline">
                                    <input @if($post->status == 'inactive') checked   @endif type="radio" id="inactive" value="inactive" name="status">
                                    <label for="inactive"> Inactive </label>
                                </div>
                                @error('status')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Post Image</label>
                            <div class="col-md-10">
                                <input type="file" class="form-control" name="image" >
                                @error('image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                @if($post->image != null)
                                    <img src="{{ asset($post->image) }}" width="20%">
                                @endif
                            </div>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Update</button>
                        </div>



                    </form>
                </div> <!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col -->
    </div>
    <!-- End Row -->

@endsection
