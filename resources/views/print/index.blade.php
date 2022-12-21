@extends('layouts.app')

@section('title', 'Employee Leave Credit')
@section('content')
    <div class="row justify-content-center">
        <h3>Printing</h3>

        <div class="row mt-4 gx-4">
            <div class="col">
                <div class="card">
                    <div class="card-header">Service Record</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <div class="form-floating mb-3">
                                    <select type="text" class="form-select" name="formId1" id="serviceRecordSelect">
                                        <option hidden>Select Employee</option>
                                        @forelse ($all_user as $item)
                                            <option value="{{ $item->id }}">{{ $item->first_name }}
                                                {{ $item->last_name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    <label for="formId1">Select Employee</label>
                                </div>
                            </div>
                            <div class="col">
                                <button type="button" id="serviceRecord" class="btn btn-success w-100">Print</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">Certificate of Employment</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <div class="form-floating mb-3">
                                    <select type="text" class="form-select" name="formId1" id="formId1">
                                        <option hidden>Select Employee</option>
                                        @forelse ($all_user as $item)
                                            <option value="{{ $item->id }}">{{ $item->first_name }}
                                                {{ $item->last_name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    <label for="formId1">Select Employee</label>
                                </div>
                            </div>
                            <div class="col">
                                <a href="" target="_blank" class="btn btn-success w-100">Print</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-2 gx-4">
            <div class="col">
                <div class="card">
                    <div class="card-header">Personal Data Sheet</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <div class="form-floating mb-3">
                                    <select type="text" class="form-select" name="formId1" id="formId1">
                                        <option hidden>Select Employee</option>
                                        @forelse ($all_user as $item)
                                            <option value="{{ $item->id }}">{{ $item->first_name }}
                                                {{ $item->last_name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    <label for="formId1">Select Employee</label>
                                </div>
                            </div>
                            <div class="col">
                                <a href="" target="_blank" class="btn btn-success w-100">Print</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">Leave Card</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <div class="form-floating mb-3">
                                    <select type="text" class="form-select" name="formId1" id="formId1">
                                        <option hidden>Select Employee</option>
                                        @forelse ($all_user as $item)
                                            <option value="{{ $item->id }}">{{ $item->first_name }}
                                                {{ $item->last_name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    <label for="formId1">Select Employee</label>
                                </div>
                            </div>
                            <div class="col">
                                <a href="" target="_blank" class="btn btn-success w-100">Print</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-2 gx-4">
            <div class="col">
                <div class="card">
                    <div class="card-header">Publication</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <a href="" target="_blank" class="btn btn-success w-100">Print</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">Employee Plantilla</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <a href="" target="_blank" class="btn btn-success w-100">Print</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customJS')

    <script>
        $(document).ready(function() {
            $("#serviceRecord").click(function() {
                printServiceRecord();

            });

            function printServiceRecord() {
                // getting selected
                let id = $('#serviceRecordSelect').find(":selected").val();
                window.open('/', '_blank');
            }
        });
    </script>
@endsection
