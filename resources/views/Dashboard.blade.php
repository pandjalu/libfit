@section('title', 'Dashboard')

@extends('layouts.adminlte.page-blank')

@section('content')
<!-- Info boxes -->
<div class="row">
    <div class="col-12 col-sm-6">
        <div class="info-box">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-book-open"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Buku Yang Dipinjam</span>
                <span class="info-box-number">
                    {{ $borrowed }}
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-6">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book-open""></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Buku yang Belum dikembalikan</span>
                <span class="info-box-number"> {{ $undone }} </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
@endsection