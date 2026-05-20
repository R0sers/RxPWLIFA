@extends('layout.template')

@section('content')
<div class="container mt-4">

    <h2 class="mb-3">Jadwal</h2>

    <div class="card">
        <div class="card-body">

            <p>
                halaman ini menampilkan data jadwal yang ada di database, dengan fitur tambah, edit, dan hapus data jadwal
            </p>
            <a href="{{ route('form-matriks') }}" class="btn btn-primary mb-3">Tambah Data</a>
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Kode Matakuliah</th>
                        <th>NIDN</th>
                        <th>Kelas</th>
                        <th>Hari</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataJadwal as $jadwal)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $jadwal->kode_matakuliah }}</td>
                        <td>{{ $jadwal->nidn }}</td>
                        <td>{{ $jadwal->kelas }}</td>
                        <td>{{ $jadwal->hari }}</td>
                        <td>
                            <form action="{{ route('matriks.destroy', $jadwal->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                            <a href="{{ route('form-edit-matriks', $jadwal->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ route('detail-matriks', ['id' => $jadwal->id]) }}" class="btn btn-primary btn-sm">
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
