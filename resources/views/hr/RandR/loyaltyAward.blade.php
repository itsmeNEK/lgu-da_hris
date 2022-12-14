@extends('layouts.app')

@section('title', 'Loyalty Award')
@section('content')
    <div class="row justify-content-center">
        <h3>Loyalty Award</h3>
        <div class="col-12 col-md-10 mt-3">

            <div class="row mb-3">
                <h1 class="h3">Service Record History</h1>
                <div class="col">
                    {{-- table --}}
                    <div class="table-responsive" id="no-more-tables">
                        <table class="table table-hover table-striped smnall table-sm text-center">
                            <thead>
                                <tr class="table-success">
                                    <th class="numeric" width="20%">Employee</th>
                                    <th class="numeric">Department</th>
                                    <th class="numeric">Years in Service</th>
                                    <th class="numeric" colspan="2" width="20%">Next Loyalty Pay</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @forelse ($all_users as $user)
                                    <tr>
                                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                        <td>
                                            @if ($user->empPlantilla)
                                                {{ $user->empPlantilla->department->name }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if ($user->hasloyaltyRecord())
                                                {{ $user->loyaltyRecord->year_difference }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if ($user->hasloyaltyRecord())
                                            {{ date('M, d Y',strtotime($user->loyaltyRecord->next_loyalty)) }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if ($user->hasloyaltyRecord())
                                            | {{ \Carbon\Carbon::parse($user->loyaltyRecord->next_loyalty)->diffForHumans() }}
                                            @else
                                                -
                                            @endif
                                        </td>

                                        {{-- <td> ->diffForHumans()
                                            <a href="#" class="btn btn-danger"><i
                                                    class="fa-solid fa-trash-can"></i></a>
                                        </td> --}}
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No Records</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $all_users->links('pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
