@extends('layouts.app')

@section('title', 'Survey Questions')
@section('content')
    <div class="row justify-content-center">
        <h3>Survey Questions</h3>
        <div class="col-12 col-md-10 mt-3">

            <h4 class="text-center">Adding of Survey Questions</h4>

            @if ($edit_question)
                <form action="{{ route('hr.surveyQuestion.update', $edit_question->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                @else
                    <form action="{{ route('hr.surveyQuestion.store') }}" method="POST">
                        @csrf
            @endif
            <div class="row mb-3">
                <div class="col-12 mb-2 col-md-4">
                    <div class="form-floating mb-3">
                        <select name="type" id="type" class="form-control form-control-sm"
                            placeholder="Select type">
                            <option hidden>Select Type</option>
                            <option value="Core Competencies">Core Competencies</option>
                            <option value="Organizational Competencies">Organizational Competencies</option>
                            <option value="Technical Competencies">Technical Competencies</option>
                            <option value="Leadership Competencies">Leadership Competencies</option>
                        </select>
                        <label for="type">Type</label>
                    </div>
                    @error('type')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-12 mb-2 col-md">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control  @error('question') is-invalid @enderror" name="question" id="question" placeholder="Question"
                            @if ($edit_question) value="{{ old('question', $edit_question->question) }}"
                        @else
                        value="{{ old('question') }}" @endif
                            value="{{ old('question') }}">
                        <label for="question">Question</label>
                    </div>
                    @error('question')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            @if ($edit_question)
                <div class="row">
                    <div class="col">
                        <button class="btn btn-success w-100"><i class="fa-solid fa-check me-2"></i>Save </button>
                    </div>
                    <div class="col">

                        <a href="{{ route('hr.surveyQuestion.index') }}" class="btn btn-outline-success w-100"><i
                                class="fa-solid fa-x me-2"></i>Cancel</a>
                    </div>
                </div>
            @else
                <button class="btn btn-success w-100"><i class="fa-solid fa-plus me-2"></i>Add </button>
            @endif
            </form>

            <hr>
            <h2>All Questions</h2>
            <div class="table-responsive mt-5 " id="no-more-tables">
                <table class="table table-hover table-striped smnall table-sm text-center">
                    <thead>
                        <tr class="table-success">
                            <th class="numeric"></th>
                            <th class="numeric" width="20%">Type</th>
                            <th class="numeric" width="60%">Question</th>
                            <th class="numeric" width="10%"></th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse ($all_question as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td data-title="Type">
                                    @if ($item->type == 1)
                                        Core Competencies
                                    @elseif ($item->type == 2)
                                        Organizational Competencies
                                    @elseif ($item->type == 3)
                                        Leadership Competencies
                                    @elseif ($item->type == 4)
                                        Technical Competencies
                                    @else
                                        -
                                    @endif
                                </td>
                                <td data-title="Question">
                                    {{ $item->question }}
                                </td>
                                <td>
                                    <form action="{{ route('hr.surveyQuestion.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('hr.surveyQuestion.edit', $item->id) }}"
                                            class="btn btn-outline-warning btn-sm"><i class="fa-solid fa-pen"></i></a>

                                        <button class="btn btn-outline-danger btn-sm" type="submit">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <td colspan="5">No Applicants</td>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                </div>
            </div>

        </div>
    </div>


@endsection
