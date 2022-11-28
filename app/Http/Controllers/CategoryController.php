<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private const CAT_VALIDATOR = [
        'name' => 'required|unique:categories,name|max:50',
        'description' => 'max:500'];

    private const CAT_ERROR_MESSAGES = [
        'name.required' => 'Input unique name',
        'name.unique' => 'Input other name of category',
        'max' => 'No more :mах symbol'];

    public const PREFIX = 'category';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('categories.index', [ 'data' => Category::all(), 'h1' => 'Categories', 'prefix' => self::PREFIX ]);
    }

    public function add()
    {
        return view('categories.add', ['prefix' => self::PREFIX]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(self::CAT_VALIDATOR, self::CAT_ERROR_MESSAGES);

        Category::create([
            'name' => $validated['name'],
            'description' => $validated['description']]);
        session()->flash('message', 'Category successfully added.');
        return redirect()->route('category.index');
    }

    public function view(Category $category)
    {
        return view('categories.view', ['data' => $category, 'prefix' => self::PREFIX]);
    }

    public function edit(Category $category)
    {
        return view('categories.edit', ['data' => $category, 'prefix' => self::PREFIX]);
    }

    public function update(Category $category, Request $request)
    {
        $validated = $request->validate(self::CAT_VALIDATOR, self::CAT_ERROR_MESSAGES);

        $category->update([
            'name' => $validated['name'],
            'description' => $validated['description']]);
        session()->flash('message', 'Category successfully updated.');
        return redirect()->route('category.index');
    }

    public function delete(Category $category)
    {
        $category->delete();
        session()->flash('message', 'Category successfully deleted.');
        return redirect()->route('category.index');
    }
}
