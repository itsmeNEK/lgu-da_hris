@extends('layouts.app')

@section('title', 'Learning and Development')
@section('content')
    <div class="row justify-content-center">
        <h3>Learning and Development</h3>
        <div class="col-12 mt-3">
            <div class="table-responsive" id="no-more-tables">
                <table class="table table-hover table-striped smnall table-sm text-center">
                    <thead>
                        <tr class="table-success">
                            <th class="numeric" width="10%">Employee</th>
                            <th class="numeric">Position Title</th>
                            <th class="numeric" width="8%">From</th>
                            <th class="numeric" width="8%">To</th>
                            <th class="numeric" width="8%">Hours</th>
                            <th class="numeric" width="10%">Type</th>
                            <th class="numeric" width="10%">Conducted</th>
                            <th class="numeric" width="5%"></th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse ($learningdevelopment as $lnd)
                           @if ($lnd->user->role != 1 || $lnd->user->role != 6)
                           <tr>
                            <td data-title="Position Title">{{ $lnd->user->first_name }}</td>
                            <td data-title="Position Title">{{ $lnd->LDtitle }}</td>
                            <td data-title="From">{{ $lnd->LDidfrom }}</td>
                            <td data-title="To">{{ $lnd->LDidto }}</td>
                            <td data-title="Number of Hours">{{ $lnd->LDnumhour }}</td>
                            <td data-title="Type">{{ $lnd->LDtype }}</td>
                            <td data-title="Conducted">{{ $lnd->LDconducted }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    @if ($lnd->document)
                                        <a target="_blank" href="{{ asset('/storage/pdsFiles/' . $lnd->document) }}"
                                            class="btn btn-dark btn-sm">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>

                           @endif
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">No Records</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $learningdevelopment->links('pagination.custom') }}
                </div>
            </div>
        </div>
    </div>


@endsection
