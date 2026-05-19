@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card form-card">
        <div class="hero">
            <h1>Tambah Menu</h1>
            <p>Masukkan data menu baru ke dalam sistem.</p>
        </div>

        <div class="content">
            <form action="/menu/store" method="POST" class="form-grid">
                @csrf

                <div class="field">
                    <label for="name">Nama Menu</label>
                    <input type="text" id="name" name="name" class="input" value="{{ old('name') }}">
                    @error('name')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="category_id">Kategori</label>
                    <select id="category_id" name="category_id" class="select">
                        <option value="">Pilih kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
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
                    <input type="number" id="price" name="price" class="input" value="{{ old('price') }}" min="0">
                    @error('price')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="actions">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/menu" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection