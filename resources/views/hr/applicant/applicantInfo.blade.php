@extends('layouts.app')

@section('title', "Applicant's Information")
@section('customCSS')
    <style>
        .nav-pills>.nav-item>.active,
        .nav-pills>.nav-item>.active:hover {
            background-color: seagreen !important;
            color: white !important;
        }

        .nav-pills .nav-item .nav-link {
            color: seagreen;
            font-weight: bold;
            border-left: solid 1px seagreen;
            border-right: solid 1px seagreen;
            border-radius: 0;
            background-color: rgba(219, 219, 219, 0.27);
        }

        .nav-pills .nav-link:hover {
            color: black;
            background-color: rgba(52, 145, 92, 0.501);
        }

        .nav-tabs .nav-link {
            color: seagreen;
            font-size: 15px
        }
    </style>
@endsection
@section('content')
    <div class="row justify-content-center">
        <h4 class="h5">Applicant for <strong class="text-decoration-underline">{{ $application->publication->title }}</strong></h4>
        <div class="row my-3">
            <div class="col-12 col-md-2 text-center">
                <img src="{{ asset('/storage/user_avatar/' . $application->user->avatar) }}"
                    class="rounded-circle applicant-img img-thumbnail" alt="{{ $application->user->avatar }}">
            </div>
            <div class="col-12 col-md">
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
            <div class="col-12 col-md-2">
                @if ($application->user->userCovid)
                    <div class="row mb-2">
                        <div class="col">
                            Vaccination Status:
                            <strong>
                                @if ($application->user->userCovid->booster > 2)
                                    Booster {{ $application->user->userCovid->booster - 2 }}
                                @else
                                    Dose {{ $application->user->userCovid->booster }}
                                @endif
                            </strong>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <a class="btn btn-success w-100" href="/storage/Vcard/{{ $application->user->userCovid->photo }}"
                                target="_blank"><i class="fa-solid fa-eye me-2"></i>View Vaccination Card</a>
                        </div>
                    </div>
                @endif
                <div class="row mb-2">
                    <div class="col">
                        <a target="_blank" href="{{ route('users.pds.print', $application->user->id) }}"
                            class="btn btn-outline-success w-100"><i class="fa-solid fa-eye me-2"></i>View PDS</a>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <input type="hidden" id="userID" value="{{ $application->user->id }}">
        <div>
            <ul class="nav nav-pills nav-justified mb-3 border rounded p-2" id="pills-tab" role="tablist">
                <li class="nav-item active" role="presentation">
                    <button class="nav-link active" id="EI-tab" data-bs-toggle="pill" data-bs-target="#EI"
                        type="button">Exam/Interview</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="others-tab" data-bs-toggle="pill" data-bs-target="#others"
                        type="button">Files</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="EI" role="tabpanel">
                    @include('hr.applicant.ExamInterview')
                </div>
                <div class="tab-pane fade" id="others" role="tabpanel">
                    @include('hr.applicant.otherFIles')
                </div>
            </div>

        </div>
    @section('customJS')
        <script>
            // $("#print_1").click(printPage1);

            function printPage1() {
                var divContents = document.getElementById("page1").innerHTML;
                var a = window.open('', '', 'height=1000, width=1500');

                a.document.write('<html><head><title>Print Invoice</title>');
                a.document.write('<link rel="stylesheet" href="{{ asset('storage/css/pdsTable.css') }}" type="text/css" />');
                a.document.write('<style rel="stylesheet">@media print{.page1-table tr td {padding: 1px;}}</style>');
                a.document.write('</head><body >');
                a.document.write(divContents);
                a.document.write('</body></html>');
                a.document.close();
                a.print();

            }
        </script>
    @endsection
@endsection
