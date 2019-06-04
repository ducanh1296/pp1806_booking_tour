<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Http\Requests\CreateOrderRequest;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $orders = Order::paginate(config('orders.paginate'));

        return view('admin.orders.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $data = $request->only('total_price', 'description', 'status');
        $data['user_id'] = auth()->id();
        
        try {
            $order = Order::create($data);
        } catch (Exception $e) {
            return back()->with('status', 'Failed to create order');
        }
        
        
        return redirect(route('orders.show', $order->id))->with('status', 'Create successfuly !');
    }

    public function storeOrderProduct (Request $request) {
        $productId = $request->get('product_id');
        $product = Product::find($productId);
        $currentUserId = auth()->id();
        $user = User::find($currentUserId);
        if (!$product) {
            return back()->with('status', 'Product does not exist');
        }
        $data['total_price'] = $product->price;
        $data['description'] = "description";
        $data['user_id'] = $currentUserId;
        $order = null;
        $flag = true;
        try {
            if (!$user->orders->isEmpty()) {
                foreach ($user->orders as $result) {
                    if ( $result->status == 1) {
                        $flag = false;
                        $data['total_price'] = $result->total_price + $product->price;
                        $result->update($data);
                        $order = Order::find($result->id);
                        break;
                    }
                }
                if ($flag) {
                    $order = Order::create($data);
                }
            } else {
                $order = Order::create($data);
            }
            $orderProduct['order_id'] = $order->id;
            $orderProduct['product_id'] = $product->id;
            $orderProduct['quantity'] = 1;
            $orderProduct['price'] = $product->price;
            OrderProduct::create($orderProduct);
        } catch (\Exception $e) {
            return back()->with('status', 'Create fail');
        }
        
        return redirect(route('orders.show', $order->id))->with('status', 'Create successfuly !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $order = Order::find($id);
        if (!$order) {
            return back()->with('status', 'Order not exist');
        }

        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $order = Order::find($id);
        if (!$order) {
            $result = [
                'status' => false,
                'message' => 'Order does not exist',
            ];
        } else {
            try {
                $order->delete();
                $result = [
                    'status' => true,
                    'message' => ' Delete successfully',
                ];
            } catch (\Exception $e) {
                $result = [
                    'status' => true,
                    'message' => 'Failed to delete order',
                    'error' => $e->getMessage()
                ];
            }
        }

        return response()->json($result);
    }
}
