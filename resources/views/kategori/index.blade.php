@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="hero">
            <h1>Data Kategori</h1>
            <p>Kelola kategori menu rumah makan.</p>
            <div class="meta">Total kategori: {{ $jumlahKategori }}</div>
        </div>

        <div class="content">
            @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="toolbar">
                <a href="/kategori/create" class="btn btn-primary">Tambah Kategori</a>
                <a href="/menu" class="btn btn-primary">Menu</a>

                <form method="GET" action="/kategori" class="search-form">
                    <input
                        type="text"
                        name="search"
                        class="input"
                        placeholder="Cari kategori"
                        value="{{ $search }}"
                    >
                    <button type="submit" class="btn btn-secondary">Cari</button>
                </form>
            </div>

            <div class="table-wrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $index => $category)
                            <tr>
                                <td>{{ $categories->firstItem() + $index }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <div class="actions">
                                        <a href="/kategori/{{ $category->id }}/edit" class="btn btn-secondary">Edit</a>

                                        <form action="/kategori/{{ $category->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="submit"
                                                class="btn btn-danger"
                                                onclick="return confirm('Yakin hapus kategori ini?')"
                                            >
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="empty-state">Data kategori belum ada.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="pagination-wrap">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>
@endsection