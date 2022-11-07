@extends('layouts.app')

@section('title', 'Tardiness')
@section('content')
    <div class="row justify-content-center">
        <h3>Tardiness for <span class="fw-bold"> {{ $user->first_name . ' ' . $user->last_name }}</span></h3>
        <div class="col-12 col-md-10 mt-3">
            <form action="{{ route('hr.leave.update', $user->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col mb-3">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="from" id="formId1">
                            <label for="formId1">From</label>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="to" id="formId1">
                            <label for="formId1">To</label>
                        </div>
                    </div>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" checked type="radio" id="w_pay" name="with_pay_vl" value="0">
                    <label class="form-check-label" for="w_pay">
                        With Pay</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="wo_pay" name="with_pay_vl"value="1">
                    <label class="form-check-label" for="wo_pay">
                        Without Pay</label>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <div class="form-floating mb-3">
                            <select type="number" class="form-control" name="vl_m" id="formId1"
                                placeholder="Vacation Leave (Minutes)">
                                <option value="0">0</option>
                                @foreach ($minutes as $minute)
                                    <option value="{{ $minute->value }}">{{ $minute->id }}</option>
                                @endforeach
                            </select>
                            <label for="formId1">Vacation Leave (Minutes)</label>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="form-floating mb-3">
                            <select type="number" class="form-control" name="vl_h" id="formId1"
                                placeholder="Vacation Leave (Minutes)">
                                <option value="0">0</option>
                                @foreach ($hours as $hour)
                                    <option value="{{ $hour->value }}">{{ $hour->id }}</option>
                                @endforeach
                            </select>
                            <label for="formId1">Vacation Leave (Hours)</label>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="vl_d" id="formId1"
                                placeholder="Vacation Leave (Days)" value="0" max="30" value="{{ old('particular') }}">
                            <label for="formId1">Vacation Leave (Days)</label>
                        </div>
                    </div>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" checked type="radio" id="w_pay_1" name="with_pay_sl" value="0">
                    <label class="form-check-label" for="w_pay_1">
                        With Pay</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="wo_pay_1" name="with_pay_sl" value="1">
                    <label class="form-check-label" for="wo_pay_1">
                        Without Pay</label>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <div class="form-floating mb-3">
                            <select type="number" class="form-control" name="sl_m" id="formId1"
                                placeholder="Vacation Leave (Minutes)">
                                <option value="0">0</option>
                                @foreach ($minutes as $minute)
                                    <option value="{{ $minute->value }}">{{ $minute->id }}</option>
                                @endforeach
                            </select>
                            <label for="formId1">Sick Leave (Minutes)</label>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="form-floating mb-3">
                            <select type="number" class="form-control" name="sl_h" id="formId1"
                                placeholder="Vacation Leave (Minutes)">
                                <option value="0">0</option>
                                @foreach ($hours as $hour)
                                    <option value="{{ $hour->value }}">{{ $hour->id }}</option>
                                @endforeach
                            </select>
                            <label for="formId1">Sick Leave (Hours)</label>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="sl_d" id="formId1"
                                placeholder="Sick Leave (Days)" value="0" max="30" value="{{ old('particular') }}">
                            <label for="formId1">Sick Leave (Days)</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <div class="form-floating mb-3">
                          <input
                            type="text"
                            class="form-control" name="particular" id="formId1"  value="{{ old('particular') }}" placeholder="Particulars">
                          <label for="formId1">Particulars</label>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="form-floating mb-3">
                          <input
                            type="text"
                            class="form-control" name="remarks" id="formId1" placeholder="Remarks" value="{{ old('remarks') }}">
                          <label for="formId1">Remarks</label>
                        </div>
                    </div>
                </div>
                <div class="float-end">
                    <button class="btn btn-success text-white fw-bold"><i class="fa-solid fa-plus me-1"></i>Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection
