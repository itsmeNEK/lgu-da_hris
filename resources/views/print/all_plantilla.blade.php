@extends('layouts.print2')

@section('title', 'Plantilla')
@section('customCSS')

    <style>
        center .contents * {}

        .row .col {
            padding: 0 !important;
        }

        .table td,
        .table th {
            font-size: 12px;
            padding: 0;
        }
    </style>

@endsection
@section('content')

    <page size="Legal" layout="landscape">

        {{-- <center class="pt-3 m-3">
            <div class="row">
                <div class="col">
                    <img src="{{ asset('images/DA-logo.png') }}" alt="" width="60px" height="60px"><br>
                    REPUBLIC OF THE PHILIPPINES <br>
                    Province of Isabele <br>
                    <strong>MUNICIPALITY OF DELFIN ALBANO</strong>
                </div>
            </div>
            <br>
            <p class="text-center text-decoration-underline fs-5 text-uppercase mt-2"><strong>service record</strong></p>
            </div>

        </center> --}}
        <center class="pt-4">
            <strong>
                <h5>Plantilla of LGU Personnel FY {{ date('Y', strtotime(now())) }}</h5>
                <h5>Delfin Albano, Isabla</h5>
            </strong>
        </center>
        <div class="mx-4 mt-5">
            @forelse ($all_department as $department)
                <h5>Departmentment/Office: <strong>{{ $department->name }}</strong></h5>
                <table class="table table-bordered table-sm ">
                    <thead>
                        <tr class="text-center">
                            <th>Item No.</th>
                            <th width="20%">Position Title</th>
                            <th width="20%">Name of Incumbent</th>
                            <th width="20%">Department</th>
                            <th width="20%">Designation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($department->plantilla as $plantilla)
                            <tr>
                                <td>{{ $plantilla->EPno }}</td>
                                <td>{{ $plantilla->EPposition }}</td>
                                <td>
                                    @if ($plantilla->user)
                                        {{ $plantilla->user->first_name }}
                                        @if ($plantilla->user->pdsPersonal)
                                            {{ $plantilla->user->pdsPersonal->middle_name }}
                                        @endif
                                        {{ $plantilla->user->first_name }}
                                    @endif
                                </td>
                                <td>{{ $plantilla->department->name }}</td>
                                <td>{{ $plantilla->designation->name }}</td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            @empty
            @endforelse
        </div>
    </page>
@endsection
