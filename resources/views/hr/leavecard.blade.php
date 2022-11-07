@extends('layouts.app')

@section('title', 'Leave Card')
@section('content')


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('hr.leave.index') }}"
                class="text-decoration-none text-success">Leave Credit</a></li>
        <li class="breadcrumb-item active" aria-current="page">Leave Card</li>
    </ol>
</nav>

    <div class="row justify-content-center">
        <h3>Leave Card of <span class="fw-bold"> {{ $user->first_name . ' ' . $user->last_name }}</span></h3>
        <div class="col-12 col-md-10 mt-3">
            <div class="table-responsive" id="no-more-tables">
                <table class="table table-hover table-striped smnall table-sm text-center table-border">
                    <thead>
                        <tr class="table-success">
                            <th class="numeric" width="10%">From</th>
                            <th class="numeric" width="10%">To</th>
                            <th class="numeric" width="10%">Particular</th>
                            <th class="numeric">VL Balance</th>
                            <th class="numeric">SL Balance</th>
                            <th class="numeric">Remarks</th>
                            <th class="numeric" width="10%"></th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse ($leavecard as $leave)
                            <tr>
                                <td data-title="From">{{ $leave->elc_period_from }}</td>
                                <td data-title="To">{{ $leave->elc_period_to }}</td>
                                <td data-title="Particular">{{ $leave->elc_particular }}</td>
                                <td data-title="VL Balance">{{ $leave->elc_vl_balance }}</td>
                                <td data-title="SL Balance">{{ $leave->elc_sl_balance }}</td>
                                <td data-title="Remarks">{{ $leave->elc_remarks }}</td>
                                <td>
                                    <form action="{{ route('hr.leave.destroy',$leave->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                class="fa-solid fa-trash-can me-1"></i> </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $leavecard->links('pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
@endsection
