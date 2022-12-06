@extends('layouts.app')

@section('customCSS')
    <link href="{{ asset('storage/css/personal_multi_step.css') }}" rel="stylesheet">
@endsection

@section('customJS')
    <script src="{{ asset('storage/js/multi_step_form.js') }}"></script>
@endsection

@section('title', 'PDS Family Background')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('users.pds.index') }}"
                class="text-decoration-none text-success">PDS</a></li>
        <li class="breadcrumb-item active" aria-current="page">Family Background</li>
    </ol>
</nav>
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-6">

            @if ($family)
                <form id="regForm" method="post" action="{{ route('users.pds.family.update', $family->id) }}">
                    @csrf
                    @method('PATCH')
                @else
                    <form id="regForm"method="post" action="{{ route('users.pds.family.store') }}">
                        @csrf
            @endif
            <h1 id="register" class=" text-center">Family Background</h1>
            <!-- One "tab" for each step in the form: -->
            <div class="tab">
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="Slname" id="Slname" placeholder=""
                        @if ($family) value="{{ old('Slname', $family->Slname) }}"
                        @else
                        value="{{ old('Slname') }}" @endif>
                    <label for="Slname" class="form-label text-muted">Spouse Last Name</label>
                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="Sfname" id="Sfname" placeholder=""
                        @if ($family) value="{{ old('Sfname', $family->Sfname) }}"
                        @else
                        value="{{ old('Sfname') }}" @endif>
                    <label for="Sfname" class="form-label text-muted">Spouse First Name</label>
                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="Smnane" id="Smnane" placeholder=""
                        @if ($family) value="{{ old('Smnane', $family->Smnane) }}"
                        @else
                        value="{{ old('Smnane') }}" @endif>
                    <label for="Smnane" class="form-label text-muted">Spouse Middle Name</label>
                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="Ssuffix" id="Ssuffix" placeholder=""
                        @if ($family) value="{{ old('Ssuffix', $family->Ssuffix) }}"
                        @else
                        value="{{ old('Ssuffix') }}" @endif>
                    <label for="Ssuffix" class="form-label text-muted">Spouse ext</label>
                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="Soccupation" id="Soccupation" placeholder=""
                        @if ($family) value="{{ old('Soccupation', $family->Soccupation) }}"
                        @else
                        value="{{ old('Soccupation') }}" @endif>
                    <label for="Soccupation" class="form-label text-muted">Spouse Occupation</label>
                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="SempBus" id="SempBus" placeholder=""
                        @if ($family) value="{{ old('SempBus', $family->SempBus) }}"
                        @else
                        value="{{ old('SempBus') }}" @endif>
                    <label for="SempBus" class="form-label text-muted">Spouse Business</label>
                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="SBusAdd" id="SBusAdd" placeholder=""
                        @if ($family) value="{{ old('SBusAdd', $family->SBusAdd) }}"
                        @else
                        value="{{ old('SBusAdd') }}" @endif>
                    <label for="SBusAdd" class="form-label text-muted">Spouse Business Address</label>
                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="STelNo" id="STelNo" placeholder=""
                        @if ($family) value="{{ old('STelNo', $family->STelNo) }}"
                        @else
                        value="{{ old('STelNo') }}" @endif>
                    <label for="STelNo" class="form-label text-muted">Spouse Telephone Number</label>
                </div>
            </div>
            <div class="tab">
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="Flname" id="Flname" placeholder=""
                        @if ($family) value="{{ old('Flname', $family->Flname) }}"
                        @else
                        value="{{ old('Flname') }}" @endif>
                    <label for="Flname" class="form-label text-muted">Father Last Name</label>
                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="Ffname" id="Ffname" placeholder=""
                        @if ($family) value="{{ old('Ffname', $family->Ffname) }}"
                        @else
                        value="{{ old('Ffname') }}" @endif>
                    <label for="Ffname" class="form-label text-muted">Father First Name</label>
                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="Fmname" id="Fmname" placeholder=""
                        @if ($family) value="{{ old('Fmname', $family->Fmname) }}"
                        @else
                        value="{{ old('Fmname') }}" @endif>
                    <label for="Fmname" class="form-label text-muted">Father Middle Name</label>
                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="Fsuffix" id="Fsuffix" placeholder=""
                        @if ($family) value="{{ old('Fsuffix', $family->Fsuffix) }}"
                        @else
                        value="{{ old('Fsuffix') }}" @endif>
                    <label for="Fsuffix" class="form-label text-muted">Father ext</label>
                </div>
            </div>
            <div class="tab">
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="Mlname" id="Mlname" placeholder=""
                        @if ($family) value="{{ old('Mlname', $family->Mlname) }}"
                        @else
                        value="{{ old('Mlname') }}" @endif>
                    <label for="Mlname" class="form-label text-muted">Mother Maiden Last Name</label>
                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="Mfname" id="Mfname" placeholder=""
                        @if ($family) value="{{ old('Mfname', $family->Mfname) }}"
                        @else
                        value="{{ old('Mfname') }}" @endif>
                    <label for="Mfname" class="form-label text-muted">Mother First Name</label>
                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="Mmname" id="Mmname" placeholder=""
                        @if ($family) value="{{ old('Mmname', $family->Mmname) }}"
                        @else
                        value="{{ old('Mmname') }}" @endif>
                    <label for="Mmname" class="form-label text-muted">Mother Middle Name</label>
                </div>
            </div>
            <div id="waiting" style="display: none" class="my-5">
                <div class="row h-50 text-center">
                    <div class="col">

                        <div class="main">
                            <div class="balls balls-1">
                                <div class="ball ball--1"></div>
                                <div class="ball ball--2"></div>
                                <div class="ball ball--3"></div>
                                <div class="ball ball--4"></div>
                                <div class="ball ball--5"></div>
                            </div>
                        </div>
                        <br>
                        <h2>Please Wait. <br> Saving Records</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col text-start">
                    <button class="btn btn-outline-secondary" type="button" id="prevBtn"
                        onclick="nextPrev(-1)">Previous</button>
                </div>
                <div class="col text-end">
                    <button class="btn btn-success" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                </div>
            </div>
            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
            </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="row d-flex justify-content-center rounded">
        <div class="col col-md-6">
            <h1 class=" text-center">Children</h1>
            <form action="{{ route('users.pds.familyC.store') }}" method="POST">
                @csrf
                <div class="form-floating mb-1">
                    <input type="text" class="form-control text-uppercase" name="Cfullname" id="Cfullname" placeholder=""
                        value="{{ old('Cfullname') }}">
                    <label for="Cfullname" class="form-label text-muted">Full Name</label>
                    @error('Cfullname')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-floating mb-1">
                    <input type="date" class="form-control text-uppercase" name="Cbirthday" id="Cbirthday" placeholder=""
                        value="{{ old('Cbirthday') }}">
                    <label for="Cbirthday" class="form-label text-muted">Birthdate</label>
                    @error('Cbirthday')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button class="btn btn-success float-end" type="submit">Add</button>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col col-md-6 mt-3 table-responsive" id="no-more-tables">
            <table class="table table-hover table-striped small table-sm">
                <thead>
                    <tr class="table-success">
                        <th class="numeric">Full Name</th>
                        <th class="numeric">Birthdate</th>
                        <th class="numeric"></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($familyC as $fam)
                        <tr>
                            <td data-title="Full Name">{{ $fam->Cfullname }}</td>
                            <td data-title="Birthdate">{{ $fam->Cbirthday }}</td>
                            <td>
                                <form action="{{ route('users.pds.familyC.destroy', $fam->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fa-solid fa-trash-can me-1"></i> </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">No Records</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $familyC->links('pagination.custom') }}
            </div>
        </div>
    </div>
@endsection
