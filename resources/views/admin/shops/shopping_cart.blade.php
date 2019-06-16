@extends('adminlte::page')

@section('title')
    Cosmetic Shopping Cart
@endsection

@section('content')
    <section id="cart_items">
        @if(Session::has('cart'))
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <div class="alert alert-success" style="display: none"></div>
                <div class="alert alert-warning" style="display: none;"></div>
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($tours as $tour)
                           <tr class="row_{{ $tour['item']->id }}">
                                <td class="cart_tour">
                                    <a href=""><img src="{{ asset('layouts/images') }}/home/tour1.jpg" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{ $tour['item']->name }}</a></h4>
                                    <p>Web ID: {{ $tour['item']->id }}</p>
                                </td>
                                <td class="cart_price">
                                    <p>{{ $tour['item']->price }} VNĐ</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_up" data-tour-id="{{ $tour['item']->id }}" role="button"> + </a>
                                        <input class="cart_quantity_input" type="text" name="quantity_{{ $tour['item']->id }}" value="{{$tour['qty']}}" size="2">
                                        <a class="cart_quantity_down" data-tour-id="{{ $tour['item']->id }}" role="button"> - </a>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price" data-tour-id="{{ $tour['item']->id }}">{{ $tour['price'] }} VNĐ</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" data-tour-id="{{ $tour['item']->id }}" role="button"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4">
                            <span>
                                <a class="btn btn-default update" href="{{ url('/admin/tours')}}">{{ __('cart.continue') }}</a>
                            </span>

                            </td>
                            <td colspan="2">
                                <table class="table table-condensed total-result">
                                    <tbody>
                                    <tr>
                                        <td>Tổng :</td>
                                        <td><p class="cart_sum_total_price" data-tour-id="{{ $tour['item']->id }}">{{ $totalPrice }} VNĐ</p></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="{{ route('cart.deleteCartAll')}}" class="btn btn-default delete-cart-all" role="button"><i class="fa fa-trash-o"></i> {{ __('cart.delete') }}</a>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-default check_out"
                                               href="{{ url('checkout')}}">{{ __('cart.checkout') }}</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @else
            <div class="row">
                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                    <h2>No Items in Cart!</h2>
                </div>
            </div>
        @endif
    </section> <!--/#cart_items-->
@endsection
