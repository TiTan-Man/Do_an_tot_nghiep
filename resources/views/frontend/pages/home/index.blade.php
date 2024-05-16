@extends('frontend.layouts.default')
@section('content')

<div class="full-width home">
    <div class="background-content"></div>
    <div class="background">
        <div class="shadow"></div>
        <div class="pattern">
            
            <div class="margin" style="margin-top: 20px; width: 100%;"></div>
            <div class="container">
                <div class="row">
					@include('frontend.element.menuleft')
					@include('frontend.element.sidebar')
                </div>
				<div class="row">
					{{-- @include('frontend.element.noibat') --}}
					@include('frontend.element.danhmuc')
					@include('frontend.element.tinnoibat')
				</div>
            </div>
        </div>
    </div>
</div>
@yield('content')

@endsection
