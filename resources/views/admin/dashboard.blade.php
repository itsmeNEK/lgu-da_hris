@extends('layouts.app')

@section('customCSS')
    <link href="{{ asset('storage/css/circle-graph.css') }}" rel="stylesheet">
@endsection
@section('title', 'Admin | User Management')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg col-sm-12">
            <div class="single-chart mx-auto">
                <svg viewBox="0 0 36 36" class="circular-chart success">
                    <path class="circle-bg"
                        d="M18 2.0845
                      a 15.9155 15.9155 0 0 1 0 31.831
                      a 15.9155 15.9155 0 0 1 0 -31.831" />
                    <path class="circle"
                        stroke-dasharray="
                    {{ ($user_count['total_ol_alluser'] / $user_count['total_alluser']) * 100 }}
                    , 100"
                        d="M18 2.0845
                      a 15.9155 15.9155 0 0 1 0 31.831
                      a 15.9155 15.9155 0 0 1 0 -31.831" />
                    <text x="18" y="20.35"
                        class="percentage">{{ $user_count['total_ol_alluser'] . '/' . $user_count['total_alluser'] }}</text>
                </svg>
            </div>
            <h3 class="text-center">Overall Users</h3>
        </div>
        <div class="col-lg col-sm-12">
            <div class="single-chart mx-auto">
                <svg viewBox="0 0 36 36" class="circular-chart warning">
                    <path class="circle-bg"
                        d="M18 2.0845
                      a 15.9155 15.9155 0 0 1 0 31.831
                      a 15.9155 15.9155 0 0 1 0 -31.831" />
                    <path class="circle"
                        stroke-dasharray="

                    {{ ($user_count['ol_emp_count'] / $user_count['total_emp_count']) * 100 }}
                    , 100"
                        d="M18 2.0845
                      a 15.9155 15.9155 0 0 1 0 31.831
                      a 15.9155 15.9155 0 0 1 0 -31.831" />
                    <text x="18" y="20.35"
                        class="percentage">{{ $user_count['ol_emp_count'] . '/' . $user_count['total_emp_count'] }}</text>
                </svg>
            </div>
            <h3 class="text-center">Employee Count</h3>
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
                    {{ ($user_count['ol_users_count'] / $user_count['total_users_count']) * 100 }}
                    , 100"
                        d="M18 2.0845
                      a 15.9155 15.9155 0 0 1 0 31.831
                      a 15.9155 15.9155 0 0 1 0 -31.831" />
                    <text x="18" y="20.35"
                        class="percentage">{{ $user_count['ol_users_count'] . '/' . $user_count['total_users_count'] }}</text>
                </svg>
            </div>
            <h3 class="text-center">User Count</h3>
        </div>
    </div>
    <hr>
    <form action="{{ route('admin.user.store') }}" method="POST">
        @csrf
        <div class="row mt-4 align-items-center">
            <h3>Add User</h3>
            <div class="col-12 col-md">
                <div class="input-group mb-3">
                    <input type="text" name="first_name" aria-label="First name"
                        class="form-control @error('first_name') is-invalid @enderror"
                        placeholder="First Name @error('first_name') | {{ $message }} @enderror">
                    <input type="text" name="last_name" aria-label="Last name"
                        class="form-control @error('last_name') is-invalid @enderror"
                        placeholder="Last Name @error('last_name') | {{ $message }} @enderror">
                    <input type="text" name="email" aria-label="Last name"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="Email @error('email') | {{ $message }} @enderror">
                    <button class="btn btn-success" id="button-addon2"><i class="fa-solid fa-circle-plus"></i> Add</button>
                </div>
            </div>
        </div>
    </form>
    <hr>
    <div class="row justify-content-end">
        <div class="col-12 col-md-4 text-end">
            <form action="{{ route('admin.user.index') }}" method="get">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Search"
                        aria-label="Recipient's username" aria-describedby="button-addon2" value="{{ old('search') }}">
                    <button class="btn btn-warning text-white fw-bold"><i
                            class="fa-solid fa-magnifying-glass me-1"></i>Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col table-responsive" id="no-more-tables">
            <table class="table table-hover table-striped small table-sm">
                <thead>
                    <tr class="table-success">
                        <th class="numeric">Name</th>
                        <th class="numeric">Email</th>
                        <th class="numeric" width="15%">Role</th>
                        <th class="numeric">Status</th>
                        <th class="numeric" width="15%"></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($all_users as $user)
                        <tr>
                            <td data-title="Name">{{ $user->first_name . ' ' . $user->last_name }}</td>
                            <td data-title="Email">{{ $user->email }}</td>
                            <td data-title="Role">
                                <form action="{{ route('admin.user.update', $user->id) }}" method="POST" id="role_id">
                                    @csrf
                                    @method('PATCH')
                                    <select @if ($user->id === '1') disabled @endif
                                        class="form-select form-select-sm" name="user_role" id="user_role"
                                        onchange="submit()">
                                        <option @if ($user->role === '0') selected @endif value="0">Admin
                                        </option>
                                        <option @if ($user->role === '1') selected @endif value="1">User
                                        </option>
                                        <option @if ($user->role === '2') selected @endif value="2">
                                            Employee</option>
                                        <option @if ($user->role === '3') selected @endif value="3">Head
                                        </option>
                                        <option @if ($user->role === '4') selected hidden @endif value="4">
                                            HR
                                        </option>
                                        <option @if ($user->role === '5') selected hidden @endif value="5">
                                            Mayor
                                        </option>
                                        <option @if ($user->role === '6') selected hidden @endif value="6">
                                            Retired
                                        </option>
                                    </select>
                                </form>
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
                            <td data-title="">
                                <div class="btn-group btn-group-sm align-items-center" role="group"
                                    aria-label="Small button group">
                                    <a href="{{ route('admin.user.reset', $user->id) }}"
                                        class="btn btn-primary text-small fw-bold">
                                        Reset
                                    </a>
                                    @if ($user->trashed())
                                        <button class="btn btn-success text-small fw-bold"
                                            onclick="activate_user.submit()">
                                            Active
                                        </button>
                                    @else
                                        <button class="btn btn-danger text-small fw-bold" onclick="block_user.submit()">
                                            Block
                                        </button>
                                    @endif
                                </div>
                                <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST"
                                    id="block_user">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <form action="{{ route('admin.user.activate', $user->id) }}" method="POST"
                                    id="activate_user">
                                    @csrf
                                </form>
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
                {{ $all_users->links('pagination.custom') }}
            </div>
        </div>
    </div>

@endsection
