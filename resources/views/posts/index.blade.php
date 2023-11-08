@extends('welcome')
@section('content')
    <div class="container mt-4">
        <h1>Posts</h1>
        <h2>Всего постов: {{ $postCount }}</h2>
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            {{ $post->title }}
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ Str::limit($post->content) }}</p>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Подглядеть</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
