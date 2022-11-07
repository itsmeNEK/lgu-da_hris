@extends('layouts.app')

@section('title', 'Plantilla Management')
@section('content')

    <div class="row justify-content-center">
        <h2>Department</h2>
        <div class="col-12 col-md-4">
            @if ($edit_dep)
                <form action="{{ route('admin.department.update', $edit_dep->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                @else
                    <form action="{{ route('admin.department.store') }}" method="POST">
                        @csrf
            @endif
            <div class="form-floating mb-3">
                <input type="text" class="form-control text-uppercase @error('name') is-invalid @enderror" name="name"
                    id="formId1" placeholder="Department Name"
                    @if ($edit_dep) value="{{ old('name', $edit_dep->name) }}"
                @else
                value="{{ old('name') }}" @endif>
                <label for="formId1">Department Name</label>
                @error('name')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
            <button class="btn btn-success" type="submit">
                @if ($edit_dep)
                    <i class="fa fa-upload me-1" aria-hidden="true"></i> Save
                @else
                    <i class="fa fa-plus me-1" aria-hidden="true"></i> Add
                @endif
            </button>
            </form>
        </div>
        <div class="col-12 col-md">
            <div class="table-responsive" id="no-more-tables">
                <table class="table table-hover table-striped smnall table-sm">
                    <thead>
                        <tr class="table-success">
                            <th class="numeric" width="5%">ID</th>
                            <th class="numeric">Name</th>
                            <th class="numeric" width="5%">Edit/Delete</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse ($all_department as $department)
                            <tr>
                                <td data-title="ID">{{ $department->id }}</td>
                                <td data-title="Department">{{ $department->name }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('admin.department.edit', $department->id) }}"
                                            class="btn btn-warning btn-sm"><i class="fa fa-pencil text-white"
                                                aria-hidden="true"></i></a>
                                        <form action="{{ route('admin.department.destroy', $department->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm rounded-0 rounded-end"><i
                                                    class="fa-solid fa-trash-can me-1"></i> </button>
                                        </form>
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
                    {{ $all_department->links('pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center mt-5">
        <h2>Employee Plantilla</h2>
        <div class="col-12 col-md-10">
            @if ($edit_plan)
                <form action="{{ route('hr.plantilla.update', $edit_plan->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                @else
                    <form action="{{ route('hr.plantilla.store') }}" method="POST">
                        @csrf
            @endif
            <div class="row mb-3">
                <div class="col-12 col-md-2">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('EPno') is-invalid @enderror" name="EPno"
                            id="formId1" placeholder="Plantilla No."
                            @if ($edit_plan) value="{{ old('EPno', $edit_plan->EPno) }}"
                        @else
                        value="{{ old('EPno') }}" @endif>
                        <label for="formId1">Plantilla No.</label>
                        @error('EPno')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-uppercase @error('EPposition') is-invalid @enderror"
                            name="EPposition" id="formId1" placeholder="Position Title"
                            @if ($edit_plan) value="{{ old('EPposition', $edit_plan->EPposition) }}"
                        @else
                        value="{{ old('EPposition') }}" @endif>
                        <label for="formId1">Position title</label>
                        @error('EPposition')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect"name="incumbent"
                            aria-label="Floating label select example">
                            <option value="" hidden>Select Incumbent</option>
                            @foreach ($all_user as $user)
                                @if ($edit_plan)
                                    <option @if ($edit_plan->user_id === $user->id) selected @endif value="{{ $user->id }}">
                                        {{ $user->first_name . ' ' . $user->last_name }}
                                    </option>
                                @else
                                    @if (!$user->empWithPlantilla($user->id))
                                        <option value="{{ $user->id }}">
                                            {{ $user->first_name . ' ' . $user->last_name }}
                                        </option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                        <label for="Incumbent" class="form-label">Incumbent</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-md-6">
                    <div class="form-floating">
                        <select class="form-select @error('department') is-invalid @enderror"
                            id="floatingSelect"name="department" aria-label="Floating label select example">
                            <option value="" hidden>Select Department</option>
                            @foreach ($all_department as $dep)
                                <option @if ($edit_plan) @if ($edit_plan->dep_id === $dep->id) selected @endif
                                    @endif value="{{ $dep->id }}">
                                    {{ $dep->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="Incumbent" class="form-label">Department</label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect"name="EPdesignation"
                            aria-label="Floating label select example">
                            <option hidden>Select Designation</option>
                            @foreach ($all_department as $dep)
                                <option
                                    @if ($edit_plan) @if ($edit_plan->EPdesignation === $dep->id)
                                selected @endif
                                    @endif
                                    value="{{ $dep->id }}">{{ $dep->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="Incumbent" class="form-label">Designation</label>
                    </div>
                </div>
            </div>
            <button class="btn btn-success" type="submit">
                @if ($edit_plan)
                    <i class="fa fa-upload me-1" aria-hidden="true"></i> Save
                @else
                    <i class="fa fa-plus me-1" aria-hidden="true"></i> Add
                @endif
            </button>
            <hr>
            </form>
            <div class="row justify-content-end">
                <div class="col-12 col-md-4 text-end">
                    <form action="{{ route('hr.plantilla.index') }}" method="get">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" placeholder="Search Position"
                                aria-label="Recipient's username" aria-describedby="button-addon2"
                                value="{{ old('search') }}">
                            <button class="btn btn-warning text-white fw-bold"><i
                                    class="fa-solid fa-magnifying-glass me-1"></i>Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-10 mt-3">
            <div class="table-responsive" id="no-more-tables">
                <table class="table table-hover table-striped smnall table-sm">
                    <thead>
                        <tr class="table-success">
                            <th class="numeric" width="5%">No.</th>
                            <th class="numeric">Position title</th>
                            <th class="numeric">Incumbent</th>
                            <th class="numeric">Department</th>
                            <th class="numeric">Designation</th>
                            <th class="numeric" width="5%"></th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse ($all_plantilla as $plantilla)
                            <tr>
                                <td data-title="No">{{ $plantilla->EPno }}</td>
                                <td data-title="Position">{{ $plantilla->EPposition }}</td>
                                <td data-title="Incumbent">
                                    @if ($plantilla->user_id)
                                        {{ $plantilla->user->first_name . ' ' . $plantilla->user->last_name }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td data-title="Department">
                                    {{ $plantilla->department->name }}
                                </td>
                                <td data-title="Designation">
                                    @if ($plantilla->EPdesignation)
                                        {{ $plantilla->designation->name }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('hr.plantilla.edit', $plantilla->id) }}"
                                            class="btn btn-warning btn-sm"><i class="fa fa-pencil text-white"
                                                aria-hidden="true"></i></a>
                                        <form action="{{ route('hr.plantilla.destroy', $plantilla->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm rounded-0 rounded-end"><i
                                                    class="fa-solid fa-trash-can me-1"></i> </button>
                                        </form>
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
                    {{ $all_plantilla->links('pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
@endsection
