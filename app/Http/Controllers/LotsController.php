<?php

namespace App\Http\Controllers;

use App\Models\Lot;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LotsController extends Controller
{
    private const CAT_VALIDATOR = [
        'name' => 'required|max:50',
        'description' => 'max:500'];

    private const CAT_ERROR_MESSAGES = [
        'max' => 'No more :mах symbol'];

    public const PREFIX = 'lot';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('categories.index', ['data' => Auth::user()->lots, 'h1' => 'Lots', 'prefix' => self::PREFIX]);
    }

    public function add()
    {
        return view('categories.add', ['prefix' => self::PREFIX, 'categories' => Category::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(self::CAT_VALIDATOR, self::CAT_ERROR_MESSAGES);

        $lot = Lot::create([
            'user_id' => Auth::id(),
            'name' => $validated['name'],
            'description' => $validated['description']]);

        $lot->categories()->attach(array_keys($request->get('cat')));

        session()->flash('message', 'Lot successfully added.');
        return redirect()->route('lot.index');
    }

    public function view(Lot $lot)
    {
        return view('categories.view', ['data' => $lot, 'prefix' => self::PREFIX]);
    }

    public function edit(Lot $lot)
    {
        $active_category = array();

        foreach ($lot->categories as $cat) {
            $active_category[] = $cat->pivot->category_id;
        }

        return view('categories.edit', ['data' => $lot, 'prefix' => self::PREFIX, 'categories' => Category::all(), 'active_category' => $active_category]);
    }

    public function update(Lot $lot, Request $request)
    {
        $validated = $request->validate(self::CAT_VALIDATOR, self::CAT_ERROR_MESSAGES);

        $lot->update([
            'name' => $validated['name'],
            'description' => $validated['description']]);

        $lot->categories()->sync(array_keys($request->get('cat')));

        session()->flash('message', 'Lot successfully updated.');
        return redirect()->route('lot.index');
    }

    public function delete(Lot $lot)
    {
        $lot->delete();
        session()->flash('message', 'Lot successfully deleted.');
        return redirect()->route('lot.index');
    }
}
