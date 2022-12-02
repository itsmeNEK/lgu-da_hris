@extends('layouts.app')

@section('customCSS')
    <link href="{{ asset('storage/css/personal_multi_step.css') }}" rel="stylesheet">
@endsection

@section('customJS')
    <script src="{{ asset('storage/js/multi_step_form.js') }}"></script>
@endsection

@section('title', 'PDS Personal Information')
@section('content')
    <style>
        .profile-main-loader .loader {
            position: relative;
            margin: 0px auto;
            width: 100px;
            height: 100px;
        }

        .profile-main-loader .loader:before {
            content: '';
            display: block;
            padding-top: 100%;
        }

        .circular-loader {
            -webkit-animation: rotate 2s linear infinite;
            animation: rotate 2s linear infinite;
            height: 100%;
            -webkit-transform-origin: center center;
            -ms-transform-origin: center center;
            transform-origin: center center;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            margin: auto;
        }

        .loader-path {
            stroke-dasharray: 150, 200;
            stroke-dashoffset: -10;
            -webkit-animation: dash 1.5s ease-in-out infinite, color 6s ease-in-out infinite;
            animation: dash 1.5s ease-in-out infinite, color 6s ease-in-out infinite;
            stroke-linecap: round;
        }

        @-webkit-keyframes rotate {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes rotate {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @-webkit-keyframes dash {
            0% {
                stroke-dasharray: 1, 200;
                stroke-dashoffset: 0;
            }

            50% {
                stroke-dasharray: 89, 200;
                stroke-dashoffset: -35;
            }

            100% {
                stroke-dasharray: 89, 200;
                stroke-dashoffset: -124;
            }
        }

        @keyframes dash {
            0% {
                stroke-dasharray: 1, 200;
                stroke-dashoffset: 0;
            }

            50% {
                stroke-dasharray: 89, 200;
                stroke-dashoffset: -35;
            }

            100% {
                stroke-dasharray: 89, 200;
                stroke-dashoffset: -124;
            }
        }

        @-webkit-keyframes color {
            0% {
                stroke: seagreen;
            }

            40% {
                stroke: seagreen;
            }

            66% {
                stroke: seagreen;
            }

            80%,
            90% {
                stroke: seagreen;
            }
        }

        @keyframes color {
            0% {
                stroke: seagreen;
            }

            40% {
                stroke: seagreen;
            }

            66% {
                stroke: seagreen;
            }

            80%,
            90% {
                stroke: seagreen;
            }
        }
    </style>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('users.pds.index') }}"
                    class="text-decoration-none text-success">PDS</a></li>
            <li class="breadcrumb-item active" aria-current="page">Personal</li>
        </ol>
    </nav>
    <div class="row d-flex justify-content-center">
        <div class="col col-md-6">

            @if ($personal)
                <form id="regForm" method="post" action="{{ route('users.pds.personal.update', $personal->id) }}">
                    @csrf
                    @method('PATCH')
                @else
                    <form id="regForm"method="post" action="{{ route('users.pds.personal.store') }}">
                        @csrf
            @endif
            <h1 id="register" class=" text-center">Personal Information</h1>
            <!-- One "tab" for each step in the form: -->
            <div class="tab">
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="first_name" id="first_name"
                        placeholder=""
                        @if ($personal) value="{{ old('first_name', $personal->first_name) }}"
                        @else
                        value="{{ old('first_name', Auth::user()->first_name) }}" @endif>
                    <label for="first_name" class="form-label text-muted">First Name</label>

                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="last_name" id="last_name" placeholder=""
                        @if ($personal) value="{{ old('last_name', $personal->last_name) }}"
                    @else
                    value="{{ old('last_name', Auth::user()->last_name) }}" @endif>
                    <label for="last_name" class="form-label text-muted">Last Name</label>

                </div>
                <div class="row">
                    <div class="col-9">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control text-uppercase" name="middle_name" id="middle_name"
                                placeholder=""
                                @if ($personal) value="{{ old('middle_name', $personal->middle_name) }}"
                                    @else
                                    value="{{ old('middle_name') }}" @endif>
                            <label for="middle_name" class="form-label text-muted">Middle Name</label>

                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control text-uppercase" name="ext_name" id="ext_name"
                                placeholder=""
                                @if ($personal) value="{{ old('ext_name', $personal->ext_name) }}"
                                @else
                                value="{{ old('ext_name') }}" @endif>
                            <label for="ext_name" class="form-label text-muted">Ext.</label>
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-1">
                    <input type="date" class="form-control text-uppercase" name="date_birth" id="date_birth"
                        placeholder=""
                        @if ($personal) value="{{ old('date_birth', $personal->date_birth) }}"
                        @else
                        value="{{ old('date_birth') }}" @endif>
                    <label for="date_birth" class="form-label text-muted">Date of Birth</label>

                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="place_birth" id="place_birth"
                        placeholder=""
                        @if ($personal) value="{{ old('place_birth', $personal->place_birth) }}"
                        @else
                        value="{{ old('place_birth') }}" @endif>
                    <label for="place_birth" class="form-label text-muted">Place of Birth</label>

                </div>
                <div class="form-floating mb-1">
                    <select class="form-select" name="sex" id="sex">
                        <option value="" hidden>Select Sex Here</option>
                        <option
                            @if ($personal) @if ($personal->sex === 'Male')
                        selected @endif
                            @endif value="Male">Male</option>
                        <option
                            @if ($personal) @if ($personal->sex === 'Female')
                        selected @endif
                            @endif value="Female">Female</option>
                    </select>
                    <label for="sex" class="form-label text-muted">Sex</label>

                </div>
                <div class="form-floating mb-1">
                    <select class="form-select" name="civil_service" id="civil_service">
                        <option value="" hidden>Select Civil Status Here</option>
                        <option @if ($personal) @if ($personal->civil_service === 'Single')selected @endif
                            @endif
                            value="Single">Single</option>
                        <option @if ($personal) @if ($personal->civil_service === 'Married')selected @endif
                            @endif value="Married">Married</option>
                        <option @if ($personal) @if ($personal->civil_service === 'Wifdow/Widower')selected @endif
                            @endif value="Wifdow/Widower">Wifdow/Widower</option>
                        <option @if ($personal) @if ($personal->civil_service === 'Divorce')selected @endif
                            @endif value="Divorce">Divorce</option>
                        <option @if ($personal) @if ($personal->civil_service === 'Other/s')selected @endif
                            @endif value="Other/s">Other/s</option>
                    </select>
                    <label for="civil_service" class="form-label text-muted">Civil Status</label>

                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="weight" id="weight" placeholder=""
                        @if ($personal) value="{{ old('weight', $personal->weight) }}"
                        @else
                        value="{{ old('weight') }}" @endif>
                    <label for="weight" class="form-label text-muted">Weight</label>

                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="height" id="height"
                        placeholder=""
                        @if ($personal) value="{{ old('height', $personal->height) }}"
                        @else
                        value="{{ old('height') }}" @endif>
                    <label for="height" class="form-label text-muted">Height</label>

                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="blood_type" id="blood_type"
                        placeholder=""
                        @if ($personal) value="{{ old('blood_type', $personal->blood_type) }}"
                        @else
                        value="{{ old('blood_type') }}" @endif>
                    <label for="blood_type" class="form-label text-muted">Blood type</label>

                </div>
            </div>
            {{-- tab 2  --}}
            <div class="tab">
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="gsis_id" id="gsis_id"
                        placeholder=""
                        @if ($personal) value="{{ old('gsis_id', Crypt::decrypt($personal->gsis_id)) }}"
                        @else
                        value="{{ old('gsis_id') }}" @endif>
                    <label for="gsis_id" class="form-label text-muted">GSIS ID No.</label>

                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="pag_ibig_id" id="pag_ibig_id"
                        placeholder=""@if ($personal) value="{{ old('pag_ibig_id', Crypt::decrypt($personal->pag_ibig_id)) }}"
                        @else
                        value="{{ old('pag_ibig_id') }}" @endif>
                    <label for="pag_ibig_id" class="form-label text-muted">PAG IBIG ID No.</label>

                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="ph_id" id="ph_id"
                        placeholder=""
                        @if ($personal) value="{{ old('ph_id', Crypt::decrypt($personal->ph_id)) }}"
                        @else
                        value="{{ old('ph_id') }}" @endif>
                    <label for="ph_id" class="form-label text-muted">PHILHEALTH ID No.</label>

                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="sss_id" id="sss_id"
                        placeholder=""
                        @if ($personal) value="{{ old('sss_id', Crypt::decrypt($personal->sss_id)) }}"
                        @else
                        value="{{ old('sss_id') }}" @endif>
                    <label for="sss_id" class="form-label text-muted">SSS No.</label>

                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="tin_id" id="tin_id"
                        placeholder=""
                        @if ($personal) value="{{ old('tin_id', Crypt::decrypt($personal->tin_id)) }}"
                        @else
                        value="{{ old('tin_id') }}" @endif>
                    <label for="tin_id" class="form-label text-muted">TIN No.</label>

                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="a_e_n" id="a_e_n"
                        placeholder=""
                        @if ($personal) value="{{ old('a_e_n', $personal->a_e_n) }}"
                        @else
                        value="{{ old('a_e_n') }}" @endif>
                    <label for="" class="form-label text-muted">Agency Employee No.</label>

                </div>
                <div class="form-floating mb-1">
                    <select class="form-select" name="citizenship" id="citizenship">
                        <option value="" hidden>Select Citizenship Here</option>
                        <option
                            @if ($personal) @if ($personal->citizenship === 'Filipino')
                                selected @endif
                            @endif value="Filipino">Filipino</option>
                        <option
                            @if ($personal) @if ($personal->citizenship === 'Other')
                                selected @endif
                            @endif value="Other">Other</option>
                    </select>
                    <label for="citizenship" class="form-label text-muted">Citizenship</label>

                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="country" id="country"
                        placeholder=""
                        @if ($personal) value="{{ old('country', $personal->country) }}"
                        @else
                        value="{{ old('country') }}" @endif>
                    <label for="country" class="form-label text-muted">Country</label>

                </div>
            </div>
            {{-- tab 3  --}}
            <div class="tab">
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control text-uppercase" name="h_b_l_no" id="h_b_l_no"
                                placeholder=""
                                @if ($personal) value="{{ old('h_b_l_no', $personal->middle_name) }}"
                                    @else
                                    value="{{ old('h_b_l_no') }}" @endif>
                            <label for="h_b_l_no" class="form-label text-muted">House/Block/Lot #</label>

                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control text-uppercase" name="street" id="street"
                                placeholder=""
                                @if ($personal) value="{{ old('street', $personal->street) }}"
                                @else
                                value="{{ old('street') }}" @endif>
                            <label for="street" class="form-label text-muted">Street</label>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control text-uppercase" name="village" id="village"
                                placeholder=""
                                @if ($personal) value="{{ old('village', $personal->village) }}"
                                @else
                                value="{{ old('village') }}" @endif>
                            <label for="village" class="form-label text-muted">Subdivision/Village</label>

                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control text-uppercase" name="barangay" id="barangay"
                                placeholder=""
                                @if ($personal) value="{{ old('barangay', $personal->barangay) }}"
                                    @else
                                    value="{{ old('barangay') }}" @endif>
                            <label for="barangay" class="form-label text-muted">Barangay</label>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control text-uppercase" name="city" id="city"
                                placeholder=""
                                @if ($personal) value="{{ old('city', $personal->city) }}"
                                @else
                                value="{{ old('city') }}" @endif>
                            <label for="city" class="form-label text-muted">City/Municipality</label>

                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control text-uppercase" name="province" id="province"
                                placeholder=""
                                @if ($personal) value="{{ old('province', $personal->province) }}"
                                    @else
                                    value="{{ old('province') }}" @endif>
                            <label for="province" class="form-label text-muted">Province</label>

                        </div>
                    </div>
                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="zipcode" id="zipcode"
                        placeholder=""
                        @if ($personal) value="{{ old('zipcode', $personal->zipcode) }}"
                        @else
                        value="{{ old('zipcode') }}" @endif>
                    <label for="zipcode" class="form-label text-muted">Zip Code</label>

                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="same_check" id="same_check"
                        name="same_check">
                    <label class="form-check-label" for="same_check">
                        Same as Residential
                    </label>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control text-uppercase" name="h_b_l_no_2" id="h_b_l_no_2"
                                placeholder=""
                                @if ($personal) value="{{ old('h_b_l_no_2', $personal->h_b_l_no_2) }}"
                                    @else
                                    value="{{ old('h_b_l_no_2') }}" @endif>
                            <label for="h_b_l_no_2" class="form-label text-muted">House/Block/Lot #</label>

                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control text-uppercase" name="street_2" id="street_2"
                                placeholder=""@if ($personal) value="{{ old('street_2', $personal->street_2) }}"
                                    @else
                                    value="{{ old('street_2') }}" @endif>
                            <label for="street_2" class="form-label text-muted">Street</label>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control text-uppercase" name="village_2" id="village_2"
                                placeholder=""
                                @if ($personal) value="{{ old('village_2', $personal->village_2) }}"
                                    @else
                                    value="{{ old('village_2') }}" @endif>
                            <label for="village_2" class="form-label text-muted">Subdivision/Village</label>

                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control text-uppercase" name="barangay_2" id="barangay_2"
                                placeholder=""
                                @if ($personal) value="{{ old('barangay_2', $personal->barangay_2) }}"
                                    @else
                                    value="{{ old('barangay_2') }}" @endif>
                            <label for="barangay_2" class="form-label text-muted">Barangay</label>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control text-uppercase" name="city_2" id="city_2"
                                placeholder=""
                                @if ($personal) value="{{ old('city_2', $personal->city_2) }}"
                                @else
                                value="{{ old('city_2') }}" @endif>
                            <label for="city_2" class="form-label text-muted">City/Municipality</label>

                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control text-uppercase" name="province_2" id="province_2"
                                placeholder=""
                                @if ($personal) value="{{ old('province_2', $personal->province_2) }}"
                                    @else
                                    value="{{ old('province_2') }}" @endif>
                            <label for="province_2" class="form-label text-muted">Province</label>

                        </div>
                    </div>
                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="zipcode_2" id="zipcode_2"
                        placeholder=""
                        @if ($personal) value="{{ old('zipcode_2', $personal->zipcode_2) }}"
                        @else
                        value="{{ old('zipcode_2') }}" @endif>
                    <label for="zipcode_2" class="form-label text-muted">Zip Code</label>

                </div>
            </div>
            <div class="tab">
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="tel_no" id="tel_no"
                        placeholder=""
                        @if ($personal) value="{{ old('tel_no', $personal->tel_no) }}"
                        @else
                        value="{{ old('tel_no') }}" @endif>
                    <label for="tel_no" class="form-label text-muted">Telephone No.</label>

                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="mobile_no" id="mobile_no"
                        placeholder=""@if ($personal) value="{{ old('mobile_no', $personal->mobile_no) }}"
                            @else
                            value="{{ old('mobile_no') }}" @endif>
                    <label for="mobile_no" class="form-label text-muted">Mobile No.</label>

                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control" name="email" id="email" placeholder=""
                        value="{{ old('email', Auth::user()->email) }}">
                    <label for="email" class="form-label text-muted">Email Address</label>

                </div>
            </div>
            <div id="waiting" style="display: none" class="my-5">
                <div class="row h-50 text-center">
                    <div class="col mx-auto">

                        {{-- <div id="wrapper">
                            <div class="profile-main-loader">
                                <div class="loader">
                                    <svg class="circular-loader" viewBox="25 25 50 50">
                                        <circle class="loader-path" cx="50" cy="50" r="20"
                                            fill="none" stroke="#70c542" stroke-width="2" />
                                    </svg>
                                </div>
                            </div>
                        </div> --}}
                        <div class="main">
                            <div class="balls balls-1">
                                <div class="ball ball--1"></div>
                                <div class="ball ball--2"></div>
                                <div class="ball ball--3"></div>
                                <div class="ball ball--4"></div>
                                <div class="ball ball--5"></div>
                            </div>
                        </div>
                        <br>
                        <h2>Please Wait. <br> Saving Records</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col text-start">
                    <button class="btn btn-outline-secondary" type="button" id="prevBtn"
                        onclick="nextPrev(-1)">Previous</button>
                </div>
                <div class="col text-end">
                    <button class="btn btn-success" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                </div>
            </div>
            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
            </div>
            </form>
        </div>
    </div>
@endsection
