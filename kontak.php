<?php
$servername = "localhost";  // Nama host database
$username = "root";         // Username database
$password = "";             // Password database
$dbname = "db_mhs";         // Nama database

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari form
$nama = $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];

// Cegah SQL Injection
$nama = $conn->real_escape_string($nama);
$email = $conn->real_escape_string($email);
$pesan = $conn->real_escape_string($pesan);

// Siapkan dan jalankan SQL
$sql = "INSERT INTO `data_kontak`(`nama`, `email`, `pesan`) VALUES ('$nama', '$email', '$pesan')";

if ($conn->query($sql) === TRUE) {
    // Tampilkan pesan sukses sebagai alert dan tetap di halaman index.html
    echo "<script>
        alert('PESAN BERHASIL DITAMBAHKAN');
        window.location.href = 'index.html';
    </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
