@extends('layouts.WebLayout')

@section('page_title') 
    AeroLink | Profiling
@endsection

@section('styles')
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('navigation')
    @include('navigation.DefaultNav')
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('js/synapsygen.js') }}"></script>
    <script src="{{ asset('js/datetimepicker.min.js') }}"></script>


    <script>
        
        $(".dateTimePicker").datepicker({
            uiLibrary: 'bootstrap4'
        });
        
    </script>
@endsection

@section('content')
    <div class="container">
        
        <br>
        <center>
            <h2>Application for {{ $jobinfo[0]->title }}</h2>
            <small><i>Basic Information</i></small> 
        </center>
        <br>

        <div class="row justify-content-center">
            
            <div class="col-10">
                <div class="card">
                    <div class="card-header bg-success text-white"><strong>Personal Information</strong></div>
                    <div class="card-body">
                        
                        <form>
                            
                            <div class="row">

                                <div class="form-group col-3">
                                    <label for="firstname">First Name</label>
                                    <input class="form-control" type="text" name="firstname"/> 
                                </div>

                                
                                <div class="form-group col-3">
                                    <label for="lastname">Last Name</label>
                                    <input class="form-control" type="text" name="lastname"/> 
                                </div>

                                
                                <div class="form-group col-3">
                                    <label for="middlename">Middle Name</label>
                                    <input class="form-control" type="text" name="middlename"/> 
                                </div>

                                
                                <div class="form-group col-3">
                                    <label for="suffix">Suffix</label>
                                    <select class="form-control" name="suffix">
                                        @foreach($suffixes as $suffix)
                                            <option value="{{ $suffix->id }}">{{ $suffix->suffix_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <input class="dateTimePicker" name="DateOfBirth" />

                            </div>

                        </form>

                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection