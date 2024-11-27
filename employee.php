<?php
// Koneksi ke database hotel
$connection = mysqli_connect("localhost", "root", "", "employee");

// Periksa apakah koneksi berhasil
if (!$connection) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query ke tabel tbl_hotel
$sql = "SELECT * FROM tbl_employee";
$result = mysqli_query($connection, $sql);

// Periksa apakah query berhasil
if (!$result) {
    die("Error dalam eksekusi query: " . mysqli_error($connection));
}

// Pembuatan array untuk menyimpan data
$emparray = array();
while ($row = mysqli_fetch_assoc($result)) {
    $emparray[] = $row;
}

// Menampilkan data dalam format JSON
header('Content-Type: application/json');
echo json_encode($emparray, JSON_PRETTY_PRINT);

// Menutup koneksi
mysqli_close($connection);
?>
