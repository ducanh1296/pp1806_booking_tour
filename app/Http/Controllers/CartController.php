<?php
namespace App\Http\Controllers;

//use Illuminate\Support\Facades\Request;
//use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Tour;
use Cart;
class CartController extends Controller
{
    
    public function cart(Request $request) {
        $data = $request->only([
            'tour_id',
        ]);
        $tour = Tour::find($data['tour_id']);
        /*$cartInfo = [
            'id' => $tour->id,
            'name' => $tour->tour_name,
            'price' => $tour->price,
            'quantity' => '1'
        ];*/
        $cartInfo = Cart::add($tour->id, $tour->tour_name, $tour->price, 1);

        $cart = Cart::content();
        
        $this->data['cart'] = $cart;

        return view('admin.cart', $this->data);
    }
}