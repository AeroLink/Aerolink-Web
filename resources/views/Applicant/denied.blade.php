@extends('layouts.WebLayout')

@section('page_title') 
    AeroLink | Applicants
@endsection

@section('styles')
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/CSX.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('navigation')
   @include('navigation.applicant-navigation')
@endsection 

@section('scripts')

    <script src="{{ asset('js/jquery.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('js/synapsygen.js') }}"></script>
    
@endsection

@section('content')
    <div class="container-fluid d-flex align-items-center justify-content-center " style="height: 50vh;">
        <h1>{{ $feeds[0]->reason }}</h1>
    </div>
@endsection