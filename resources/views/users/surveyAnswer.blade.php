@extends('layouts.app')

@section('title', 'Self-Assessment')
@section('content')
    <div class="row justify-content-center">
        <h3>Self-Assessment</h3>
        <p class="text-danger">Note!! You can only submit once. Please double check answer before submitting</p>
        <div class="col-12 col-md-10 mt-3 ">

            @if ($surveyForm)
                @if ($surveyForm->status == 1)
                    <form action="{{ route('users.surveyAnswer.store') }}" method="post">
                        @csrf
                        <input type="hidden" value="{{ $surveyForm->id }}" name="surveyForm">
                        <h4 class="text-center mt-4">Core Competencies</h4>
                        @forelse ($surveyForm->surveyFormDetails as $item)
                            @if ($item->surveyQuestion->type == 'Core Competencies')
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md">
                                        <p class="text-muted">
                                            {{ $item->surveyQuestion->question }}
                                            <input type="hidden" value="{{ $item->surveyQuestion->id }}" name="question[]">
                                            <input type="hidden" value="{{ $item->id }}" name="surveyFormDetails[]">
                                        </p>
                                    </div>
                                    <div class="col-12 col-md">
                                        <p class="text-muted">
                                            Standard: <span class="fw-bold">{{ $item->standard }}</span>
                                            <input type="hidden" value="{{ $item->standard }}" name="standard[]">
                                        </p>
                                    </div>
                                    <div class="col-12 col-md">
                                        <div class="mb-3">
                                            <div class="mb-1">
                                                <select class="form-select form-select-sm" name="answer[]" id="answer[]">
                                                    <option hidden>Select Competency Level</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endif

                        @empty
                        @endforelse
                        <h4 class="text-center mt-4">Organizational Competencies</h4>
                        @forelse ($surveyForm->surveyFormDetails as $item)
                            @if ($item->surveyQuestion->type == 'Organizational Competencies')
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md">
                                        <p class="text-muted">
                                            {{ $item->surveyQuestion->question }}
                                            <input type="hidden" value="{{ $item->id }}" name="surveyFormDetails[]">
                                            <input type="hidden" value="{{ $item->surveyQuestion->id }}" name="question[]">
                                        </p>
                                    </div>
                                    <div class="col-12 col-md">
                                        <p class="text-muted">
                                            Standard: <span class="fw-bold">{{ $item->standard }}</span>
                                            <input type="hidden" value="{{ $item->standard }}" name="standard[]">
                                        </p>
                                    </div>
                                    <div class="col-12 col-md">
                                        <div class="mb-3">
                                            <div class="mb-1">
                                                <select class="form-select form-select-sm" name="answer[]" id="answer[]">
                                                    <option hidden>Select Competency Level</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endif

                        @empty
                        @endforelse
                        <h4 class="text-center mt-4">Technical Competencies</h4>
                        @forelse ($surveyForm->surveyFormDetails as $item)
                            @if ($item->surveyQuestion->type == 'Technical Competencies')
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md">
                                        <p class="text-muted">
                                            {{ $item->surveyQuestion->question }}
                                            <input type="hidden" value="{{ $item->id }}" name="surveyFormDetails[]">
                                            <input type="hidden" value="{{ $item->surveyQuestion->id }}"
                                                name="question[]">
                                        </p>
                                    </div>
                                    <div class="col-12 col-md">
                                        <p class="text-muted">
                                            Standard: <span class="fw-bold">{{ $item->standard }}</span>
                                            <input type="hidden" value="{{ $item->standard }}" name="standard[]">
                                        </p>
                                    </div>
                                    <div class="col-12 col-md">
                                        <div class="mb-3">
                                            <div class="mb-1">
                                                <select class="form-select form-select-sm" name="answer[]" id="answer[]">
                                                    <option hidden>Select Competency Level</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endif

                        @empty
                        @endforelse
                        <h4 class="text-center mt-4">Leadership Competencies</h4>
                        @forelse ($surveyForm->surveyFormDetails as $item)
                            @if ($item->surveyQuestion->type == 'Leadership Competencies')
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md">
                                        <p class="text-muted">
                                            {{ $item->surveyQuestion->question }}
                                            <input type="hidden" value="{{ $item->id }}" name="surveyFormDetails[]">
                                            <input type="hidden" value="{{ $item->surveyQuestion->id }}"
                                                name="question[]">
                                        </p>
                                    </div>
                                    <div class="col-12 col-md">
                                        <p class="text-muted">
                                            Standard: <span class="fw-bold">{{ $item->standard }}</span>
                                            <input type="hidden" value="{{ $item->standard }}" name="standard[]">
                                        </p>
                                    </div>
                                    <div class="col-12 col-md">
                                        <div class="mb-3">
                                            <div class="mb-1">
                                                <select class="form-select form-select-sm" name="answer[]"
                                                    id="answer[]">
                                                    <option hidden>Select Competency Level</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endif

                        @empty
                        @endforelse
                        <button type="submit" class="btn btn-success w-100"><i
                                class="fa-solid fa-paper-plane me-2"></i>Submit</button>
                    </form>
                    <hr>
                @elseif ($surveyForm->where('status', '2'))
                    <div class="table-responsive" id="no-more-tables">
                        <table class="table table-hover table-striped smnall table-sm text-center">
                            <thead>
                                <tr class="table-success">
                                    <th class="numeric">Competency Title</th>
                                    <th class="numeric">Standard Competency Level</th>
                                    <th class="numeric">Actual Competency Level</th>
                                    <th class="numeric">Gap <br>(Standard minus Actual)</th>
                                    <th class="numeric"></th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                {{-- core --}}
                                <tr>
                                    <td class="text-start fw-bold fs-5" colspan="5">Core Competencies</td>
                                </tr>
                                @forelse ($surveyForm->surveyFormDetails as $item)
                                    @if ($item->surveyQuestion->type == 'Core Competencies')
                                        <tr>
                                            <td data-title="Question" class=" text-start">
                                                {{ $item->surveyQuestion->question }}
                                            </td>
                                            <td data-title="Standard">{{ $item->standard }}</td>
                                            <td data-title="Actual">
                                                @if ($item->surveyAnswerDetails)
                                                    {{ $item->surveyAnswerDetails->answer }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td data-title="Gap">
                                                @if ($item->surveyAnswerDetails)
                                                    {{ $item->surveyAnswerDetails->gap }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->surveyAnswerDetails)
                                                    @if ($item->surveyAnswerDetails->gap > 0)
                                                        Need Training
                                                    @else
                                                        -
                                                    @endif
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                @endforelse
                                {{-- Org --}}
                                <tr>
                                    <td class="text-start fw-bold fs-5" colspan="5">Organizational Competencies</td>
                                </tr>
                                @forelse ($surveyForm->surveyFormDetails as $item)
                                    @if ($item->surveyQuestion->type == 'Organizational Competencies')
                                        <tr>
                                            <td data-title="Question" class=" text-start">
                                                {{ $item->surveyQuestion->question }}
                                            </td>
                                            <td data-title="Standard">{{ $item->standard }}</td>
                                            <td data-title="Actual">
                                                @if ($item->surveyAnswerDetails)
                                                    {{ $item->surveyAnswerDetails->answer }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td data-title="Gap">
                                                @if ($item->surveyAnswerDetails)
                                                    {{ $item->surveyAnswerDetails->gap }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->surveyAnswerDetails)
                                                    @if ($item->surveyAnswerDetails->gap > 0)
                                                        Need Training
                                                    @else
                                                        -
                                                    @endif
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                @endforelse
                                {{-- Technical --}}
                                <tr>
                                    <td class="text-start fw-bold fs-5" colspan="5">Technical Competencies</td>
                                </tr>
                                @forelse ($surveyForm->surveyFormDetails as $item)
                                    @if ($item->surveyQuestion->type == 'Technical Competencies')
                                        <tr>
                                            <td data-title="Question" class=" text-start">
                                                {{ $item->surveyQuestion->question }}
                                            </td>
                                            <td data-title="Standard">{{ $item->standard }}</td>
                                            <td data-title="Actual">
                                                @if ($item->surveyAnswerDetails)
                                                    {{ $item->surveyAnswerDetails->answer }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td data-title="Gap">
                                                @if ($item->surveyAnswerDetails)
                                                    {{ $item->surveyAnswerDetails->gap }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->surveyAnswerDetails)
                                                    @if ($item->surveyAnswerDetails->gap > 0)
                                                        Need Training
                                                    @else
                                                        -
                                                    @endif
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                @endforelse
                                {{-- Leadership --}}
                                <tr>
                                    <td class="text-start fw-bold fs-5" colspan="5">Leadership Competencies</td>
                                </tr>
                                @forelse ($surveyForm->surveyFormDetails as $item)
                                    @if ($item->surveyQuestion->type == 'Leadership Competencies')
                                        <tr>
                                            <td data-title="Question" class=" text-start">
                                                {{ $item->surveyQuestion->question }}
                                            </td>
                                            <td data-title="Standard">{{ $item->standard }}</td>
                                            <td data-title="Actual">
                                                @if ($item->surveyAnswerDetails)
                                                    {{ $item->surveyAnswerDetails->answer }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td data-title="Gap">
                                                @if ($item->surveyAnswerDetails)
                                                    {{ $item->surveyAnswerDetails->gap }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->surveyAnswerDetails)
                                                    @if ($item->surveyAnswerDetails->gap > 0)
                                                        Need Training
                                                    @else
                                                        -
                                                    @endif
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                @endif
            @else
                <h3 class="text-center text-danger">No Questions Yet</h3>
            @endif
        </div>
    </div>

@endsection
