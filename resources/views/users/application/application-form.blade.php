@extends('layouts.app')

@section('title', 'Application')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('users.application.index') }}"
                    class="text-decoration-none text-success">My
                    Application</a></li>
            <li class="breadcrumb-item active" aria-current="page">Application for <strong>
                    @if ($edit_app)
                        {{ $publication->title }}
                    @endif
                </strong>
            </li>
        </ol>
    </nav>
    @if (Auth::user()->havePDS())
        @if ($edit_app)
            <form action="/users/application/{{ $publication->id }}/update/{{ $edit_app->id }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')
            @else
                <form action="{{ route('users.application.apply', $publication->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
        @endif
        <div class="row justify-content-center mx-auto">
            <h3>Apply for <strong>{{ $publication->title }}</strong></h3>
            <div class="col-12 col-md-10 mt-3">
                <div class="row">
                    <div class="col-12 col-md">
                        <div class="mb-4">
                            <label for="residency">Resident of Delfin Albano</label>
                            <input accept=".pdf" type="file" class="form-control" name="residency" id="residency"
                                aria-describedby="residency_info">
                            @error('residency')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                            <div class="text-muted small" id="residency_info">Upload in here your proof of residency. (
                                Barangay Certificate, Police Clearance etc..) <p class="text-secondary">Note! Not Required.
                                    (PDF only)</p>
                            </div>
                            @if ($edit_app)
                                @if ($edit_app->residency)
                                    <a target="_blank" class="btn btn-success btn-sm"
                                        href="/storage/application-files/{{ $edit_app->residency }}"><i
                                            class="fa-solid fa-eye me-1"></i>Open File</a>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-md">
                        <div class="mb-4">
                            <label for="re">Perfomance Rating (if Applicabale)</label>
                            <input accept=".pdf" type="file" class="form-control" name="rating" id="rating"
                                aria-describedby="rating_info">
                            @error('rating')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                            <div class="text-muted small" id="rating_info">
                                <p class="text-secondary">Note! Not Required. (PDF only)</p>
                            </div>
                            @if ($edit_app)
                                @if ($edit_app->rating)
                                    <a target="_blank" class="btn btn-success btn-sm"
                                        href="/storage/application-files/{{ $edit_app->rating }}"><i
                                            class="fa-solid fa-eye me-1"></i>Open File</a>
                                    class="fa-solid fa-eye me-1"></i>Open File</a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md">
                        <div class="mb-4">
                            <label for="re">Certificate of Eligibility</label>
                            <input accept=".pdf" type="file" class="form-control" name="eligibility" id="eligibility"
                                aria-describedby="eligibility_info">
                            @error('eligibility')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                            <div class="text-muted small" id="eligibility_info">Upload in here your Certificate of
                                Eligibility,Rating,License.<p class="text-secondary">Note!Not Required. (PDF only)</p>
                            </div>
                            @if ($edit_app)
                                @if ($edit_app->eligibility)
                                    <a class="btn btn-success btn-sm"
                                        href="/storage/application-files/{{ $edit_app->eligibility }}"><i
                                            class="fa-solid fa-eye me-1"></i>Open File</a>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-md">
                        <div class="mb-3">
                            <label for="re">Transcript of Records</label>
                            <input accept=".pdf" type="file" class="form-control" name="tor" id="tor"
                                aria-describedby="tor_info"
                                @if ($edit_app) value="{{ $edit_app->tor }}" @endif>
                            @error('tor')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                            <div class="text-muted small" id="tor_info">Upload in here your Transcript of Record (TOR).<p
                                    class="text-danger">Note! Required. (PDF only)</p>
                            </div>
                            @if ($edit_app)
                                <a target="_blank" class="btn btn-success btn-sm"
                                    href="/storage/application-files/{{ $edit_app->tor }}"><i
                                        class="fa-solid fa-eye me-1"></i>Open File</a>
                            @endif
                        </div>
                    </div>
                </div>
                @if ($edit_app)
                    @if ($edit_app->status === 1)
                        <div class="col text-end">
                            <button type="submit" class="btn btn-success w-100">
                                <i class="fa fa-upload me-1" aria-hidden="true"></i> Update
                    @endif
                    </button>
            </div>
        @else
            <div class="col text-end">
                <button type="submit" class="btn btn-success w-100">
                    <i class="fa fa-upload me-1" aria-hidden="true"></i> Apply
                </button>
            </div>
    @endif
    </div>
    </div>
    </form>
@else
    <div class="container my-5">
        <p class="text-center display-6">Please Kindly fill out first your PDS. <br><a
                href="{{ route('users.pds.index') }}" class="text-success">Click here.</a></p>
    </div>
    @endif
@endsection
