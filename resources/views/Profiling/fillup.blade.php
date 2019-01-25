@extends('layouts.WebLayout')

@section('page_title') 
    AeroLink | Profiling
@endsection

@section('styles')
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/CSX.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('navigation')
    @include('navigation.DefaultNav')
@endsection

@section('scripts')

    <script src="{{ asset('js/jquery.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('js/synapsygen.js') }}"></script>
    <script src="{{ asset('js/datetimepicker.min.js') }}"></script>
    <script src="{{ asset('js/profilling.js') }}"></script>


    <script>
        
        $(".dateTimePicker").datepicker({
            uiLibrary: 'bootstrap4'
        });
        
    </script>
@endsection

@section('content')
    <div class="container">
        
        <br></br>
        <center>
            <h2>Application for {{ $jobinfo[0]->title }}</h2>
            <small><i>Basic Information</i></small> 
        </center>
        
        <div class="mt-3 mb-3">
            <p class="d-flex justify-content-center">{!! $jobinfo[0]->description !!}</p>
        </div>

        <div class="row justify-content-center">
            
            <div class="col-10">
                <div class="card">
                    <div class="card-header bg-success text-white"><strong>Application Form</strong></div>
                    <div class="card-body">
                        
                        <form method="post" action="/profiling/sendApplication" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="form-group col-sm-12 col-lg-3">
                                    <label for="firstname">First Name</label>
                                    <input class="form-control" type="text" name="firstname"/> 
                                </div>

                                
                                <div class="form-group col-sm-12 col-lg-3">
                                    <label for="lastname">Last Name</label>
                                    <input class="form-control" type="text" name="lastname"/> 
                                </div>

                                
                                <div class="form-group col-sm-12 col-lg-3">
                                    <label for="middlename">Middle Name</label>
                                    <input class="form-control" type="text" name="middlename"/> 
                                </div>

                                
                                <div class="form-group col-sm-12 col-lg-3">
                                    <label for="suffix">Suffix</label>
                                    <select class="form-control" name="suffix">
                                        @foreach($suffixes as $suffix)
                                            <option value="{{ $suffix->id }}">{{ $suffix->suffix_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="row">
                                
                                <div class="form-group ccol-sm-12 col-lg-3">
                                    <label for="DateOfBirth">Date of Birth</label>
                                    <input class="dateTimePicker" name="DateOfBirth" />
                                </div>

                                <div class="form-group col-sm-12 col-lg-3">
                                    <label for="PlaceOfBirth">Place of Birth</label>
                                    <input class="form-control" name="PlaceOfBirth" type="text"/>
                                </div>

                                <div class="form-group col-sm-12 col-lg-3">
                                    <label for="Gender">Gender</label>
                                    <select class="form-control" name="Gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>

                                
                                <div class="form-group col-sm-12 col-lg-3">
                                    <label for="civil_status">Civil Status</label>
                                    <select class="form-control" name="civil_status">
                                        @foreach($civilStatus as $cs)
                                            <option value="{{ $cs->id }}">{{ $cs->civil_status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>

                            <hr></hr>

                            <div class="row">

                                <div class="form-group col-sm-12 col-lg-4">
                                    <label for="num_street">Number/Street</label>
                                    <input type="text" class="form-control" name="num_street" />
                                </div>

                                <div class="form-group col-sm-12 col-lg-4">
                                    <label for="barangay">Barangay</label>
                                    <input type="text" class="form-control" name="barangay" />
                                </div>

                                <div class="form-group col-sm-12 col-lg-4">
                                    <label for="district">District</label>
                                    <input type="text" class="form-control" name="district" />
                                </div>

                            </div>

                            <div class="row">
                                    
                                <div class="form-group col-sm-12 col-lg-4">
                                    <label for="city">City/Municipality</label>
                                    <input type="text" class="form-control" name="city" />
                                </div>

                                <div class="form-group col-sm-12 col-lg-4">
                                    <label for="province">Province</label>
                                    <input type="text" class="form-control" name="province" />
                                </div>

                                <div class="form-group col-sm-12 col-lg-4">
                                    <label for="region">Region</label>
                                    <input type="text" class="form-control" name="region" />
                                </div>

                            </div>

                            <hr></hr>

                            <div class="row">

                                <div class="form-group col-sm-12 col-lg-6">
                                    <label for="height">Height [ft]</label>
                                    <input type="number" name="height" min=0 class="form-control"/>
                                </div>

                                <div class="form-group col-sm-12 col-lg-6">
                                    <label for="weight">Weight [kg]</label>
                                    <input type="number" name="weight" min=0  class="form-control"/>
                                </div>
                                
                            </div>

                            <div class="row">
                                
                                <div class="form-group col-sm-12 col-lg-6">
                                    <label for="educ_attain">Educational Attaintment</label>
                                    <select name="educ_attain" class="form-control">
                                        <option value="No Grade Completed" selected>No Grade Completed</option>
                                        <option value="Pre-School (Nursery/Kinder/Prep)">Pre-School (Nursery/Kinder/Prep)</option>
                                        <option value="Elementary Graduate">Elementary Graduate</option>
                                        <option value="Elementary Undergraduate">Elementary Undergraduate</option>
                                        <option value="High School Graduate">High School Graduate</option>
                                        <option value="High School Undergraduate">High School Undergraduate</option>
                                        <option value="Post Secondary">Post Secondary</option>
                                        <option value="College Undergraduate">College Undergraduate</option>
                                        <option value="College Graduate or Higher">College Graduate or Higher</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-12 col-lg-6">
                                    <label for="prevSchool">Previous School</label>
                                    <input type="text" name="prevSchool" class="form-control"/>
                                </div>

                            </div>
                            
                            <hr></hr>

                            <div class="row">
                            
                                <div class="form-group col-sm-12 col-lg-6">
                                    <label for="Q1">Why do you want to work for this company?</label>
                                    <input type="text" name="Q1" class="form-control"/>
                                </div>
                                
                                <div class="form-group col-sm-12 col-lg-6">
                                    <label for="Q2">Why are you looking for a new job?</label>
                                    <input type="text" name="Q2" class="form-control"/>
                                </div>

                            </div>
                            
                            <div class="row">
                            
                                <div class="form-group col-sm-12 col-lg-6">
                                    <label for="Q3">What are two key contributions you can bring to this role?</label>
                                    <input type="text" name="Q3" class="form-control"/>
                                </div>

                                <div class="form-group col-sm-12 col-lg-6">
                                    <label for="Q4">What tools or technology do you use to stay organized?</label>
                                    <input type="text" name="Q4" class="form-control"/>
                                </div>
                            
                            </div>

                            <div class="row">
                            
                                <div class="form-group col-sm-12 col-lg-6">
                                    <label for="Q5">What motivates you to perform your best work?</label>
                                    <input type="text" name="Q5" class="form-control"/>
                                </div>

                                <div class="form-group col-sm-12 col-lg-6">
                                    <label for="Q6">What is your perfect work environment?</label>
                                    <input type="text" name="Q6" class="form-control"/>
                                </div>

                            </div>

                            <hr></hr>

                            <div class="row">
                            
                                <div class="form-group col-sm-12 col-lg-4">
                                    <label for="email">Email Address</label>
                                    <input type="email" name="email" class="form-control"/>
                                </div>

                                <div class="form-group col-sm-12 col-lg-4">
                                    <label for="contact_number">Contact Number</label>
                                    <input type="text" name="contact_number" class="form-control"/>
                                </div>

                                <div class="form-group col-sm-12 col-lg-4">
                                    <label for="file">Send your CV or Resumé</label>
                                    <input type="file" name="applicant_file" class="form-control"/>
                                </div>

                            </div>

                            <hr></hr>
                            
                            <div class="row">
                                <div class="form-group col-sm-12 col-lg-12">
                                    <button class="btn btn-md btn-success form-control">Submit Application</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
            
        </div>

    </div>

@endsection