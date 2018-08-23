@extends('layouts.WebLayout')

@section('styles')
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('js/synapsygen.js') }}"></script>
@endsection


@section('content')
    <div class="container">
        <h3 class="d-flex justify-content-center mt-5">Terms and Conditions</h3>
        <small class="d-flex justify-content-center"><i>We care about your data</i></small>
        
        <div class="row d-flex justify-content-center mt-5">
            <textarea style="width: 50%; height: 50vh"></textarea>
        </div>
        
        <div class="d-flex justify-content-center mt-5">
         <a class="btn btn-success" href="/profiling/initiate">I Accept the terms and conditions above</a>
        </div>
        
    </div>
@endsection