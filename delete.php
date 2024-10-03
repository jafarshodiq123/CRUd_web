<?php
include 'config.php';

// Cek apakah ada parameter `id` yang dikirim melalui URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data berdasarkan `id`
    $sql = "DELETE FROM mahasiswa WHERE id = $id";

    // Eksekusi query dan cek apakah penghapusan berhasil
    if ($conn->query($sql) === TRUE) {
        // Redirect kembali ke index.php setelah berhasil menghapus data
        header("Location: index.php");
        exit();
    } else {
        // Tampilkan pesan error jika gagal menghapus data
        echo "Error deleting record: " . $conn->error;
    }
} else {
    // Jika tidak ada `id` di URL, redirect kembali ke index.php
    header("Location: index.php");
    exit();
}

// Tutup koneksi ke database
$conn->close();
?>
