<?php
if (!isset($_POST['update'])) {

   header('location: ../');

} else {
   define('BASEPATH', dirname(__FILE__));

   include('../../include/connection.php');

   $id = $_POST['id_soal'];
   $soal = $_POST['soal'];
   $opt1   = $_POST['option1'];
   $opt2   = $_POST['option2'];
   $opt3   = $_POST['option3'];
   $opt4   = $_POST['option4'];
   $ans   = $_POST['ans'];

   if($soal == '' || $opt2 == '') {

      echo '<script type="text/javascript">alert("Semua form harus terisi");window.history.go(-1);</script>';

   } else {

      mysqli_query($con,"UPDATE t_soal SET soal='$soal', b='$opt2', a='$opt1', c='$opt3', d='$opt4', kunci='$ans' WHERE Idujian='$id'");

      header('location:../dashboard.php?page=ujian');

   }

}

?>
