@extends('layouts.app')

@section('title', 'Certificates')
@section('content')
    <div class="row justify-content-center">
        <h3>Certificates</h3>
        <div class="col-12 col-md-10 mt-3">

            <div class="row justify-content-end">
                <div class="col-12 col-md-4 text-end">
                    <form action="{{ route('hr.dashboard.index') }}" method="get">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" placeholder="Search Employee"
                                aria-label="Recipient's username" aria-describedby="button-addon2"
                                value="{{ old('search') }}">
                            <button class="btn btn-warning text-white fw-bold"><i
                                    class="fa-solid fa-magnifying-glass me-1"></i>Search</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col table-responsive" id="no-more-tables">
                <table class="table table-hover table-striped smnall table-sm text-center table-border">
                    <thead>
                        <tr>
                            <th class="numeric" width="10%">Type</th>
                            <th class="numeric">Employee</th>
                            <th class="numeric">File from</th>
                            <th class="numeric">File Name</th>
                            <th class="numeric">View</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($all_user as $user)
                            {{-- educational --}}
                            @forelse ($user->pdsEducational as $item)
                                @if ($item->document)
                                    <tr>
                                        <td data-title="type"><i class="fa-solid fa-file-pdf"></i></td>
                                        <td data-title="Employee">{{ $user->first_name . ' ' . $user->last_name }}</td>
                                        <td data-title="File from">Educational</td>
                                        <td data-title="File Name">{{ $item->document }}</td>
                                        <td data-title="View"><a href="{{ asset('/storage/pdsFiles/' . $item->document) }}" target="_blank"
                                                class="btn btn-warning text-white"><i
                                                    class="fa-solid fa-eye me-2"></i>View</a>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                            @endforelse
                            {{-- civilservice --}}
                            @forelse ($user->pdsCivilService as $item)
                                @if ($item->document)
                                    <tr>
                                        <td data-title="type"><i class="fa-solid fa-file-pdf"></i></td>
                                        <td data-title="Employee">{{ $user->first_name . ' ' . $user->last_name }}</td>
                                        <td data-title="File from">Civil Service</td>
                                        <td data-title="File name">{{ $item->document }}</td>
                                        <td data-title="view"><a href="{{ asset('/storage/pdsFiles/' . $item->document) }}" target="_blank"
                                                class="btn btn-warning text-white"><i
                                                    class="fa-solid fa-eye me-2"></i>View</a>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                            @endforelse
                            {{-- work experience --}}
                            @forelse ($user->pdsWorkExperience as $item)
                                @if ($item->document)
                                    <tr>
                                        <td data-title="type"><i class="fa-solid fa-file-pdf"></i></td>
                                        <td data-title="Employee">{{ $user->first_name . ' ' . $user->last_name }}</td>
                                        <td data-title="File from">Work Experience</td>
                                        <td data-title="File name">{{ $item->document }}</td>
                                        <td data-title="view"><a href="{{ asset('/storage/pdsFiles/' . $item->document) }}" target="_blank"
                                                class="btn btn-warning text-white"><i
                                                    class="fa-solid fa-eye me-2"></i>View</a>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                            @endforelse
                            {{-- pdsVoluntaryWork --}}
                            @forelse ($user->pdsVoluntaryWork as $item)
                                @if ($item->document)
                                    <tr>
                                        <td data-title="type"><i class="fa-solid fa-file-pdf"></i></td>
                                        <td data-title="Employee">{{ $user->first_name . ' ' . $user->last_name }}</td>
                                        <td data-title="File from">Voluntary Work</td>
                                        <td data-title="File name">{{ $item->document }}</td>
                                        <td data-title="view"><a href="{{ asset('/storage/pdsFiles/' . $item->document) }}" target="_blank"
                                                class="btn btn-warning text-white"><i
                                                    class="fa-solid fa-eye me-2"></i>View</a>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                            @endforelse
                            {{-- pdsLearningDevelopment --}}
                            @forelse ($user->pdsLearningDevelopment as $item)
                                @if ($item->document)
                                    <tr>
                                        <td data-title="type"><i class="fa-solid fa-file-pdf"></i></td>
                                        <td data-title="Employee">{{ $user->first_name . ' ' . $user->last_name }}</td>
                                        <td data-title="File from">Learning And Development</td>
                                        <td data-title="File name">{{ $item->document }}</td>
                                        <td data-title="view"><a href="{{ asset('/storage/pdsFiles/' . $item->document) }}" target="_blank"
                                                class="btn btn-warning text-white"><i
                                                    class="fa-solid fa-eye me-2"></i>View</a>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                            @endforelse
                            {{-- pdsOtherInformation --}}
                            @forelse ($user->pdsOtherInformation as $item)
                                @if ($item->document)
                                    <tr>
                                        <td data-title="type"><i class="fa-solid fa-file-pdf"></i></td>
                                        <td data-title="Employee">{{ $user->first_name . ' ' . $user->last_name }}</td>
                                        <td data-title="File from">Other Information</td>
                                        <td data-title="File name">{{ $item->document }}</td>
                                        <td data-title="view"><a href="{{ asset('/storage/pdsFiles/' . $item->document) }}" target="_blank"
                                                class="btn btn-warning text-white"><i
                                                    class="fa-solid fa-eye me-2"></i>View</a>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                            @endforelse
                        @empty
                            <td colspan="4">No Records Yet</td>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>


@endsection
