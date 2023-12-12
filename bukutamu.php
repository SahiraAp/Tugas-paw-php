<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "nama_database");

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Tangkap data dari formulir
$nama = $_POST['name'];
$email = $_POST['email'];
$telepon = $_POST['phone'];
$subjek = $_POST['subject'];
$pesan = $_POST['message'];

// Query untuk menyimpan data ke database
$query = "INSERT INTO nama_tabel (nama, email, telepon, subjek, pesan) VALUES ('$nama', '$email', '$telepon', '$subjek', '$pesan')";

// Eksekusi query
if ($koneksi->query($query) === TRUE) {
    // Pesan berhasil terkirim
    echo "<div style='text-align: center; padding: 20px; padding-top: 50px; margin-top: 50px; background-color: #4CAF50; color: white; margin: 0 auto; width: 50%;'>Pesan berhasil dikirim!</div>";
} else {
    // Pesan error
    echo "<div style='text-align: center; padding: 20px; padding-top: 50px; margin-top: 50px; background-color: #f44336; color: white; margin: 0 auto; width: 50%;'>Error: " . $query . "<br>" . $koneksi->error . "</div>";
}

// Tutup koneksi
$koneksi->close();
?>



<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
	<link href="dist/output.css" rel="stylesheet">
    <title>Login - Portfolio</title>
</head>
<body>
<a href="index.php#hero" class="flex items-center justify-center">
  <li class="inline-block p-2 hover:text-hutao transition duration-500">Kembali Ke halaman Utama</li>
</a>

	</body>
	</html>