@extends('layouts.app')

@section('title', 'Application')
@section('content')

    <div class="row justify-content-center mx-auto">
        <div class="col-12 mt-3">
            <div class="table-responsive" id="no-more-tables">
                <table class="table table-hover table-striped smnall table-sm">
                    <thead>
                        <tr class="table-success">
                            <th class="numeric" width="5%">No.</th>
                            <th class="numeric">Position title</th>
                            <th class="numeric">Assignment</th>
                            <th class="numeric">Applied</th>
                            <th class="numeric">Status</th>
                            <th class="numeric" width="15%"></th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse ($all_application as $app)
                            <tr>
                                <td data-title="No.">{{ $app->id }}</td>
                                <td data-title="Position title">{{ $app->publication->title }}</td>
                                <td data-title="Assignment">{{ $app->publication->assignment }}</td>
                                <td data-title="Assignment">{{ $app->created_at->diffForHumans() }}</td>
                                <td>
                                    @if ($app->trashed())
                                        <span class="badge text-bg-danger">Cancelled</span>
                                    @elseif ($app->status == 0)
                                        <span class="badge text-bg-success">Accepted</span>
                                    @elseif ($app->status == 1)
                                        <span class="badge text-bg-warning">Pending</span>
                                    @elseif ($app->status == 2)
                                        <span class="badge text-bg-dark">Rejected</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="/users/application/{{ $app->publication->id }}/edit/{{ $app->id }}"
                                            class="btn btn-warning fw-bold btn-sm text-white">View</a>
                                        @if ($app->trashed())
                                            <form action="{{ route('users.application.resubmit', $app->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="btn btn-success fw-bold btn-sm text-white">Resubmit</button>
                                            </form>
                                            <form action="{{ route('users.application.delete', $app->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-danger fw-bold btn-sm rounded-0 rounded-end">Delete</button>
                                            </form>
                                        @else
                                            <form action="{{ route('users.application.destroy', $app->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-danger fw-bold btn-sm rounded-0 rounded-end">Cancel</button>
                                            </form>
                                        @endif
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
                    {{ $all_application->links('pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
@endsection
