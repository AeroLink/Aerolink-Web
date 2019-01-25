@extends('layouts.WebLayout')

@section('page_title') 
    AeroLink | Applicants
@endsection

@section('styles')
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/CSX.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('fc/fullcalendar.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('navigation')
   @include('navigation.applicant-navigation')
@endsection 

@section('scripts')

    <script src="{{ asset('js/jquery.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('js/synapsygen.js') }}"></script>
    <script src="{{ asset('js/moment.js') }}"></script>
    <script src="{{ asset('js/fullcalendar.js') }}"></script>
    <script src="{{ asset('js/socketio.js') }}"></script>
    <script src="{{ asset('js/applicant.js') }}"></script>
    
    <script>
        $('#schedule').fullCalendar({
            header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
            }
        });
    </script>
    
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-lg-3 col-md-12">
                <div class="card">
                    <div class="card-header bg-theme text-smb text-white"><i class="fa fa-user pr-3"></i>Profile</div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item"><b>First Name : </b> <br>{{ $applicants[0]->firstname}}</li>
                            <li class="list-group-item"><b>Last Name : </b> <br>{{ $applicants[0]->lastname}}</li>
                            <li class="list-group-item"><b>Middle Name : </b> <br>{{ $applicants[0]->middlename == 'NO MNAME' ? "No Middlename" : $applicants[0]->middlename}}</li>
                            <li class="list-group-item"><b>Date of Birth : </b> <br>{{ $applicants[0]->date_of_birth}}</li>
                            <li class="list-group-item"><b>Place of Birth : </b> <br>{{ $applicants[0]->place_of_birth}}</li>
                            <li class="list-group-item"><b>Educational Attaintment : </b> <br>{{ $applicants[0]->educAttain}}</li>
                            <li class="list-group-item"><b>Previous School : </b> <br>{{ $applicants[0]->prevSchool}}</li>
                            <li class="list-group-item"><b>Contact Number : </b> <br>{{ $applicants[0]->contact_number}}</li>
                            <li class="list-group-item"><b>CV or Resume : </b> <br><a class="btn btn-sm btn-success" target="_blank" href="{{ $applicants[0]->resumeCV}}">View</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header bg-theme text-smb text-white"><i class="fa fa-inbox pr-3"></i>Instant Messaging</div>
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-12">
                <div class="card">
                    <div class="card-header bg-theme text-smb text-white"><i class="fa fa-calendar pr-3"></i>Schedules</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <ul class="list-group" id="schedule-list">
                                    @foreach($schedule as $s) 
                                        <div class="list-group-item">
                                            <div class="">
                                            </div>
                                            <h6>{{ $s->purpose }}</h6>
                                            <?php $d = date_parse($s->scheduled_date) ?>
                                            <small><i>{{ date('l jS \of F Y ', mktime(0,0,0,$d['month'], $d['day'], $d['year'])) }}</i></small>
                                        </div>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-header bg-theme text-smb text-white"><i class="fa fa-bell pr-3"></i>Announcements</div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection