@extends('layouts.app')

@section('title', 'Performance Management System')
@section('content')
    <div class="row justify-content-center">
        <h3>Add PMS</h3>
        <div class="col-12 col-md-10 mt-3">
            <form action="{{ route('hr.pms.store') }}" method="POST">
                @csrf
                <div class="row my-3">
                    <div class="col-12 col-md">
                        <div class="form-floating mb-3">
                            <select class="form-select" id="user"name="user"
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
                            <label for="user" class="form-label">Employee</label>
                        </div>
                    </div>
                    <div class="col-12 col-md">
                        <div class="form-floating mb-3">
                            <input type="month" class="form-control" name="from" id="from" placeholder="From">
                            <label for="formId1">From</label>
                        </div>
                        @error('from')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12 col-md">
                        <div class="form-floating mb-3">
                            <input type="month" class="form-control" name="to" id="to" placeholder="To">
                            <label for="formId1">To</label>
                        </div>
                        @error('to')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-12 col-md">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="rating" id="rating"
                                placeholder="Numerical Rating">
                            <label for="formId1">Numerical Rating</label>
                        </div>
                        @error('rating')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12 col-md">
                        <div class="form-floating mb-3">
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
                    <button class="btn btn-success fw-bold w-100"><i class="fa-solid fa-plus me-1"></i>Add</button>
                </p>
            </form>
        </div>
    </div>
@endsection
