@extends('layouts.app')

@section('title', 'Performance Management System')
@section('content')
    <div class="row justify-content-center">
        <h3>Performance Management System</h3>
        <div class="col-12 col-md-10 mt-3">
            <form action="{{ route('hr.pms.store') }}" method="POST">
                @csrf
                <div class="row my-3">
                    <div class="col">
                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect"name="user"
                                aria-label="Floating label select example">
                                <option value="" hidden>Select Employee</option>
                                @foreach ($all_user as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->first_name . ' ' . $user->last_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <label for="Incumbent" class="form-label">Incumbent</label>
                        </div>
                    </div>
                </div>
                <div class="row my-3">

                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="from" id="from" placeholder="From">
                            <label for="formId1">From</label>
                        </div>
                        @error('from')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="to" id="to" placeholder="To">
                            <label for="formId1">To</label>
                        </div>
                        @error('to')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="rating" id="rating"
                                placeholder="Numerical Rating">
                            <label for="formId1">Numerical Rating</label>
                        </div>
                        @error('rating')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <select class="form-select" id="equivalent"name="equivalent"
                                aria-label="Floating label select example">
                                <option hidden>Select Equivalent</option>
                                <option value="Outstanding">Outstanding</option>
                                <option value="Very Satisfactory">Very Satisfactory</option>
                                <option value="Satisfactory">Satisfactory</option>
                                <option value="Unsatisfactory">Unsatisfactory</option>
                                <option value="Poor">Poor</option>
                            </select>
                            <label for="equivalent" class="form-label">Equivalent</label>
                        </div>
                        @error('equivalent')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <p class="text-end">
                    <button class="btn btn-success fw-bold"><i class="fa-solid fa-plus me-1"></i>Add</button>
                </p>
            </form>
            <hr>
            <div class="table-responsive" id="no-more-tables">
                <table class="table table-hover table-striped smnall table-sm text-center">
                    <thead>
                        <tr class="table-success">
                            <th class="numeric" width="20%">Employee</th>
                            <th class="numeric" width="10%">From</th>
                            <th class="numeric" width="10%">to</th>
                            <th class="numeric" width="20%">Rating</th>
                            <th class="numeric" width="20%">Equivalent</th>
                            <th class="numeric" width="10%"></th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse ($all_ipcr as $ipcr)
                            <tr>
                                <td>{{ $ipcr->user->first_name . ' ' . $ipcr->user->last_name }}</td>
                                <td>{{ $ipcr->from }}</td>
                                <td>{{ $ipcr->to }}</td>
                                <td>{{ $ipcr->rating }}</td>
                                <td>{{ $ipcr->equivalent }}</td>
                                <td>
                                    <form action="#" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                class="fa-solid fa-trash-can me-1"></i> </button>
                                    </form>
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
                    {{ $all_ipcr->links('pagination.custom') }}
                </div>
            </div>
        </div>
    </div>


@endsection
