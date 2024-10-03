<?php
include 'config.php';

// Cek apakah parameter 'id' tersedia di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM mahasiswa WHERE id = $id"; // Perbaikan nama tabel dan pengecekan
    $result = $conn->query($sql);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    $mahasiswa = $result->fetch_assoc();

    // Pastikan data ditemukan sebelum mengakses $mahasiswa
    if (!$mahasiswa) {
        die("Data mahasiswa tidak ditemukan.");
    }
} else {
    die("ID tidak ditemukan di URL.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $nama = $_POST['nama'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $alamat = $_POST['alamat'] ?? '';
    $id = $_POST['id'] ?? 0;

    // Validasi: pastikan id adalah angka
    if (!is_numeric($id) || $id <= 0) {
        die("ID tidak valid.");
    }

    // Perbaikan query UPDATE
    $sql = "UPDATE mahasiswa SET 
            username='$username',
            email='$email',
            nama='$nama',
            phone='$phone',
            alamat='$alamat' 
            WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit</title>
</head>
<body>

<h2>Form Edit Siswa</h2>

<form method="POST">
    <input type="hidden" name="id" value="<?php echo $mahasiswa['id']; ?>"> <!-- Perbaikan -->
    <label>Username :</label>
    <input type="text" name="username" value="<?php echo $mahasiswa['username']; ?>" required> <!-- Perbaikan -->
    <br>
    <label>Email :</label>
    <input type="email" name="email" value="<?php echo $mahasiswa['email']; ?>" required>
    <br>
    <label>Nama :</label>
    <input type="text" name="nama" id="nama" value="<?php echo $mahasiswa['nama']; ?>" required>
    <br>
    <label>Phone :</label>
    <input type="number" name="phone" id="phone" value="<?php echo $mahasiswa['phone']; ?>" required> <!-- Perbaikan -->
    <br>
    <label>Alamat :</label>
    <input type="text" name="alamat" id="alamat" value="<?php echo $mahasiswa['alamat']; ?>" required> <!-- Perbaikan -->
    <br>
    <button type="submit">Submit</button>
</form>
<br>
<a href="index.php">Kembali</a>
    
</body>
</html>
