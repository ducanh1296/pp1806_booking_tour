@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Order List') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-warning" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="alert alert-success" role="alert" style="display: none;">
                        </div>
                        <div class="alert alert-warning" role="alert" style="display: none;">
                        </div>
                    <a href="orders/create" class="btn btn-info" role="button" style="margin-bottom:20px;">Create Order</a>
                    <table   class="table" width="100%">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Total Product</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            <tr class="row_{{ $order->id }}">
                                <th scope="row">{{ $order->id }}</th>
                                <td>
                                    <a href="/users/{{ $order->user->id }}">{{ $order->user->name }}</a>
                                </td>
                                <td>{{ $order->total_price }}</td>
                                <td>{{ $order->products->count() }}</td>
                                <td>
                                    @switch($order->status)

                                        @case(config('order.cancelled') == $order->status)
                                        <span class="status badge badge-danger">{{ __('order.status.' . $order->status) }}</span>
                                        @break

                                        @case(config('order.delivering') == $order->status)
                                        <span class="status badge badge-warning">{{ __('order.status.' . $order->status) }}</span>
                                        @break

                                        @default
                                        <span class="status badge badge-primary">{{ __('order.status.' . $order->status) }}</span>
                                    @endswitch
                                </td>
                                <td>
                                    <a href="orders/{{ $order->id }}" class="btn btn-info" role="button">View</a>
                                    @if ($order->user_id == auth()->id())
                                        <a href="orders/{{ $order->id }}/edit" class="btn btn-info" role="button">Edit</a>
                                        <a href="#" class="btn btn-info btn-del-order" role="button" data-order-id="{{ $order->id }}">Delete</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/index_order.js') }}"></script>
@endsection
