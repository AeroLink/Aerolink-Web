@extends('layouts.WebLayout')

@section('page_title') 
    AeroLink | Careers
@endsection

@section('styles')
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/CSX.css') }}" rel="stylesheet" type="text/css" />
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

        <div class="d-flex justify-content-center">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped text-center">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Status</th>
                        <th scope="col">Career Name</th>
                        <th scope="col">Monthly Salary</th>
                        <th scope="col">Slots</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="careerDrop">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection