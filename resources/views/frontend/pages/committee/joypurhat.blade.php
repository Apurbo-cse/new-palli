@extends('frontend.layouts.master')

@foreach ($thana_committee_types as $thana)
@section('title', 'JEA :: {{ $thana->thana_type }}')
@endforeach

@section('content')

    <div class="container mt-5 mb-5">
        <div class="container">

            <div class="row ">
                @foreach ($thana_committee_types as $thana)

                <div class=" d-flex justify-content-center">
                    <div class="header_about">
                        <img src="{{ asset('frontend/images/logo.png') }}" style="width:120px;padding-top:2px;">
                    </div>
                    <div class="header_about mt-4 me-2 fw-bold">
                        <h4 class="Thana">{{ $thana->thana_type }} Thana Committee</h4>
                        <p><span class="Joyouhat">Joypurhat</span> <span class="Enginners">Engineer's
                                Association</span></p>
                    </div>
                </div>

                <div class="row justify-content-between Thak_Border_top">
                    <small class="col-md-6 text-gray-100 text-dark">
                        Source : {{ $thana->source }}
                    </small>
                    <small class="col-md-6 date_Thak text-gray-100 text-dark text-end ">
                        Date : {{date('M d, Y', strtotime($thana->created_at))}}
                    </small>
                </div>
                <div class="row mt-3">
                    <p class="text-gray text-bold text-gray-100 text-success text-justify">
                        {{ $thana->description }}
                    </p>
                </div>
                @endforeach

                <div class="row justify-content-center mt-4 text-center">
                    @foreach ($thana_committees as $thana)
                        <div class="col-md-3">
                            <div class="mt-5 mb-3 text-gray-100 text-dark">
                                <img src="{{ asset($thana->image) }}" class="ImgThak" alt="">
                                <p>Engr. {{ $thana->name }}</p>
                                <small>Department : {{ $thana->department }}</small>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>
    </div>

    {{-- নিম্নোক্ত কার্যনির্বাহী সম্মানিত সদস্যবৃন্দের জয়পুরহাট ইঞ্জিনিয়ার এসোসিয়েশন কর্তৃক  ক্ষেতলাল থানা কমিটিতে অনুমোদন করা হলো। --}}

@endsection
