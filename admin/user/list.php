<?php
$sqljab="SELECT * FROM t_admin WHERE fullname='".$_SESSION['user']."'";
if(!isset($_SESSION['id_admin'])) {
   header('location: ../');
}
?>
<div class="row">
   <div class="col-md-9 col-sm-9">
      <h3>Daftar Siswa</h3>
   </div>
   <div class="col-md-3 col-sm-3" style="padding-top:10px;">
   <a class="btn btn-success" href="?page=user&action=import"><i class="fa fa-file"></i>&nbsp;Import</a>
      <a class="btn btn-primary" href="?page=user&action=tambah">Tambah Siswa</a>
            <?php
             $result = mysqli_query($con,$sqljab);
            $row = mysqli_fetch_array($result);
            if($row['id_jbtn'] == "1"){ ?>
      <a class="btn btn-warning" href="?page=user&action=tambahadmin"></i>Tambah Admin</a>
            <?php 
            }
            ?>
   </div>
   <div style="clear:both"></div>
   <hr />
   <div class="col-md-10 col-sm-12">
  <?php if(isset($_GET['berhasil'])){
		echo '<div style="background:rgba(51,255,51,0.4);padding:10px 0px 1px 0px;text-align:center;color:black;"><p>'.$_GET["berhasil"].'&nbsp;Baris Ter-input</p></div>';
	}
            ?>
      <table class="table table-striped table-hover">
            <thead>
                  <tr>
                  <th style="text-align:center;">#</th>
                  <th style="text-align:center;">Nama Siswa</th>
                  <th style="text-align:center">Kelas</th>
                  <th width="130px" style="text-align:center;">Jenis Kelamin</th>
                  <th width="200px" style="text-align:center;">Opsi</th>
                  </tr>
            </thead>
            <tbody>
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

                  $sql = mysqli_query($con, "SELECT * FROM t_user JOIN t_kelas ON t_user.id_kelas = t_kelas.id_kelas LIMIT $start,4");

                  if (mysqli_num_rows($sql) > 0) {

                  $i = 1;
                  while($data = mysqli_fetch_array($sql)) {
                        ?>
                        <tr>
                        <td style="text-align:center;vertical-align:middle;">
                              <?php echo $no++; ?>
                        </td>
                        <td style="padding-left:25px;vertical-align:middle;">
                              <?php echo $data['fullname']; ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                              <?php echo $data['nama_kelas']; ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                              <?php
                              if($data['jk'] == 'L') {
                                    echo 'Laki - laki';
                              } else {
                                    echo 'Perempuan';
                              }
                              ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                              <a href="?page=user&action=edit&id=<?php echo $data['id_user']; ?>" class="btn btn-warning btn-sm">
                              Edit
                              </a>
                              <a href="?page=user&action=hapus&id=<?php echo $data['id_user']; ?>" onclick="return confirm('Yakin ingin menghapus user ini ?');" class="btn btn-danger btn-sm">
                              Hapus
                              </a>
                        </td>
                        </tr>
                        <?php
                  }

                  } else {

                  echo "<tr>
                              <td colspan='5' style='text-align:center;'><h4>Belum ada data</h4></td>
                        </tr>";
                  }
                  ?>
            </tbody>
      </table>
            <?php $result = mysqli_query($con,$sqljab);
                  $row = mysqli_fetch_array($result);
                  if($row['id_jbtn'] == "1"){ ?>

      </div>
</div>
<div class="row">
   <div class="col-md-9 col-sm-9">
      <h3>Daftar Admin</h3>
   </div>
   <div style="clear:both"></div>
   <hr />
   <div class="col-md-10 col-sm-12">
      <table class="table table-striped table-hover">
            <thead>
                  <tr>
                  <th style="text-align:center;">#</th>
                  <th style="text-align:center;">Nama Admin</th>
                  <th style="text-align:center">Jabatan</th>
                  <th width="130px" style="text-align:center;">Username</th>
                  <th width="130px" style="text-align:center;">Password</th>
                  <th width="200px" style="text-align:center;">Opsi</th>

                  </tr>
            </thead>
            <tbody>
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

                  $sql = mysqli_query($con, "SELECT * FROM t_admin JOIN t_jabatan ON t_admin.id_jbtn = t_jabatan.id_jbtn LIMIT $start,4");

                  if (mysqli_num_rows($sql) > 0) {

                  $i = 1;
                  while($data = mysqli_fetch_array($sql)) {
                        ?>
                        <tr>
                        <td style="text-align:center;vertical-align:middle;">
                              <?php echo $no++; ?>
                        </td>
                        <td style="padding-left:25px;vertical-align:middle;">
                              <?php echo $data['fullname']; ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                              <?php echo $data['jabatan']; ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                               <?php echo $data['username']; ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                               <?php echo $data['password']; ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                              <a href="?page=user&action=editadmin&id=<?php echo $data['id_admin']; ?>" class="btn btn-warning btn-sm">
                              Edit
                              </a>
                              <a href="?page=user&action=hapus1&id=<?php echo $data['id_admin']; ?>" onclick="return confirm('Yakin ingin menghapus user ini ?');" class="btn btn-danger btn-sm">
                              Hapus
                              </a>
                        </td>

                        </tr>
                        <?php
                  }

                  } else {

                  echo "<tr>
                              <td colspan='8' style='text-align:center;'><h4>Belum ada data</h4></td>
                        </tr>";
                  }
                  ?>
            </tbody>
      </table>
      <?php
      echo '<ul class="pagination">';
         if($hlm > 1){ //start if
            $hlmn = $hlm - 1;
      ?>
            <li class="waves-effect">
               <a href="?page=user&hlm=<?php  echo $hlmn; ?>">
                  <i class='fa fa-caret-left'></i> Prev
               </a>
            </li>
      <?php
         }		//end if $hlm > 1


         $hitung = mysqli_num_rows(mysqli_query($con, "SELECT * FROM t_user"));

         $total  = ceil($hitung /4 );
         for ($i = 1; $i <= $total ; $i++) { //start for
      ?>
            <li <?php if ($hlm != $i) { echo 'class="waves-effect"'; } else { echo 'class="active"'; } ?>>
               <a href="?page=user&hlm=<?php  echo $i; ?>">
                  <?php  echo $i; ?>
               </a>
            </li>
         <?php
         } // end for

         if ($hlm < $total) { //start if $hlm < $total
            $next = $hlm + 1;
         ?>
            <li class="waves-effect">
               <a href="?page=user&hlm=<?php  echo $next; ?>">
                  Next <i class='fa fa-caret-right'></i>
               </a>
            </li>
         <?php
         }	//end if $hlm < $total

      echo '</ul>';	//end pagination
      ?>
      </div>
</div>
      <?php } ?>
