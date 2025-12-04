include "koneksi.php";
$d = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$_GET[nim]'"));
?>

<form action="" method="post" enctype="multipart/form-data">
    Nama <input type="text" name="nama" value="<?= $d['nama'] ?>"><br>
    Prodi <input type="text" name="prodi" value="<?= $d['prodi'] ?>"><br>
    Alamat <input type="text" name="alamat" value="<?= $d['alamat'] ?>"><br>
    Gambar <input type="file" name="gambar"><br>
    <button type="submit" name="update">Update</button>
</form>

<?php
if(isset($_POST['update'])){
    $nama_gambar = $d['gambar'];

    if($_FILES['gambar']['name'] != ""){
        $nama_gambar = $_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], "upload/".$nama_gambar);
    }

    mysqli_query($koneksi, "UPDATE mahasiswa SET
        nama='$_POST[nama]',
        prodi='$_POST[prodi]',
        alamat='$_POST[alamat]',
        gambar='$nama_gambar'
    WHERE nim='$_GET[nim]'");

    header("location:index.php");
}
?>
