<?php
include 'config.php'; // Menghubungkan ke file konfigurasi database
$sql = "SELECT * FROM mahasiswa";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error); // Menampilkan pesan error jika query gagal
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar CRUD</title>
</head>
<body>

<h2>Selamat Datang</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>USERNAME</th>
        <th>EMAIL</th>
        <th>NAMA</th>
        <th>PHONE</th>
        <th>ALAMAT</th>
        <th>AKSI</th>
    </tr>
    
    <?php if ($result->num_rows > 0): // Memastikan ada hasil ?>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="7">Tidak ada data ditemukan</td>
        </tr>
    <?php endif; ?>
</table>

<br>
<a href="create.php">Tambah Siswa</a>

</body>
</html>
