@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Journal</div>
                @if(session()->has('message'))
                    <div class="alert alert-success"> {{ session()->get('message') }} </div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @can('journal-create')
                        <a href="{{ route('journal.create') }}" class="btn btn-primary" role="button">Create</a>
                    @endcan

                    <div class="table-responsive">
                        <table class="table table-striped table-inverse table-responsive">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>No.</th>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Duration</th>
                                    <th>Jumlah Mente</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($journals as $journal)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $journal->title }}</td>
                                        <td>{{ $journal->date }}</td>
                                        <td>{{ $journal->duration }}</td>
                                        <td>{{ $journal->mentee }}</td>
                                        <td>
                                            <a href="{{ route('journal.show', $journal->id) }}" class="btn btn-primary" role="button">Show</a>
                                            @can('journal-update')
                                            <a href="{{ route('journal.edit', $journal->id) }}" class="btn btn-warning" role="button">Update</a>
                                            @endcan
                                            @can('journal-delete')
                                            <form action="{{ route('journal.destroy', $journal->id) }}" class="d-inline" method="post"></form>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
