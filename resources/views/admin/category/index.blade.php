@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h2 class="mt-3 mb-4">Список категорий</h2>
        <div>
            <a href="{{route('admin.categories.create')}}" class="btn btn-primary">Создать категорию</a>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-primary btn-sm">Редактировать</a>
                        <form action="{{route('admin.categories.destroy', $category->id)}}" method="post" class="d-inline">
                            {{ csrf_field() }}
                            @method('DELETE')
                        <button class="btn btn-danger btn-sm">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $categories->links() }}
        </div>
@endsection
