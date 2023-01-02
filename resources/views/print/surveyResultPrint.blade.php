@extends('layouts.print2')

@section('title', 'Self-Assessment Tally Sheet')
@section('customCSS')

    <style>
        center .contents * {}

        .row .col {
            padding: 0 !important;
        }

        .table td,
        .table th {
            font-size: 12px;
            padding: 0;
        }
    </style>

@endsection
@section('content')

    <page size="A4">

        <center class="pt-3 m-3">
            <div class="row">
                <div class="col">
                    {{-- <img src="{{ asset('images/DA-logo.png') }}" alt="" width="60px" height="60px"><br> --}}
                    <b>Learning and Development Needs Assesment (LDNA)</b> <br>
                    Self-Assessment Tally Sheet <br>
                    <strong>Local Government Unit (LGU)</strong>
                </div>
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 mt-3">
                    <table class="table table-borderless table-sm">
                        <tr>
                            <td>Name:</td>
                            <td width="70%" class="border-bottom border-dark">
                                {{ $surveyAnswer->user->first_name }} {{ $surveyAnswer->user->pdsPersonal->middle_name }}
                                {{ $surveyAnswer->user->last_name }}
                            </td>
                        </tr>
                        <tr>
                            <td>Position:</td>
                            <td class="border-bottom border-dark">
                                {{ $surveyAnswer->user->empPlantilla->EPposition }}
                            </td>
                        </tr>
                        <tr>
                            <td>LGU:</td>
                            <td class="border-bottom border-dark">
                                Delfin Albano
                            </td>
                        </tr>
                        <tr>
                            <td>Division/Section/Unit:</td>
                            <td class="border-bottom border-dark">
                                {{ $surveyAnswer->user->empPlantilla->department->name }}
                            </td>
                        </tr>
                        <tr>
                            <td>Date of Self-Assessment:</td>
                            <td class="border-bottom border-dark">

                                {{ date('m/d/Y', strtotime($surveyAnswer->created_at)) }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>



            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <p class="mb-0 text-start"><span class="fw-bold">Instruction: </span>Please assess yourself on the
                        competencies corresponding to your Position Title as provided in the Competency Map.</p>
                </div>
            </div>


            <div class="row justify-content-center">
                <div class="col-12 col-md-10 mt-3">
                    @if ($surveyAnswer)
                        <div class="table-responsive" id="no-more-tables">
                            <table class="table table-bordered text-center border-dark">
                                <thead>
                                    <tr class=" align-middle">
                                        <th class="numeric" width="60%">Competency Title</th>
                                        <th class="numeric">Standard Competency Level</th>
                                        <th class="numeric">Actual Competency Level</th>
                                        <th class="numeric">Gap <br>(Standard minus Actual)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- core --}}
                                    <tr>
                                        <td class="text-start fw-bold fs-6 ps-1" colspan="5">Core Competencies</td>
                                    </tr>
                                    @forelse ($surveyAnswer->surveyForm->surveyFormDetails as $item)
                                        @if ($item->surveyQuestion->type == 'Core Competencies')
                                            <tr>
                                                <td data-title="Question" class="ms-2 text-start">
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
                                            </tr>
                                        @endif
                                    @empty
                                    @endforelse
                                    {{-- Org --}}
                                    <tr>
                                        <td class="text-start fw-bold fs-6 ps-1" colspan="5">Organizational Competencies
                                        </td>
                                    </tr>
                                    @forelse ($surveyAnswer->surveyForm->surveyFormDetails as $item)
                                        @if ($item->surveyQuestion->type == 'Organizational Competencies')
                                            <tr>
                                                <td data-title="Question" class="ms-2 text-start">
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
                                            </tr>
                                        @endif
                                    @empty
                                    @endforelse
                                    {{-- Technical --}}
                                    <tr>
                                        <td class="text-start fw-bold fs-6 ps-1" colspan="5">Technical Competencies</td>
                                    </tr>
                                    @forelse ($surveyAnswer->surveyForm->surveyFormDetails as $item)
                                        @if ($item->surveyQuestion->type == 'Technical Competencies')
                                            <tr>
                                                <td data-title="Question" class="ms-2 text-start">
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
                                            </tr>
                                        @endif
                                    @empty
                                    @endforelse
                                    {{-- Leadership --}}
                                    <tr>
                                        <td class="text-start fw-bold fs-6 ps-1" colspan="5">Leadership Competencies</td>
                                    </tr>
                                    @forelse ($surveyAnswer->surveyForm->surveyFormDetails as $item)
                                        @if ($item->surveyQuestion->type == 'Leadership Competencies')
                                            <tr>
                                                <td data-title="Question" class="ms-2 text-start">
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
                                            </tr>
                                        @endif
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-md-10 text-start">
                    <span class="border-top fw-bold border-dark pe-4"> Accomplished By:</span>
                    <br><br>
                    <br><br>
                    <br><br>
                    <p class="border-bottom fw-bold border-dark px-5 ms-5 mb-0" style="width: 250px !important">
                    </p>
                    <span class=" fw-bold border-dark px-4 ms-5 mt-0"> Signature of Employee/Staff</span><br>
                </div>
            </div>


        </center>





    </page>
@endsection
