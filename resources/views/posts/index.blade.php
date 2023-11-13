@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h1>Posts</h1>
        <div class="d-flex justify-content-between align-items-center mb-3">
            @if(isset($postCount))
                <div>
                    Количество постов: <span class="badge bg-primary">{{$postCount}}</span>
                </div>
            @else
                <h2>Кол-во постов не обнаружено</h2>
            @endif
            @auth()
                <div>
                    <a href="{{route('admin.posts.create')}}" class="btn btn-primary">Создать пост</a>
                </div>
            @endauth
        </div>
        <div class="row">
            @if(isset($posts))
                @foreach($posts as $post)
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <b>{{ $post->title }}</b>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ Str::limit($post->body) }}</p>
                                <a href="{{ route('admin.posts.show', $post->id) }}"
                                   class="btn btn-primary mb-3">Подглядеть</a>
                                <p>Опубликовано в категории: <span
                                        class="badge bg-secondary">{{ $post->category->name }}</span></p>

                                <p>Tags:
                                    @foreach($post->tags as $tag)
                                        <span class="badge bg-dark">{{$tag->name}}</span>
                                    @endforeach
                                </p>
                                @auth()
                                    <a href="{{ route('admin.posts.edit', $post->id) }}"
                                       class="btn btn-primary">Редактировать</a>
                                    <form action="admin/posts/{{$post->id}}" method="post" class="d-inline">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Удалить</button>
                                    </form>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h2>Страница пуста</h2>
            @endif
        </div>
    </div>
@endsection
