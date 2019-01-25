@extends('layouts.WebLayout')

@section('page_title') 
    AeroLink | Careers
@endsection

@section('styles')
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('js/synapsygen.js') }}"></script>
    <script src="{{ asset('js/core.js') }}"></script>
@endsection

@section('content')

    <ul>
    @foreach($questions as $q) 
        <li>{{ $q->question }}</li>
    @endforeach
    </ul>
    
@endsection