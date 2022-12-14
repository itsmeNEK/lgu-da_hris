@extends('layouts.app')

@section('customCSS')
    <link href="{{ asset('storage/css/home.css') }}" rel="stylesheet">
@endsection

@section('customJS')

@endsection

@section('title', 'Home')
@section('content')
    <div class="header-image">
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-11 col-md-10">
            <h2 class="text-center text-uppercase">Publications</h2>
            <div class="row justify-content-center align-item-center">
                @forelse ($publication as $pub)
                    {{-- <div class="col-12 col-sm-8 col-md-6 col-lg-4 my-3">
                        <div class="card text-start" style="min-height: 500px">
                            <div class="card-header">
                                <h3>{{ $pub->title }}</h3>
                            </div>
                            <div class="card-body">
                                <p class="card-title">
                                <h5>Position Details</h5>
                                </p>
                                <p class="card-text mb-0">
                                    <span class="fw-bold">Salary Grade:</span> {{ $pub->salarygrade }}
                                </p>
                                <p class="card-text mb-0">
                                    <span class="fw-bold">Monthly Salary:</span>
                                    {{ number_format(floatval($pub->monthly), 2, '.', ',') }}
                                </p>
                                <p class="card-text mb-0">
                                    <span class="fw-bold">Education:</span> {{ $pub->education }}
                                </p>
                                <p class="card-text mb-0">
                                    <span class="fw-bold">Training:</span> {{ $pub->trainig }}
                                </p>
                                <p class="card-text mb-0">
                                    <span class="fw-bold">Experience:</span> Atleast {{ $pub->experience }} Year/s
                                    Experience
                                </p>
                                <p class="card-text mb-0">
                                    <span class="fw-bold">Eligibility:</span> {{ $pub->eligibility }}
                                </p>
                                <p class="card-text mb-0">
                                    <span class="fw-bold">Competency:</span> {{ $pub->competency }}
                                </p>
                                <p class="card-text mb-0">
                                    <span class="fw-bold">Assignment:</span> {{ $pub->assignment }}
                                </p>
                            </div>
                            <div class="card-footer text-end">
                                <div class="row">
                                    <div class="col">
                                        <a href="{{ route('users.application.show', $pub->id) }}"
                                            class="btn btn-success text-decoration-none">Apply Now!</a>
                                    </div>
                                    <div class="col">
                                        <span class="text-muted">{{ $pub->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-12 col-sm-10 col-md-6 col-lg-4 mb-5">
                        <div class="card-container">
                            <div class="card">
                                <div class="face face1">
                                    <div class="content">
                                        <h3>{{ $pub->title }}</h3>
                                    </div>
                                </div>

                                <div class="face face2">
                                    <div class="content">
                                        <p class="card-title">
                                        <h5>Position Details</h5>
                                        </p>
                                        <p class="card-text mb-0">
                                            <span class="fw-bold">Salary Grade:</span> {{ $pub->salarygrade }}
                                        </p>
                                        <p class="card-text mb-0">
                                            <span class="fw-bold">Monthly Salary:</span>
                                            {{ number_format(floatval($pub->monthly), 2, '.', ',') }}
                                        </p>
                                        <p class="card-text mb-0">
                                            <span class="fw-bold">Education:</span> {{ $pub->education }}
                                        </p>
                                        <p class="card-text mb-0">
                                            <span class="fw-bold">Training:</span> {{ $pub->trainig }}
                                        </p>
                                        <p class="card-text mb-0">
                                            <span class="fw-bold">Experience:</span> Atleast {{ $pub->experience }} Year/s
                                            Experience
                                        </p>
                                        <p class="card-text mb-0">
                                            <span class="fw-bold">Eligibility:</span> {{ $pub->eligibility }}
                                        </p>
                                        <p class="card-text mb-0">
                                            <span class="fw-bold">Competency:</span> {{ $pub->competency }}
                                        </p>
                                        <p class="card-text mb-0">
                                            <span class="fw-bold">Assignment:</span> {{ $pub->assignment }}
                                        </p>
                                        <div class="row">
                                            <div class="col">
                                                <a href="{{ route('users.application.show', $pub->id) }}"
                                                    class="btn btn-success text-decoration-none">Apply Now!</a>
                                            </div>
                                            <div class="col">
                                                <span class="text-muted">{{ $pub->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <h2 class="text-center">No Vacant Position Yet</h2>
                @endforelse
                <div class="d-flex justify-content-center">
                    {{ $publication->links('pagination.custom') }}
                </div>
            </div>
        </div>
    </div>

@endsection
