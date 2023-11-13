@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Редактировать тег</h2>
        <form action="{{ route('admin.tags.update', $tag->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Название</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $tag->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
        </form>
    </div>
@endsection
