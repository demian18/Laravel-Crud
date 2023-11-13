@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Создать теги</h2>
        <form action="{{ route('admin.tags.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Название</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
