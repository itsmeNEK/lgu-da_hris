@extends('layouts.app')

@section('title', 'Voluntary Work')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('users.pds.index') }}"
                    class="text-decoration-none text-success">PDS</a></li>
            <li class="breadcrumb-item active" aria-current="page">Voluntary Work</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            @if ($edit_vol)
                <form action="{{ route('users.pds.voluntarywork.update', $edit_vol->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                @else
                    <form action="{{ route('users.pds.voluntarywork.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
            @endif
            <div class="form-floating mb-3">
                <input type="text" class="form-control text-uppercase" name="VWname" id="VWname"
                    placeholder="Basic civilation/Course/Degree"
                    @if ($edit_vol) value="{{ $edit_vol->VWname }}"
                    @else
                    value="{{ old('VWname') }}" @endif>
                <label for="VWname" class="form-label small">Name of Ogranization</label>
                @error('VWname')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="col-12 col-md">
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control text-uppercase" name="VWidfrom" id="VWidfrom"
                            placeholder=""
                            @if ($edit_vol) value="{{ $edit_vol->VWidfrom }}"
                            @else
                            value="{{ old('VWidfrom') }}" @endif>
                        <label for="VWidfrom" class="form-label small">From</label>
                        @error('VWidfrom')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md">
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control text-uppercase" name="VWidto" id="VWidto"
                            placeholder=""
                            @if ($edit_vol) value="{{ $edit_vol->VWidto }}"
                            @else
                            value="{{ old('VWidto') }}" @endif>
                        <label for="VWidto" class="form-label small">To</label>
                        @error('VWidto')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-uppercase" name="VWNumHours" id="VWNumHours"
                            placeholder=""
                            @if ($edit_vol) value="{{ $edit_vol->VWNumHours }}"
                            @else
                            value="{{ old('VWNumHours') }}" @endif>
                        <label for="VWNumHours" class="small">Number of Hours</label>
                        @error('VWNumHours')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control text-uppercase" name="VWpostion" id="VWpostion" placeholder=""
                    @if ($edit_vol) value="{{ $edit_vol->VWpostion }}"
                            @else
                            value="{{ old('VWpostion') }}" @endif>
                <label for="VWpostion" class="small">Position</label>
                @error('VWpostion')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="formFile" class="form-label small m-0 p-0">Upload Document</label>
                        <input name="document" class="form-control" type="file" id="formFile"
                            aria-describedby="file-info" accept=".pdf">
                        <div class="small" id="file-info">The maximun file is 25mb (PDF only)</div>
                        @error('document')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col text-end">
                <button type="submit" class="btn btn-outline-success">
                    @if ($edit_vol)
                        <i class="fa fa-upload me-1" aria-hidden="true"></i> Save
                    @else
                        <i class="fa fa-plus me-1" aria-hidden="true"></i> Add
                    @endif
                </button>
            </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col table-responsive" id="no-more-tables">
            <table class="table table-hover table-striped smnall table-sm">
                <thead>
                    <tr class="table-success">
                        <th class="numeric" width="30%">Position Title</th>
                        <th class="numeric" width="10%">From</th>
                        <th class="numeric" width="10%">To</th>
                        <th class="numeric" width="10%">Number of Hours</th>
                        <th class="numeric" width="30%">Position</th>
                        <th class="numeric"></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($voluntarywork as $vol)
                        <tr>
                            <td data-title="Position Title">{{ $vol->VWname }}</td>
                            <td data-title="From">{{ $vol->VWidfrom }}</td>
                            <td data-title="To">{{ $vol->VWidto }}</td>
                            <td data-title="Number of Hours">{{ $vol->VWNumHours }}</td>
                            <td data-title="Position">{{ $vol->VWpostion }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('users.pds.voluntarywork.edit', $vol->id) }}"
                                        class="btn btn-warning btn-sm"><i class="fa fa-pencil text-white"
                                            aria-hidden="true"></i></a>
                                    @if ($vol->document)
                                        <a target="_blank" href="{{ asset('/storage/pdsFiles/' . $vol->document) }}"
                                            class="btn btn-dark btn-sm">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    @endif
                                    <form action="{{ route('users.pds.voluntarywork.destroy', $vol->id) }}"
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
                {{ $voluntarywork->links('pagination.custom') }}
            </div>
        </div>
    </div>
@endsection
