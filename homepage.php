<?php
session_start();

if(empty($_SESSION['nis'])){
      header("location:./index.php?page=error");
}else{

      define('BASEPATH', dirname(__FILE__));

      include('./include/connection.php');
      $cresult = mysqli_query($con,"SELECT SUBSTRING(fullname, 1, 10) AS ExtractString
      FROM t_user WHERE id_user='".$_SESSION['nis']."'");
      $row = mysqli_fetch_array($cresult);
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>SMA Ibrahimy</title>
      <link rel="stylesheet" href="css/stylee.css">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
      <script src="js/jquery.js"></script>
</head>
<body>
 
      <div class="wrapper">
            <header class="col-md-12 col-sm-12 col-12" style="background: url(assets/img/hero1.jpg) no-repeat 50% 50%;">
                  <nav>

                        <div class="menu-icon">
                              <i class="fa fa-bars fa-2x"></i>
                        </div>

                        <div class="logo">
                        <a href="homepage.php"><img src="assets/img/home.png" width="13%" style="margin-top:-8px"></a>
                              |&nbsp;SMA IBRAHIMY
                        </div>

                        <div class="menu">
                              <ul>
                                    <li><a style="text-decoration:none;" href="daftar.php">Tes Online</a></li>
                                    <li><a style="text-decoration:none;" href="voting.php">Voting</a></li>
                                    <li><a style="text-decoration:none;" href="agenda.php">Agenda</a></li>
                                    <li><a style="text-decoration:none;" href="profil.php"><?php echo $row['ExtractString']; ?></a></li>
                              </ul>
                        </div>
                  </nav>
                  <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                  <div class="col-md-3 bauk text-center">
                  <section class="section">
                    <h2>Mulai Voting Sekarang!</h2>
                    <a href="voting.php"><button class="btn2 aligns-items-center col-md-4 col-sm-4 col-4">Voting </button></a>
                  </section>
                    </div>
                  </div>
                  </div>
            </header>
            </div>
            <?php include "ann.php"; ?>
      <script type="text/javascript">

// Menu-toggle button

$(document).ready(function() {
      $(".menu-icon").on("click", function() {
            $("nav ul").toggleClass("showing");
            $('.section').fadeToggle();
      });
});

// Scrolling Effect

$(window).on("scroll", function() {
      if($(window).scrollTop()) {
            $('nav').addClass('black');
            $('.section').fadeOut();
      }

      else {
            $('nav').removeClass('black');
            $('.section').fadeIn();
      }
})


</script>
<?php
include "footer.php";

                  if (isset($_GET['page'])) {
                        switch ($_GET['page']) {
                        case 'terimakasih':
                        include('./thanks2.php');
                        break;
                              }
                  exit;
                  }

                  

}
?>