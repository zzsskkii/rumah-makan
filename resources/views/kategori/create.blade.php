@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card form-card">
        <div class="hero">
            <h1>Tambah Kategori</h1>
            <p>Tambahkan kategori baru untuk menu.</p>
        </div>

        <div class="content">
            <form action="/kategori/store" method="POST" class="form-grid">
                @csrf

                <div class="field">
                    <label for="name">Nama Kategori</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="input"
                        value="{{ old('name') }}"
                        placeholder="Contoh: Makanan"
                    >
                    @error('name')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="actions">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/kategori" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection