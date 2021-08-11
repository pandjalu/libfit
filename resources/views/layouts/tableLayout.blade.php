@extends('layouts.adminlte.page-blank')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-body">
                @yield("table")
                </div>
            </div>
        </div>
    </div>
@endsection