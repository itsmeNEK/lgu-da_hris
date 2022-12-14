@extends('layouts.app')

@section('title', 'My Records')
@section('content')
    {{-- files --}}
    <div class="row justify-content-center">
        <div class="col-11 col-lg m-1 bg-success bg-gradient text-white rounded">
            <p class=" h3 text-center mb-3 fw-bold">Latest Plantilla</p>
            <div class="row justify-content-between">
                <div class="col">
                    <p>
                        No. :
                    </p>
                </div>
                <div class="col text-end">

                    <strong>
                        @if ($user->empPlantilla)
                            {{ $user->empPlantilla->EPno }}
                        @else
                            -
                        @endif
                    </strong>
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <p>
                        Position :
                    </p>
                </div>
                <div class="col text-end">
                    <strong>
                        @if ($user->empPlantilla)
                            {{ $user->empPlantilla->EPposition }}
                        @else
                            -
                        @endif
                    </strong>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>
                        Department :
                    </p>
                </div>
                <div class="col text-end">
                    <strong>
                        @if ($user->empPlantilla)
                            {{ $user->empPlantilla->department->name }}
                        @else
                            -
                        @endif
                    </strong>
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <p>
                        Designation :
                    </p>
                </div>
                <div class="col text-end">
                    <strong>
                        @if ($user->empPlantilla)
                            {{ $user->empPlantilla->designation->name }}
                        @else
                            -
                        @endif
                    </strong>
                </div>
            </div>
        </div>
        <div class="col-11 col-lg m-1 bg-success bg-gradient text-white rounded">
            <p class="h3 text-center mb-3 fw-bold">Leave Credit</p>
            <div class="row justify-content-center">
                <div class="col-11 col-md border border-1 rounded m-1">
                    <p class="text-center">Balance</p>
                    <div class="row">
                        <div class="col">
                            <p>
                                Vacation Leave
                            </p>
                        </div>
                        <div class="col-4 text-end">
                            <strong>
                                @if ($user->leaveCreditlatest)
                                    {{ $user->leaveCreditlatest->elc_vl_balance }}
                                @else
                                    -
                                @endif
                            </strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>
                                Sick Leave
                            </p>
                        </div>
                        <div class="col-4 text-end">
                            <strong>
                                @if ($user->leaveCreditlatest)
                                    {{ $user->leaveCreditlatest->elc_vl_balance }}
                                @else
                                    -
                                @endif
                            </strong>
                        </div>
                    </div>
                </div>
                <div class="col-11 col-md border border-1 rounded m-1">
                    <p class="text-center">Force Leave Balance</p>
                    <div class="row justify-content-between">
                        <div class="col">
                            <p>
                                Vacation Leave
                            </p>
                        </div>
                        <div class="col-3 text-end">
                            <p>
                                1
                            </p>
                        </div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col">
                            <p>
                                Sick Leave
                            </p>
                        </div>
                        <div class="col-3 text-end">
                            <p>
                                2
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-2">
                <div class="col">
                    <button class="btn btn-outline-light w-100">File Leave</button>
                </div>
                <div class="col">
                    <button class="btn btn-outline-light w-100">Service Record</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-11 col-lg m-1 bg-success bg-gradient text-white rounded">
            <p class=" h3 text-center mb-3 fw-bold">Next Loyalty Award</p>
            <p class="text-center my-3">
                @if ($user->hasloyaltyRecord())
                    {{ date('M, d Y', strtotime($user->loyaltyRecord->next_loyalty)) }}
                    | {{ \Carbon\Carbon::parse($user->loyaltyRecord->next_loyalty)->diffForHumans() }}
                @else
                    -
                @endif
            </p>
        </div>
        <div class="col-11 col-lg m-1 bg-success bg-gradient text-white rounded">
            <p class="h3 text-center mb-3 fw-bold">Leave Credit</p>

        </div>
    </div>
    {{-- <div class="row">
                <div class="col-12 col-md bg-success bg-gradient text-white rounded">
                    <p class=" h3 text-center mb-3 fw-bold">Latest Plantilla</p>

                </div>
                <div class="col-12 col-md bg-success bg-gradient text-white rounded">
                    <p class="h3 text-center mb-3 fw-bold">Leave Credit</p>

                </div>
            </div> --}}
@endsection
