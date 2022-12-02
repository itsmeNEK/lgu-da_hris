<table class="table table-hover table-striped smnall table-sm text-center table-border">
    <thead>
        <tr>
            <th width="10%"></th>
            <th>File from</th>
            <th>File Name</th>
            <th>View</th>
        </tr>
    </thead>
    <tbody>
        {{-- educational --}}
        @forelse ($application->user->pdsEducational as $item)
            @if ($item->document)
                <tr>
                    <td><i class="fa-solid fa-file-pdf"></i></td>
                    <td>Educational</td>
                    <td>{{ $item->document }}</td>
                    <td><a href="{{ asset('/storage/pdsFiles/' . $item->document) }}" target="_blank" class="btn btn-warning text-white"><i class="fa-solid fa-eye me-2"></i>View</a>
                    </td>
                </tr>
            @endif
        @empty
        @endforelse
        {{-- civilservice --}}
        @forelse ($application->user->pdsCivilService as $item)
            @if ($item->document)
                <tr>
                    <td><i class="fa-solid fa-file-pdf"></i></td>
                    <td>Civil Service</td>
                    <td>{{ $item->document }}</td>
                    <td><a href="{{ asset('/storage/pdsFiles/' . $item->document) }}" target="_blank" class="btn btn-warning text-white"><i class="fa-solid fa-eye me-2"></i>View</a>
                    </td>
                </tr>
            @endif
        @empty
        @endforelse
        {{-- work experience --}}
        @forelse ($application->user->pdsWorkExperience as $item)
            @if ($item->document)
                <tr>
                    <td><i class="fa-solid fa-file-pdf"></i></td>
                    <td>Work Experience</td>
                    <td>{{ $item->document }}</td>
                    <td><a href="{{ asset('/storage/pdsFiles/' . $item->document) }}" target="_blank" class="btn btn-warning text-white"><i
                                class="fa-solid fa-eye me-2"></i>View</a>
                    </td>
                </tr>
            @endif
        @empty
        @endforelse
        {{-- pdsVoluntaryWork --}}
        @forelse ($application->user->pdsVoluntaryWork as $item)
            @if ($item->document)
                <tr>
                    <td><i class="fa-solid fa-file-pdf"></i></td>
                    <td>Voluntary Work</td>
                    <td>{{ $item->document }}</td>
                    <td><a href="{{ asset('/storage/pdsFiles/' . $item->document) }}" target="_blank" class="btn btn-warning text-white"><i
                                class="fa-solid fa-eye me-2"></i>View</a>
                    </td>
                </tr>
            @endif
        @empty
        @endforelse
        {{-- pdsLearningDevelopment --}}
        @forelse ($application->user->pdsLearningDevelopment as $item)
            @if ($item->document)
                <tr>
                    <td><i class="fa-solid fa-file-pdf"></i></td>
                    <td>Learning And Development</td>
                    <td>{{ $item->document }}</td>
                    <td><a href="{{ asset('/storage/pdsFiles/' . $item->document) }}" target="_blank" class="btn btn-warning text-white"><i
                                class="fa-solid fa-eye me-2"></i>View</a>
                    </td>
                </tr>
            @endif
        @empty
        @endforelse
        {{-- pdsOtherInformation --}}
        @forelse ($application->user->pdsOtherInformation as $item)
            @if ($item->document)
                <tr>
                    <td><i class="fa-solid fa-file-pdf"></i></td>
                    <td>Other Information</td>
                    <td>{{ $item->document }}</td>
                    <td><a href="{{ asset('/storage/pdsFiles/' . $item->document) }}" target="_blank" class="btn btn-warning text-white"><i
                                class="fa-solid fa-eye me-2"></i>View</a>
                    </td>
                </tr>
            @endif
        @empty
        @endforelse
    </tbody>
</table>
