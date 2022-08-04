
        <div class="sidebar-inner slimscrollleft">
    <div class="user-details">
        <div class="text-center">
            <img src="https://diutransport.com/assets/frontend/icons/profile.jpg" alt="" class="img-circle">
        </div>
        <div class="user-info">
            <div class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
            </div>

            <p class="text-muted m-0"><i class="fa fa-dot-circle-o text-success"></i> Online</p>
        </div>
    </div>
    <!--- Divider -->
    <div id="sidebar-menu">
        <ul>
            <li>
                <a href="#" class="waves-effect"><i class="ti-home"></i><span> Dashboard </span></a>
            </li>


            <!-- <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="ti-user"></i> <span> Users </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{url('http://127.0.0.1:8000/dashboard/user')}}">User List</a></li>
                    <li><a href="#">Create New User</a></li>
                </ul>
            </li>  -->


            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="ti-user"></i> <span> Category </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route('admin.category.index') }}">Category</a></li>
                    <li><a href="{{ route('admin.sub-category.index') }}">Sub Category</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ route ('admin.product.index') }}" class="waves-effect"><i class="mdi mdi-blogger"></i><span> Product </span></a>
            </li>


           
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="ti-video-camera"></i> <span> Video </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                <ul class="list-unstyled">
                    {{-- <li><a href="{{route('video.index')}}">Video List</a></li>
                    <li><a href="{{route('video.create')}}">Create New Video</a></li> --}}
                </ul>
            </li>

            {{-- <li class=""><a href="{{route('admin.post.index')}}">Blog</a></li> --}}
            <li>
                <a href="{{ route ('admin.post.index') }}" class="waves-effect"><i class="mdi mdi-blogger"></i><span> Blog </span></a>
            </li>


            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-sliders"></i> <span>Tag</span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route ('admin.tag.index') }}">Tag List</a></li>
                    <li><a href="{{ route('admin.tag.create') }}">Create New Tag</a></li>
                    {{-- {{ route('admin.category.index') }} --}}
                </ul>
            </li>

            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-sliders"></i> <span>Slider</span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route ('admin.slider.index') }}">Slider List</a></li>
                    <li><a href="{{ route('admin.slider.create') }}">Create New Slider</a></li>
                    {{-- {{ route('admin.category.index') }} --}}
                </ul>
            </li>
            
        </ul>
    </div>
    <div class="clearfix"></div>
</div>
<!-- end sidebarinner -->

