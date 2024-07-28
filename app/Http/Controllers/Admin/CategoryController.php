<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.categories.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $category = new Category();
        $category->name = $request->input('category_name');
        if ($request->hasFile('category_image')) {
            $image = $request->file('category_image');
            $name = time() . '.' . $image->getClientOriginalName();
            $image->move(public_path('storage/uploads/images/categories/'), $name);
            $category->image_url = $name;
        }
        $category->save();
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        return view('admin.categories.edit', [
            'id' => $id,
            'category' => Category::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $category = Category::find($id);
        $category->name = $request->get('category_name');
        $category->status = $request->get('category_status');
        if ($request->hasFile('category_image')) {
            $image = $request->file('category_image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('storage/uploads/images/categories/');
            $image->move($path, $name);
            Storage::delete('public/uploads/images/categories/' . $category->image_url);
            $category->image_url = $name;
        }
        $category->save();
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): string
    {
        $category = Category::find($id);
        if (Storage::exists('public/uploads/images/categories/' . $category->image_url)) {
            Storage::delete('public/uploads/images/categories/' . $category->image_url);
        }
        $category->delete();
        return redirect(route('categories.index'));
    }
}
