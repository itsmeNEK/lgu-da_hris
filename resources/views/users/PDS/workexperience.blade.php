@extends('layouts.app')

@section('title', 'Work Experience')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('users.pds.index') }}"
                    class="text-decoration-none text-success">PDS</a></li>
            <li class="breadcrumb-item active" aria-current="page">Work Experience</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col text-start">
            <a href="{{ route('users.pds.civilservice.index') }}" class="btn btn-outline-success">Civil Service<i class="fa-solid fa-chevron-left ms-2"></i></a>
        </div>
        <div class="col text-center">
            <strong>Go to</strong>
        </div>
        <div class="col text-end">
            <a href="{{ route('users.pds.voluntarywork.index') }}" class="btn btn-outline-success"><i class="fa-solid fa-chevron-right me-2"></i>Voluntary Work</a>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            @if ($edit_work)
                <form action="{{ route('users.pds.workexperience.update', $edit_work->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                @else
                    <form action="{{ route('users.pds.workexperience.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
            @endif
            <div class="row mb-3">
                <div class="col-12 col-md">
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control text-uppercase" name="WEidfrom" id="WEidfrom"
                            placeholder=""
                            @if ($edit_work) value="{{ $edit_work->WEidfrom }}"
                            @else
                            value="{{ old('WEidfrom') }}" @endif>
                        <label for="WEidfrom" class="form-label small">From</label>
                        @error('WEidfrom')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md">
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control text-uppercase" name="WEidto" id="WEidto"
                            placeholder=""
                            @if ($edit_work) value="{{ $edit_work->WEidto }}"
                            @else
                            value="{{ old('WEidto') }}" @endif>
                        <label for="WEidto" class="form-label small">To</label>
                        @error('WEidto')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control text-uppercase" name="WEpostit" id="WEpostit"
                    placeholder="Basic civilation/Course/Degree"
                    @if ($edit_work) value="{{ $edit_work->WEpostit }}"
                    @else
                    value="{{ old('WEpostit') }}" @endif>
                <label for="WEpostit" class="form-label small">Position Title</label>
                @error('WEpostit')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="col-12 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-uppercase" name="WEdepagen" id="WEdepagen"
                            placeholder=""
                            @if ($edit_work) value="{{ $edit_work->WEdepagen }}"
                            @else
                            value="{{ old('WEdepagen') }}" @endif>
                        <label for="WEdepagen" class="small">Department / Agency</label>
                        @error('WEdepagen')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-uppercase" name="WEmonthsal" id="WEmonthsal"
                            placeholder=""
                            @if ($edit_work) value="{{ $edit_work->WEmonthsal }}"
                            @else
                            value="{{ old('WEmonthsal') }}" @endif>
                        <label for="WEmonthsal" class="small">Monthly Salary</label>
                        @error('WEmonthsal')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-uppercase" name="WEsalaryjob" id="WEsalaryjob"
                            placeholder=""
                            @if ($edit_work) value="{{ $edit_work->WEsalaryjob }}"
                            @else
                            value="{{ old('WEsalaryjob') }}" @endif>
                        <label for="WEsalaryjob" class="small">Salary Grade</label>
                        @error('WEsalaryjob')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-uppercase" name="WEstatus" id="WEstatus"
                            placeholder=""
                            @if ($edit_work) value="{{ $edit_work->WEstatus }}"
                            @else
                            value="{{ old('WEstatus') }}" @endif>
                        <label for="WEstatus" class="small">Status of Employement</label>
                        @error('WEstatus')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-uppercase" name="WEgovser" id="WEgovser"
                            placeholder=""
                            @if ($edit_work) value="{{ $edit_work->WEgovser }}"
                            @else
                            value="{{ old('WEgovser') }}" @endif>
                        <label for="WEgovser" class="small">Gov't Service Y/N</label>
                        @error('WEgovser')
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
                    @if ($edit_work)
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
                        <th class="numeric" width="5%">From</th>
                        <th class="numeric" width="5%">To</th>
                        <th class="numeric" width="30%">Position Title</th>
                        <th class="numeric" width="30%">Department/Agency</th>
                        <th class="numeric" width="5%">Monthly Salary</th>
                        <th class="numeric" width="5%">Salary Grade</th>
                        <th class="numeric" width="5%">Status</th>
                        <th class="numeric" width="5%">Gov't Service</th>
                        <th class="numeric"></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($workexperience as $work)
                        <tr>
                            <td data-title="From">{{ $work->WEidfrom }}</td>
                            <td data-title="To">{{ $work->WEidto }}</td>
                            <td data-title="Position Title">{{ $work->WEpostit }}</td>
                            <td data-title="Department/Agency">{{ $work->WEdepagen }}</td>
                            <td data-title="Monthly Salary">{{ $work->WEmonthsal }}</td>
                            <td data-title="Salary Grade">{{ $work->WEsalaryjob }}</td>
                            <td data-title="Status">{{ $work->WEstatus }}</td>
                            <td data-title="Gov't Yervice">{{ $work->WEgovser }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('users.pds.workexperience.edit', $work->id) }}"
                                        class="btn btn-warning btn-sm"><i class="fa fa-pencil text-white"
                                            aria-hidden="true"></i></a>
                                    @if ($work->document)
                                        <a target="_blank" href="{{ asset('/storage/pdsFiles/' . $work->document) }}"
                                            class="btn btn-dark btn-sm">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    @endif
                                    <form action="{{ route('users.pds.workexperience.destroy', $work->id) }}"
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
                {{ $workexperience->links('pagination.custom') }}
            </div>
        </div>
    </div>
@endsection
