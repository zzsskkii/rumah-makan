@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="hero">
            <h1>Data Menu Rumah Makan</h1>
            <p>Kelola daftar menu makanan dan minuman dengan lebih rapi.</p>
            <div class="meta">Total menu: {{ $jumlahmenu }}</div>
        </div>

        <div class="content">
            @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="toolbar">
                <a href="/menu/create" class="btn btn-primary">Tambah Menu</a>
                <a href="/kategori" class="btn btn-primary">Kategori</a>

                <form method="GET" action="/menu" class="search-form">
                    <input
                        type="text"
                        name="search"
                        class="input"
                        placeholder="Cari nama menu / kategori"
                        value="{{ $search }}"
                    >
                    <button type="submit" class="btn btn-secondary">Cari</button>
                </form>
            </div>

            <div class="table-wrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Menu</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($menu as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category->name ?? '-' }}</td>
                                <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                <td>
                                    <div class="actions">
                                        <a href="/menu/{{ $item->id }}/edit" class="btn btn-secondary">Edit</a>

                                        <form action="/menu/{{ $item->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="submit"
                                                class="btn btn-danger"
                                                onclick="return confirm('Yakin hapus data?')"
                                            >
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="empty-state">Data menu belum ada.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="pagination-wrap">
                {{ $menu->links() }}
            </div>
        </div>
    </div>
</div>
@endsection