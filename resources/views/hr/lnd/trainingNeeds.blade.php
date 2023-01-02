@extends('layouts.app')

@section('title', 'Training Needs Analysis')
@section('content')
    <div class="row justify-content-center">
        <h3>Training Needs Analysis</h3>
        <div class="col-12 col-md-10 mt-3">
            <form action="{{ route('hr.trainingneeds.index') }}" method="get">
                @csrf
                <div class="input-group mb-3">
                    <select class="form-select form-select-sm" name="plantilla" id="plantilla" placeholder="Plantilla">
                        <option value="">All Plantilla</option>
                        @forelse ($all_employeePlantilla as $item)
                            @if ($item->hasSurveyForm())
                                <option value="{{ $item->id }}">{{ $item->EPposition }}</option>
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
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <select class="form-select form-select-sm" name="department" id="department">
                            <option value="">All Department</option>
                            @forelse ($department as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @empty

                            @endforelse
                        </select>
                    <button class="btn btn-warning text-white fw-bold"><i
                            class="fa-solid fa-magnifying-glass me-1"></i>Search</button>
                </div>
            </form>
            <div class="table-responsive" id="no-more-tables">
                <table class="table table-hover table-striped smnall table-sm text-center">
                    <thead>
                        <tr class="table-success">
                            <th class="numeric">Plantilla No</th>
                            <th class="numeric">Plantilla Position</th>
                            <th class="numeric">Employee Name</th>
                            <th class="numeric">Year</th>
                            <th class="numeric" ></th>

                        </tr>
                    </thead>
                    <tbody class="table-group-divider">

                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{-- {{ $all_surveyForm->links('pagination.custom') }} --}}
                </div>
            </div>
        </div>
    </div>


@endsection
