@extends('layouts.app')

@section('title', 'Languages')

@section('content')
    <div class="app-title">
        <div>
            <h1>Languages</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="tile">
                <h3 class="tile-title">Update Language</h3>
                <div class="tile-body">
                    <form action="{{ route('language.update', $language) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 has-danger">
                            <label class="form-form-label" for="name">Language Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" name="name" type="text"
                                value="{{ $language->name }}" placeholder="Enter Language Name">
                            @error('name')
                                <div class="form-control-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit"><i
                                    class="bi bi-check-circle-fill me-2"></i>Update</button>&nbsp;&nbsp;&nbsp;<a
                                class="btn btn-secondary" href="{{ route('language.index') }}"><i
                                    class="bi bi-x-circle-fill me-2"></i>Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
