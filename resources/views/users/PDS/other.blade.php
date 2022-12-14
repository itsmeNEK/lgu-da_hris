@extends('layouts.app')

@section('title', "Other's")
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('users.pds.index') }}"
                    class="text-decoration-none text-success">PDS</a></li>
            <li class="breadcrumb-item active" aria-current="page">Other</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col text-start">
            <a href="{{ route('users.pds.otherinformation.index') }}" class="btn btn-outline-success">Other Information<i class="fa-solid fa-chevron-left ms-2"></i></a>
        </div>
        <div class="col text-center">
            <strong>Go to</strong>
        </div>
        <div class="col text-end">

        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            @if ($edit_other)
                <form action="{{ route('users.pds.other.update', $edit_other->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                @else
                    <form action="{{ route('users.pds.other.store') }}" method="POST">
                        @csrf
            @endif
            <div class="row mb-3">
                <p class="">34. Are you related by consanguinity or affinity to the appointing or recommending
                    authority, or to the chief of bureau or office or to the person who has immediate supervision over
                    you in the Office, Bureau or Department where you will be apppointed,</p>
                <div class="col-12 col-md">
                    <p class="text-center">a. within the third degree?</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="Q34a" name="Q34a"
                            @if ($edit_other) @if ($edit_other->Q34a) checked @endif @endif value="true">
                        <label class="form-check-label" for="Q34a">No</label>
                    </div>
                </div>
                <div class="col-12 col-md">
                    <p class="text-center">b. within the fourth degree (for Local Government Unit - Career Employees)?
                    </p>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Q34b" value="true"
                                    @if ($edit_other) @if ($edit_other->Q34b) checked @endif
                                    @endif
                                name="Q34b">
                                <label class="form-check-label" for="Q34b">No</label>
                            </div>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="Q34b1"
                                @if ($edit_other) value="{{ old('Q34b1', $edit_other->Q34b1) }}"
                           @else
                           value="{{ old('Q34b1') }}" @endif
                                placeholder="if yes, give details">
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                <p class="">35.</p>
                <div class="col-12 col-md">
                    <p class="text-center">a. Have you ever been found guilty of any administrative offense?</p>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Q35a" value="true" name="Q35a"
                                    @if ($edit_other) @if ($edit_other->Q35a) checked @endif
                                    @endif
                                placeholder="if yes, give details">
                                <label class="form-check-label" for="Q35a">No</label>
                            </div>
                        </div>
                        <div class="col">
                            <input type="text"class="form-control" name="Q35a1"
                                @if ($edit_other) value="{{ old('Q35a1', $edit_other->Q35a1) }}"
                           @else
                           value="{{ old('Q35a1') }}" @endif
                                placeholder="if yes, give details">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md">
                    <p class="text-center">b. Have you been criminally charged before any court?
                    </p>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Q35b" value="true" name="Q35b"
                                    @if ($edit_other) @if ($edit_other->Q35b) checked @endif
                                    @endif
                                >
                                <label class="form-check-label" for="Q35b">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col">
                            <input type="text" id="Q35b1" class="form-control" name="Q35b1"
                                @if ($edit_other) value="{{ old('Q35b1', $edit_other->Q35b1) }}"
                           @else
                           value="{{ old('Q35b1') }}" @endif
                                placeholder="Date Filed">
                        </div>
                        <div class="col">
                            <input type="text" id="Q35b2" class="form-control" name="Q35b2"
                                @if ($edit_other) value="{{ old('Q35b2', $edit_other->Q35b2) }}"
                           @else
                           value="{{ old('Q35b2') }}" @endif
                                placeholder="Status of Case/s">
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                <p class="">36. Have you ever been convicted of any crime or violation of any law, decree,
                    ordinance or regulation by any court or tribunal?</p>
                <div class="col-12 col-md">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Q36a" value="true" name="Q36a"
                                    @if ($edit_other) @if ($edit_other->Q36a) checked @endif
                                    @endif
                                >
                                <label class="form-check-label" for="Q36a">No</label>
                            </div>
                        </div>
                        <div class="col">
                            <input type="text"class="form-control" name="Q36a1"
                                @if ($edit_other) value="{{ old('Q36a1', $edit_other->Q36a1) }}"
                           @else
                           value="{{ old('Q36a1') }}" @endif
                                placeholder="if yes, give details">
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                <p class="">37. Have you ever been separated from the service in any of the following modes:
                    resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished
                    contract or phased out (abolition) in the public or private sector?</p>
                <div class="col-12 col-md">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Q37a"
                                    value="true"name="Q37a"
                                    @if ($edit_other) @if ($edit_other->Q37a) checked @endif
                                    @endif
                                >
                                <label class="form-check-label" for="Q37a">No</label>
                            </div>
                        </div>
                        <div class="col">
                            <input type="text"class="form-control" name="Q37a1"
                                @if ($edit_other) value="{{ old('Q37a1', $edit_other->Q37a1) }}"
                           @else
                           value="{{ old('Q37a1') }}" @endif
                                placeholder="if yes, give details">
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                <p class="">38.</p>
                <div class="col-12 col-md">
                    <p class="text-center">a. Have you ever been a candidate in a national or local election held
                        within the last year (except Barangay election)?</p>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Q38a" value="true"
                                    name="Q38a"
                                    @if ($edit_other) @if ($edit_other->Q38a) checked @endif
                                    @endif
                                >
                                <label class="form-check-label" for="Q38a">No</label>
                            </div>
                        </div>
                        <div class="col">
                            <input type="text"class="form-control" name="Q38a1"
                                @if ($edit_other) value="{{ old('Q38a1', $edit_other->Q38a1) }}"
                           @else
                           value="{{ old('Q38a1') }}" @endif
                                placeholder="if yes, give details">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md">
                    <p class="text-center">b. Have you resigned from the government service during the three (3)-month
                        period before the last election to promote/actively campaign for a national or local candidate?
                    </p>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Q38b" value="true"
                                    name="Q38b"
                                    @if ($edit_other) @if ($edit_other->Q38b) checked @endif
                                    @endif
                                >
                                <label class="form-check-label" for="Q38b">No</label>
                            </div>
                        </div>
                        <div class="col">
                            <input type="text" id="Q38b1" class="form-control" name="Q38b1"
                                @if ($edit_other) value="{{ old('Q38b1', $edit_other->Q38b1) }}"
                           @else
                           value="{{ old('Q38b1') }}" @endif
                                placeholder="if yes, give details">
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                <p class="">39. Have you acquired the status of an immigrant or permanent resident of another
                    country?</p>
                <div class="col-12 col-md">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Q39a" value="true"
                                    name="Q39a"
                                    @if ($edit_other) @if ($edit_other->Q39a) checked @endif
                                    @endif
                                >
                                <label class="form-check-label" for="Q39a">No</label>
                            </div>
                        </div>
                        <div class="col">
                            <input type="text"class="form-control" name="Q39a1"
                                @if ($edit_other) value="{{ old('Q39a1', $edit_other->Q39a1) }}"
                           @else
                           value="{{ old('Q39a1') }}" @endif
                                placeholder="if yes, give details">
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                <p class="">40. Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled
                    Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following
                    items:</p>
                <div class="col-12 col-md">
                    <p class="text-center">a. Are you a member of any indigenous group?</p>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Q40a" value="true"
                                    name="Q40a"
                                    @if ($edit_other) @if ($edit_other->Q40a) checked @endif
                                    @endif
                                >
                                <label class="form-check-label" for="Q40a">No</label>
                            </div>
                        </div>
                        <div class="col">
                            <input type="text"class="form-control" name="Q40a1"
                                @if ($edit_other) value="{{ old('Q40a1', $edit_other->Q40a1) }}"
                           @else
                           value="{{ old('Q40a1') }}" @endif
                                placeholder="if yes, give details">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md">
                    <p class="text-center">b. Are you a person with disability?
                    </p>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Q40b" value="true"
                                    name="Q40b"
                                    @if ($edit_other) @if ($edit_other->Q40b) checked @endif
                                    @endif
                                >
                                <label class="form-check-label" for="Q40b">No</label>
                            </div>
                        </div>
                        <div class="col">
                            <input type="text" id="Q40b1" class="form-control" name="Q40b1"
                                @if ($edit_other) value="{{ old('Q40b1', $edit_other->Q40b1) }}"
                           @else
                           value="{{ old('Q40b1') }}" @endif
                                placeholder="if yes, give details">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md">
                    <p class="text-center">c. Are you a solo parent?
                    </p>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Q40c" value="true"
                                    name="Q40c"
                                    @if ($edit_other) @if ($edit_other->Q40c) checked @endif
                                    @endif
                                >
                                <label class="form-check-label" for="Q40c">No</label>
                            </div>
                        </div>
                        <div class="col">
                            <input type="text" id="Q40c1" class="form-control" name="Q40c1"
                                @if ($edit_other) value="{{ old('Q40c1', $edit_other->Q40c1) }}"
                           @else
                           value="{{ old('Q40c1') }}" @endif
                                placeholder="if yes, give details">
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <p>REFERENCES (<span class="text-danger">Person not related by consanguinity or affinity to applicant
                    /appointee</span>)</p>
            <div class="row mb-3">
                <div class="col-12 col-md">
                    <input type="text" class="form-control" name="Rname1" placeholder="Name"
                        @if ($edit_other) value="{{ old('Rname1', $edit_other->Rname1) }}"
                   @else
                   value="{{ old('Rname1') }}" @endif>
                </div>
                <div class="col-12 col-md">
                    <input type="text" class="form-control" name="Radd1" placeholder="Address"
                        @if ($edit_other) value="{{ old('Radd1', $edit_other->Radd1) }}"
                   @else
                   value="{{ old('Radd1') }}" @endif>
                </div>
                <div class="col-12 col-md">
                    <input type="text" class="form-control" name="Rtel1" placeholder="Tel No."
                        @if ($edit_other) value="{{ old('Rtel1', $edit_other->Rtel1) }}"
                   @else
                   value="{{ old('Rtel1') }}" @endif>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-md">
                    <input type="text" class="form-control" name="Rname2" placeholder="Name"
                        @if ($edit_other) value="{{ old('Rname2', $edit_other->Rname2) }}"
                   @else
                   value="{{ old('Rname2') }}" @endif>
                </div>
                <div class="col-12 col-md">
                    <input type="text" class="form-control" name="Radd2" placeholder="Address"
                        @if ($edit_other) value="{{ old('Radd2', $edit_other->Radd2) }}"
                   @else
                   value="{{ old('Radd2') }}" @endif>
                </div>
                <div class="col-12 col-md">
                    <input type="text" class="form-control" name="Rtel2" placeholder="Tel No."
                        @if ($edit_other) value="{{ old('Rtel2', $edit_other->Rtel2) }}"
                   @else
                   value="{{ old('Rtel2') }}" @endif>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-md">
                    <input type="text" class="form-control" name="Rname3" placeholder="Name"
                        @if ($edit_other) value="{{ old('Rname3', $edit_other->Rname3) }}"
                   @else
                   value="{{ old('Rname3') }}" @endif>
                </div>
                <div class="col-12 col-md">
                    <input type="text" class="form-control" name="Radd3" placeholder="Address"
                        @if ($edit_other) value="{{ old('Radd3', $edit_other->Radd3) }}"
                   @else
                   value="{{ old('Radd3') }}" @endif>
                </div>
                <div class="col-12 col-md">
                    <input type="text" class="form-control" name="Rtel3" placeholder="Tel No."
                        @if ($edit_other) value="{{ old('Rtel3', $edit_other->Rtel3) }}"
                   @else
                   value="{{ old('Rtel3') }}" @endif>
                </div>
            </div>
            <hr>
            <p>Government Issued ID (i.e.Passport, GSIS, SSS, PRC, Driver's License, etc.) <br> <span
                    class="text-danger">PLEASE INDICATE ID Number and Date of Issuance</span></p>
            <div class="row mb-3">
                <div class="col-12 col-md">
                    <input type="text" class="form-control" name="IDa1" placeholder="ID No."
                        @if ($edit_other) value="{{ old('IDa1', $edit_other->IDa1) }}"
                   @else
                   value="{{ old('IDa1') }}" @endif>
                </div>
                <div class="col-12 col-md">
                    <input type="date" class="form-control" name="IDa2" placeholder="Date"
                        @if ($edit_other) value="{{ old('IDa2', $edit_other->IDa2) }}"
                   @else
                   value="{{ old('IDa2') }}" @endif>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-md">
                    <input type="text" class="form-control" name="IDb1" placeholder="ID No."
                        @if ($edit_other) value="{{ old('IDb1', $edit_other->IDb1) }}"
                   @else
                   value="{{ old('IDb1') }}" @endif>
                </div>
                <div class="col-12 col-md">
                    <input type="date" class="form-control" name="IDb2" placeholder="Date"
                        @if ($edit_other) value="{{ old('IDb2', $edit_other->IDb2) }}"
                   @else
                   value="{{ old('IDb2') }}" @endif>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-md">
                    <input type="text" class="form-control" name="IDc1" placeholder="ID No."
                        @if ($edit_other) value="{{ old('IDc1', $edit_other->IDc1) }}"
                   @else
                   value="{{ old('IDc1') }}" @endif>
                </div>
                <div class="col-12 col-md">
                    <input type="date" class="form-control" name="IDc2" placeholder="Date"
                        @if ($edit_other) value="{{ old('IDc2', $edit_other->IDc2) }}"
                   @else
                   value="{{ old('IDc2') }}" @endif>
                </div>
            </div>
            <button type="submit" class="w-100 btn btn-success"><i class="fa-solid fa-plus me-1"></i>
                @if ($edit_other)
                    Update
                @else
                    Save
                @endif
            </button>
            </form>
        </div>
    </div>
@endsection
