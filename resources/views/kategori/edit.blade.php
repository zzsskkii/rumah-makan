@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card form-card">
        <div class="hero">
            <h1>Edit Kategori</h1>
            <p>Perbarui nama kategori.</p>
        </div>

        <div class="content">
            <form action="/kategori/{{ $category->id }}" method="POST" class="form-grid">
                @csrf
                @method('PUT')

                <div class="field">
                    <label for="name">Nama Kategori</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="input"
                        value="{{ old('name', $category->name) }}"
                    >
                    @error('name')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="actions">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="/kategori" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection