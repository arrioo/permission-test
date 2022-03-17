@extends('layouts.app')

@section('content')
@can('user-show')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User</div>
                    @if(session()->has('message'))
                        <div class="alert alert-success"> {{ session()->get('message') }} </div>
                    @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @can('user-create')
                        <a href="{{ route('user.create') }}" class="btn btn-primary" role="button">Create</a>
                    @endcan

                    <div class="table-responsive">
                        <table class="table table-striped table-inverse table-responsive">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>email</th>
                                    <th >Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td scope="row">{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @can('user-update')
                                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning" role="button">Update</a>
                                                @endcan
                                                @can('user-delete')
                                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Delete ?')">Delete</button>
                                                </form>
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
@endcan
@endsection
