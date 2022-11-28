<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Lot;


class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $current_cats = ['all_cat'];
        $query = Lot::with('categories');

        if ($request->filled('cat')) {
            if (in_array('all_cat', $request->get('cat'))) {
                $query = $query->getQuery();
            } elseif (in_array('un_cat', $request->get('cat'))) {
                $query = $query->doesntHave('categories');
                $current_cats = ['un_cat'];
            } else {
                $query->whereHas('categories', function ($q) use ($request) {
                    $q->whereIn('category_id', $request->get('cat'));
                });
                $current_cats = $request->get('cat');
            }
        }

        $lots = $query->get();

        return view('home', ['lots' => $lots, 'categories' => Category::all(), 'current_cats' => $current_cats]);
    }
}
