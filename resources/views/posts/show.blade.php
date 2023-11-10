@extends('welcome')
@section('content')
<div class="container mt-4">
    <article class="blog-post">
        <h2 class="blog-post-title">{{ $post->title }}</h2>
        <p class="blog-post-meta">{{$post->created_at->format('d M Y H:i')}} <a href="#">{{$post->category->name}}</a>
        </p>
        <p>{{ $post->body }}</p>
    </article>
    <h3>Comment</h3>
    @foreach($post->comment as $comm)
        <li>{{$comm->body}} - <small>от {{$comm->name}}</small></li>
    @endforeach
</div>
@endsection
