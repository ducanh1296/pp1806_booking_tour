<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use App\Tour;
use Cart;
class CartController extends Controller
{
    
    public function cart()
    {
       if (Request::isMethod('post')) {
            $this->data['title'] = 'Gio Hang';
            $tour_id = Request::get('tour_id');
            $tour = tour::find($tour_id);
            $cartInfo = [
                'id' => $tour_id,
                'name' => $tour->name,
                'price' => $tour->price,
                'qty' => '1'
            ];
            Cart::add($cartInfo);
        }
        
         //increment the quantity
        if (Request::get('tour_id') && (Request::get('increment')) == 1) {
            $rows = Cart::search(function($key, $value) {
                return $key->id == Request::get('tour_id');
            });
            $item = $rows->first();
            Cart::update($item->rowId, $item->qty + 1);
        }

        //decrease the quantity
        if (Request::get('tour_id') && (Request::get('decrease')) == 1) {
            $rows = Cart::search(function($key, $value) {
                return $key->id == Request::get('tour_id');
            });
            $item = $rows->first();
            Cart::update($item->rowId, $item->qty - 1);
        }

        $cart = Cart::content();
        $this->data['cart'] = $cart;

        return view('admin.tours.cart', $this->data);
       
    }
}
