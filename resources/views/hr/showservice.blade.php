@extends('layouts.app')

@section('title', 'Service Record')
@section('content')
    <div class="row justify-content-center">
        <h3>Service Record of <strong>{{ $user->first_name . ' ' . $user->last_name }}</strong></h3>

        <div class="row mb-3">
            <div class="col text-start">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('hr.service.index') }}"
                                class="text-decoration-none text-success">Service Record</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <strong>{{ $user->first_name . ' ' . $user->last_name }}</strong></li>
                    </ol>
                </nav>
            </div>
            <div class="col text-end">
                <a href="#" class="btn btn-outline-success">Print Service Record</a>
            </div>
        </div>
        <hr>
        <div class="col-12 col-md-10 mt-3">
            <h1 class="h3">Add Service Record</h1>
            <div class="row mb-3">
                <form action="{{ route('hr.service.store') }}" method="POST">
                    @csrf
                    <input type="text" value="{{ $user->id }}" name="user_id" hidden>
                    <div class="row mb-3">
                        <div class="col-12 col-md mb-3">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control text-uppercase" name="from" id="from"
                                    value="{{ old('') }}">
                                <label for="from" class="form-label small">From</label>
                                @error('from')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md mb-3">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control text-uppercase" name="to" id="to"
                                    value="{{ old('to') }}">
                                <label for="to" class="form-label small">To</label>
                                @error('to')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md mb-3">
                            <div class="form-floating">
                                <select class="form-select @error('department') is-invalid @enderror"
                                    id="floatingSelect"name="department" aria-label="Floating label select example">
                                    <option value="" hidden>Select Designation</option>
                                    @foreach ($all_department as $dep)
                                        @if ($user->empPlantilla)
                                            <option value="{{ $user->empPlantilla->department->id }}" selected>
                                                {{ $dep->name }}
                                            </option>
                                        @else
                                            <option value="{{ $dep->id }}">
                                                {{ $dep->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                <label for="Incumbent" class="form-label">Designation</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-md mb-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control text-uppercase" name="status" id="status"
                                    placeholder="Status" value="{{ old('status') }}">
                                <label for="status" class="form-label small">Status</label>
                                @error('status')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md mb-3">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control text-uppercase" name="salary" id="salary"
                                    placeholder="Salary" value="{{ old('salary') }}">
                                <label for="salary" class="form-label small">Salary</label>
                                @error('salary')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md mb-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control text-uppercase" name="station" id="station"
                                    placeholder="Station/Place/Branch" value="{{ old('station') }}">
                                <label for="station" class="form-label small">Station/Place/Branch</label>
                                @error('station')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-md mb-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control text-uppercase" name="wo_pay" id="wo_pay"
                                    placeholder="L/V ABS W/O PAy" value="{{ old('wo_pay') }}">
                                <label for="wo_pay" class="form-label small">L/V ABS W/O PAy</label>
                                @error('wo_pay')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md mb-3">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control text-uppercase" name="date" id="date"
                                    placeholder="Date" value="{{ old('') }}">
                                <label for="date" class="form-label small">Date</label>
                                @error('date')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md mb-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control text-uppercase" name="cause" id="cause"
                                    placeholder="Cause" value="{{ old('cause') }}">
                                <label for="cause" class="form-label small">Cause</label>
                                @error('cause')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success w-100" type="submit">
                        {{-- @if ($edit_plan)
                            <i class="fa fa-upload me-1" aria-hidden="true"></i> Save
                        @else --}}
                        <i class="fa fa-plus me-1" aria-hidden="true"></i> Add
                        {{-- @endif --}}
                    </button>
                </form>
            </div>
            <hr>
            <div class="row mb-3">
                <h1 class="h3">Service Record History</h1>
                <div class="col">
                    {{-- table --}}
                    <div class="table-responsive" id="no-more-tables">
                        <table class="table table-hover table-striped smnall table-sm text-center">
                            <thead>
                                <tr class="table-success">
                                    <th class="numeric" width="10%">From</th>
                                    <th class="numeric" width="10%">To</th>
                                    <th class="numeric">Designation</th>
                                    <th class="numeric">Status</th>
                                    <th class="numeric">Salary</th>
                                    <th class="numeric">Date</th>
                                    <th class="numeric">Cause</th>
                                    <th class="numeric" width="5%"></th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @forelse ($service as $ser)
                                    <tr>
                                        <td>{{ $ser->from }}</td>
                                        <td>{{ $ser->to }}</td>
                                        <td>{{ $ser->department->name }}</td>
                                        <td>{{ $ser->status }}</td>
                                        <td>{{ $ser->salary }}</td>
                                        <td>{{ $ser->date }}</td>
                                        <td>{{ $ser->cause }}</td>

                                        <td>
                                            <a href="#" class="btn btn-danger"><i
                                                    class="fa-solid fa-trash-can"></i></a>
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
                            {{ $service->links('pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
