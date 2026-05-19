@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card form-card">
        <div class="hero">
            <h1>Edit Menu</h1>
            <p>Perbarui data menu yang sudah ada.</p>
        </div>

        <div class="content">
            <form action="/menu/{{ $menu->id }}" method="POST" class="form-grid">
                @csrf
                @method('PUT')

                <div class="field">
                    <label for="name">Nama Menu</label>
                    <input type="text" id="name" name="name" class="input" value="{{ old('name', $menu->name) }}">
                    @error('name')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="category_id">Kategori</label>
                    <select id="category_id" name="category_id" class="select">
                        <option value="">Pilih kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @selected(old('category_id', $menu->category_id) == $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="price">Harga</label>
                    <input type="number" id="price" name="price" class="input" value="{{ old('price', $menu->price) }}" min="0">
                    @error('price')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="actions">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="/menu" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection