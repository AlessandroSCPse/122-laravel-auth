@extends('layouts.admin')

@section('content')
    <h2>{{ $post->title }}</h2>

    <div>
        <strong>Slug</strong>: {{ $post->slug }}
    </div>

    <div>
        <strong>Created at</strong>: {{ $post->created_at }}
    </div>

    <div>
        <strong>Updated at</strong>: {{ $post->updated_at }}
    </div>

    @if ($post->content)
        <p class="mt-5">{{ $post->content }}</p>
    @endif
@endsection