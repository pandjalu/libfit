@extends('layouts.formLayout')

@section('form')
    <div class="row">
        <div class="form-group col-md-6">
            <label for="name">Judul Buku</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Judul" value="{{ old('name') ?? $query->name ?? '' }}" @if(isset($isShow)) readonly @endif>
    
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="category">Category</label>
            <select class="form-control @error('category') is-invalid @enderror" name="category" id="category" @if(isset($isShow)) disabled @endif >

                @foreach($categories as $category)
                    <option
                        value="{{ $category['id'] }}"
                    @if(!empty(request()->query('category')) and request()
                    ->query('category') == $category['id'])
                        {{  __('selected') }}
                        @elseif(isset($query->category) and $query->category ==
                        $category['id'])
                        {{  __('selected') }}
                        @endif
                    >
                        [ID: {{ $category['id'] }}] - {{ $category['name'] }}
                    </option>
                @endforeach

            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="image">Url Foto Buku</label>
            <input type="text" class="form-control @error('image') is-invalid @enderror" name="image" id="image" placeholder="URL" value="{{ old('image') ?? $query->image ?? '' }}" @if(isset($isShow)) readonly @endif>
    
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="creator">Creator</label>
            <input type="text" class="form-control @error('creator') is-invalid @enderror" name="creator" id="creator" placeholder="Nama Creator" value="{{ old('creator') ?? $query->creator ?? '' }}" @if(isset($isShow)) readonly @endif>
    
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <label for="download_link">Image URL</label>
            <input type="text" class="form-control @error('download_link') is-invalid @enderror" name="download_link" id="download_link" placeholder="URL" value="{{ old('download_link') ?? $query->download_link ?? '' }}" @if(isset($isShow)) readonly @endif>
    
            @error('download_link')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
@endsection
