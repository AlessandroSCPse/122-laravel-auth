@extends('layouts.admin')

@section('content')
    <h2>Crea un nuovo post</h2>

    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <textarea class="form-control" id="content" rows="15" name="content"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
@endsection
