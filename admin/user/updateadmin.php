<?php
if (!isset($_POST['update'])) {

   header('location: ../');

} else {
   define('BASEPATH', dirname(__FILE__));

   include('../../include/connection.php');

   $id = $_POST['id_admin'];
   $username = $_POST['username'];
   $fullname  = $_POST['fullname'];
   $jabatan  = @$_POST['jabatan'];
   $jabatann  = $_POST['jabatann'];
   $password  = $_POST['password'];
   $email  = $_POST['email'];
   $admin = "1";
   $hashedpw = password_hash($password, PASSWORD_DEFAULT);

   if($password == '' || $fullname == '') {

      echo '<script type="text/javascript">alert("Semua form harus terisi");window.history.go(-1)</script>';

   } else if(!preg_match("/^[a-zA-z \'.]*$/",$fullname)) {

      echo '<script type="text/javascript">alert("Nama hanya boleh mengandung huruf, titik(.), petik tunggal");window.history.go(-1)</script>';

   } else if($jabatann != NULL) {

      $sql = $con->prepare("UPDATE t_admin SET  username = ?, fullname = ?, email= ?, id_jbtn = ?, password = ? WHERE id_admin = ?");
      if (!$sql) {
         printf("Error: %s\n", mysqli_error($con));
         exit();
     }
      $sql->bind_param('ssssss', $username, $fullname, $email, $admin, $hashedpw, $id);
      $sql->execute();

      header('location:../dashboard.php?page=user');

   }
   
   else {

      $sql = $con->prepare("UPDATE t_admin SET  username = ?, email= ?, fullname = ?, id_jbtn = ?, password = ? WHERE id_admin = ?");
      $sql->bind_param('ssssss', $username, $fullname, $email, $jabatan, $hashedpw, $id);
      $sql->execute();

      header('location:../dashboard.php?page=user');

   }

}

?>
