@extends('layouts.WebLayout')

@section('page_title') 
    AeroLink | Vendors
@endsection

@section('styles')
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/CSX.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('navigation')
   
@endsection

@section('scripts')

    <script src="{{ asset('js/jquery.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('js/synapsygen.js') }}"></script>
    
@endsection

@section('content')
    <section id="vendor">
        <div class="home-overlay d-flex align-items-center justify-content-center" style="height: 100vh;">
            <div class="col-4">
                <div class="card">
                    <div class="card-header bg-theme text-white"><b>Registration Vendor Portal</b></div>
                    <div class="card-body">

                        @if(Session::has('message'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ Session::get('message') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <form method="POST" action="/Vendors/registration">
                            @csrf
                            <div class="form-group">
                                <label class="text-success"><b>First Name</b></label>
                                <input type="text" name="fname" class="form-control" required />
                            </div>
                            
                            <div class="form-group">
                                <label class="text-success"><b>Last Name</b></label>
                                <input type="text" name="lname" class="form-control" required />
                            </div>
                            
                            <div class="form-group">
                                <label class="text-success"><b>Middle Name</b></label>
                                <input type="text" name="mname" class="form-control" required />
                            </div>

                            <div class="form-group">
                                <label class="text-success"><b>Address</b></label>
                                <input type="text" name="address" class="form-control" required />
                            </div>

                            <div class="form-group">
                                <label class="text-success"><b>Company Name</b></label>
                                <input type="text" name="company_name" class="form-control" required />
                            </div>

                            <div class="form-group">
                                <label class="text-success"><b>Contact #</b></label>
                                <input type="number" name="contact_no" class="form-control" required />
                            </div>

                            <hr>

                            <div class="form-group">
                                <label class="text-success"><b>Email Address</b></label>
                                <input type="email" name="email" class="form-control" required />
                            </div>

                            <div class="form-group">
                                <label class="text-success"><b>Password</b></label>
                                <input type="password" name="password" class="form-control" required />
                            </div>

                            <button class="form-control bg-success text-white" type="submit"><b>Submit</b><i class="fa fa-paper-plane pl-2"></i></button>
                        </form>

                        <p class="mt-2 d-flex justify-content-center"><i>Have an account ? &nbsp;</i><a href="/Vendors/" class="text-success">Login Here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection