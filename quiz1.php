<?php
define('BASEPATH', dirname(__FILE__));

include('./include/connection.php');

session_start();


  $pilihan=@$_POST["pilihan"];
  $id_soal=$_POST["id"];
  $jumlah=$_POST['jumlah'];
  $nis = $_SESSION['nis'];
 
  $score=0;
  $benar=0;
  $salah=0;
  $kosong=0;    
 
  for ($i=0;$i<$jumlah;$i++){
      //id nomor soal
      $nomor=$id_soal[$i];
     
      //jika user tidak memilih jawaban
      if (empty($pilihan[$nomor])){
          $kosong++;
      }else{
          //jawaban dari user
          $jawaban=$pilihan[$nomor];
         
          //cocokan jawaban user dengan jawaban di database
          $query=mysqli_query($con,"select * from t_soal where Idujian='$nomor' and kunci='$jawaban'");
         
          $cek=mysqli_num_rows($query);
         
          if($cek){
              //jika jawaban cocok (benar)
              $benar++;
          }else{
              //jika salah
              $salah++;
          }
        
         
      }
      /*RUMUS
      Jika anda ingin mendapatkan Nilai 100, berapapun jumlah soal yang ditampilkan
      hasil= 100 / jumlah soal * jawaban yang benar
      */
     
      $result=mysqli_query($con,"select * from t_soal");
      $jumlah_soal=mysqli_num_rows($result);
      $score = 100/$jumlah_soal*$benar;
      $hasil = number_format($score,1);
  }


        //Lakukan Penyimpanan Kedalam Database
        $_SESSION['hasil'] = $hasil;
        mysqli_query($con,"UPDATE t_calon SET nilai='$hasil', status='tes' WHERE nis_calon='$nis'") or die(mysqli_error($con));
        unset($_SESSION['tes']);
        echo $hasil;
        header("location:daftar.php?page=quiz");

        ?>