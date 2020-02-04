<?php

if (isset($_POST["reset-password-submit"])) {

  $selector = $_POST["selector"];
  $validator = $_POST["validator"];
  $password = $_POST["pwd"];
  $passwordRepeat = $_POST["pwd-repeat"];

  if (empty($password) || empty($passwordRepeat)) {
    header("Location: ../create-new-password.php?newpwd=empty"); // tulisan "create-new-password.php" do ganti menjadi "signup.php" untuk sementara soanya masih belum bisa work kalau masih memakai "create-new-password.php".
    exit();
  }elseif ($password !== $passwordRepeat) {
    header("Location: ../create-new-password.php?newpwd=pwdtidaksama"); // tulisan "create-new-password.php" do ganti menjadi "signup.php" untuk sementara soanya masih belum bisa work kalau masih memakai "create-new-password.php".
    exit();
  }

  $currentDate = date("U");

  define('BASEPATH', dirname(__FILE__));

  include('../include/connection.php');

  $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpire >= ?";
  $stmt = mysqli_stmt_init($con);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "Telah terjadi Error!";
    exit();
  }else {
    mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);  //di videonya mengatakan kalau jangan lupa untuk menambahkan $currentDate di sini  jadi setelah $selector di beri koma lalu tambahkan spasi lalu tambahkan $currentDate
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if (!$row = mysqli_fetch_assoc($result)) {
      echo "Anda butuh untuk meminta ulang reset password lakukan secara ulang mulai memasukan email anda di halaman reset password!";
      exit();
    }else {

      $tokenBin = hex2bin($validator);
      $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

      if ($tokenCheck === false) {
        echo "Anda butuh untuk meminta ulang reset password lakukan secara ulang mulai memasukan email anda di halaman reset password!!";
        exit();
      }elseif ($tokenCheck === true) {

        $tokenEmail = $row['pwdResetEmail'];

        $sql = "SELECT * FROM t_admin WHERE email=?;";
        $stmt = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          echo "Telah terjadi Error!";
          exit();
        }else {
          mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          if (!$row = mysqli_fetch_assoc($result)) {
            echo "Telah terjadi Error!";
            exit();
          }else {

            $sql = "UPDATE t_admin SET password=? WHERE email=?";
            $stmt = mysqli_stmt_init($con);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo "Telah terjadi Error1";
              exit();
            }else {
              $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
              mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
              mysqli_stmt_execute($stmt);

              $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
                $stmt = mysqli_stmt_init($con);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                  echo "Telah terjadi error2";
                  exit();
                }else {
                  mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                  mysqli_stmt_prepare($stmt);
                  header("Location: index.php?newpwd=passwordterupdate");
                }


            }

          }
        }
      }

    }
  }

} else {
    header("Location: ../index.php");
}
