@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-header">User List</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr class="row_{{ $category->id }}">
                                <th scope="row">{{ $category->id }}</th>
                                    <td>
                                        <a href="/categories/{{ $category->id }}">{{ $category->name }}</a>
                                    </td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        <a href="categories/{{ $category->id }}/edit" class="btn btn-info" role="button">Edit</a>
                                        <a href="#" id="btn-del-category" class="btn btn-info btn-del-category" role="button" data-category-id="{{ $category->id }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/delete_category.js"></script>
@endsection
