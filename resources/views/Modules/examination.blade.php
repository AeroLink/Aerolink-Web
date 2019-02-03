@extends('layouts.WebLayout')

@section('page_title') 
    AeroLink | Careers
@endsection

@section('styles')
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/CSX.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('fc/fullcalendar.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('js/swal.js') }}"></script>
    <script src="{{ asset('js/synapsygen.js') }}"></script>
    <script src="{{ asset('js/exam.js') }}"></script>
@endsection

@section('navigation')
   @include('navigation.examination-nav')
@endsection 

@section('content')
    
    <div class="container-fluid mt-5">
        <div class="col-12">
            <form id="frmExams">
                <span hidden id="exid" data-exid="{{ $exam_ix }}"></span>
                <ul class="list-group">
                    @foreach($questions as $q) 
                        <li class="list-group-item">
                            <b>Q{{ $q->question_id }}.</b> {{ $q->question }} <br>
                            <span hidden class="Qx" data-qx="{{ $q->question_id }}"></span>
                            <br>
                            @foreach (explode("0x4205x0", $q->choices) as $item)
                                <?php $ex = explode("-", $item);?>
                                <input type="radio" name="Q{{ $q->question_id }}" value="{{ str_replace("x4205x0", "", $ex[0]) }}" /> {{ isset($ex[1]) ? $ex[1] : "" }} <br>
                            @endforeach
                        </li>
                        <hr>
                    @endforeach
                </ul>

                <button class="btn btn-lg btn-success form-control" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection