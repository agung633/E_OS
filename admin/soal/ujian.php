<?php
if (isset($_POST['add_ujian'])) {

   $namaujian    = $_POST['namaujian'];
   $time        = $_POST['waktu'];
   $id  =$_POST['id'];
   

   if ($namaujian == null || $time == null ) {

      echo '<script type="text/javascript">alert("Semua form harus terisi");window.history.go(-1);</script>';

   } else {
      $sql = $con->prepare("INSERT INTO t_skategori(idkategori, kategori, waktu) VALUES ('$id','$namaujian','$time')");
      
      $sql->execute();

      header('location: ?page=ujian&sasa=success');
   }
}

if(!isset($_SESSION['id_admin'])) {
   header('location: ../');


}
$query = "SELECT max(idkategori) as maxKode FROM t_skategori";
$hasil = mysqli_query($con,$query);
$data = mysqli_fetch_array($hasil);
$kodesoal = $data['maxKode'];
$noUrut = (int) substr($kodesoal, 3, 3);
$noUrut++;
$char = "KT";
$kodesoal = $char . sprintf("%03s", $noUrut);

?>


<h2> Tambah Ujian </h2>
<h2 style="float:right;margin-top:-40px;"> Daftar Ujian </h2>
    <hr>
    <div class="row">
    
        <div class="jumbotron col-sm-6">
        <?php if (isset($_GET["sasa"])) {
                  if ($_GET["sasa"] == "success") {
                    echo '<div style="background:rgba(51,255,51,0.4);padding:10px 0px 1px 0px;text-align:center;color:black;"><p>Data Berhasil Diinput!</p></div>';
                  }}?>
            <form action="" method="post">
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $kodesoal; ?>">
                <label for="exampleInputEmail1">Nama Ujian Baru</label>
                <input type="text" name="namaujian" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Nama Ujian">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Maksudkan Waktu</label>
                <input type="text" name="waktu" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Waktu Ujian">
            </div>
            <button type="submit" name="add_ujian" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-sm-6">
        <div class="box box-success">
            <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                        <th >#</th>
                        <th scope="col" style="text-align:center;">Nama Ujian</th>
                        <th scope="col"  style="text-align:center;">Waktu</th>
                        <th scope="col"  style="text-align:center;">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php 
                            require('../include/connection.php');

                            if (isset($_GET['hlm'])) {
                                        $hlm = $_GET['hlm'];
                                        $no  = (4*$hlm) - 3;
                                  } else {
                                        $hlm = 1;
                                        $no  = 1;
                                  }
                            $start  = ($hlm - 1) * 4;
          
                            $sql = mysqli_query($con, "SELECT * FROM t_skategori LIMIT $start,5");
          
                            if (mysqli_num_rows($sql) > 0) {
          
                            $i = 1;
                            while($data = mysqli_fetch_array($sql)) {
                        ?>
                        <td style="text-align:center;vertical-align:middle;"><?php echo $no++; ?></td>
                        <td style="text-align:center;vertical-align:middle;"><?php echo $data['kategori']; ?></td>
                        <td style="text-align:center;vertical-align:middle;"><?php echo $data['waktu']; ?></td>
                        <td style="text-align:center;vertical-align:middle;">
                        <a href="?page=soal&action=editujian&id=<?php echo $data['idkategori']; ?>" class="btn btn-warning btn-sm">
                              Edit
                              </a>
                              <a href="?page=ujian&action=hapus&id=<?php echo $data['idkategori']; ?>" onclick="return confirm('Yakin ingin menghapus ujian ini ?');" class="btn btn-danger btn-sm">
                              Hapus
                              </a>
                              <?php if($data['aktif'] == "0"){ ?>
                              <a href="?page=ujian&action=aktif&id=<?php echo $data['idkategori']; ?>" onclick="return confirm('Yakin ingin Mengaktifkan Ujian ini ?');" class="btn btn-success btn-sm">
                              Aktifkan
                              </a></td>
                              <?php }else{ ?>
                                <a href="?page=ujian&action=nonaktif&id=<?php echo $data['idkategori']; ?>" onclick="return confirm('Yakin ingin Menonaktifkan Ujian ini?');" class="btn btn-danger btn-sm">
                              Nonktifkan
                              </a></td>
                              <?php } ?>
                        </tr>

                        <?php 
                        
                            }
                        }else {
                            echo "<tr>
                              <td colspan='5' style='text-align:center;'><h4>Belum ada data</h4></td>
                        </tr>";
                        }
                        
                        ?>

                    </tbody>
            </table>
            </div>
    </div>

    <?php 
    
    if (isset($_GET['action'])) {

        switch ($_GET['action']) {
           case 'hapus':
            if (isset($_GET['id'])) {

                $aa = mysqli_query($con, "DELETE FROM t_skategori WHERE idkategori='".$_GET['id']."'") or die(mysqli_error($con));
    
                header('location: ?page=ujian');
             
             
          
             } else {
    
                header('location: ./');
    
             }
              break;

            case 'aktif':
                if (isset($_GET['id'])) {
   
                    $aa = mysqli_query($con, "UPDATE t_skategori SET aktif='1' WHERE idkategori='".$_GET['id']."'") or die(mysqli_error($con));
         
                     header('location: ?page=ujian');
                  
                  
               
                  } else {
         
                     header('location: ./');
         
                  }
                  break;
                  case 'nonaktif':
      
                     if (isset($_GET['id'])) {
            
                        $aa = mysqli_query($con, "UPDATE t_skategori SET aktif='0' WHERE idkategori='".$_GET['id']."'") or die(mysqli_error($con));
         
                        header('location: ?page=ujian');
                     
                     
                     
                  
                     } else {
            
                        header('location: ./');
            
                     }
                     break;
                     default:
         include('list.php');
         break;
            
            }
        }     
    
    ?>
