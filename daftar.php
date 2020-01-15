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
                  <div class="container">
                  <?php
                        $cek = mysqli_query($con, "SELECT * FROM t_calon WHERE nis_calon='".$_SESSION['nis']."' AND status='proses'");
                        $cek1 = mysqli_query($con, "SELECT * FROM t_calon WHERE nis_calon='".$_SESSION['nis']."'");
                        $bauk = mysqli_fetch_array($cek1);
                        $adaa = mysqli_num_rows($cek);
                        $a = mysqli_query($con, "SELECT * FROM t_soal");
                        $rew = mysqli_fetch_array($a);
                        $b = mysqli_query($con, "SELECT * FROM t_skategori WHERE kategori='".$rew['kategori']."'");
                        $sql = mysqli_fetch_array($b);
                        $c = mysqli_query($con, "SELECT * FROM t_skategori WHERE aktif='1'");
                        //while($jumlah = mysqli_num_rows($c)){
                        $sqlc = mysqli_fetch_array($c);
                        
                        date_default_timezone_set('Asia/Jakarta');
                        $newEndingDate = date("Y-m-d H:i:s", strtotime("+".$sql['waktu'].'minutes' ));
                        
                        if($sqlc['aktif'] == "1"){
                                    echo $bauk['status'];
                                    if($bauk['status'] == "tes"){
                                    ?>
                                              <div style="background-color:white;margin-top:10px;margin-top:200px;padding:100px 0;" class="jumbotron jumbotron-fluid section ">
                                                <div class="container">
                                                <div class="col-md-12 col-12">
                                                <h3 class="display-4 text-center" style="color:grey;">Maaf Tes Online Belum Bisa Di Akses</h3>
                                                <h6 class="text-center">Silahkan Klik Tombol Dibawah Ini Untuk Kembali Ke Home</h6>
                                                <br>
                                                <center><a href="homepage.php"><button class="btn btn-success">Home</button></a></center><?php
                                          } elseif($adaa > 0){ ?>
                                                <div style="background-color:white;margin-top:10px;margin-top:200px;padding:100px 0;" class="jumbotron jumbotron-fluid section ">
                                          <div class="container">
                                          <div class="col-md-12 col-12">
                                          <h1 class="display-4 text-center" style="color:grey;">Maaf Anda Sudah Mendaftar</h1>
                                          <h6 class="text-center">Silahkan Klik Tombol Dibawah Ini Untuk Tes Online</h6>
                                          <br>
                                          <br>
                                          <form action="session-quiz.php" method="post">
                                          <input type="hidden" name="waktu" value="<?php echo $newEndingDate ?>">
                                          <input type="hidden" name="kategori" value="<?php echo $sql['kategori'] ?>">
                                          <center><input type="submit" class="btn btn-success" value="Tes Online" name="quiz"></center> <?php
                                    }else{
                                    ?>
                        <div style="background-color:white;margin-top:10px;margin-top:200px;padding:20px 0;" class="jumbotron jumbotron-fluid section ">
                              <div class="container">
                                    <div class="col-md-12 col-12">
                                    <h5 class="display-4 text-center">Masukkan Visi & Misi Anda</h5>
                                    <form action="input-visimisi.php" method="post">
                                    <div class="form-group col-md-4 offset-md-4 text-center">
                                    <label for="exampleInputPassword1">Visi</label>
                                    <input type="text" name="visihtml" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Visi">
                                    <input type="text" name="nishtml" class="form-control" id="exampleInputPassword1" value="<?php echo $_SESSION['nis']; ?>" hidden>
                                    </div>
                                    <div class="form-group col-md-4 offset-md-4 text-center">
                                    <label for="exampleInputPassword1">Misi</label>
                                    <input type="text" name="misihtml" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Misi">
                                    <input type="text" name="statushtml" value="proses" hidden>
                                    <input type="text" name="nilaihtml" hidden>
                                    </div>
                                    <button type="submit" class="btn2 offset-md-4 col-md-4 col-sm-4 col-4">Daftar</button>
                                    </form>
                                    </div>
                              </div>
                        </div>
                                    <?php }


                                    
                        }else{ ?>
                               <<div style="background-color:white;margin-top:10px;margin-top:200px;padding:100px 0;" class="jumbotron jumbotron-fluid section ">
                                                <div class="container">
                                                <div class="col-md-12 col-12">
                                                <h3 class="display-4 text-center" style="color:grey;">Maaf Tes Online Belum Bisa Di Akses</h3>
                                                <h6 class="text-center">Silahkan Klik Tombol Dibawah Ini Untuk Kembali Ke Home</h6>
                                                <br>
                                                <center><a href="homepage.php"><button class="btn btn-success">Home</button></a></center>
                       <?php }?>                         
 
                    </div>
                  </div>
                  </div>
            </header>
            </div>
            <div >
            
      <script type="text/javascript">
      
      function preventBack() { 
            window.history.forward();  
        } 
          
        setTimeout("preventBack()", 0); 
          
        window.onunload = function () { null }; 


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
      case 'quiz':
      include('./quiz-hasil.php');
      break;
            }
exit;
}


}
?>