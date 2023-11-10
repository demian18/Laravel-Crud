@extends('welcome')
@section('content')
    <div class="container mt-4">
        <h1>Posts</h1>
        @if(isset($postCount))
            <h2>Всего постов: {{ $postCount }}</h2>
        @else
            <h2>Кол-во постов не обнаружено</h2>
        @endif
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Создать</a>
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
                                <a href="{{ route('posts.show', $post->id) }}"
                                   class="btn btn-primary mb-3">Подглядеть</a>
                                <p>Опубликовано в категории: <span
                                        class="badge bg-secondary">{{ $post->category->name }}</span></p>

                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Редактировать</a>
                                <form action="posts/{{$post->id}}" method="post" class="d-inline">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Удалить</button>
                                </form>
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
