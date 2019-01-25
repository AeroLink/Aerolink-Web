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
                    <div class="card-header bg-theme text-white"><b>Vendor Portal</b></div>
                    <div class="card-body">

                        @if(Session::has('message'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ Session::get('message') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <form method="POST" action="/Vendors/login">
                            @csrf
                            <div class="form-group">
                                <label class="text-success"><b>VENDOR EMAIL</b></label>
                                <input type="email" name="email" class="form-control" required />
                            </div>

                            <div class="form-group">
                                <label class="text-success"><b>PASSWORD</b></label>
                                <input type="password" name="password" class="form-control" required />
                            </div>

                            <button class="form-control bg-success text-white" type="submit"><b>LOGIN</b><i class="fa fa-paper-plane pl-2"></i></button>
                        </form>

                        <p class="mt-2 d-flex justify-content-center"><i>Don't have any account ? &nbsp;</i><a href="/Vendors/registration" class="text-success">Register Here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection