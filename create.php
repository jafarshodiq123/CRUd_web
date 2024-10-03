<?php
include 'config.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username  = $_POST['username'];
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $phone = $_POST['phone'];
    $alamat = $_POST['alamat'];
    $id = $_POST['id'];

    $sql = "INSERT INTO mahasiswa (username,email,nama,phone,alamat) VALUES ('$username', '$email', '$nama', '$phone','$alamat')";
    if($conn->query($sql)=== true){

        header("Location:index.php");

    } else {
        echo "tambah siswa gagal". $sql ."<br>". $conn->error;
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form tambah siswa</title>
</head>

<body>
    
<h2> Form tambah siswa</h2>

<form method ="POST">
    
    
    <label>Username :</label>
    <input type ="text" name ="username" id="username" placeholder="username" required>
    <br>
    <label>Email :</label>
    <input type="email" name="email" id="email" placeholder="email" required >
    <br>
    <label>Nama :</label>
    <input type="text" name="nama" id="nama" placeholder="nama" required>
    <br>
    <label>Phone :</label>
    <input type="number" name="phone" id="phone" placeholder="phone" required>
    <br>
    <label>Alamat :</label>
    <input type="text" name="alamat"id="alamat" placeholder="phone" required>

    <button type ="submit">Tambahkan</button>
</form>
<br>
<a href="index.php">kembali</a>

</body>
</html>