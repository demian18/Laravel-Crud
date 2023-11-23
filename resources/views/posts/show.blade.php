@extends('welcome')
@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container mt-4">
        <article class="blog-post">
            <h2 class="blog-post-title">{{ $post->title }}</h2>
            <p class="blog-post-meta">{{$post->created_at->format('d M Y H:i')}} <a
                    href="#">{{$post->category->name}}</a>
            </p>
            <p>{{ $post->body }}</p>
        </article>

        <div class="d-flex justify-content-between">
            <h3>Comment</h3>
            <button id="scrollToBottom">Написать комментарий</button>
        </div>

        @foreach($post->comment as $comm)
            <div class="my-2 py-2 text-dark">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body p-4">
                                    <div>
                                        <h5>{{ $comm->name }}</h5>
                                        <p class="small">{{ $comm->created_at->diffForHumans() }}</p>
                                        <p>
                                            {{ $comm->body }}
                                        </p>
                                        {{--<div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <a href="#!" class="link-muted me-2"><i class="fas fa-thumbs-up me-1"></i>132</a>
                                                <a href="#!" class="link-muted"><i class="fas fa-thumbs-down me-1"></i>15</a>
                                            </div>
                                            <a href="#!" class="link-muted"><i class="fas fa-reply me-1"></i> Reply</a>
                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <form action="{{route('comment.store')}}" method="post">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="mb-3">
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <label for="commentAuthor" class="form-label">Ваше имя</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="commentText" class="form-label">Текст комментария</label>
                        <textarea class="form-control"  name="body" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Отправить комментарий</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        document.getElementById('scrollToBottom').addEventListener('click', function () {
            window.scrollTo({
                top: document.body.scrollHeight,
                behavior: 'smooth'
            });
        });
    </script>
@endsection
