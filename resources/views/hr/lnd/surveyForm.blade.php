@extends('layouts.app')

@section('title', 'Self Assessment Form')
@section('customCSS')
    <style>
        .ui-datepicker-calendar {
            display: none;
        }
    </style>
@endsection
@section('content')


<div class="row justify-content-center">
    <h3>Self Assessment Form Table</h3>

    <div class="row justify-content-center mb-4">
        <div class="col-12 col-md-10">
            <div class="row">
                <div class="col-12 col-md mb-2">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h3 class="text-start">Pending Form</h3>
                            <h5 class="text-end">{{ $all_surveyForm->where('status', 1)->count() }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md mb-2">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h3 class="text-start">Answered Form</h3>
                            <h5 class="text-end">{{ $all_surveyForm->where('status', 2)->count() }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md mb-2">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h3 class="text-start">Total Form</h3>
                            <h5 class="text-end">{{ $all_surveyForm->count() }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-10 text-end">

        <form action="{{ route('hr.surveyForm.index') }}" method="get">
            @csrf
            <div class="input-group mb-3">
                <select class="form-select form-select-sm" name="plantilla" id="plantilla" placeholder="Plantilla">
                    <option value="">All Plantilla</option>
                    @forelse ($all_employeePlantilla as $item)
                        @if ($item->hasSurveyForm())
                            <option @if (Request::get('plantilla') == $item->id) selected @endif value="{{ $item->id }}">
                                {{ $item->EPposition }}</option>
                        @endif
                    @empty
                        <option selected>No Plantilla Yet</option>
                    @endforelse
                </select>

                <select name="year" id="year" class="form-select">
                    <option value="">All Year</option>
                    @for ($i = 2100; $i > 1950; $i--)
                        @if ($i === now()->year)
                            <option value="{{ $i }}" selected>{{ $i }}</option>
                        @else
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endif
                    @endfor
                </select>
                <select class="form-select form-select-sm" name="sex" id="sex">
                    <option value="">All Sex</option>
                    <option @if (Request::get('sex') == 'male') selected @endif value="male">Male</option>
                    <option @if (Request::get('sex') == 'female') selected @endif value="female">Female</option>
                </select>
                <select class="form-select form-select-sm" name="department" id="department">
                    <option value="">All Department</option>
                    @forelse ($department as $item)
                        <option @if (Request::get('department') == $item->id) selected @endif value="{{ $item->id }}">
                            {{ $item->name }}</option>
                    @empty
                    @endforelse
                </select>
                <select class="form-select form-select-sm" name="status" id="status">
                    <option value="">All Status</option>
                    <option @if (Request::get('status') == 1) selected @endif value="1">No Response Yet</option>
                    <option @if (Request::get('status') == 2) selected @endif value="2">Done</option>
                </select>
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
                        <th class="numeric">Year</th>
                        <th class="numeric">Status</th>
                        <th class="numeric">View / Edit / Delete</th>

                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($all_surveyForm->sortBy('year') as $item)
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
                            <td>{{ $item->year }}</td>
                            <td>
                                @if ($item->status == 1)
                                    <span class="badge bg-warning">No Response Yet</span>
                                @elseif($item->status == 2)
                                    <span class="badge bg-success">Done</span>
                                @endif
                            </td>
                            <td data-title="Control">
                                <form action="{{ route('hr.surveyForm.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    @if ($item->surveyAnswer)
                                    <a href="{{ route('hr.surveyResult.show', $item->id) }}"
                                        class="btn btn-primary btn-sm" title="View"><i
                                            class="fa-solid fa-eye"></i></a>
                                    @endif
                                    <a href="{{ route('hr.surveyForm.edit', $item->id) }}"
                                        class="btn btn-warning btn-sm" title="Edit"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <button title="Delete" type="submit" class="btn btn-danger btn-sm"><i
                                            class="fa-solid fa-trash-can"></i></button>
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
<hr>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 mt-3">

            <h4 class="text-center">
                @if ($edit_form)
                    Editting
                @else
                    Adding
                @endif
                of Self Assessment Form
            </h4>
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
                    Core Competencies
                </h4>
                @if ($edit_form)
                    @forelse ($edit_form->surveyFormDetails as $item)
                        @if ($item->surveyQuestion->type == 'Core Competencies')
                            <div class="row mb-3">
                                <div class="col-12 col-md">
                                    {{ $item->surveyQuestion->question }}
                                    <input type="hidden" value="{{ $item->surveyQuestion->id }}" name="question[]">
                                </div>
                                <div class="col-12 col-md">

                                    <select class="form-select  form-select-sm" name="standard[]" id="standard">
                                        <option hidden>Select Standard Level</option>
                                        <option @if ($item->standard == '1') selected @endif value="1">1</option>
                                        <option @if ($item->standard == '2') selected @endif value="2">2</option>
                                        <option @if ($item->standard == '3') selected @endif value="3">3</option>
                                        <option @if ($item->standard == '4') selected @endif value="4">4</option>
                                        <option @if ($item->standard == '5') selected @endif value="5">5</option>
                                    </select>


                                </div>
                            </div>
                        @endif
                    @empty
                    @endforelse
                @else
                    @forelse ($Core_Question as $item)
                        <div class="row mb-1">
                            <div class="col-12 col-md">{{ $item->question }} <input hidden type="text" name="question[]"
                                    value="{{ $item->id }}"></div>
                            <div class="col-12 col-md">
                                <select class="form-select  form-select-sm" name="standard[]" id="standard">
                                    <option hidden>Select Standard Level</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                    @empty
                        <h4 class="text-center">No Questions yet. To add Question. <a
                                href="{{ route('hr.surveyQuestion.index') }}">Click Here</a></h4>
                    @endforelse
                @endif
            </div>
            @error('standard')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
            <hr>
            <div class="row mb-3">
                <h4 class="mb-3 text-center">
                    Organizational Competencies
                </h4>
                @if ($edit_form)
                    @forelse ($edit_form->surveyFormDetails as $item)
                        @if ($item->surveyQuestion->type == 'Organizational Competencies')
                            <div class="row mb-3">
                                <div class="col-12 col-md">
                                    {{ $item->surveyQuestion->question }}
                                    <input type="hidden" value="{{ $item->surveyQuestion->id }}" name="question[]">
                                </div>
                                <div class="col-12 col-md">

                                    <select class="form-select  form-select-sm" name="standard[]" id="standard">
                                        <option hidden>Select Standard Level</option>
                                        <option @if ($item->standard == '1') selected @endif value="1">1</option>
                                        <option @if ($item->standard == '2') selected @endif value="2">2</option>
                                        <option @if ($item->standard == '3') selected @endif value="3">3</option>
                                        <option @if ($item->standard == '4') selected @endif value="4">4</option>
                                        <option @if ($item->standard == '5') selected @endif value="5">5
                                        </option>
                                    </select>


                                </div>
                            </div>
                        @endif
                    @empty
                    @endforelse
                @else
                    @forelse ($Org_Question as $item)
                        <div class="row mb-1">
                            <div class="col-12 col-md">{{ $item->question }}<input hidden type="text" name="question[]"
                                    value="{{ $item->id }}"></div>
                            <div class="col-12 col-md">
                                <select class="form-select  form-select-sm" name="standard[]" id="standard">
                                    <option hidden>Select Standard Level</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                    @empty
                        <h4 class="text-center">No Questions yet. To add Question. <a
                                href="{{ route('hr.surveyQuestion.index') }}">Click Here</a></h4>
                    @endforelse
                @endif
            </div>
            <hr>
            <div class="row mb-3">
                <h4 class="mb-3 text-center">
                    Technical Competencies
                </h4>
                <p>
                    <button type="button" class="btn btn-secondary text-white fw-bold" value="Add V"
                        onclick="createTechnical();">Click here to select question</button>
                </p>
                <div class="row">
                    <div class="col-12 col-md">
                        <div id="technicalQuestion">
                            @if ($edit_form)
                                @forelse ($edit_form->surveyFormDetails as $item)
                                    @if ($item->surveyQuestion->type == 'Technical Competencies')
                                        <div class="row mb-3">
                                            <div class="col-12 col-md">
                                                <select class="form-select form-select-sm" name="question[]"
                                                    id="question" placeholder="Question">
                                                    <option hidden>Select question</option>
                                                    @forelse ($Technical_Question as $question)
                                                        <option @if ($item->question_id == $question->id) selected @endif
                                                            value="{{ $question->id }}">{{ $question->question }}
                                                        </option>
                                                    @empty
                                                        <option selected>No
                                                            question Yet</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="col-12 col-md">

                                                <select class="form-select  form-select-sm" name="standard[]"
                                                    id="standard">
                                                    <option hidden>Select Standard Level</option>
                                                    <option @if ($item->standard == '1') selected @endif
                                                        value="1">1</option>
                                                    <option @if ($item->standard == '2') selected @endif
                                                        value="2">2</option>
                                                    <option @if ($item->standard == '3') selected @endif
                                                        value="3">3</option>
                                                    <option @if ($item->standard == '4') selected @endif
                                                        value="4">4</option>
                                                    <option @if ($item->standard == '5') selected @endif
                                                        value="5">5</option>
                                                </select>


                                            </div>
                                        </div>
                                    @endif
                                @empty
                                @endforelse
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
                <p>
                    <button type="button" class="btn btn-secondary text-white fw-bold" value="Add V"
                        onclick="createLeadership();">Click here to select question</button>
                </p>
                <div class="row">
                    <div class="col-12 col-md">
                        <div id="leadershipQuestion" class="mb-3">
                            @if ($edit_form)
                                @forelse ($edit_form->surveyFormDetails as $item)
                                    @if ($item->surveyQuestion->type == 'Leadership Competencies')
                                        <div class="row mb-3">
                                            <div class="col-12 col-md">
                                                <select class="form-select form-select-sm" name="question[]"
                                                    id="question" placeholder="Question">
                                                    <option hidden>Select question</option>
                                                    @forelse ($Leadership_Question as $question)
                                                        <option @if ($item->question_id == $question->id) selected @endif
                                                            value="{{ $question->id }}">{{ $question->question }}
                                                        </option>
                                                    @empty
                                                        <option selected>No
                                                            question Yet</option>
                                                    @endforelse
                                                </select>
                                            </div>

                                            <div class="col-12 col-md">

                                                <select class="form-select  form-select-sm" name="standard[]"
                                                    id="standard">
                                                    <option hidden>Select Standard Level</option>
                                                    <option @if ($item->standard == '1') selected @endif
                                                        value="1">1</option>
                                                    <option @if ($item->standard == '2') selected @endif
                                                        value="2">2</option>
                                                    <option @if ($item->standard == '3') selected @endif
                                                        value="3">3</option>
                                                    <option @if ($item->standard == '4') selected @endif
                                                        value="4">4</option>
                                                    <option @if ($item->standard == '5') selected @endif
                                                        value="5">5</option>
                                                </select>


                                            </div>
                                        </div>
                                    @endif
                                @empty
                                @endforelse
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

                        <a href="{{ route('hr.surveyForm.index') }}" class="btn btn-outline-success w-100"><i
                                class="fa-solid fa-plus me-2"></i>Cancel </a>
                    </div>
                    <div class="col">

                        <button type="submit" class="btn btn-success w-100"><i class="fa-solid fa-plus me-2"></i>Update
                        </button>
                    </div>
                </div>
            @else
                <button type="submit" class="btn btn-success w-100"><i class="fa-solid fa-plus me-2"></i>Add </button>
            @endif

            </form>

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
        'placeholder="Question"><option value=""  hidden>Select question</option>@forelse ($Technical_Question as $item)<option value="{{ $item->id }}">{{  $item->question }}</option> @empty<option selected>No question Yet</option> @endforelse</select></div>'+
        '<div class="col-12 col-md-4">'+

            '<select class="form-select form-select-sm" name="standard[]" id="standard">'+
                                    '<option value="" hidden>Select Standard Level</option>'+
                                    '<option value="1">1</option>'+
                                    '<option value="2">2</option>'+
                                    '<option value="3">3</option>'+
                                    '<option value="4">4</option>'+
                                    '<option value="5">5</option>'+
                                '</select>'+
        '</div>'+
        '</div>';

    // Finally put it where it is supposed to appear.
    document.getElementById("technicalQuestion").appendChild(txtNewInputBox);
}

function createLeadership() {
    // First create a DIV element.
    var txtNewInputBox = document.createElement("div");

    // Then add the content (a new input box) of the element.
    txtNewInputBox.innerHTML =
        '<div class="row mb-3"><div class="col-12 col-md"><select class="form-select form-select-sm" name="question[]" id="question"' +
        'placeholder="Question"><option value=""  hidden>Select question</option>@forelse ($Leadership_Question as $item)<option value="{{ $item->id }}">{{  $item->question }}</option> @empty<option selected>No question Yet</option> @endforelse</select></div>'+
        '<div class="col-12 col-md-4">'+

            '<select class="form-select form-select-sm" name="standard[]" id="standard">'+
                                    '<option value="" hidden>Select Standard Level</option>'+
                                    '<option value="1">1</option>'+
                                    '<option value="2">2</option>'+
                                    '<option value="3">3</option>'+
                                    '<option value="4">4</option>'+
                                    '<option value="5">5</option>'+
                                '</select>'+
        '</div>'+
        '</div>';

    // Finally put it where it is supposed to appear.
    document.getElementById("leadershipQuestion").appendChild(txtNewInputBox);
}

</script>

@endsection
