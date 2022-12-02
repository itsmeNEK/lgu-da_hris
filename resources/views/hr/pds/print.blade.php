@extends('layouts.print')
@section('head1')
    @include('hr.pds.style.page1')
@endsection
@section('head2')
    @include('hr.pds.style.page2')
@endsection
@section('head3')
    @include('hr.pds.style.page3')
@endsection
@section('head4')
    @include('hr.pds.style.page4')
@endsection
@section('content')
    {{-- page 1 --}}
    <div class="page1">
        <page id="page">
            @include('hr.pds.pages.page1')
        </page>
    </div>
    {{-- page 2 --}}
    <div class="page2">
        <page id="page">
            @include('hr.pds.pages.page2')
        </page>
    </div>
    {{-- page 3 --}}
    <div class="page3">
        <page id="page">
            @include('hr.pds.pages.page3')
        </page>
    </div>
    {{-- page 4 --}}
    <div class="page4">
        <page id="page">
            @include('hr.pds.pages.page4')
        </page>
    </div>
@endsection
