<?php
include "koneksi.php";
mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim='$_GET[nim]'");
header("location:index.php");
?>
