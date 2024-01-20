@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="app-title">
        <div>
            <h1>Games Collections</h1>
        </div>
        <div class="app-breadcrumb breadcrumb">
            <a class="btn btn-primary" href="{{ route('games-collection.create') }}">Create New Collection</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>Game Name</th>
                                    <th>Console</th>
                                    <th>Copies</th>
                                    <th>Publisher</th>
                                    <th>Developer</th>
                                    <th>Language</th>
                                    <th>FSK</th>
                                    <th>Release Year</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if ($games_collections->count() > 0)
                                @foreach ($games_collections as $games_collection)
                                <tr>
                                    <td>{{ $games_collection->name }}</td>
                                    <td>{{ $games_collection->console->name }}</td>
                                    <td>{{ $games_collection->copies }}</td>
                                    <td>{{ $games_collection->publisher->name }}</td>
                                    <td>{{ $games_collection->developer->name }}</td>
                                    <td>{{ $games_collection->language->name }}</td>
                                    <td>{{ $games_collection->fsk->name }}</td>
                                    <td>{{ $games_collection->year }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('games-collection.edit', $games_collection) }}"
                                            class="btn btn-primary btn-sm"><i
                                                class="bi bi-pencil-fill me-0 text-white"></i></a>
                                        <form action="{{ route('games-collection.destroy', $games_collection) }}" method="POST">
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
