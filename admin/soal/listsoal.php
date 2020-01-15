<?php
if(!isset($_SESSION['id_admin'])) {
   header('location: ../');
}
?>
<div class="col-md-12">
<div class="box box-danger">
<div class="row">
   <div class="col-md-9 col-sm-9">
      <h3>Daftar Soal</h3>
   </div>
   <div class="col-md-3 col-sm-3" style="padding-top:10px;">
</div>
   <div style="clear:both"></div>
   <hr />
   <div class="col-md-12 col-sm-12">
      <table class="table table-striped table-hover">
            <thead>
                  <tr>
                  <th width="100px" style="text-align:center;">#</th>
                  <th style="text-align:center;">Soal</th>
                  <th style="text-align:center;">A</th>
                  <th style="text-align:center;">B</th>
                  <th style="text-align:center;">C</th>
                  <th style="text-align:center;">D</th>
                  <th width="200px" style="text-align:center;">Opsi</th>

                  </tr>
            </thead>
            <tbody>
                  <?php
                  require('../include/connection.php');
                  $no=1;
                  $sql = mysqli_query($con, "SELECT * FROM t_soal WHERE kategori='$kategori' ");

                  if (mysqli_num_rows($sql) > 0) {

                  $i = 1;
                  while($data = mysqli_fetch_array($sql)) {
                        ?>
                        <tr>
                        <td style="text-align:center;vertical-align:middle;">
                              <?php echo $no++; ?>
                        </td>
                        <td style="padding-left:25px;vertical-align:middle;">
                              <?php echo $data['soal']; ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                              <?php echo $data['a']; ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                              <?php echo $data['b']; ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                              <?php echo $data['c']; ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                              <?php echo $data['d']; ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                              <a href="?page=soal&action=editsoal&id=<?php echo $data['Idujian']; ?>" class="btn btn-warning btn-sm">
                              Edit
                              </a>
                              <a href="?page=soal&action=hapuss&id=<?php echo $data['Idujian']; ?>" class="btn btn-danger btn-sm">
                              Hapus
                              </a>
                        </td>

                        </tr>
                        <?php
                  }

                  } else {

                  echo "<tr>
                              <td colspan='10' style='text-align:center;'><h4>Belum ada data</h4></td>
                        </tr>";
                  }
                  ?>
            </tbody>
      </table>
      
      </div>
      </div>
      </div>
</div>
