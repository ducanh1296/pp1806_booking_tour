@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('content_header')
<h1>{{ __('admin.dashboard') }}</h1>
@stop
@section('content')
<p>
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ __('admin.lastest_user') }}</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table class="table no-margin">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>{{ __('admin.name') }}</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user):
                        <tr>
                            <td><a href="/users/{{ $user->id}}">{{ $user->id }}</a></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="box-footer text-center">
                    <a href="/admin/users" class="uppercase">{{ __('admin.all_user') }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ __('admin.lastest_tour') }}</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <ul class="products-list product-list-in-box">
                @foreach($tours as $tour)
                <li class="item">
                    <div class="product-img">
                        <img src="{{ asset(config('tours.image_path') . $tour->image) }}" alt="Product Image">
                    </div>
                    <div class="product-info">
                        <a href="/tours/{{ $tour->id}}" class="product-title">{{ $tour->tour_name }}
                        <span class="label label-warning pull-right">${{ $tour->price }}</span></a>
                        <span class="product-description">
                        {{ $tour->description }}
                        </span>
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="box-footer text-center">
                <a href="/admin/tours" class="uppercase">{{ __('admin.all_tour') }}</a>
            </div>
        </div>
    </div>

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Order</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table class="table no-margin">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>{{ __('admin.description') }}</th>
                            <th>{{ __('admin.status') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order):
                        <tr>
                            <td><a href="/orders/{{ $order->id}}">{{ $order->id }}</a></td>
                            <td>{{ $order->description }}</td>
                            <td>{{ $order->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="box-footer text-center">
                    <a href="admin/orders" class="uppercase">{{ __('admin.all_order') }}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ __('admin.categories') }}</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table class="table no-margin">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>{{ __('admin.name') }}</th>
                            <th>{{ __('admin.description') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category):
                        <tr>
                            <td><a href="/categories/{{ $category->id}}">{{ $category->id }}</a></td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="box-footer text-center">
                    <a href="admin/categories" class="uppercase">{{ __('admin.all_category') }}</a>
                </div>
            </div>
        </div>
    </div>
</p>
@stop
