<?php
if (!isset($_POST['update'])) {

   header('location: ../');

} else {
   define('BASEPATH', dirname(__FILE__));

   include('../../include/connection.php');

   $id = $_POST['id'];
   $nama = $_POST['nama'];
   $waktu   = $_POST['waktu'];

   if($waktu == '' || $nama == '') {

      echo '<script type="text/javascript">alert("Semua form harus terisi");window.history.go(-1);</script>';

   } else if(!preg_match("/^[a-zA-z \'.]*$/",$nama)) {

      echo '<script type="text/javascript">alert("Nama hanya boleh mengandung huruf, titik(.), petik tunggal");window.history.go(-1)</script>';

   } else {

      $s = mysqli_query($con,"SELECT * FROM t_skategori WHERE idkategori='$id'");
      $a = mysqli_fetch_array($s);
      mysqli_query($con,"UPDATE t_soal SET  kategori='$nama' WHERE kategori='".$a['kategori']."'");
      mysqli_query($con,"UPDATE t_skategori SET  kategori='$nama', waktu='$waktu' WHERE idkategori='$id'");

      header('location:../dashboard.php?page=ujian');

   }

}

?>
