@extends('layouts.app')

@section('title', 'Account Settings')
@section('content')

    <form method="POST" action="{{ route('users.account.update', $user->id) }}" enctype="multipart/form-data">
        <div class="row justify-content-center p-3">
            <div class="col-12 col-md-4 justify-content-center">
                <img src="{{ asset('/storage/user_avatar/' . $user->avatar) }}" class="rounded-circle profile-img img-fluid img-thumbnail"
                    alt="{{ $user->avatar }}">
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="formFile" class="form-label small p-0 m-0">Change Avatar</label>
                        <input accept=".jpeg,.jpg,.png,.gif" class="form-control @error('avatar') is-invalid @enderror"
                            name="avatar" type="file" id="formFile" aria-describedby="avatar-info">
                    </div>
                    <div id="avatar-info" class="form-text text-muted p-0 m-0">.jpg , .jpeg , .png , .gif only (20mb max)
                    <br>
                <p class="text-danger">NOTE!!! This picture will be used in your pds and other documents that require image</p></div>
                    @error('avatar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-8">
                @csrf
                @method('PATCH')
                <div class="row mb-3">
                    <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                    <div class="col-md-6">
                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                            name="first_name" value="{{ old('first_name', $user->first_name) }}" required
                            autocomplete="first_name" autofocus>

                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                    <div class="col-md-6">
                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                            name="last_name" value="{{ old('last_name', $user->last_name) }}" required
                            autocomplete="last_name" autofocus>

                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Current Password') }}</label>
                    <div class="col-md-6">
                        <input id="current_password" type="password"
                            class="form-control @error('current_password') is-invalid @enderror" name="current_password" aria-describedby="password-info">


                        <div class="small text-muted" id="password-info">
                            If you wish to change your password. Kindly enter your current password before entering your new
                            passwrord
                        </div>
                        @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm"
                        class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn fw-bold btn-outline-success mt-3 w-100">
                            <i class="fa-solid fa-check-to-slot"></i> {{ __('Update') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
