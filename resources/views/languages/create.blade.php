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
                <h3 class="tile-title">Language Form</h3>
                <div class="tile-body">
                    <form action="{{ route('language.store') }}" method="post">
                        @csrf
                        <div class="mb-3 has-danger">
                            <label class="form-form-label" for="name">Language Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" name="name" type="text"
                                value="{{ old('name') }}" placeholder="Enter Language Name">
                            @error('name')
                                <div class="form-control-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit"><i
                                    class="bi bi-check-circle-fill me-2"></i>Create</button>&nbsp;&nbsp;&nbsp;<a
                                class="btn btn-secondary" href="{{ route('language.index') }}"><i
                                    class="bi bi-x-circle-fill me-2"></i>Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
