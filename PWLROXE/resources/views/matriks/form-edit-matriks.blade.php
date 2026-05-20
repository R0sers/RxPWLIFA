@extends('layout.template')

@section('content')
    <div class="container mt-3">
        <h1>Tambah data Mahasiswa</h1>
        <div class="card">
            <div class="card-header">Tambah Mahasiswa</div>
            <div class="card-body">
                <form method="POST" action="{{ route('mahasiswastore') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">ID</label>
                        <input type="text" class="form-control" name="id" value="{{ $dataJadwal->id }}" readonly>
                        @error('id')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kode Mata Kuliah</label>
                        <input type="text" class="form-control" name="kode_matakuliah" value="{{ $dataJadwal->kode_matakuliah }}">
                        @error('kode_matakuliah')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NIDN</label>
                        <input type="text" class="form-control" name="nidn" value="{{ $dataJadwal->nidn }}">
                        @error('nidn')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kelas</label>
                        <input type="text" class="form-control" name="kelas" value="{{ $dataJadwal->kelas }}">
                        @error('kelas')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hari</label>
                        <input type="text" class="form-control" name="hari" value="{{ $dataJadwal->hari }}">
                        @error('hari')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection