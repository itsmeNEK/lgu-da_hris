@extends('layouts.app')

@section('title', 'Performance Management System')
@section('content')
    <div class="row justify-content-center">
        <h3>Applicants</h3>
        <div class="col-12 col-md-10 mt-3">

            <div class="row justify-content-end">
                <div class="col-12 col-md text-end">
                    <form action="{{ route('hr.manage_applicants.index') }}" method="get">
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
                            <input type="text" class="form-control" name="search" placeholder="Search"
                                aria-label="Recipient's username" aria-describedby="button-addon2"
                                value="{{ old('search') }}">
                            <button class="btn btn-warning text-white fw-bold"><i
                                    class="fa-solid fa-magnifying-glass me-1"></i>Search</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="table-responsive" id="no-more-tables">
                <table class="table table-hover table-striped smnall table-sm text-center">
                    <thead>
                        <tr class="table-success">
                            <th class="numeric" width="10%"></th>
                            <th class="numeric" >Applicant Name</th>
                            <th class="numeric" >Position</th>
                            <th class="numeric" width="20%"></th>
                            {{-- <th class="numeric" width="10%"></th>
                            <th class="numeric"></th> --}}
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse ($all_applicants as $app)
                            <tr>
                                <td data-title="Rank">{{ $loop->iteration  }}</td>
                                <td data-title="Applicant Name">{{ $app->user->first_name . " " . $app->user->last_name}}
                                </td>
                                <td data-title="Position">
                                    {{-- @if ()
                                        <a target="_blank" href="/storage/application-files/{{ $app->residency }}"
                                            class="btn btn-success btn-sm"><i class="fa-solid fa-eye"></i></a>
                                    @else
                                        -
                                    @endif --}}
                                    {{ $app->publication->title }}
                                </td>
                                <td data-title="PDS">
                                    <a href="{{ route('hr.applicant.show',$app->id) }}" class="btn btn-warning text-white btn-sm"><i
                                            class="fa-solid fa-eye me-1"></i>View Applicant</a>
                                </td>
                                {{-- <td>

                                </td>
                                <td>
                                    <div class="btn-group" role="group">

                                        @if ($app->status == 1)
                                            <button data-bs-toggle="modal" data-bs-target="#patch-notif-modal"
                                                data-confirm="Are you sure to accept this applicant?"
                                                data-target="{{ route('hr.manage_applicants.update', $app->id) }}"
                                                class="btn btn-success btn-sm patch"
                                                value="{{ $app->id }}">Accept</button>

                                            <button data-bs-toggle="modal" data-bs-target="#delete-notif-modal"
                                                data-confirm="Are you sure to reject this applicant??"
                                                data-target="{{ route('hr.manage_applicants.destroy', $app->id) }}"
                                                class="btn btn-danger btn-sm delete"
                                                value="{{ $app->id }}">Reject</button> --}}
                                            {{-- @elseif($app->status == 2)
                                            <span class="badge text-bg-danger">Rejected</span>
                                        @elseif($app->status == 0)
                                            <span class="badge text-bg-success">Accepted</span> --}}
                                        {{-- @endif

                                    </div>
                                </td> --}}
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">No Records</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $all_applicants->links('pagination.custom') }}
                </div>
            </div>

        </div>
    </div>

    @include('components.delete-modal')
    @include('components.patch-modal')
@endsection
