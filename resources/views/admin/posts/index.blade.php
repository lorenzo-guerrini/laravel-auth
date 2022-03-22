@extends('layouts.admin')

@section('title', 'All Posts')

@section('content')
    <div class="col-md-12">
        <div class="pb-3">
            <a href="{{ route('admin.posts.create') }}" class="btn btn-success">New Post</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>

                        <td class="text-center">
                            <a class="btn btn-primary btn-sm mb-1"
                                href="{{ route('admin.posts.show', ['post' => $post->id]) }}">Show</a>

                            <a class="btn btn-primary btn-sm mb-1"
                                href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">Edit</a>

                            <form class="d-inline-block mb-1" action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}"
                                method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
