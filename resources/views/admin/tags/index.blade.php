@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h2 class="mt-3 mb-4">Список тегов</h2>
        <div>
            <a href="{{route('admin.tags.create')}}" class="btn btn-primary">Создать тег</a>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Buttons</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->name }}</td>
                    <td>
                        <a href="{{route('admin.tags.edit', $tag->id)}}" class="btn btn-primary btn-sm">Редактировать</a>
                        <form action="{{route('admin.tags.destroy', $tag->id)}}" method="post" class="d-inline">
                            {{ csrf_field() }}
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
@endsection
