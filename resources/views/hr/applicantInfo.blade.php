@extends('layouts.app')

@section('title', "Applicant's Information")
@section('customCSS')
    <style>
        .nav-pills>.nav-item>.active,
        .nav-pills>.nav-item>.active:hover {
            background-color: seagreen;
            color: white !important;
        }

        .nav-pills .nav-item .nav-link {
            color: seagreen;
            font-weight: bold;
        }

        .nav-pills .nav-link:hover {
            color: black;
            background-color: rgba(214, 214, 214, 0.385);
        }
    </style>
@endsection
@section('content')
    <div class="row justify-content-center">
        <h3>Applicant for <strong class="text-decoration-underline">{{ $application->publication->title }}</strong></h3>
        <div class="row my-3">
            <div class="col-5 text-center">
                <img src="{{ asset('/storage/user_avatar/' . $application->user->avatar) }}"
                    class="rounded-circle applicant-img img-thumbnail" alt="{{ $application->user->avatar }}">
            </div>
            <div class="col">
                <p class="h2">{{ $application->user->first_name . ' ' . $application->user->last_name }}</p>
                <p class="mb-0">
                    @if ($application->user->pdsPersonal)
                        {{ $application->user->pdsPersonal->street }}
                        {{ $application->user->pdsPersonal->village }}
                        {{ $application->user->pdsPersonal->barangay }}
                        {{ $application->user->pdsPersonal->city }}
                        {{ $application->user->pdsPersonal->province }}
                    @endif
                </p>
                <p class="text-muted mb-0">
                    @if ($application->user->EducGraduate)
                        {{ $application->user->EducGraduate->EDNameSchool }} <br>
                        {{ $application->user->EducGraduate->EDBEDC }}
                    @elseif ($application->user->EducCollege)
                        {{ $application->user->EducCollege->EDNameSchool }} <br>
                        {{ $application->user->EducCollege->EDBEDC }}
                    @endif
                </p>
            </div>
        </div>
        <hr>


        <div>
            <ul class="nav nav-pills nav-justified mb-3 border rounded p-2" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pds-tab" data-bs-toggle="pill" data-bs-target="#pds"
                        type="button">PDS</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="EI-tab" data-bs-toggle="pill" data-bs-target="#EI"
                        type="button">Exam/Interview</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="others-tab" data-bs-toggle="pill" data-bs-target="#others"
                        type="button">Others</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active justify-content-center" id="pds" role="tabpanel">
                    <pds-component></pds-component>
                </div>
                <div class="tab-pane fade" id="EI" role="tabpanel">
                    dsadsdasd
                </div>
                <div class="tab-pane fade" id="others" role="tabpanel">
                    adsadas
                </div>
            </div>

        </div>
    @endsection
