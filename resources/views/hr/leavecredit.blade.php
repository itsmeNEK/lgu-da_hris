@extends('layouts.app')

@section('title', 'Employee Leave Credit')
@section('content')
    <div class="row justify-content-center">
        <h3>Employees</h3>
        <div class="col-12 col-md-10 mt-3">
            {{-- search --}}
            <div class="row justify-content-end">
                <div class="col-12 col-md-4 text-end">
                    <form action="{{ route('hr.leave.index') }}" method="get">
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
            {{-- table --}}
            <div class="table-responsive" id="no-more-tables">
                <table class="table table-hover table-striped smnall table-sm text-center">
                    <thead>
                        <tr class="table-success">
                            <th class="numeric" width="5%">No.</th>
                            <th class="numeric">Employee</th>
                            <th class="numeric" width="12%">VL Balance</th>
                            <th class="numeric" width="12%">SL Balance</th>
                            <th class="numeric" width="30%"></th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse ($users as $user)
                            <tr>
                                <td data-title="No.">
                                    @if ($user->empPlantilla)
                                        {{ $user->empPlantilla->EPno }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td data-title="Employee">{{ $user->first_name . ' ' . $user->last_name }}</td>
                                <td data-title="VL Balance">
                                    @if ($user->leaveCreditlatest)
                                        {{ $user->leaveCreditlatest->elc_vl_balance }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td data-title="SL Balance">
                                    @if ($user->leaveCreditlatest)
                                        {{ $user->leaveCreditlatest->elc_sl_balance }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('hr.leave.show',$user->id) }}" class="btn btn-warning btn-sm text-white fw-bold"><i
                                                class="fa fa-plus me-1" aria-hidden="true"></i>Tardiness</a>
                                        <a href="{{ route('hr.leave.edit',$user->id) }}" class="btn btn-primary btn-sm text-white fw-bold"><i
                                                class="fa fa-eye me-1" aria-hidden="true"></i>LeaveCard</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">No Records</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $users->links('pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
@endsection
