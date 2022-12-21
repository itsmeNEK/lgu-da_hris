@extends('layouts.print2')

@section('title', 'Certificate of Employment')
@section('customCSS')

    <style>
        center .contents * {}

        .row .col {
            padding: 0 !important;
        }
    </style>

@endsection
@section('content')

    <page size="A4">

        <center class="pt-3 m-3">
            <div class="row">
                <div class="col">
                    <img src="{{ asset('images/DA-logo.png') }}" alt="" width="60px" height="60px"><br>
                    REPUBLIC OF THE PHILIPPINES <br>
                    Province of Isabele <br>
                    <strong>MUNICIPALITY OF DELFIN ALBANO</strong> <br>
                    <strong class="fw-bold text-uppercase">municipal human resourse Management Office</strong>
                </div>
            </div>
            <br>
            <p class="text-center text-decoration-underline fs-5 text-uppercase mt-2"><strong>certification</strong></p>
            </div>
        </center>
        <div class="wrapper mx-5">
            <div class="row">
                <div class="col fw-bold text-uppercase">
                    to whom it may concern:
                </div>
            </div>
            <br>
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            THIS IS TO CERTIFY that based on records of this office ,<strong class="text-uppecase">
                @if ($user->pdsPersonal)
                    @if ($user->pdsPersonal->sex == 'female' || $user->pdsPersonal->sex == 'Female')
                        MRS.
                    @elseif($user->pdsPersonal->sex == 'male' || $user->pdsPersonal->sex == 'Male')
                        MR.
                    @endif
                @endif
                {{ $user->first_name }} @if ($user->pdsPersonal)
                    {{ $user->pdsPersonal->middle_name }}
                @endif {{ $user->last_name }}
            </strong>,
            @if ($user->empPlantilla)
                {{ $user->empPlantilla->EPposition }}
            @endif
            of the Local Goverment Unit of Delfin Albano, Isabela is an employee of LGU from
            @if ($user->hasServiceRecord($user->id))
                {{ date('M, d Y', strtotime($user->serviceRecord->first()->from)) }}
            @else
                _________________________
            @endif
            to
            @if ($user->hasServiceRecord($user->id))
                @if ($user->serviceRecord->sortByDesc('id')->first()->cause == 'Retired' ||
                    $user->serviceRecord->sortByDesc('id')->first()->cause == 'retired')
                    {{ date('M, d Y', strtotime($user->serviceRecord->sortByDesc('id')->first()->to)) }}
                @else
                    present
                @endif
            @else
                _________________________
            @endif
            .
            <br>
            <br>
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            Certifying further that <strong class="text-uppecase">
                @if ($user->pdsPersonal)
                    @if ($user->pdsPersonal->sex == 'female' || $user->pdsPersonal->sex == 'Female')
                        MRS.
                    @elseif($user->pdsPersonal->sex == 'male' || $user->pdsPersonal->sex == 'Male')
                        MR.
                    @endif
                @endif
                {{ $user->first_name }} @if ($user->pdsPersonal)
                    {{ $user->pdsPersonal->middle_name }}
                @endif {{ $user->last_name }}
            </strong>
            has no pending Administrative Case fled against him in this office.
            <br>
            <br>
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            Issued this {{ date(' jS \d\a\y \of F Y', strtotime(now())) }} at Delfin Albano, Isabela
            <br><br>
            <div class="row mx-2 text-start mt-5">
                <div class="col"></div>
                <div class="col"></div>
                <div class="col text-center text-uppercase border-bottom fw-bold">ERLIEGY a. butay mpa</div>
            </div>
            <div class="row mx-2 text-start">
                <div class="col"></div>
                <div class="col"></div>
                <div class="col text-center">Mun. Gov't. Dept. HEAD I (MHRMO)</div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            OR No.<br>
            Issued on: <strong class="text-decoration-underline">{{ date('F d,Y', strtotime(now())) }}</strong><br>
            Issued ar: <strong class="text-decoration-underline">Delfin Albano, Isabela</strong>

        </div>
    </page>
@endsection
