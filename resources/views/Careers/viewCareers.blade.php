@extends('layouts.WebLayout')

@section('page_title') 
    AeroLink | Careers
@endsection

@section('styles')
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('navigation')
    @include('navigation.DefaultNav')
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('js/synapsygen.js') }}"></script>
    <script src="{{ asset('js/core.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        
        <br>
        <center>
            <h2>Careers</h2>
            <small><i>Be part of us, and look to the list of our job openings</i></small> 
        </center>
        <br>

        <div class="row" id="careerDrop">
        </div>
    </div>
@endsection