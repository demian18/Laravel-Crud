@extends('welcome')
@section('content')
    <form action="/posts/{{$post->id}}" method="post">
        @csrf
        @method('PUT')
        <div class="container mt-4">
            <article class="blog-post">

                <div class="form-group">
                    <label for="">Заголовок Поста</label>
                    <input type="text" name="title" class="form-control" value="{{$post->title}}">
                </div>

                <div class="form-group">
                    <label for="">Контент Поста</label>
                    <textarea name="body" id="" cols="30" rows="10" class="form-control">{{$post->body}}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Сохранить</button>
            </article>
        </div>
    </form>
@endsection
