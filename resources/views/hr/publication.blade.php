@extends('layouts.app')

@section('title', 'Publication')
@section('content')
    @if ($edit_pub)
        <form action="{{ route('hr.publication.update', $edit_pub->id) }}" method="POST">
            @csrf
            @method('PATCH')
        @else
            <form action="{{ route('hr.publication.store') }}" method="POST">
                @csrf
    @endif

    <div class="row justify-content-center mx-auto">
        <h3>Add New Vacancy</h3>
        <div class="col-12 col-md-10 mt-3">
            <div class="row">
                <div class="col-12 col-sm-6 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Position Title"
                            @if ($edit_pub) value="{{ $edit_pub->title }}"
                                @else
                                value="{{ old('title') }}" @endif>
                        <label for="title">Position Title</label>
                        @error('title')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="itemno" id="itemno"
                            placeholder="Plantilla Item No."@if ($edit_pub) value="{{ $edit_pub->itemno }}"
                                @else
                                value="{{ old('itemno') }}" @endif>
                        <label for="itemno">Plantilla Item No.</label>
                        @error('itemno')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="salarygrade" id="salarygrade"
                            placeholder="Salary Grade"@if ($edit_pub) value="{{ $edit_pub->salarygrade }}"
                                @else
                                value="{{ old('salarygrade') }}" @endif>
                        <label for="salarygrade">Salary Grade</label>
                        @error('salarygrade')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="monthly" id="monthly"
                            placeholder="Monthly Salary"@if ($edit_pub) value="{{ $edit_pub->monthly }}"
                                @else
                                value="{{ old('monthly') }}" @endif>
                        <label for="monthly">Monthly Salary</label>
                        @error('monthly')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            Qualitfication
            <div class="row">
                <div class="col-12 col-sm-6 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="education" id="education"
                            placeholder="Education"@if ($edit_pub) value="{{ $edit_pub->education }}"
                                @else
                                value="{{ old('education') }}" @endif>
                        <label for="education">Education</label>
                        @error('education')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="trainig" id="trainig"
                            placeholder="Training"@if ($edit_pub) value="{{ $edit_pub->trainig }}"
                            @else
                            value="{{ old('trainig') }}" @endif>
                        <label for="trainig">Training</label>
                        @error('trainig')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="experience" id="experience"
                            placeholder="Work Experience"@if ($edit_pub) value="{{ $edit_pub->experience }}"
                                @else
                                value="{{ old('experience') }}" @endif>
                        <label for="experience">Work Experience</label>
                        @error('experience')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="eligibility" id="eligibility"
                            placeholder="Eligibility"@if ($edit_pub) value="{{ $edit_pub->eligibility }}"
                                @else
                                value="{{ old('eligibility') }}" @endif>
                        <label for="eligibility">Eligibility</label>
                        @error('eligibility')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="competency" id="competency"
                            placeholder="Competency"@if ($edit_pub) value="{{ $edit_pub->competency }}"
                                @else
                                value="{{ old('competency') }}" @endif>
                        <label for="competency">Competency</label>
                        @error('competency')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="assignment" id="assignment"
                            placeholder="Place of Assignment"@if ($edit_pub) value="{{ $edit_pub->assignment }}"
                                @else
                                value="{{ old('assignment') }}" @endif>
                        <label for="assignment">Place of Assignment</label>
                        @error('assignment')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- <div class="form-floating mb-3">
                        <select class="form-select" name="assignment" id="assignment"
                            aria-label="Floating label select example">
                            <option hidden>Select Designation</option>
                            @foreach ($all_department as $dep)
                                <option
                                    @if ($edit_pub) @if ($edit_pub->assignment === $dep->id)
                        selected @endif
                                    @endif
                                    value="{{ $dep->id }}">{{ $dep->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="assignment">Place of Assignment</label>
                        @error('assignment')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div> --}}
                </div>
            </div>
            <div class="col text-end">
                <button type="submit" class="btn btn-success w-100">
                    @if ($edit_pub)
                        <i class="fa fa-upload me-1" aria-hidden="true"></i> Save
                    @else
                        <i class="fa fa-plus me-1" aria-hidden="true"></i> Add
                    @endif
                </button>
            </div>
        </div>
    </div>
    </form>
    <hr>
    <div class="row justify-content-center">
        <h3>Publication</h3>
        <div class="col-12 col-md-10 mt-3">
            <div class="table-responsive" id="no-more-tables">
                <table class="table table-hover table-striped smnall table-sm text-center">
                    <thead>
                        <tr class="table-success">
                            <th class="numeric" width="5%">Id</th>
                            <th class="numeric">Title</th>
                            <th class="numeric">Item No.</th>
                            <th class="numeric">Salary Grade</th>
                            <th class="numeric">assignment</th>
                            <th class="numeric" width="5%"></th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse ($publication as $pub)
                            <tr>
                                <td data-title="Id">{{ $pub->id }}
                                </td>
                                <td data-title="Title">{{ $pub->title }}</td>
                                <td data-title="Item No.">{{ $pub->itemno }}
                                </td>
                                <td data-title="Salary Grade">{{ $pub->salarygrade }}
                                </td>
                                <td data-title="assignment">{{ $pub->assignment }}
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('hr.publication.edit', $pub->id) }}"
                                            class="btn btn-warning btn-sm"><i class="fa fa-pencil text-white"
                                                aria-hidden="true"></i></a>
                                        <form action="{{ route('hr.publication.destroy', $pub->id) }}" method="POST">
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
                                <td colspan="6" class="text-center">No Records</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $publication->links('pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
@endsection
{{--
@extends('layouts.app')
@section('title', 'Publication')
@section('content')
    @if ($edit_pub)
        <form action="{{ route('hr.publication.update', $edit_pub->id) }}" method="POST">
            @csrf
            @method('PATCH')
        @else
            <form action="{{ route('hr.publication.store') }}" method="POST">
                @csrf
    @endif

    <div class="row justify-content-center mx-auto">
        <h3>Add New Vacancy</h3>
        <div class="col-12 col-md-10 mt-3">
            <div class="row">
                <div class="col-12 col-sm-6 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Position Title"
                            @if ($edit_pub) value="{{ $edit_pub->title }}"
                                @else
                                value="{{ old('title') }}" @endif>
                        <label for="title">Position Title</label>
                        @error('title')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="itemno" id="itemno"
                            placeholder="Plantilla Item No."@if ($edit_pub) value="{{ $edit_pub->itemno }}"
                                @else
                                value="{{ old('itemno') }}" @endif>
                        <label for="itemno">Plantilla Item No.</label>
                        @error('itemno')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="salarygrade" id="salarygrade"
                            placeholder="Salary Grade"@if ($edit_pub) value="{{ $edit_pub->salarygrade }}"
                                @else
                                value="{{ old('salarygrade') }}" @endif>
                        <label for="salarygrade">Salary Grade</label>
                        @error('salarygrade')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="monthly" id="monthly"
                            placeholder="Monthly Salary"@if ($edit_pub) value="{{ $edit_pub->monthly }}"
                                @else
                                value="{{ old('monthly') }}" @endif>
                        <label for="monthly">Monthly Salary</label>
                        @error('monthly')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <h3>Qualitfication</h3>
            <div class="row">
                <div class="col-12 col-sm-6 col-md">
                    <div class="form-floating mb-3">
                        <select class="form-control" name="education" id="education">
                            <option hidden>Select Education</option>
                            <option
                                @if ($edit_pub) @if ($edit_pub->education == 0)
                                selected @endif
                                @endif value="0">None</option>
                            <option
                                @if ($edit_pub) @if ($edit_pub->education == 1)
                                selected @endif
                                @endif value="1">2 Years studies in college</option>
                            <option
                                @if ($edit_pub) @if ($edit_pub->education == 2)
                                selected @endif
                                @endif value="2">4 Years studies in college</option>
                            <option
                                @if ($edit_pub) @if ($edit_pub->education == 3)
                                selected @endif
                                @endif value="3">Master's Degree</option>
                        </select>
                        <label for="education">Education</label>
                        @error('education')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="trainig" id="trainig"
                            placeholder="Training"@if ($edit_pub) value="{{ $edit_pub->trainig }}"
                            @else
                            value="{{ old('trainig') }}" @endif>
                        <label for="trainig">Training</label>
                        @error('trainig')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md">
                    <div class="form-floating mb-3">
                        <select name="experience" id="eligibility"class="form-select">
                            <option hidden>Select Experience</option>
                            <option value="0">None Required</option>
                            <option value="1">1 year of relevant experience</option>
                            <option value="2">2 years of relevant experience</option>
                            <option value="3">3 years of relevant experience</option>
                            <option value="4">4 years of relevant experience</option>
                            <option value="5">5 years or more relevant experience</option>
                        </select>
                        <label for="experience">Work Experience</label>
                        @error('experience')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md">
                    <div class="form-floating mb-3">
                        <select name="eligibility" id="eligibility"class="form-select">
                            <option hidden>Select Eligibility</option>
                            <option
                                @if ($edit_pub) @if ($edit_pub->eligibility == 0)
                                    selected @endif
                                @endif value="0">None</option>
                            <option
                                @if ($edit_pub) @if ($edit_pub->eligibility == 1)
                                    selected @endif
                                @endif value="1">CS Level 1 (SubProf)</option>
                            <option
                                @if ($edit_pub) @if ($edit_pub->eligibility == 2)
                                    selected @endif
                                @endif value="2">CS Level 2 (Prof)</option>
                        </select>
                        <label for="eligibility">Eligibility</label>
                        @error('eligibility')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="competency" id="competency"
                            placeholder="Competency"@if ($edit_pub) value="{{ $edit_pub->competency }}"
                                @else
                                value="{{ old('competency') }}" @endif>
                        <label for="competency">Competency</label>
                        @error('competency')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md">
                    <div class="form-floating mb-3">
                        <select class="form-select" name="assignment" id="assignment"
                            aria-label="Floating label select example">
                            <option hidden>Select Designation</option>
                            @foreach ($all_department as $dep)
                                <option
                                    @if ($edit_pub) @if ($edit_pub->assignment === $dep->id)
                        selected @endif
                                    @endif
                                    value="{{ $dep->id }}">{{ $dep->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="assignment">Place of Assignment</label>
                        @error('assignment')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col text-end">
                <button type="submit" class="btn btn-success w-100">
                    @if ($edit_pub)
                        <i class="fa fa-upload me-1" aria-hidden="true"></i> Save
                    @else
                        <i class="fa fa-plus me-1" aria-hidden="true"></i> Add
                    @endif
                </button>
            </div>
        </div>
    </div>
    </form>
    <hr>
    <div class="row justify-content-center">
        <h3>Publication</h3>
        <div class="col-12 col-md-10 mt-3">
            <div class="table-responsive" id="no-more-tables">
                <table class="table table-hover table-striped smnall table-sm text-center">
                    <thead>
                        <tr class="table-success">
                            <th class="numeric" width="5%">Id</th>
                            <th class="numeric">Title</th>
                            <th class="numeric">Item No.</th>
                            <th class="numeric">Salary Grade</th>
                            <th class="numeric">assignment</th>
                            <th class="numeric" width="5%"></th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse ($publication as $pub)
                            <tr>
                                <td data-title="Id">{{ $pub->id }}
                                </td>
                                <td data-title="Title">{{ $pub->title }}</td>
                                <td data-title="Item No.">{{ $pub->itemno }}
                                </td>
                                <td data-title="Salary Grade">{{ $pub->salarygrade }}
                                </td>
                                <td data-title="assignment">{{ $pub->assignment }}
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('hr.publication.edit', $pub->id) }}"
                                            class="btn btn-warning btn-sm"><i class="fa fa-pencil text-white"
                                                aria-hidden="true"></i></a>
                                        <form action="{{ route('hr.publication.destroy', $pub->id) }}" method="POST">
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
                                <td colspan="6" class="text-center">No Records</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $publication->links('pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
@endsection --}}
