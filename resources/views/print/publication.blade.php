@extends('layouts.print2')

@section('title', 'Service Record')
@section('customCSS')

    <style>
        center .contents * {}

        .row .col {
            padding: 0 !important;
        }

        .table td,
        .table th {
            font-size: 12px;
            padding: 0;
        }
    </style>

@endsection
@section('content')

    <page size="A4">

        <center class="pt-3 m-3">
            @forelse ($all_publication as $item)
                {{ $item }}
            @empty

            @endforelse
        </center>

    </page>
@endsection
