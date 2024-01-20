@extends('layouts.app')

@section('title', 'Publishers')

@section('content')
    <div class="app-title">
        <div>
            <h1>Publishers</h1>
        </div>
        <div class="app-breadcrumb breadcrumb">
            <a class="btn btn-primary" href="{{ route('publisher.create') }}">Create New Publisher</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($publishers->count() > 0)
                                    @foreach ($publishers as $publisher)
                                        <tr>
                                            <td>{{ $publisher->id }}</td>
                                            <td>{{ $publisher->name }}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('publisher.edit', $publisher) }}"
                                                    class="btn btn-primary btn-sm"><i
                                                        class="bi bi-pencil-fill me-0 text-white"></i></a>
                                                <form action="{{ route('publisher.destroy', $publisher) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button href="" class="btn btn-danger btn-sm ms-1"><i
                                                            class="bi bi-trash3-fill me-0 text-white"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Page specific javascripts-->
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css">
    <!-- Data table plugin-->
    <script type="text/javascript" src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $('#sampleTable').DataTable();
    </script>
@endpush
