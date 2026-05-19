<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $categories = categories::when($search, function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(5);

        $jumlahKategori = categories::count();

        return view('kategori.index', compact('categories', 'search', 'jumlahKategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        categories::create([
            'name' => $request->name,
        ]);

        return redirect('/kategori')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $category = categories::findOrFail($id);

        return view('kategori.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = categories::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect('/kategori')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $category = categories::findOrFail($id);
        $category->delete();

        return redirect('/kategori')->with('success', 'Kategori berhasil dihapus.');
    }
}