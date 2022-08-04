@extends('frontend.layouts.master')
@section('title', 'JEA :: About')

@section('content')

<body style="width:100%;height:650px;background-color:#022124a0;">

    <div id="supervisor">
        @include('frontend.pages.member.president')
    </div>

</body>



<div class="container mt-3 mb-3 ">

    <div class="d-flex justify-content-center  flex-wrap">
            @include('frontend.pages.member.vice_president')
            @include('frontend.pages.member.secretary')
    </div>
</div>

<div class="bg-gradient-warning border-2">
    <div class="container mb-4 mt-3 ">
        <div class="row">
            @include('frontend.pages.member.member')
        </div>
    </div>
</div>


@endsection
