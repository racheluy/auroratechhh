<?php
require_once 'koneksi.php';

$query = "SELECT * FROM pesanan";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "<style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #007bff; /* blue background */
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>";
    echo "<table border='1'>";
    echo "<tr><th>Nama Lengkap</th><th>Nomor Telepon</th><th>Tanggal Pesan</th><th>Waktu Perjalanan</th><th>Layanan</th><th>Jumlah Peserta</th><th>Harga Paket</th><th>Total Biaya</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["nama_lengkap"] . "</td>";
        echo "<td>" . $row["nomor_telepon"] . "</td>";
        echo "<td>" . $row["tanggal_pesan"] . "</td>";
        echo "<td>" . $row["waktu_perjalanan"] . "</td>";
        echo "<td>" . $row["pilihan_pelayanan"] . "</td>";
        echo "<td>" . $row["jumlah_peserta"] . "</td>";
        echo "<td>" . $row["harga_paket"] . "</td>";
        echo "<td>" . $row["total_biaya"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data";
}

$conn->close();
?>