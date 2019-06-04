@extends('adminlte::page')

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
                <a href="tours/create" class="btn btn-info" role="button" style="margin-bottom:20px;">{{ __('admin.create_tour') }}</a>
                <div class="card-header">{{ __('admin.list_tour') }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('admin.name') }}</th>
                            <th scope="col">{{ __('admin.price') }}</th>
                            <th scope="col">{{ __('admin.description') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($tours as $tour)
                                <tr class="row_{{ $tour->id }}">
                                    <td scope="row">{{ $tour->id }}</td>
                                    <td>
                                        <a href="/tours/{{ $tour->id }}">{{ $tour->tour_name }}</a>
                                    </td>
                                    <td>{{ $tour->price }}</td>
                                    <td>{{ $tour->description }}</td>
                                    <td>
                                        <a href="tours/{{ $tour->id }}/edit" class="btn btn-info" role="button">Edit</a>
                                        <a href="#" id="btn-del-tour" class="btn btn-info btn-del-tour" role="button" data-tour-id="{{ $tour->id }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="row justify-content-center">
                        {{ $tours->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/delete_tour.js') }}"></script>
@endsection
