@extends('layouts.app')

@section('title', 'Personal Datasheet')
@section('content')
    <div class="container justify-content-center">
        <h2 class="text-center">Personal Datasheet Progress</h2>
        <div class="progress">
            <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" aria-label="Example with label" style="width: {{ $progress }}%;"
                aria-valuemin="0" aria-valuemax="100"><span class="text-white fw-bold">{{ $progress }}</span></div>
        </div>
        @if (Auth::user()->role === '1')

        <p class="text-muted small">
            Please edit / add your Personal Data Sheet to able to apply for Positions. <strong>In this bar is the progress of you PDS</strong>
        </p>
        @endif
    </div>
    <div class="mt-5 text-end">
        <a target="_blank" href="{{ route('users.pds.print',$user->id) }}" class="btn btn-outline-success">View Personal Data Sheet</a>
    </div>
    <div class="row mt-3">
        <div class="col">
            <div class="row mt-2">
                <div class="col-sm-6 col-md-3 my-2 mt-sm-2 mt-md-0 small">
                    <a href="{{ route('users.pds.personal.index') }}"
                        class="btn btn-success w-100 bg-gradient h-100 text-start text-center">
                        <i class="fa-solid fa-user py-3 fs-2 me-1"></i><br> Pesonal Information
                    </a>
                </div>
                <div class="col-sm-6 col-md-3 my-2 mt-sm-2 mt-md-0 small">
                    <a href="{{ route('users.pds.family.index') }}"
                        class="btn btn-success w-100 bg-gradient h-100 text-start text-center">
                        <i class="fa-solid fa-user-group  py-3 fs-2 me-1"></i><br>Family Background
                    </a>
                </div>
                <div class="col-sm-6 col-md-3 my-2 mt-sm-2 mt-md-0 small">
                    <a href="{{ route('users.pds.educational.index') }}" class="btn btn-success w-100 bg-gradient h-100 text-start text-center">
                        <i class="fa-solid fa-user-graduate py-3 fs-2 me-1"></i><br>Educational Background
                    </a>
                </div>
                <div class="col-sm-6 col-md-3 my-2 mt-sm-2 mt-md-0 small">
                    <a href="{{ route('users.pds.civilservice.index') }}" class="btn btn-success w-100 bg-gradient h-100 text-start text-center">
                        <i class="fa-solid fa-users  py-3 fs-2 me-1"></i><br>Civil Service
                    </a>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-6 col-md-3 my-2 mt-sm-2 mt-md-0 small">
                    <a href="{{ route('users.pds.workexperience.index') }}" class="btn btn-success w-100 bg-gradient h-100 text-start text-center">
                        <i class="fa-solid fa-building-user py-3 fs-2 me-1"></i><br>Work Experience
                    </a>
                </div>
                <div class="col-sm-6 col-md-3 my-2 mt-sm-2 mt-md-0 small">
                    <a href="{{ route('users.pds.voluntarywork.index') }}" class="btn btn-success w-100 bg-gradient h-100 text-start text-center">
                        <i class="fa-solid fa-people-carry-box  py-3 fs-2 me-1"></i><br>Voluntary Work
                    </a>
                </div>
                <div class="col-sm-6 col-md-3 my-2 mt-sm-2 mt-md-0 small">
                    <a href="{{ route('users.pds.learningdevelopment.index') }}" class="btn btn-success w-100 bg-gradient h-100 text-start text-center">
                        <i class="fa-solid fa-person-chalkboard  py-3 fs-2 me-1"></i><br>Learning and Development
                    </a>
                </div>
                <div class="col-sm-6 col-md-3 my-2 mt-sm-2 mt-md-0 small">
                    <a href="{{ route('users.pds.otherinformation.index') }}" class="btn btn-success w-100 bg-gradient h-100 text-start text-center">
                        <i class="fa-solid fa-person-circle-question  py-3 fs-2 me-1"></i><br>Other Information
                    </a>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <a href="{{ route('users.pds.other.index') }}" class="btn btn-success w-100 bg-gradient h-100 text-start text-center">
                        <i class="fa-solid fa-person-circle-plus py-3 fs-2 me-1"></i><br>Other
                    </a>
                </div>
            </div>
            <p class="text-muted mt-3 mx-2">This page contains your Personal Data Sheet.</p>
        </div>
    </div>
@endsection
