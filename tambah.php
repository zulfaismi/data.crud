<form action="" method="post" enctype="multipart/form-data">
    NIM <input type="text" name="nim"><br>
    Nama <input type="text" name="nama"><br>
    Prodi <input type="text" name="prodi"><br>
    Alamat <input type="text" name="alamat"><br>
    Gambar <input type="file" name="gambar"><br>
    <button type="submit" name="simpan">Simpan</button>
</form>

<?php
include "koneksi.php";
if(isset($_POST['simpan'])){
    $nama_gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($tmp, "upload/".$nama_gambar);

    mysqli_query($koneksi, "INSERT INTO mahasiswa VALUES(
        '$_POST[nim]',
        '$_POST[nama]',
        '$_POST[prodi]',
        '$_POST[alamat]',
        '$nama_gambar'
    )");

    header("location:index.php");
}
?>
