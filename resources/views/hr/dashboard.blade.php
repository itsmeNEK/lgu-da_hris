@extends('layouts.app')

@section('customCSS')
    <link href="{{ asset('storage/css/circle-graph.css') }}" rel="stylesheet">
@endsection
@section('title', 'Dashboard')
@section('content')
    <div class="row justify-content-center">
        {{-- <div class="col-lg col-sm-12">
            <div class="single-chart mx-auto">
                <svg viewBox="0 0 36 36" class="circular-chart success">
                    <path class="circle-bg"
                        d="M18 2.0845
                      a 15.9155 15.9155 0 0 1 0 31.831
                      a 15.9155 15.9155 0 0 1 0 -31.831" />
                    <path class="circle"
                        stroke-dasharray="
                        {{ ($user_count['total_online_emp'] / $user_count['total_user']) * 100 }}
                    , 100"
                        d="M18 2.0845
                      a 15.9155 15.9155 0 0 1 0 31.831
                      a 15.9155 15.9155 0 0 1 0 -31.831" />
                    <text x="18" y="20.35"
                        class="percentage">{{ $user_count['total_online_emp'] . '/' . $user_count['total_user'] }}</text>
                </svg>
            </div>
            <h3 class="text-center">Employee Online</h3>
        </div> --}}
        <div class="col-lg col-sm-12">
            <div class="single-chart mx-auto">
                <svg viewBox="0 0 36 36" class="circular-chart warning">
                    <path class="circle-bg"
                        d="M18 2.0845
                      a 15.9155 15.9155 0 0 1 0 31.831
                      a 15.9155 15.9155 0 0 1 0 -31.831" />
                    <path class="circle"
                        stroke-dasharray="

                    35
                    , 100"
                        d="M18 2.0845
                      a 15.9155 15.9155 0 0 1 0 31.831
                      a 15.9155 15.9155 0 0 1 0 -31.831" />
                    <text x="18" y="20.35"
                        class="percentage">text</text>
                </svg>
            </div>
            <h3 class="text-center">In</h3>
        </div>
        <div class="col-lg col-sm-12">
            <div class="single-chart mx-auto">
                <svg viewBox="0 0 36 36" class="circular-chart primary">
                    <path class="circle-bg"
                        d="M18 2.0845
                      a 15.9155 15.9155 0 0 1 0 31.831
                      a 15.9155 15.9155 0 0 1 0 -31.831" />
                    <path class="circle"
                        stroke-dasharray="

                    35
                    , 100"
                        d="M18 2.0845
                      a 15.9155 15.9155 0 0 1 0 31.831
                      a 15.9155 15.9155 0 0 1 0 -31.831" />
                    <text x="18" y="20.35"
                        class="percentage">text</text>
                </svg>
            </div>
            <h3 class="text-center">Out</h3>
        </div>
    </div>
    <div class="row justify-content-end mt-5">
        <div class="col-12 col-md-4 text-end">
            <form action="{{ route('hr.dashboard.index') }}" method="get">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Search Employee"
                        aria-label="Recipient's username" aria-describedby="button-addon2"
                        value="{{ old('search') }}">
                    <button class="btn btn-warning text-white fw-bold"><i
                            class="fa-solid fa-magnifying-glass me-1"></i>Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row justify-content-center text-center">
        <div class="col table-responsive" id="no-more-tables">
            <table class="table table-hover table-striped small table-sm">
                <thead>
                    <tr class="table-success">
                        <th class="numeric">Name</th>
                        <th class="numeric" width="15%">Department</th>
                        <th class="numeric">Status</th>
                        <th class="numeric"></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($users as $user)
                        <tr>
                            <td data-title="Name">{{ $user->first_name . ' ' . $user->last_name }}</td>
                            <td data-title="Department">
                                @if ($user->empPlantilla)
                                    {{ $user->empPlantilla->designation->name }}
                                @else
                                    -
                                @endif
                            </td>
                            <td data-title="Status">
                                @if (Cache::has('user-is-online-' . $user->id))
                                    <span class="badge bg-success">
                                        Online
                                    </span>
                                @else
                                    <span class="badge bg-secondary">
                                        Offline
                                    </span>
                                @endif
                            </td>
                            <td data-title="Print">
                                <a href="" class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-print me-1"></i> COE</a>
                                {{-- <a href="" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-user-minus me-1"></i>Retired</a> --}}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No users found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $users->links('pagination.custom') }}
            </div>
        </div>
    </div>

@endsection
