<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type= "text/css" href="assets/css/bootstrap-grid.css">
    <link rel="stylesheet" type= "text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type= "text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type= "text/css" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" type= "text/css" href="css/custom.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css">
	<link rel="stylesheet" href="css/styles1.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		$(function(){
			$(".icon-1").click(function(){
			  $(".input").toggleClass("active");
			  $(".container1").toggleClass("active");
			})
		});
	</script>

    <title>Osis SMA Ibrahimy</title>
  </head>
  <body>

      <!--Top Navbar-->

    <section>
         <nav class="navbar navbar-expand-lg navbar-dark bg-green">
        <div class="container">
          
            <img src="assets/img/home.png" width="4%">
            <a id="hi" class="navbar-brand" href="#">OSIS SMA Ibrahimy</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
              
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
              <!--<li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>-->
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
              <!--<li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>-->
              <li class="nav-item">
                <a id="ho" class="nav-link" href="index.html">Home</a>
             </li>
              <li class="nav-item">
                  <a id="ho" class="nav-link" href="#">Tes Online</a>
              </li>
              <li class="nav-item">
                <a id="ho" class="nav-link" href="#">Daftar</a>
              </li>
              <li class="nav-item">
                <a id="ho" class="nav-link" href="voting.php">Vote</a>
              </li>
              <li class="nav-item">
                <a id="ho" class="nav-link" href="#">Profil</a>
              </li>
              <li class="nav-item">
                  <a id="ho" class="nav-link" href="agenda.html" >Agenda</a> <!--disini saya menggunakan #section1 agar langsung menuju ke div id section1-->
              </li>
              <div class="search-box">
                  <input type="text" class="input">
              </div>
              <div class="icon-items icon-1">
                  <i class="fas fa-search"></i>
              </div>
              </ul>
            </div>
              </ul>
            </div>
   
            <li id="aman" class="nav-item dropdown">
              <img class="profile dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" src="assets/img/profile.png" width="15%">
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a id="he" class="dropdown-item" href="logout.php">LogOut</a>

                <!--Modal-->
                
                <center><button type="button" id="he" class="btn btn-light" data-toggle="modal" data-target="#exampleModal">
                Profil
                </button></center>
              </div>
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <center>
                    <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRbezqZpEuwGSvitKy3wrwnth5kysKdRqBW54cAszm_wiutku3R" style="border-radius:80%" name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
                    <h3 class="media-heading"><?php 
                      $result1 = mysqli_query($con, $sqlnama);
                      $row = mysqli_fetch_array($result1);
                      echo $row['fullname'];
                    ?> <small>XII IPA-2</small></h3>
                    <span><strong>Jabatan: </strong></span>
                        <?php
                        $result = mysqli_query($con,$sqljbt);
                        $row = mysqli_fetch_array($result);
                        if($row['id_jbtn'] == "3") {
                          echo "<span class='badge badge-danger'>Ketua Osis</span>";
                        }
                        else {
                          echo "<span class='badge badge-success'>Wakil Ketua</span>";
                        }
                        ?>
                    </center>
                    <hr>
                    <center>
                    <p class="text-left"><strong>Bio: </strong><br>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sem dui, tempor sit amet commodo a, vulputate vel tellus.</p>
                    <br>
                    </center>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div> 
            </li>
            </div>
            </div>
          </div>
        </div>
      </nav>
    </section>
    <section class="aboutu">
          <div class="container ">
              <div class="row">
                <div class="col-5">
                  <b style="color:black;">More Link</b>
                  <div id="sizeaboutu">
                    <p id="jarak2"><div id="section1"><a class="text-link" href="#">PRIVACY POLICY</a></div><br id="jarak2"><a class="text-link " href="#">TERMS AND CONDITIONS</a></p>
                  </div>
                </div>
              <div class="col-7">
                  <b style="color:black;">Contact Us</b>
                <div id="sizeaboutu">
                  <p id="jarak2">Perum Galaxy Patrang Blok G2 no 16 Jl Srikoyo Patrang, Jember - Indonesia</p>
                  <p><img src="assets/img/phone.png" width="2%">(+62) 81216382297</p>
                  <div id="jarak3"><img src="img/mail.png" width="3%">contact@bishop.com</div>
                  <p id="wa"><img src="assets/img/wa.png"  width="3%">081216382297  <img src="assets/img/line.png"  width="3%">@BiShop</p>
                  <hr>
                </div>
              </div>
            </div>
          </div>
      </section>
      <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/item.js"></script>
  </body>
</html>