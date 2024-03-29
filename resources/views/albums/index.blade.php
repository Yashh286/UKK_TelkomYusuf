@extends('layouts.app')


@section('title', 'Albums')


@section('content')
<div class="container">
    <h1>Albums</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="row">
        <div class="col-md-12">
            @auth
                <a href="{{ route('albums.create') }}" class="btn btn-primary mb-3">Tambah Album</a>
            @endauth


        </div>
    </div>

    
    <div class="row">
    </div>
    <div class="row">
        @foreach($albums as $album)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $album->nama_album }}</h5>
                        <p class="card-text">{{ $album->deskripsi }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">By {{ $album->user->name }}</small>
                        </div>
                        <a href="{{ route('albums.edit', $album->album_id) }}" class="btn btn-info">Edit</a>


<form action="{{ route('albums.destroy', $album->album_id) }}" method="POST" style="display:inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
