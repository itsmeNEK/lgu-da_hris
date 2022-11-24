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

        <input type="hidden" id="userID" value="{{ $application->user->id }}">
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

                    <nav>
                        <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#nav-page1" type="button"
                                role="tab">Page 1</button>
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nav-page2" type="button"
                                role="tab">Page 2</button>
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nav-page3" type="button"
                                role="tab">Page 3</button>
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nav-page4" type="button"
                                role="tab">Page 4</button>
                        </div>
                    </nav>

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active p-2" id="nav-page1">

                            <p class="text-end">
                                <button class="btn btn-outline-success" id="print_1">Print</button>
                            </p>
                            @include('hr.pds.page1')
                        </div>
                        <div class="tab-pane fade p-2" id="nav-page2">
                            @include('hr.pds.page2')
                        </div>
                        <div class="tab-pane fade p-2" id="nav-page3">
                            @include('hr.pds.page3')
                        </div>
                        <div class="tab-pane fade p-2" id="nav-page4">
                            @include('hr.pds.page4')
                        </div>
                    </div>


                </div>
                <div class="tab-pane fade" id="EI" role="tabpanel">
                    dsadsdasd
                </div>
                <div class="tab-pane fade" id="others" role="tabpanel">
                    adsadas
                </div>
            </div>

        </div>
    @section('customJS')
        <script>
            $("#print_1").click(printPage1);

            function printPage1() {
                var divContents = document.getElementById("page1").innerHTML;
                var a = window.open('', '', 'height=1000, width=1000');
                a.document.write('<html>');
                a.document.write('<body > <h1>Div contents are <br>');
                a.document.write(divContents);
                a.document.write('</body></html>');
                a.document.close();
                a.print();
            }
        </script>
    @endsection
@endsection
