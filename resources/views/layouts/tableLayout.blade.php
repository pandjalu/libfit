@extends('layouts.adminlte.page-blank')

@section('content')
    <div class="row justify-content-center">
        @if(isset($create))
            <div class="d-flex flex-row justify-content-end mb-3 px-3" style="width: 100%">
                <button class="btn btn-success" onclick="window.location.href = `{{ $create }}`">Tambah {{ $name }}</button>
            </div>
        @endif
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-body">
                @include('layouts.alert')
                @yield("table")
                </div>
            </div>
        </div>
    </div>
@endsection