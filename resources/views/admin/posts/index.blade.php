@extends('layouts.admin')

@section('content')
    <h1>Tutti i post</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Created at</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ $post->created_at }}</td>

                    <td>
                        <div>
                            <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}">View</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection