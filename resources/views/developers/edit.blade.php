@extends('layouts.app')

@section('title', 'Developers')

@section('content')
    <div class="app-title">
        <div>
            <h1>Developers</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="tile">
                <h3 class="tile-title">Update Developer</h3>
                <div class="tile-body">
                    <form action="{{ route('developer.update', $developer) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 has-danger">
                            <label class="form-form-label" for="name">Developer Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" name="name" type="text"
                                value="{{ $developer->name }}" placeholder="Enter Developer Name">
                            @error('name')
                                <div class="form-control-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit"><i
                                    class="bi bi-check-circle-fill me-2"></i>Update</button>&nbsp;&nbsp;&nbsp;<a
                                class="btn btn-secondary" href="{{ route('developer.index') }}"><i
                                    class="bi bi-x-circle-fill me-2"></i>Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
