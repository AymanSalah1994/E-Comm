<?php

namespace App\Http\Controllers\Customer\Store;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SearchHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function index(Request $request)
    {

        $all_categories  = Category::all();
        $all_merchants   = User::where('role_as', '2')->get();
        $allProducts = Product::LowHigh()->SelectCategory()->SelectMerchant()->SearchWord()->MiniPrice()->MaxPrice()->with('user')->paginate(7);
        $sent_data = ['allProducts', 'all_categories', 'all_merchants'];
        if ($request->search_word) {
            $this->storeHistory($request);
        }
        return view('customer.store.search', compact($sent_data));
    }


    public function storeHistory(Request $request)
    {
        $search_history = new SearchHistory();
        $search_history->search_word = $request->search_word;
        $search_history->ip = $request->ip();
        if (Auth::check()) {
            $search_history->id_u = $request->user()->id;
            $search_history->name = $request->user()->first_name;
        } else {
            $search_history->id_u = null;
            $search_history->name = "Guest";
        }
        $search_history->save();
    }
}
