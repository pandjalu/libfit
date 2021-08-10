@extends('layouts.formLayout')

@section('form')
    <div class="row">
        <div class="form-group col-md-12">
            <label for="name">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="User Name" value="{{ old('name') ?? $query->name ?? '' }}" @if(isset($isShow)) readonly @endif>
    
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="User Email" value="{{ old('email') ?? $query->email ?? '' }}" @if(isset($isShow) || isset($isEdit)) readonly @endif>
    
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        @if(!isset($isEdit))
        <div class="form-group col-md-6">
            <label for="password">Pasword</label>
            <input type="password" class="form-control @error('email') is-invalid @enderror" name="password" id="password" placeholder="User Password" value="{{ old('password') ?? $query->password ?? '' }}" @if(isset($isShow)) readonly @endif>
    
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        @else
        <div class="form-group col-md-6">
            <label for="password">New Pasword</label>
            <input type="password" class="form-control @error('email') is-invalid @enderror" name="password" id="password" placeholder="User Password" value="{{ old('password') }}">
    
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        @endif
        
    </div>
@endsection
