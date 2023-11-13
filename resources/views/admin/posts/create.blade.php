@extends('welcome')
@section('content')
    <form action="{{ route('admin.posts.store') }}" method="post">
        @csrf
        <div class="container mt-4">
            <article class="blog-post">

                <div class="form-group">
                    <label for="">Заголовок Поста</label>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Контент Поста</label>
                    <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <label>Категория поста: </label>
                <select name="category_id">
                    @foreach($posts as $post)
                        <option value="{{$post->category->id}}">{{$post->category->name}}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </article>
        </div>
    </form>
@endsection
