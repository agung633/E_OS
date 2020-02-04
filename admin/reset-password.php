
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-OS - Admin Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/css/AdminLTE.min.css">
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="./"><b>Admin</b> E-Osis</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <center><h3 class="login-box-msg">Reset Password</h3></center>
    <section class="section-default">
                <p>Sistem akan mengirim email kepada alamat email yang anda dan akan memberi petunjuk untuk mereset password anda.</p>
                <form action="resetpwreq.php" method="post">
                <center><input style="margin:20px 0;width:300px;text-align:center;" type="text" name="email" placeholder="Masukan Email">
                  <button type="submit" class="btn btn-primary btn-block btn-flat" name="reset-request-submit">Kirim Link Verifikasi</button></center>
                  </br>
                  <?php
                if (isset($_GET["reset"])) {
                  if ($_GET["reset"] == "success") {
                    echo '<div style="background:rgba(51,255,51,0.4);padding:10px 0px 1px 0px;text-align:center;color:black;"><p>Email Terkirim!</p></div>';
                  }
                  elseif ($_GET["reset"] == "error") {
                    echo '<div style="background:rgba(255,0,51,0.4);padding:10px 0px 1px 0px;text-align:center;color:black;"><p>Harap Isi Email Anda!</p></div>';
                  }
                  elseif ($_GET["reset"] == "ada") {
                    echo '<div style="background:rgba(255,0,51,0.4);padding:10px 0px 1px 0px;text-align:center;color:black;"><p>Email Tidak Di Temukan!</p></div>';
                  }elseif ($_GET["reset"] == "bla") {
                    echo '<div style="background:rgba(255,0,51,0.4);padding:10px 0px 1px 0px;text-align:center;color:black;"><p>Error Terjadi!</p></div>';
                  }
                }

                 ?>
                  <a href="index.php"><i class="large material-icons">chevron_left</i><div style="margin-left:23px;margin-top:-24px">Back</div></a>
                </form>
                
            </section>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="../assets/js/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>

