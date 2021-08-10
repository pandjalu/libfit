@extends('layouts.formLayout')

@section('form')
    <div class="row">
        <div class="form-group col-md-12">
            <label for="name">Judul Category</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Judul" value="{{ old('name') ?? $query->name ?? '' }}" @if(isset($isShow)) readonly @endif>
    
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
@endsection
