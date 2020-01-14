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
  <div class="wrapper-main">
            <section class="section-default">

              <?php
                $selector = $_GET["selector"];
                $validator = $_GET["validator"];

                if (empty($selector) || empty($validator)) {
                  echo "Kami tidak bisa memvalidasi permintaan anda!";
                } else {
                  if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false ) {
                    ?>

                    <form action="resetpw1.php" method="post">
                      <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                      <input type="hidden" name="validator" value="<?php echo $validator; ?>">
                     <center> <input  type="password" name="pwd"placeholder="Masukan password Baru..">
                      <br>
                      <br>
                      <input type="password" name="pwd-repeat"placeholder="Ulangi password Baru..">
                      <br>
                      <br>
                      <button type="submit" name="reset-password-submit">Reset Password</button></center>
                    </form>


                    <?php
                  }
                }
               ?>

            </section>
          </div>

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
