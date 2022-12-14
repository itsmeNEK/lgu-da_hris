@extends('layouts.app')

@section('title', 'Service Record')
@section('content')
    <div class="row justify-content-center">
        <h3>Employees</h3>
        <div class="col-12 col-md-10 mt-3">
            {{-- search --}}
            <div class="row justify-content-end">
                <div class="col-12 col-md-4 text-end">
                    <form action="{{ route('hr.service.index') }}" method="get">
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
                            <th class="numeric">Designation</th>
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
                                <td>{{ $user->first_name . ' ' . $user->last_name }}</td>

                                <td data-title="Designation">
                                    @if ($user->empPlantilla)
                                        {{ $user->empPlantilla->department->name }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <a href="#" class="btn btn-warning" title="Print Service Record"><i
                                            class="fa-solid fa-print"></i></a>
                                    <a href="{{ route('hr.service.show', $user->id) }}" class="btn btn-success" title="Open Service Record">
                                        <i class="fa-solid fa-pen-to-square"></i></a>
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
