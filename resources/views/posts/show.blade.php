@extends('welcome')
<div class="container mt-4">
    <article class="blog-post">
        <h2 class="blog-post-title">{{ $post->title }}</h2>
        <p class="blog-post-meta">{{$post->created_at->format('d M Y H:i')}} <a href="#">Mark</a></p>
        <p>{{ $post->content }}</p>
    </article>
</div>
