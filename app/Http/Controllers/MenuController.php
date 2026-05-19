<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Categories;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $menu = Menu::with('category')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhereHas('category', function ($q) use ($search) {
                        $q->where('name', 'like', '%' . $search . '%');
                    });
            })
            ->latest()
            ->paginate(5);

        $jumlahmenu = Menu::count();

        return view('menu.index', compact('menu', 'search', 'jumlahmenu'));
    }

    public function create()
    {
        $categories = Categories::all();
        return view('menu.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
        ]);

        Menu::create($request->only('name', 'category_id', 'price'));

        return redirect('/menu')->with('success', 'Menu berhasil disimpan.');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $categories = Categories::all();

        return view('menu.edit', compact('menu', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
        ]);

        $menu->update($request->only('name', 'category_id', 'price'));

        return redirect('/menu')->with('success', 'Menu berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect('/menu')->with('success', 'Menu berhasil dihapus.');
    }
}