@extends('layouts.admin')

@section('content')
    <h2>Modifica il post: {{ $post->title }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('admin.posts.update', ['post' => $post->slug]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}">
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Immagine</label>
            <input class="form-control" type="file" id="cover_image" name="cover_image">
            
            @if ($post->cover_image)
                <div>
                    <img width="100" src="{{ asset('storage/' . $post->cover_image) }}" alt="{{ $post->title }}">
                </div>
            @else
                <small>Nessuna immagine caricata</small>
            @endif
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select" id="category_id" name="category_id">
                <option value="">Select a category</option>
                @foreach ($categories as $category)
                    <option @selected($category->id == old('category_id', $post->category_id)) value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
        </div>

        <div class="mb-3 mt-4">
            <label for="content" class="form-label">Contenuto</label>
            <textarea class="form-control" id="content" rows="15" name="content">{{ old('content', $post->content) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Modifica</button>
    </form>
@endsection