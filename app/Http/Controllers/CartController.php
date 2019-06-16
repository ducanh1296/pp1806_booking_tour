<?php
namespace App\Http\Controllers;
use App\Cart;
use App\Tour;
use Illuminate\Http\Request;
use App\Http\Requests;
class CartController extends Controller
{
    public function getAddToCart($id) {
        $tour = Tour::find($id);
        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($tour, $tour->id);
        session()->put('cart', $cart);
        return redirect()->route('admin.index_tour');
    }

    public function getCart() {
        $data = [];
        if (!session()->has('cart')) {
            return view('admin.shops.shopping_cart');
        }
        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);
        return view('admin.shops.shopping_cart', ['tours' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
    public function deleteCartAll() {
        if (session()->has('cart')) {
            session()->forget('cart');
        }
        return redirect()->route('cart.shoppingCart');
    }
    public function deleteCartItem($id) {
        if (session()->has('cart')) {
            $oldCart = session()->get('cart');
            $cart = new Cart($oldCart);
            if ($cart->deleteCartItem($id)) {
                session()->put('cart', $cart);
                $newCart = session()->get('cart');
                $items = $newCart->items;
                if (empty($items)) {
                    session()->forget('cart');
                    $result = [
                        'status' => true,
                        'itemEmpty' => true,
                        'message' => __('cart.delete_success')
                    ];
                } else {
                    $result = [
                        'status' => true,
                        'itemEmpty' => false,
                        'message' => __('cart.delete_success')
                    ];
                }
            } else {
                    $result = [
                        'status' => false,
                        'message' => __('cart.not_found')
                    ];
                }
            
        } else {
            $result = [
                        'status' => false,
                        'message' => __('cart.delete_fail')
                    ];
        }
        return response()->json($result);
    }
    public function upCartQty($id) {
        if (session()->has('cart')) {
            $tour = Tour::find($id);
            $oldCart = session()->get('cart');
            $cart = new Cart($oldCart);
            if ($cart->upQty($tour, $tour->id)) {
                session()->put('cart', $cart);
                $newCart = session()->get('cart');
                $itemPrice = $newCart->items[$id]['price'];
                $totalPrice = $newCart->totalPrice;
                $result = [
                        'status' => true,
                        'message' => __('cart.updated'),
                        'itemPrice' => $itemPrice,
                        'totalPrice' => $totalPrice
                    ];
            } else {
                $result = [
                    'status' => false,
                    'message' => __('cart.not_found')
                ];
            }
        } else {
            $result = [
                        'status' => false,
                        'message' => __('cart.update_fail')
                    ];
        }
        return response()->json($result);
    }
    public function downCartQty($id) {
        if (session()->has('cart')) {
            $tour = Tour::find($id);
            $oldCart = session()->get('cart');
            $cart = new Cart($oldCart);
            if ($cart->downQty($tour, $tour->id)) {
                session()->put('cart', $cart);
                $newCart = session()->get('cart');
                $itemPrice = $newCart->items[$id]['price'];
                $totalPrice = $newCart->totalPrice;
                $result = [
                        'status' => true,
                        'message' => __('cart.updated'),
                        'itemPrice' => $itemPrice,
                        'totalPrice' => $totalPrice
                    ];
            } else {
                $result = [
                    'status' => false,
                    'message' => __('cart.not_found')
                ];
            }
        } else {
            $result = [
                        'status' => false,
                        'message' => __('cart.update_fail')
                    ];
        }
        return response()->json($result);
    }
}