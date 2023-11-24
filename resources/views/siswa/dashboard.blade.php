@extends('layouts.app')
@section('content')
    <div class="container py-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('siswa.profile') }}" class="btn btn-sm btn-info">
                            <i class="bi bi-eye"></i> Profile
                        </a>
                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#pinjamModal">
                            <i class="bi bi-eye"></i> Pinjam
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

    <!-- Modal -->
<div class="modal" id="pinjamModal" tabindex="-1" aria-labelledby="pinjamModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pinjamModalLabel">Konfirmasi Peminjaman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Tempat untuk menampilkan barcode -->
                <!-- ID user yang disembunyikan pada elemen HTML -->
                <span id="user-id" style="display: none;">{{ $userId }}</span>
                <div id="qrcode" class="text-center mt-3"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="generateQRCode()">Generate QRCode</button>
                <!-- Memanggil fungsi generateQRCode saat tombol "Ya, Pinjam" ditekan -->
            </div>
        </div>
    </div>
</div>

<!-- Script untuk generate QR Code -->
<script src="https://cdn.jsdelivr.net/npm/qrcode-generator/qrcode.js"></script>
<script>
    function generateQRCode() {
        // Ambil ID user dari PHP (misalnya, dari variabel $userId)
        var userId = document.getElementById('user-id').innerText.trim(); // Ganti dengan cara Anda mendapatkan ID user

        // Buat QR Code menggunakan qrcode-generator
        var typeNumber = 0;
        var errorCorrectionLevel = 'L';
        var qr = qrcode(typeNumber, errorCorrectionLevel);
        qr.addData(userId);
        qr.make();

        // Tampilkan QR Code dalam div dengan ID 'qrcode'
        document.getElementById('qrcode').innerHTML = qr.createImgTag(5); // Ukuran QR Code disesuaikan di sini
    }
</script>

<style>
    /* CSS untuk mengatur ukuran dan posisi QR Code */
    #qrcode img {
        width: 200px; /* Ubah ukuran sesuai kebutuhan */
        height: 200px; /* Ubah ukuran sesuai kebutuhan */
    }
</style>

@endsection
