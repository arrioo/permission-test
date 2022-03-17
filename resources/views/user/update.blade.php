@extends('layouts.app')

@section('content')
@can('user-create')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update User</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('user.update', $user->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Nama User</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name ) }}">
                        </div>
                        <div class="form-group">
                            <label for="">Email User</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email ) }}">
                        </div>
                        <div class="form-group">
                            <label for="">New user Password</label>
                            <input type="text" name="password" class="form-control" >
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endcan
@endsection
