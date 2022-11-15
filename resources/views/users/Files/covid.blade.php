@extends('layouts.app')

@section('title', 'COVID 19 Reponse')
@section('content')

    <div class="row mt-2">
        <div class="row justify-content-center mt-3">
            <h3>COVID 19 Reponse</h3>
            <div class="col-12 col-md-10 mx-auto">
                <p class="text-muted">Select your latest vaccination you receive</p>


                @if ($covid)
                    <form action="{{ route('users.covid.update', $covid->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                    @else
                        <form action="{{ route('users.covid.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                @endif

                <div class="row mb-3">
                    <div class="col text-center">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="booster" id="first_dose" value="1"
                                @if ($covid) @if ($covid->booster == 1)
                                    checked @endif
                                @endif>
                            <label class="form-check-label" for="first_dose">First Dose</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="booster" id="second_dose" value="2"
                                @if ($covid) @if ($covid->booster == 2)
                                   checked @endif
                                @endif>
                            <label class="form-check-label" for="second_dose">Second Dose</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="booster" id="first_booster" value="3"
                                @if ($covid) @if ($covid->booster == 3)
                                   checked @endif
                                @endif>
                            <label class="form-check-label" for="first_booster">First Booster</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="booster" id="second_booster" value="4"
                                @if ($covid) @if ($covid->booster == 4)
                                       checked @endif
                                @endif>
                            <label class="form-check-label" for="second_booster">Second Booster</label>
                        </div>
                    </div>
                    @error('booster')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <p class="text-muted">Select file or picture of Vaccination Card</p>
                        <div class="input-group">
                            <input multiple type="file" class="form-control" name="photo" accept="image/*">
                        </div>
                        @error('photo')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col">
                        @if ($covid)
                            <a class="btn btn-success" href="/storage/Vcard/{{ $covid->photo }}" target="_blank"><i class="fa-solid fa-eye me-2"></i>View Vaccination Card</a>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-success w-100 "><i class="fa-solid fa-save me-1"></i>Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
