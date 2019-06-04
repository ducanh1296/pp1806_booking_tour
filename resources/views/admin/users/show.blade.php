@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('User profile') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">{{ __('Name') }}</div>
                        <div class="col-md-6">{{ $user->name }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">{{ __('E-Mail Address') }}</div>
                        <div class="col-md-6">{{ $user->email }}</div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <hr>
            <h2>{{ $user->name . __("'s orders" ) }}</h2>
            <hr>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Description</th>
                  <th scope="col">Total price</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
            </table>
        </div>
    </div>
</div>
@endsection
