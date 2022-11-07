@extends('layouts.app')

@section('title', 'Other Information')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('users.pds.index') }}"
                    class="text-decoration-none text-success">PDS</a></li>
            <li class="breadcrumb-item active" aria-current="page">Other Information</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            @if ($edit_other)
                <form action="{{ route('users.pds.otherinformation.update', $edit_other->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                @else
                    <form action="{{ route('users.pds.otherinformation.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
            @endif
            <div class="form-floating mb-3">
                <input type="text" class="form-control text-uppercase" name="Ospecial" id="Ospecial"
                    placeholder="Basic civilation/Course/Degree"
                    @if ($edit_other) value="{{ $edit_other->Ospecial }}"
                            @else
                            value="{{ old('Ospecial') }}" @endif>
                <label for="Ospecial" class="form-label small">Special Skill</label>
                @error('Ospecial')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control text-uppercase" name="Ononacad" id="Ononacad" placeholder=""
                    @if ($edit_other) value="{{ $edit_other->Ononacad }}"
                            @else
                            value="{{ old('Ononacad') }}" @endif>
                <label for="Ononacad" class="small">Non Academic Distinction</label>
                @error('Ononacad')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control text-uppercase" name="Omemship" id="Omemship" placeholder=""
                    @if ($edit_other) value="{{ $edit_other->Omemship }}"
                            @else
                            value="{{ old('Omemship') }}" @endif>
                <label for="Omemship" class="small">Membership in Assiociation</label>
                @error('Omemship')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label small m-0 p-0">Upload Document</label>
                <input name="document" class="form-control" type="file" id="formFile" aria-describedby="file-info"
                    accept=".pdf">
                <div class="small" id="file-info">The maximun file is 25mb (PDF only)</div>
                @error('document')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col text-end">
                <button type="submit" class="btn btn-outline-success">
                    @if ($edit_other)
                        <i class="fa fa-upload me-1" aria-hidden="true"></i> Save
                    @else
                        <i class="fa fa-plus me-1" aria-hidden="true"></i> Add
                    @endif
                </button>
            </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col table-responsive" id="no-more-tables">
            <table class="table table-hover table-striped smnall table-sm">
                <thead>
                    <tr class="table-success">
                        <th class="numeric" width="30%">Special Skill</th>
                        <th class="numeric" width="30%">Non Academic Distinction</th>
                        <th class="numeric" width="30%">Membership in Assiociation</th>
                        <th class="numeric"></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($otherinformation as $other)
                        <tr>
                            <td data-title="Position Title">{{ $other->Ospecial }}</td>
                            <td data-title="Number of Hours">{{ $other->Ononacad }}</td>
                            <td data-title="Type">{{ $other->Omemship }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('users.pds.otherinformation.edit', $other->id) }}"
                                        class="btn btn-warning btn-sm"><i class="fa fa-pencil text-white"
                                            aria-hidden="true"></i></a>
                                    @if ($other->document)
                                        <a target="_blank" href="{{ asset('/storage/pdsFiles/' . $other->document) }}"
                                            class="btn btn-dark btn-sm">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    @endif
                                    <form action="{{ route('users.pds.otherinformation.destroy', $other->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm rounded-0 rounded-end"><i
                                                class="fa-solid fa-trash-can me-1"></i> </button>
                                    </form>
                                </div>
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
                {{ $otherinformation->links('pagination.custom') }}
            </div>
        </div>
    </div>
@endsection
