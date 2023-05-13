<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class indexController extends Controller
{
    public function index()
    {
        $totalMerchants  = User::where('role_as', '2')->count();
        $totalCategories =  Category::all()->count();
        $totalProducts = Product::all()->count();
        $totalDealers  = User::where('role_as', '3')->count();
        $totalDoneOrders  = Order::where('status', '4')->count();
        $totalVisits =  0;
        $totalCustomers = User::where('role_as', '0')->count();
        return view('admin.index', compact([
            'totalMerchants', 'totalCategories',
            'totalProducts', 'totalDealers',
            'totalDoneOrders', 'totalVisits',
            'totalCustomers'
        ]));
    }
}
