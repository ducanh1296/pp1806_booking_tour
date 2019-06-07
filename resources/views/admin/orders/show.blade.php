@extends('layouts.app')

@section('content')
	<div class="row justify-content-center">
        <div class="col-md-8">
        	<div class="card">
                 <div class="card-header">Order Detail</div>
                 <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">{{ __('User') }}</div>
                        <div class="col-md-6">{{ $order->user_id }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">{{ __('Description') }}</div>
                        <div class="col-md-6">{{ $order->description }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">{{ __('Price') }}</div>
                        <div class="col-md-6">{{ $order->total_price }}</div>
                    </div>
                 </div>
             </div>
        </div>
    </div>
@endsection