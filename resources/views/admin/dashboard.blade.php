@extends('layouts.app')

@section('content')
    <div class="container py-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <a href="#" class="btn btn-sm btn-info">
                            <i class="bi bi-eye"></i> Tambah
                        </a>
                        <a href="{{ route('admin.profile') }}" class="btn btn-sm btn-danger">
                            <i class="bi bi-eye"></i> profile
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Siswa</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Nama Alat</th>
                                    <th scope="col">Foto Siswa</th>
                                    <th scope="col">Pemberi Pinjaman</th>
                                    <th scope="col">Foto Admin</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Baris-baris data -->
                                <tr>
                                    <th scope="row">1</th>
                                    <td>John Doe</td>
                                    <td>12A</td>
                                    <td>Laptop</td>
                                    <td><img src="foto_siswa.jpg" alt="Foto Siswa" width="50"></td>
                                    <td>Jane Smith</td>
                                    <td><img src="foto_admin.jpg" alt="Foto Admin" width="50"></td>
                                    <td>
                                        <!-- Icon aksi CRUD -->
                                        <a href="#" class="btn btn-sm btn-info">
                                            <i class="bi bi-eye"></i> Detail
                                        </a>
                                        <a href="#" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                                <!-- Baris data lainnya -->
                                <!-- ... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
