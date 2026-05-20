@extends('layout.template')

@section('content')
<div class="container mt-4">

    <h2 class="mb-3">Data Dosen</h2>

    <div class="card">
        <div class="card-body">

            <p>
                halaman ini menampilkan data dosen yang ada di database, dengan fitur tambah, edit, dan hapus data dosen
            </p>

            <a href="{{ route('form-dosen') }}" class="btn btn-primary mb-3">Tambah Data</a>

            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>NIDN</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataDosen as $dosen)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dosen->nidn }}</td>
                        <td>{{ $dosen->nama }}</td>

                        <td>
                            <form action="{{ route('dosen.destroy', $dosen->nidn) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                            <a href="{{ route('form-edit-dosen', $dosen->nidn) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ route('detail-dosen', ['id' => $dosen->nidn]) }}" class="btn btn-primary btn-sm">
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
