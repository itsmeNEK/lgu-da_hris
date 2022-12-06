@extends('layouts.app')

@section('title', 'Learning and Development')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('users.pds.index') }}"
                    class="text-decoration-none text-success">PDS</a></li>
            <li class="breadcrumb-item active" aria-current="page">Learning and Development</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            @if ($edit_lnd)
                <form action="{{ route('users.pds.learningdevelopment.update', $edit_lnd->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                @else
                    <form action="{{ route('users.pds.learningdevelopment.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
            @endif
            <div class="form-floating mb-3">
                <input type="text" class="form-control text-uppercase" name="LDtitle" id="LDtitle"
                    placeholder="Basic civilation/Course/Degree"
                    @if ($edit_lnd) value="{{ $edit_lnd->LDtitle }}"
                    @else
                    value="{{ old('LDtitle') }}" @endif>
                <label for="LDtitle" class="form-label small">Title</label>
                @error('LDtitle')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="col-12 col-md">
                    <div class="form-floating mb-3">
                        <input type="datetime-local" class="form-control text-uppercase" name="LDidfrom" id="LDidfrom"
                            placeholder=""
                            @if ($edit_lnd) value="{{ $edit_lnd->LDidfrom }}"
                            @else
                            value="{{ old('LDidfrom') }}" @endif>
                        <label for="LDidfrom" class="form-label small">From</label>
                        @error('LDidfrom')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md">
                    <div class="form-floating mb-3">
                        <input type="datetime-local" class="form-control text-uppercase" name="LDidto" id="LDidto"
                            placeholder=""
                            @if ($edit_lnd) value="{{ $edit_lnd->LDidto }}"
                            @else
                            value="{{ old('LDidto') }}" @endif>
                        <label for="LDidto" class="form-label small">To</label>
                        @error('LDidto')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-md">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control text-uppercase" name="LDnumhour" id="LDnumhour"
                            placeholder=""
                            @if ($edit_lnd) value="{{ $edit_lnd->LDnumhour }}"
                            @else
                            value="{{ old('LDnumhour') }}" @endif>
                        <label for="LDnumhour" class="small">Number of Hours</label>
                        @error('LDnumhour')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb3">
                <div class="col-12 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-uppercase" name="LDtype" id="LDtype"
                            placeholder=""
                            @if ($edit_lnd) value="{{ $edit_lnd->LDtype }}"
                            @else
                            value="{{ old('LDtype') }}" @endif>
                        <label for="LDtype" class="small">Type</label>
                        @error('LDtype')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-uppercase" name="LDconducted" id="LDconducted"
                            placeholder=""
                            @if ($edit_lnd) value="{{ $edit_lnd->LDconducted }}"
                            @else
                            value="{{ old('LDconducted') }}" @endif>
                        <label for="LDconducted" class="small">Conducted / Sponsored By</label>
                        @error('LDconducted')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
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
                    @if ($edit_lnd)
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
                        <th class="numeric" width="30%">Type</th>
                        <th class="numeric" width="30%">Conducted</th>
                        <th class="numeric"></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($learningdevelopment as $lnd)
                        <tr>
                            <td data-title="Position Title">{{ $lnd->LDtitle }}</td>
                            <td data-title="From">{{ $lnd->LDidfrom }}</td>
                            <td data-title="To">{{ $lnd->LDidto }}</td>
                            <td data-title="Number of Hours">{{ $lnd->LDnumhour }}</td>
                            <td data-title="Type">{{ $lnd->LDtype }}</td>
                            <td data-title="Conducted">{{ $lnd->LDconducted }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('users.pds.learningdevelopment.edit', $lnd->id) }}"
                                        class="btn btn-warning btn-sm"><i class="fa fa-pencil text-white"
                                            aria-hidden="true"></i></a>
                                    @if ($lnd->document)
                                        <a target="_blank" href="{{ asset('/storage/pdsFiles/' . $lnd->document) }}"
                                            class="btn btn-dark btn-sm">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    @endif
                                    <form action="{{ route('users.pds.learningdevelopment.destroy', $lnd->id) }}"
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
                {{ $learningdevelopment->links('pagination.custom') }}
            </div>
        </div>
    </div>
@endsection
