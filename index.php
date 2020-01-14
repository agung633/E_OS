<?php 
            define('BASEPATH', dirname(__FILE__));
            include('./include/connection.php');
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
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="js/jquery.js"></script>
</head>
<body>
 
<?php
$sql = mysqli_query($con, "SELECT * FROM images");
$d = mysqli_fetch_array($sql);

?>

      <div class="wrapper">
            <header class="col-md-12 col-sm-12 col-12" style="background: url(<?php echo "./assets/img/".$d['file_name']; ?>) no-repeat 50% 50%;">
                  <nav>

                        <div class="menu-icon">
                              <i class="fa fa-bars fa-2x"></i>
                        </div>

                        <div class="logo">
                        <a href="index.php"><img src="assets/img/home.png" width="13%" style="margin-top:-8px"></a>
                              |&nbsp;SMA IBRAHIMY
                        </div>

                        <div class="menu">
                              <ul>
                                    <li><a href="daftar.php">Tes Online</a></li>
                                    <li><a href="voting.php">Voting</a></li>
                                    <li><a href="agenda.php">Agenda</a></li>
                                    <li><a href="profil.php">Profil</a></li>
                              </ul>
                        </div>
                  </nav>
                  <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                  <div class="col-md-3 bauk text-center">
                  <section class="section" >
                    <h4>Official Website Of Osis Ibrahimy</h4>
                    <a href="login.php"><button class="btn2 aligns-items-center col-md-4 col-sm-4 col-4">Login</button></a>
                    </section>
                    </div>
                  </div>
                  </div>
            </header>
            </div>
            

            <?php


      $cresult = mysqli_query($con,"SELECT * FROM t_ann");
      $row = mysqli_fetch_array($cresult);
      $ada=mysqli_num_rows($cresult);
      $isi=$row['isi'];
      $wallpost=nl2br($isi);
?>

<div class="container">
              <div style="background-color:white;margin-top:10px" class="jumbotron jumbotron-fluid">
                <div class="container">
                    <?php
                    if($ada == 0){
                    ?>
                    <h1 class="display-4 text-center" style="color:grey;">Tidak Ada Pengumuman</h1>
                    <?php }else{ ?>
                  <h1 class="display-4">Pengumuman</h1>
                    <p class="lead"><?php echo $wallpost?></p>
                    <?php } ?>
                </div>
              </div>
            </div>

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
?>
</body>
</html>
<?php
                  if (isset($_GET['page'])) {
                  switch ($_GET['page']) {
                  case 'error':
                  include('./error.php');
                  break;
                                    

                  }
                  exit;
                  }
                  ?>
