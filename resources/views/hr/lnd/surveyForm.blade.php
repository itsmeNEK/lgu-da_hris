@extends('layouts.app')

@section('title', 'Survey Form')
@section('customCSS')
    <style>
        .ui-datepicker-calendar {
            display: none;
        }
    </style>
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 mt-3">

            <h4 class="text-center">
                @if ($edit_form)
                    Editting
                @else
                Adding
                @endif
                of Survey Form</h4>
            @if ($edit_form)
                <form action="{{ route('hr.surveyForm.update', $edit_form->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                @else
                    <form action="{{ route('hr.surveyForm.store') }}" method="POST">
                        @csrf
            @endif
            <div class="row mb-3">
                <div class="col-12 mb-2 col-md">
                    <div class="form-floating mb-3">
                        <select class="form-select form-select-sm" name="plantilla" id="plantilla" placeholder="Plantilla">
                            <option value="" hidden>Select Plantilla</option>
                            @if ($edit_form)
                                @forelse ($all_employeePlantilla as $item)
                                    <option @if ($edit_form->plantilla_id == $item->id) selected @endif value="{{ $item->id }}">
                                        {{ $item->EPposition }}</option>
                                @empty
                                    <option selected>No Plantilla Yet</option>
                                @endforelse


                            @endif
                            @forelse ($all_employeePlantilla as $item)
                                @if (!$item->hasSurveyForm())
                                    <option value="{{ $item->id }}">{{ $item->EPposition }}</option>
                                @endif
                            @empty
                                <option selected>No Plantilla Yet</option>
                            @endforelse
                        </select>
                        <label for="formId1">Select Plantilla</label>
                    </div>
                    @error('plantilla')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-12 mb-2 col-md">
                    <div class="form-floating mb-3">
                        <select name="year" id="year" class="form-select">
                            <option hidden>Select Year</option>
                            @for ($i = 2100; $i > 1950; $i--)
                                @if ($i === now()->year)
                                    <option value="{{ $i }}" selected>{{ $i }}</option>
                                @else
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endif
                            @endfor
                        </select>
                        <label for="year">Year</label>
                    </div>
                    @error('year')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                <h4 class="mb-3 text-center">
                    Technical Competencies
                </h4>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <button type="button" class="btn btn-secondary text-white fw-bold" value="Add V"
                            onclick="createTechnical();">Click here to add question</button>
                    </div>
                    <div class="col-12 col-md">
                        <div id="technicalQuestion">
                            @if ($edit_form)
                                @foreach ($edit_form->surveyFormDetails as $item)
                                @if ($item->surveyQuestion->type == 'Technical Competencies')
                                    <div class="row mb-3">
                                        <div class="col-12 col-md">
                                            <select class="form-select form-select-sm" name="question[]" id="question"
                                                placeholder="Question">
                                                <option hidden>Select question</option>
                                                @forelse ($Technical_Question as $question)
                                                    <option @if ($item->question_id == $question->id) selected @endif
                                                        value="{{ $question->id }}">{{ $question->question }}</option>
                                                @empty
                                                    <option selected>No
                                                        question Yet</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <div class="row mb-5">
                <h4 class="mb-3 text-center">
                    Leadership Competencies
                </h4>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <button type="button" class="btn btn-secondary text-white fw-bold" value="Add V"
                            onclick="createLeadership();">Click here to add question</button>
                    </div>
                    <div class="col-12 col-md">
                        <div id="leadershipQuestion" class="mb-3">
                            @if ($edit_form)
                                @foreach ($edit_form->surveyFormDetails as $item)
                                    @if ($item->surveyQuestion->type == 'Leadership Competencies')
                                    <div class="row mb-3">
                                        <div class="col-12 col-md">
                                            <select class="form-select form-select-sm" name="question[]" id="question"
                                                placeholder="Question">
                                                <option hidden>Select question</option>
                                                @forelse ($Leadership_Question as $question)
                                                    <option @if ($item->question_id == $question->id) selected @endif
                                                        value="{{ $question->id }}">{{ $question->question }}</option>
                                                @empty
                                                    <option selected>No
                                                        question Yet</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @error('question')
                <p class="text-danger small">{{ $message }}</p>
            @enderror

            @if ($edit_form)
                <div class="row">
                    <div class="col">

                        <a href="{{ route('hr.surveyForm.index') }}" class="btn btn-outline-success w-100"><i class="fa-solid fa-plus me-2"></i>Cancel </a>
                    </div>
                    <div class="col">

                        <button  type="submit" class="btn btn-success w-100"><i class="fa-solid fa-plus me-2"></i>Update </button>
                    </div>
                </div>
            @else
                <button type="submit" class="btn btn-success w-100"><i class="fa-solid fa-plus me-2"></i>Add </button>
            @endif

            </form>

        </div>
    </div>
    <hr>

    <div class="row justify-content-center">
        <h3>Survey Form Table</h3>
        <div class="col-12 col-md-10 text-end">

            <form action="{{ route('hr.surveyForm.index') }}" method="get">
                @csrf
                <div class="input-group mb-3">
                    <select class="form-select form-select-sm" name="plantilla" id="plantilla" placeholder="Plantilla">
                        <option hidden>Select Plantilla</option>
                        @forelse ($all_employeePlantilla as $item)
                            @if ($item->hasSurveyForm())
                                <option value="{{ $item->id }}">{{ $item->EPposition }}</option>
                            @endif
                        @empty
                            <option selected>No Plantilla Yet</option>
                        @endforelse
                    </select>
                    <input type="text" class="form-control" name="search" placeholder="Search"
                        aria-label="Recipient's username" aria-describedby="button-addon2" value="{{ old('search') }}">
                    <button class="btn btn-warning text-white fw-bold"><i
                            class="fa-solid fa-magnifying-glass me-1"></i>Search</button>
                </div>
            </form>

            <div class="table-responsive" id="no-more-tables">
                <table class="table table-hover table-striped smnall table-sm text-center">
                    <thead>
                        <tr class="table-success">
                            <th class="numeric" width="10%"></th>
                            <th class="numeric">Plantilla No</th>
                            <th class="numeric">Plantilla Position</th>
                            <th class="numeric">Employee Name</th>
                            <th class="numeric" ></th>

                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse ($all_surveyForm as $item)
                            <tr>
                                <td data-title="ID">{{ $item->id }}</td>
                                <td data-title="Plantilla No">{{ $item->EmployeePlantilla->EPno }}</td>
                                <td data-title="Plantilla Position">{{ $item->EmployeePlantilla->EPposition }}</td>
                                <td data-title="Employee Name">
                                    @if ($item->EmployeePlantilla->user)
                                        {{ $item->EmployeePlantilla->user->first_name . ' ' }}
                                        @if ($item->EmployeePlantilla->user->pdsPersonal)
                                            {{ $item->EmployeePlantilla->user->pdsPersonal->middle_name . ' ' }}
                                        @endif
                                        {{ $item->EmployeePlantilla->user->last_name }}
                                    @endif
                                </td>
                                <td data-title="Control">
                                    <form action="{{ route('hr.surveyForm.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('hr.surveyForm.edit', $item->id) }}"
                                        class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></button>
                                    </form>
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
                    {{ $all_surveyForm->links('pagination.custom') }}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('customJS')
<script>

    function createTechnical() {
    // First create a DIV element.
    var txtNewInputBox = document.createElement("div");

    // Then add the content (a new input box) of the element.
    txtNewInputBox.innerHTML =
        '<div class="row mb-3"><div class="col-12 col-md"><select class="form-select form-select-sm" name="question[]" id="question"' +
        'placeholder="Question"><option value=""  hidden>Select question</option>@forelse ($Technical_Question as $item)<option value="{{ $item->id }}">{{  $item->question }}</option> @empty<option selected>No question Yet</option> @endforelse</select></div></div>';

    // Finally put it where it is supposed to appear.
    document.getElementById("technicalQuestion").appendChild(txtNewInputBox);
}

function createLeadership() {
    // First create a DIV element.
    var txtNewInputBox = document.createElement("div");

    // Then add the content (a new input box) of the element.
    txtNewInputBox.innerHTML =
        '<div class="row mb-3"<div class="col-12 col-md"><select class="form-select form-select-sm" name="question[]" id="question"' +
        'placeholder="Question"><option value=""  hidden>Select question</option>@forelse ($Leadership_Question as $item)<option value="{{ $item->id }}">{{  $item->question }}</option> @empty<option selected>No question Yet</option> @endforelse</select></div></div>';

    // Finally put it where it is supposed to appear.
    document.getElementById("leadershipQuestion").appendChild(txtNewInputBox);
}

</script>

@endsection
