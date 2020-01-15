<?php
session_start();
if (empty($_SESSION['nis'])) {
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
                                    <li><a style="text-decoration:none;" href="#">Agenda</a></li>
                                    <li><a style="text-decoration:none;" href="profil.php"><?php echo $row['ExtractString']; ?></a></li>
                              </ul>
                        </div>
                  </nav>
                  <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                  <div class="container"><?php if(empty($_SESSION['tes'])){
                      echo '<div style="background-color:white;margin-top:10px;margin-top:200px;padding:100px 0;" class="jumbotron jumbotron-fluid section ">';
                      echo '<h2 style="color:grey;" class="text-center">Silahkan Mendaftar / Sesi Tes Online Sudah Habis</h2>
                      <br>
                        <center><a href="homepage.php"><button class="btn btn-success">Kembali Ke Home</button></a></center>';
                }else{ ?>
                <div style="background-color:white;margin-top:10px;margin-top:200px;padding:60px 0;" class="jumbotron jumbotron-fluid section ">
                    <div class="container">
                        <div class="col-md-12 col-12">
                        <?php 
                        $a = mysqli_query($con, "SELECT * FROM t_soal");
                        $rew = mysqli_fetch_array($a);
                        $b = mysqli_query($con, "SELECT * FROM t_skategori WHERE kategori='".$rew['kategori']."'");
                        $sql = mysqli_fetch_array($b);
                        ?>
                        <span style="background-color:#4CAF50;padding:10px 50px;color:white;" id="time"></span>
                        <?php 
                        echo "<h2 class='text-center'>SMAN IBRAHIMY</h2>";  
echo '<div class="col-md-12">';

$halaman = 2;
$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$result = mysqli_query($con,"SELECT * FROM t_soal");
$total = mysqli_num_rows($result);
$pages = ceil($total/$halaman);           
$query = mysqli_query($con,"select * from t_soal  ");
        $urut=$mulai+1;
        while($row =mysqli_fetch_array($query))
        {
            $id=$row["Idujian"];
            $pertanyaan=$row["soal"];
            $pilihan_a=$row["a"];
            $pilihan_b=$row["b"];
            $pilihan_c=$row["c"];
            $pilihan_d=$row["d"];
           
            ?>
            <form name="form1" method="post" action="quiz1.php">
            <input type="hidden" name="id[]" value=<?php echo $id; ?>>
            <input type="hidden" name="jumlah" value=<?php echo $total; ?>>
            <div class="col-md3">
            <br>
                <h3  width="17"><font color="#000000"></font>
                <h5 class="text-center" width="430"><font color="#000000"><?php echo $urut++;  echo "&nbsp;. ".$pertanyaan.""; ?></font></h5>
            </div>
            <?php
                // if (!empty($row["gambar"])) {
                //     echo "<tr><td></td><td><img src='foto/$row[gambar]' width='200' hight='200'></td></tr>";
                // }
            ?>
                  </br>
                
                  <center>
             A.  <input name="pilihan[<?php echo $id; ?>]" type="radio" value="<?php echo $pilihan_a; ?>">
              <?php echo "$pilihan_a";?>
            
            
            <font color="#000000">&nbsp;</font>
            <font color="#000000">
             B. <input name="pilihan[<?php echo $id; ?>]" type="radio" value="<?php echo $pilihan_b; ?>">
              <?php echo "$pilihan_b";?></font> 
           
            <font color="#000000">&nbsp;</font>
            <font color="#000000">
            C.  <input name="pilihan[<?php echo $id; ?>]" type="radio" value="<?php echo $pilihan_c; ?>">
              <?php echo "$pilihan_c";?></font> 
         
            <font color="#000000">&nbsp;</font>
            <font color="#000000">
            D.   <input name="pilihan[<?php echo $id; ?>]" type="radio" value="<?php echo $pilihan_d; ?>">
              <?php echo "$pilihan_d";?></font> </center>
                <?php } ?>
              <!-- <div class=""> -->
  <?php 
  ?>
  <input type="submit" style="float:right;margin-right:20px" class="btn btn-success" name="submit" value="Jawab" onclick="return confirm('Apakah Anda yakin dengan jawaban Anda?')">
</div>

                
                </form> <?php } ?>
</div>
                        </div>
                    </div>
                </div>
                    </div>
                  </div>
                  </div>
            </header>
            </div>
            <div >
            
      <script type="text/javascript">
      //timer

function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            window.location = "expire.php";
        }
    }, 1000);
}

window.onload = function () {
    var fiveMinutes = 60 * <?php echo $sql['waktu']; ?>,
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
};


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
 
      }

      else {
            $('nav').removeClass('black');

      }
})


</script>
<?php
include "footer.php";

}
?>