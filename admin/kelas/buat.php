<?php $futureDate=date('Y', strtotime('-1 year')); 

echo'
<center>
<h1>SMA IBRAHIMY</h1>
<h3>DAFTAR PENGURUS OSIS TAHUN '.$futureDate.'/'.date("Y").'</h3>';
?>
<table border="1">
            <thead>
                  <tr>
                  <th style="text-align:center;">No</th>
                  <th style="text-align:center;">Nama Siswa</th>
                  <th style="text-align:center">Kelas</th>
                  <th width="130px" style="text-align:center;">Jenis Kelamin</th>
                  </tr>
            </thead>
            <tbody>
                  <?php
                  define('BASEPATH', dirname(__FILE__));

                  require('../../include/connection.php');

                  if (isset($_GET['hlm'])) {
                              $hlm = $_GET['hlm'];
                              $no  = (4*$hlm) - 3;
                        } else {
                              $hlm = 1;
                              $no  = 1;
                        }
                  $start  = ($hlm - 1) * 4;

                  $sql = mysqli_query($con, "SELECT * FROM t_user JOIN t_kelas ON t_user.id_kelas = t_kelas.id_kelas WHERE nama_kelas='XII'");

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
      </center>
      <?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Pegawai.xls");
	?>
 