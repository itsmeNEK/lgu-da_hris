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
    <div class="row justify-content-center align-center mt-5">
        <div class="col-11 col-md-6">
            <h2 class="text-center text-uppercase">Publications</h2>
            <div class="row justify-content-center align-item-center">
                @forelse ($publication as $pub)
                    {{-- card --}}
                    <div class="col-12 col-sm-8 col-md-6 col-lg-4 my-3">
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
                                    <span class="fw-bold">Experience:</span> {{ $pub->experience }}
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
                                <p class="text-end mb-0">
                                    <a href="{{ route('users.application.show',$pub->id) }}" class="btn btn-success text-decoration-none">Apply Now!</a>
                                </p>
                            </div>
                            <div class="card-footer text-end">
                                <span class="text-muted">Posted: {{ $pub->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                    {{-- card --}}
                @empty
                    <h2 class="text-center">No Vacant Position Yet</h2>
                @endforelse
            </div>
        </div>
    </div>

@endsection
