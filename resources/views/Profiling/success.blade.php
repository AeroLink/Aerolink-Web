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
        <div class="d-flex justify-content-center mt-5">
            <h3>
                Congratulations, Your documents are successfully sent to our HR Department.<br>
                You could now also use our <a href="/Applicant" class="text-success">Applicant Portal</a> that could update you time to time.
                <br>
                <br>
                It would notify your schedules and current progress. 
                Check your Email Account Inbox to get your Applicant Portal Credentials.
                Goodluck to your employment.
            </h3>
            
        </div>    
    </div>
@endsection