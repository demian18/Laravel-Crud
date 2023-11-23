@extends('welcome')
@section('content')
    <form action="{{ route('admin.posts.update', $post->id) }}" method="post">
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

                <select name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>

                <div class="form-group">
                    <label for="tags">Теги</label>
                    <select name="tags[]" id="tags" class="form-control" multiple>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" {{ in_array($tag->id, $postTags) ? 'selected' : '' }}>{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Сохранить</button>
            </article>
        </div>
    </form>
@endsection
