<?php
// P11: Berkas koneksi PHP-MySQL (MySQLi) yang dapat digunakan kembali.
// Konfigurasi bawaan Laragon: root tanpa kata sandi, port 3306.

// Sejak PHP 8.1, MySQLi secara bawaan melempar exception saat galat.
// MYSQLI_REPORT_OFF mengembalikan perilaku klasik agar kegagalan
// koneksi/kueri dapat diperiksa manual dengan if (sesuai materi P11).
mysqli_report(MYSQLI_REPORT_OFF);

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "db_pwd_2611510020";
$dbPort = 3306;

$koneksi = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName, $dbPort);

// Penanganan kegagalan koneksi.
if ($koneksi === false || !$koneksi) {
  // Detail teknis dicatat di log peladen, tidak ditampilkan ke pengunjung.
  error_log("Koneksi MySQL gagal: " . mysqli_connect_error());
  http_response_code(500);
  exit("Koneksi ke basis data gagal. Silakan coba beberapa saat lagi.");
}

// Samakan charset koneksi dengan basis data.
mysqli_set_charset($koneksi, "utf8mb4");
