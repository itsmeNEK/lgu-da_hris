@extends('layouts.app')

@section('title', 'Rangking')
@section('customCSS')
@endsection
@section('content')


    <div class="row justify-content-center">
        <h3><i class="fa-solid fa-chart-simple me-2"></i>Ranking</h3>
        <div class="col-12 col-md-10 mt-3">
            <div class="row justify-content-end">
                <div class="col-12 col-md-4">
                    <form action="{{ route('hr.ranking.index') }}" method="get">
                        @csrf
                        <div class="input-group mb-3">
                            <select class="form-select" name="pub_id">
                                <option value="" hidden>Select Position</option>
                                @forelse ($publication as $pub)
                                    <option value="{{ $pub->id }}">{{ $pub->title }}</option>
                                @empty
                                    <option hidden>No Publication Yet</option>
                                @endforelse
                            </select>
                            <button class="btn btn-dark text-white fw-bold">Get Rangking</button>
                        </div>
                    </form>
                </div>
            </div>

            @if (!empty(request()->except('_token', '_method')))
                <div class="table-responsive" id="no-more-tables">
                    <table class="table table-hover table-striped smnall table-sm text-center">
                        <thead>
                            <tr class="table-success">
                                <th class="numeric" width="10%">Rank</th>
                                <th class="numeric">Applicant Name</th>
                                <th class="numeric">Position</th>
                                <th class="numeric">Total Points</th>
                                <th class="numeric" width="20%"></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @forelse ($ranking as $item)
                                <tr>
                                    <td data-title="Rank">{{ $loop->iteration }}</td>
                                    <td data-title="Applicant Name">
                                        {{ $item['user']->first_name . ' ' . $item['user']->last_name }}
                                    </td>
                                    <td data-title="Position">
                                        {{ $item['app']->publication->title }}
                                    </td>
                                    <td data-title="Total Points">
                                        {{ $item['total'] }}
                                    </td>
                                </tr>
                            @empty
                                <td colspan="4">No Applicants</td>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                    </div>
                </div>
            @else
            <h3 class="text-center my-5">Select Position and Click get Ranking</h3>
            @endif
        </div>
    </div>

@endsection
