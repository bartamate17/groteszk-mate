@extends('language.eng.app')

@section('content')
    <div class="welcomeDiv container px-4 px-lg-5 text-center">
        <h1 class="mb-1">{{ __('home.mainTitle') }}</h1>
        @if (Auth::user())
            <h3 class="mb-5"><em>{{ __('home.welcomeMessage') }}, {{ Auth::user()->name }}!</em></h3>
        @else
            <h3 class="mb-5"><em>{{ __('home.adminDescriptipn') }}</em></h3>
        @endif
        <a class="btn btn-primary btn-xl"
            href="{{ route('company', app()->getLocale()) }}">{{ __('home.companyButton') }}</a>
        <a class="btn btn-primary btn-xl"
            href="{{ route('employee', app()->getLocale()) }}">{{ __('home.employeeButton') }}</a>
    </div>
@endsection
