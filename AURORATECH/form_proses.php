<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'koneksi.php';

if (isset($_POST['simpan'])) {
    if (!isset($_POST['nama_lengkap']) || !isset($_POST['nomor_telepon']) || !isset($_POST['tanggal_pesan']) || !isset($_POST['waktu_perjalanan']) || !isset($_POST['Pilihan']) || !isset($_POST['jumlah_peserta']) || !isset($_POST['harga_paket']) || !isset($_POST['total_biaya'])) {
        echo "Error: Silakan isi semua field wajib!";
        exit;
    }

    $nama_lengkap = $_POST['nama_lengkap'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $tanggal_pesan = $_POST['tanggal_pesan'];
    $waktu_perjalanan = $_POST['waktu_perjalanan'];
    $pilihan_pelayanan = implode(',', $_POST['Pilihan']); // Mengasumsikan Pilihan adalah array nilai
    $jumlah_peserta = $_POST['jumlah_peserta'];
    $harga_paket = $_POST['harga_paket'];
    $total_biaya = $_POST['total_biaya'];

    if (empty($nama_lengkap) || empty($nomor_telepon) || empty($tanggal_pesan) || empty($waktu_perjalanan) || empty($pilihan_pelayanan) || empty($jumlah_peserta) || empty($harga_paket) || empty($total_biaya)) {
        echo "Error: Silakan isi semua field wajib!";
        exit;
    }

    $query = "INSERT INTO pesanan (nama_lengkap, nomor_telepon, tanggal_pesan, waktu_perjalanan, pilihan_pelayanan, jumlah_peserta, harga_paket, total_biaya) 
              VALUES ('$nama_lengkap', '$nomor_telepon', '$tanggal_pesan', '$waktu_perjalanan', '$pilihan_pelayanan', '$jumlah_peserta', '$harga_paket', '$total_biaya')";

    if (mysqli_query($conn, $query)) {
        echo "Data berhasil disimpan!";
        header('Location: index.html');
        exit;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

$conn->close();
?>