@extends('layouts.app')

@section('content')
@can('journal-create')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Journal</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('journal.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Date</label>
                                    <input type="date" name="date" class="form-control">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Duration</label>
                                    <input type="number" name="duration" min="0" step="" class="form-control">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">jumlah Mentee</label>
                                    <input type="number" name="mentee" class="form-control">
                                </div>
                            </div>
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
