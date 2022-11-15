@extends('layouts.app')

@section('title', 'My Records')
@section('content')

    <div class="row justify-content-center">
        <div class="col-12 col-md-10">
            {{-- files --}}
            <div class="row">
                <div class="col-12 col-md bg-success bg-gradient text-white rounded p-3 m-2">
                    <p class=" h3 text-center mb-3 fw-bold">Latest Plantilla</p>
                    <p>
                        No. :
                        <strong>
                            @if ($user->empPlantilla)
                                {{ $user->empPlantilla->EPno }}
                            @else
                                -
                            @endif
                        </strong>
                    </p>
                    <p>
                        Position :
                        <strong>
                            @if ($user->empPlantilla)
                                {{ $user->empPlantilla->EPposition }}
                            @else
                                -
                            @endif
                        </strong>
                    </p>
                    <p>
                        Department :
                        <strong>
                            @if ($user->empPlantilla)
                                {{ $user->empPlantilla->department->name }}
                            @else
                                -
                            @endif
                        </strong>
                    </p>
                    <p>
                        Designation :
                        <strong>
                            @if ($user->empPlantilla)
                                {{ $user->empPlantilla->designation->name }}
                            @else
                                -
                            @endif
                        </strong>
                    </p>
                </div>
                <div class="col-12 col-md bg-success bg-gradient text-white rounded p-3 m-2">
                    <p class="h3 text-center mb-3 fw-bold">Leave Credit</p>
                    <p>
                        Vacation Leave
                        <strong>
                            @if ($user->leaveCreditlatest)
                                {{ $user->leaveCreditlatest->elc_vl_balance }}
                            @else
                                -
                            @endif
                        </strong>
                    </p>
                    <p>
                        Sick Leave
                        <strong>
                            @if ($user->leaveCreditlatest)
                                {{ $user->leaveCreditlatest->elc_vl_balance }}
                            @else
                                -
                            @endif
                        </strong>
                    </p>
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
            <div class="row">
                <div class="col-12 col-md bg-success bg-gradient text-white rounded p-3 m-2">
                    <p class=" h3 text-center mb-3 fw-bold">Latest Plantilla</p>

                </div>
                <div class="col-12 col-md bg-success bg-gradient text-white rounded p-3 m-2">
                    <p class="h3 text-center mb-3 fw-bold">Leave Credit</p>

                </div>
            </div>
        </div>
    </div>
@endsection
