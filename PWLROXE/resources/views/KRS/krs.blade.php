@extends('layout.template')

@section('content')
<div class="container mt-4">

    <h2 class="mb-3">Data KRS</h2>

    <div class="card">
        <div class="card-body">

            <p>
                halaman ini menampilkan data KRS yang ada di database, dengan fitur tambah, edit, dan hapus data KRS
            </p>

            <a href="{{ route('form-krs') }}" class="btn btn-primary mb-3">Tambah Data</a>

            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>NPM</th>
                        <th>Kode Matakuliah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataKRS as $krs)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $krs->npm }}</td>
                        <td>{{ $krs->kode_matakuliah }}</td>
                        <td>
                            <form action="{{ route('krs.destroy', $krs->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                            <a href="{{ route('form-edit-krs', $krs->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ route('detail-krs', ['id' => $krs->id]) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-eye"></i>
                                Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
