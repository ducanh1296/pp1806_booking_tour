@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Category') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">{{ __('Name') }}</div>
                        <div class="col-md-6">{{ $category->name }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">{{ __('Description') }}</div>
                        <div class="col-md-6">{{ $category->description }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
