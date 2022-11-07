@extends('layouts.app')

@section('title', 'Civil Service')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('users.pds.index') }}"
                    class="text-decoration-none text-success">PDS</a></li>
            <li class="breadcrumb-item active" aria-current="page">Civil Service</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            @if ($edit_civil)
                <form action="{{ route('users.pds.civilservice.update', $edit_civil->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                @else
                    <form action="{{ route('users.pds.civilservice.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
            @endif
            <div class="form-floating mb-3">
                <input type="text" class="form-control text-uppercase" name="CSCareer" id="CSCareer"
                    placeholder="Basic civilation/Course/Degree"
                    @if ($edit_civil) value="{{ $edit_civil->CSCareer }}"
                    @else
                    value="{{ old('CSCareer') }}" @endif>
                <label for="CSCareer" class="form-label small">Eligibility</label>
                @error('CSCareer')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="col-12 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-uppercase" name="CSRating" id="EDpoaFROM"
                            placeholder=""
                            @if ($edit_civil) value="{{ $edit_civil->CSRating }}"
                            @else
                            value="{{ old('CSRating') }}" @endif>
                        <label for="CSRating" class="form-label small">Rating</label>
                        @error('CSRating')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md">
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control text-uppercase" name="CSDate" id="CSDate"
                            placeholder=""
                            @if ($edit_civil) value="{{ $edit_civil->CSDate }}"
                            @else
                            value="{{ old('CSDate') }}" @endif>
                        <label for="CSDate" class="form-label small">Date of Exam</label>
                        @error('CSDate')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-uppercase" name="CSPlaceExam" id="CSPlaceExam"
                            placeholder=""
                            @if ($edit_civil) value="{{ $edit_civil->CSPlaceExam }}"
                            @else
                            value="{{ old('CSPlaceExam') }}" @endif>
                        <label for="CSPlaceExam" class="small">Place of Examination</label>
                        @error('CSPlaceExam')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-uppercase" name="CSnumber" id="CSnumber"
                            placeholder=""
                            @if ($edit_civil) value="{{ $edit_civil->CSnumber }}"
                            @else
                            value="{{ old('CSnumber') }}" @endif>
                        <label for="CSnumber" class="small">License No.</label>
                        @error('CSnumber')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md">
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control text-uppercase" name="CSDateValid" id="CSDateValid"
                            placeholder=""
                            @if ($edit_civil) value="{{ $edit_civil->CSDateValid }}"
                            @else
                            value="{{ old('CSDateValid') }}" @endif>
                        <label for="CSDateValid" class="small">License Date Valid</label>
                        @error('CSDateValid')
                            <p class="text-danger small">{{ $message }}</p>
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
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col text-end">
                <button type="submit" class="btn btn-outline-success">
                    @if ($edit_civil)
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
                        <th class="numeric" width="30%">Eligibility</th>
                        <th class="numeric" width="5%">Rating</th>
                        <th class="numeric" width="5%">Date</th>
                        <th class="numeric" width="30%">Place of Exam</th>
                        <th class="numeric" width="15%">License No.</th>
                        <th class="numeric" width="5%">Date Valid</th>
                        <th class="numeric"></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($civilservice as $civil)
                        <tr>
                            <td data-title="Eligibility">{{ $civil->CSCareer }}</td>
                            <td data-title="Rating">{{ $civil->CSRating }}</td>
                            <td data-title="Date">{{ $civil->CSDate }}</td>
                            <td data-title="Place of Exam">{{ $civil->CSPlaceExam }}</td>
                            <td data-title="License No.">{{ $civil->CSnumber }}</td>
                            <td data-title="Date Valid">{{ $civil->CSDateValid }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('users.pds.civilservice.edit', $civil->id) }}"
                                        class="btn btn-warning btn-sm"><i class="fa fa-pencil text-white"
                                            aria-hidden="true"></i></a>
                                    @if ($civil->document)
                                        <a target="_blank" href="{{ asset('/storage/pdsFiles/' . $civil->document) }}"
                                            class="btn btn-dark btn-sm">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    @endif
                                    <form action="{{ route('users.pds.civilservice.destroy', $civil->id) }}"
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
                {{ $civilservice->links('pagination.custom') }}
            </div>
        </div>
    </div>
@endsection
