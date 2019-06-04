@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Tour') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('tours.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category id') }}</label>
                            <div class="col-md-6">
                                <input id="category_id" type="text" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" required autofocus>
                                @error('category_id')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tour_name" class="col-md-4 col-form-label text-md-right">{{ __('Tour name') }}</label>
                            <div class="col-md-6">
                                <input id="tour_name" type="text" class="form-control{{ $errors->has('tour_name') ? ' is-invalid' : '' }}" name="tour_name" required autofocus>
                                @error('tour_name')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="days" class="col-md-4 col-form-label text-md-right">{{ __('Days') }}</label>
                            <div class="col-md-6">
                                <input id="days" type="text" class="form-control{{ $errors->has('days') ? ' is-invalid' : '' }}" name="days" required autofocus>
                                @error('days')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" required>
                                @error('price')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('image') }}</label>
                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" required>
                                @error('image')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>
                            <div class="col-md-6">
                                <input id="quantity" type="text" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" required>
                                @error('quantity')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="start" class="col-md-4 col-form-label text-md-right">{{ __('Start') }}</label>
                            <div class="col-md-6">
                                <input id="start" type="text" class="form-control{{ $errors->has('start') ? ' is-invalid' : '' }}" name="start" required>
                                @error('start')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="avg_rating" class="col-md-4 col-form-label text-md-right">{{ __('Rating') }}</label>
                                <div class="col-md-6">
                                    <input id="avg_rating" type="text" class="form-control{{ $errors->has('avg_rating') ? ' is-invalid' : '' }}" name="avg_rating" required>
                                    @error('avg_rating')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="discount" class="col-md-4 col-form-label text-md-right">{{ __('Discount') }}</label>
                                <div class="col-md-6">
                                    <input id="discount" type="text" class="form-control{{ $errors->has('discount') ? ' is-invalid' : '' }}" name="discount" required>
                                    @error('discount')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="avg_rating" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                            <textarea name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="description"></textarea>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
