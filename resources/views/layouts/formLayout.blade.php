@extends('layouts.adminlte.page-blank')

@section('title', $title)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-body">
                    {{-- Form With Dynamic URL Action --}}
                    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Method For Edit Page --}}
                        @if(isset($isEdit))
                            @method('PATCH')
                        @endif

                        {{-- Include Form Dynamic --}}
                        @yield('form')

                        {{-- Waktu Pembuatan --}}
                        @if(!isset($isCreated) and isset($query->created_at) and ($query->updated_at))
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Tanggal Pembuatan</label>
                                    <input type="text" class="form-control" value="{{ $query->created_at }}" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Tanggal Perubahan</label>
                                    <input type="text" class="form-control" value="{{ $query->updated_at }}" readonly>
                                </div>
                            </div>
                        @endif

                        {{-- Button For Created Page --}}
                        @if(isset($isCreated))
                        <button type="submit" class="btn btn-primary m-auto">
                            <div class="row">
                                <div class="col-2">
                                    <i class="far fa-save"></i>
                                </div>
                                <div class="col">Save</div>
                            </div>
                        </button>

                        @elseif(isset($isEdit))
                        <button type="submit" class="btn btn-success m-auto">
                            <div class="row">
                                <div class="col-2">
                                    <i class="far fa-save"></i>
                                </div>
                                <div class="col">Edit</div>
                            </div>
                        </button>

                        {{-- Button For Show Page --}}
                        @elseif(isset($isShow))
                        <a href="{{ $isShow }}" class="btn btn-warning m-auto">
                            <div class="row">
                                <div class="col-2">
                                    <i class="fas fa-edit"></i>
                                </div>
                                <div class="col">Edit</div>
                            </div>
                        </a>

                        {{-- Button For Back to Borrowing Book --}}
                        @elseif(isset($isBorrow) and !empty($isBorrow))
                        <a href="{{ $isBorrow }}" class="btn btn-primary">
                            <div class="row">
                                <div class="col-2">
                                    <i class="nav-icon fas fa-book"></i>
                                </div>
                                <div class="col">Pinjam</div>
                            </div>
                        </a>
                        
                        @endif

                        @if(isset($showDownload))
                            @if(isset($downloadLink))
                            <a href="{{ $downloadLink }}" class="btn btn-primary">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="fas fa-file-download"></i>
                                    </div>
                                    <div class="col">Download</div>
                                </div>
                            </a>
                            @else
                            <button type="submit" class="btn btn-success m-auto" disabled>
                                <div class="d-flex flex-row">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <i class="fas fa-file-download mr-2"></i>
                                    </div>
                                    <div>Download Tidak Tersedia</div>
                                </div>
                            </button>
                            @endif
                        @endif


                        {{-- Button For Back to Previous URL --}}
                        <a class="btn btn-secondary m-auto" onclick="window.history.back()">
                            <div class="row">
                                <div class="col-2">
                                    <i class="fas fa-arrow-alt-circle-left"></i>
                                </div>
                                <div class="col">Back</div>
                            </div>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
