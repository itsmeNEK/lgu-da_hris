@extends('layouts.app')

@section('title', 'Educational Background')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('users.pds.index') }}"
                    class="text-decoration-none text-success">PDS</a></li>
            <li class="breadcrumb-item active" aria-current="page">Educational</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            @if ($edit_educ)
                <form action="{{ route('users.pds.educational.update', $edit_educ->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                @else
                    <form action="{{ route('users.pds.educational.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
            @endif
            <div class="form-floating mb-3 small">
                <select class="form-select form-select-lg" name="EDlevel" id="EDlevel">
                    <option hidden>Select Level</option>
                    <option
                        @if ($edit_educ) @if ($edit_educ->EDlevel === 'Primary')
                        selected @endif
                        @endif
                        value="Primary">Primary</option>
                    <option
                        @if ($edit_educ) @if ($edit_educ->EDlevel === 'Secondary')
                    selected @endif
                        @endif
                        value="Secondary">Secondary</option>
                    <option
                        @if ($edit_educ) @if ($edit_educ->EDlevel === 'Vocational/Trade Course')
                    selected @endif
                        @endif
                        value="Vocational/Trade Course">Vocational/Trade Course</option>
                    <option
                        @if ($edit_educ) @if ($edit_educ->EDlevel === 'College')
                    selected @endif
                        @endif
                        value="College">College</option>
                    <option
                        @if ($edit_educ) @if ($edit_educ->EDlevel === 'Graduate Studies')
                    selected @endif
                        @endif
                        value="Graduate Studies">Graduate Studies</option>
                </select>
                <label for="" class="form-label small">Level</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control text-uppercase" name="EDNameSchool" id="EDNameSchool"
                    placeholder="Name of School"
                    @if ($edit_educ) value="{{ $edit_educ->EDNameSchool }}"
                    @else
                    value="{{ old('EDNameSchool') }}" @endif>
                <label for="EDNameSchool" class="form-label small">Name of School</label>
                @error('EDNameSchool')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control text-uppercase" name="EDBEDC" id="EDBEDC"
                    placeholder="Basic Education/Course/Degree"
                    @if ($edit_educ) value="{{ $edit_educ->EDBEDC }}"
                    @else
                    value="{{ old('EDBEDC') }}" @endif>
                <label for="EDBEDC" class="form-label small">Basic Education/Course/Degree</label>
                @error('EDBEDC')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
            <div class="row mb-3">
                <h5 class="text-start">PERIOD OF ATTENDANCE</h5>
                <div class="col-12 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-uppercase" name="EDpoaFROM" id="EDpoaFROM"
                            placeholder=""
                            @if ($edit_educ) value="{{ $edit_educ->EDpoaFROM }}"
                            @else
                            value="{{ old('EDpoaFROM') }}" @endif>
                        <label for="EDpoaFROM" class="form-label small">From</label>
                        @error('EDpoaFROM')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-uppercase" name="EDpoaTO" id="datepicker"
                            placeholder=""
                            @if ($edit_educ) value="{{ $edit_educ->EDpoaTO }}"
                            @else
                            value="{{ old('EDpoaTO') }}" @endif>
                        <label for="datepicker" class="form-label small">To</label>
                        @error('EDpoaTO')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-uppercase" name="EDHLUE" id="EDHLUE"
                            placeholder=""
                            @if ($edit_educ) value="{{ $edit_educ->EDHLUE }}"
                            @else
                            value="{{ old('EDHLUE') }}" @endif>
                        <label for="EDHLUE" class="small">Highest/units Earned</label>
                    </div>
                </div>
                <div class="col-12 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-uppercase" name="EDyeargrad" id="EDyeargrad"
                            placeholder=""
                            @if ($edit_educ) value="{{ $edit_educ->EDyeargrad }}"
                            @else
                            value="{{ old('EDyeargrad') }}" @endif>
                        <label for="EDyeargrad" class="small">Year Graduated</label>
                        @error('EDyeargrad')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-uppercase" name="EDsahr" id="EDsahr"
                            placeholder=""
                            @if ($edit_educ) value="{{ $edit_educ->EDsahr }}"
                            @else
                            value="{{ old('EDsahr') }}" @endif>
                        <label for="EDsahr" class="small">Academic Honor</label>
                    </div>
                </div>
                <div class="col-12 col-md">
                    <div class="mb-3">
                        <label for="formFile" class="form-label small m-0 p-0">Upload Document</label>
                        <input name="document" class="form-control" type="file" id="formFile"
                            aria-describedby="file-info" accept=".pdf">
                        <div class="small" id="file-info">The maximun file is 25mb (PDF only)</div>
                    </div>
                </div>
            </div>
            <div class="col text-end">
                <button type="submit" class="btn btn-outline-success">
                    @if ($edit_educ)
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
            <table class="table table-hover table-striped small table-sm">
                <thead>
                    <tr class="table-success">
                        <th class="numeric" width="10%">Level</th>
                        <th class="numeric">Name</th>
                        <th class="numeric">Degree</th>
                        <th class="numeric" width="5%">From</th>
                        <th class="numeric" width="5%">To</th>
                        <th class="numeric" width="5%">Highest/Units</th>
                        <th class="numeric" width="5%">Year</th>
                        <th class="numeric" width="5%">Academic</th>
                        <th class="numeric" width="10%"></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($educational as $educ)
                        <tr>
                            <td data-title="Level">{{ $educ->EDlevel }}</td>
                            <td data-title="Name">{{ $educ->EDNameSchool }}</td>
                            <td data-title="Degree">{{ $educ->EDBEDC }}</td>
                            <td data-title="From">{{ $educ->EDpoaFROM }}</td>
                            <td data-title="To">{{ $educ->EDpoaTO }}</td>
                            <td data-title="Highest/Units">
                                @if ($educ->EDHLUE)
                                    {{ $educ->EDHLUE }}
                                @else
                                    -
                                @endif
                            </td>
                            <td data-title="Year">{{ $educ->EDyeargrad }}</td>
                            <td data-title="Academic">
                                @if ($educ->EDsahr)
                                    {{ $educ->EDsahr }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('users.pds.educational.edit', $educ->id) }}"
                                        class="btn btn-warning btn-sm"><i class="fa fa-pencil text-white"
                                            aria-hidden="true"></i></a>
                                    @if ($educ->document)
                                        <a target="_blank" href="{{ asset('/storage/pdsFiles/' . $educ->document) }}"
                                            class="btn btn-dark btn-sm">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    @endif
                                    <form action="{{ route('users.pds.educational.destroy', $educ->id) }}"
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
                {{ $educational->links('pagination.custom') }}
            </div>
        </div>
    </div>
@endsection
