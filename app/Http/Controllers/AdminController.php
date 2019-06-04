<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tour;
use App\Category;
use App\Order;

class AdminController extends Controller
{
    public function index() {   
        $users = User::orderBy('id', 'desc')->take(config('adminlte.limit'))->get();
        $tours = Tour::orderBy('id', 'desc')->take(config('adminlte.limit'))->get();
        $orders = Order::orderBy('id', 'desc')->take(config('adminlte.limit'))->get();
        $categories = Category::all();
        $data = [
            'users' => $users,
            'tours' => $tours,
            'categories' => $categories,
            'orders' => $orders,
            'categories' => $categories,
        ];    

        return view('admin.index', $data);
    }

    public function index_tour() {   
        $tours = Tour::paginate(config('tours.paginate'));

        return view('admin.index_tour',  ['tours' => $tours]);
    }
}
