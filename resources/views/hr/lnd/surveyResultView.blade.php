@extends('layouts.app')

@section('title', 'Survey Result')

@section('content')
    <div class="row justify-content-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('hr.surveyForm.index') }}"
                        class="text-decoration-none text-success">Self Assessment</a></li>
                <li class="breadcrumb-item active" aria-current="page">Self Assessment Tally of <span
                        class="fw-bold">{{ $surveyForm->surveyAnswer->user->first_name }}
                        {{ $surveyForm->surveyAnswer->user->last_name }}</span></li>
            </ol>
        </nav>
        <div class="text-end my-4">
            <a target="_blank" href="{{ route('hr.surveyResult.edit', $surveyForm->surveyAnswer->id) }}"
                class="btn btn-outline-success"><i class="fa-solid fa-print me-2"></i>Print</a>
        </div>
        <div class="col-12 col-md-10 mt-3">
            @if ($surveyForm->surveyAnswer)
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
            @else
                <h4 class="text-center">
                    No Form Selected. <a href="{{ route('hr.surveyForm.index') }}">Go Back</a>
                </h4>
            @endif
        </div>
    </div>

@endsection
