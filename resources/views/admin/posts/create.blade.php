@extends('layouts.admin')

@section('content')
    <h2>Crea un nuovo post</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Immagine</label>
            <input class="form-control" type="file" id="cover_image" name="cover_image">
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <textarea class="form-control" id="content" rows="15" name="content">{{ old('content') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
@endsection
