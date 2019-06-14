@extends('layouts.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                 <div class="card-header">Cart</div>
                 <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">{{ __('Cart') }}</div>
                        <div class="col-md-6">{{ $cart->id }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">{{ __('Name') }}</div>
                        <div class="col-md-6">{{ $cart->name  }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">{{ __('Price') }}</div>
                        <div class="col-md-6">{{ $cart->price  }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">{{ __('Quantity') }}</div>
                        <div class="col-md-6">{{ $cart->quantity  }}</div>
                    </div>
                 </div>
             </div>
        </div>
    </div>
@endsection