@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Order') }}</div>

                <div class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-warning" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('orders.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description">

                                @error('description')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="total_price" class="col-md-4 col-form-label text-md-right">{{ __('Total price') }}</label>

                            <div class="col-md-6">
                                <input id="total_price" type="number" class="form-control{{ $errors->has('total_price') ? ' is-invalid' : '' }}" name="total_price">

                                @error('total_price')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="total_price" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                            <div class="col-md-6">
                                <select name="status" class="custom-select">
                                    <option value="1" selected>New</option>
                                    <option value="2">Delivering</option>
                                    <option value="3">Cancelled</option>
                                </select>
                                
                                @error('status')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
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
