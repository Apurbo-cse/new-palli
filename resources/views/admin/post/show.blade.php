@extends('admin.layouts.master')
@section('title', 'Post Details')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Post Details Page</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="active">Show Post</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Post Details</h3>
                </div>
                <div class="panel-body">
                    <p>
                        @if($post->image != null)
                            <img src="{{asset($post->image)}}" alt="Image" width="100%">
                        @endif
                    </p>

                    <h1>
                       {{$post->title}}
                    </h1>
                    <div>
                        @foreach($post->tags as $tag)
                            <span class="badge badge-primary">{{ $tag->name }} </span>
                        @endforeach
                    </div>
                    <div style="margin-bottom:45px;">
                        <ul class="post-meta" style="list-style-type:none; padding-left:0px;">
                            <li style="float:left;padding-right:20px;"><span class="icon fa fa-clock-o" style="padding-right: 5px;"></span>{{$post->published_at->format('M d, Y')}}</li>
                            <li style="float:left;padding-right:10px;"><span class="icon fa fa-eye" style="padding-right: 5px;"></span>{{$post->view_count }}</li>
                        </ul>
                    </div>
                    <div style="clear:both;">
                        <p class="text-muted m-b-30">
                            {!! $post->description!!}
                        </p>
                    </div>
                    <div class="pull-right">
                        <a href="{{route('admin.post.index')}}" class="btn btn-danger waves-effect waves-light">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
