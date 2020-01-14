<?php
 $cresult = mysqli_query($con,"SELECT SUBSTRING(start_event, 1, 10) AS ExtractString
 FROM tb_agenda");
 $row = mysqli_fetch_array($cresult);
?>
<div class="row">
   <div class="col-md-9 col-sm-9">
      <h3>Agenda</h3>
   </div>
   <div class="col-md-3 col-sm-3" style="padding-top:10px;">
   <?php 
   $sql = mysqli_query($con, "SELECT * FROM images");
   if (mysqli_num_rows($sql) == 3) { 
   } else{?>

   <a href="?page=agenda&action=tambah" class="btn btn-primary" type="submit" name="submit">Tambah Proker</a>
   <?php } ?>
</div>

<div class="col-md-10 col-sm-12"> 
<hr width="120%">
<table class="table table-striped table-hover">
      <tr>
      <th width="100px" style="text-align:center;">#</th>
      <th width="200px" style="text-align:center;">Mulai</th>
      <th width="200px" style="text-align:center;">Akhir</th>
      <th width="200px" style="text-align:center;">Waktu</th>
      <th style="text-align:center;">Proker</th>
      <th width="200px" style="text-align:center">Opsi</th>
      </tr>
      <?php 
      if (isset($_GET['hlm'])) {
            $hlm = $_GET['hlm'];
            $no  = (4*$hlm) - 3;
      } else {
            $hlm = 1;
            $no  = 1;
      }
      $start  = ($hlm - 1) * 4;

      $sql = mysqli_query($con, "SELECT * FROM tb_agenda LIMIT $start,4");

      if (mysqli_num_rows($sql) > 0) {

      $i = 1;
      while($d = mysqli_fetch_array($sql)){
            $cresult = mysqli_query($con,"SELECT SUBSTRING(start_event, 1, 15) AS ExtractString
            FROM tb_agenda");
            $row = mysqli_fetch_array($cresult);
      ?>
	<tr>
            <td style="text-align:center;vertical-align:middle;"><?php echo $no++;?></td>
	      <td style="text-align:center;vertical-align:middle;"><?php echo $d['start_event'] ?></td>
            <td style="text-align:center;vertical-align:middle;"><?php echo $d['end_event'] ?></td>
            <?php $seconds = strtotime("".$d['end_event']."") - strtotime("".$d['start_event']."");

                  $days    = floor($seconds / 86400);
                  $hours   = floor(($seconds - ($days * 86400)) / 3600);
                  $minutes = floor(($seconds - ($days * 86400) - ($hours * 3600))/60);
                  $seconds = floor(($seconds - ($days * 86400) - ($hours * 3600) - ($minutes*60)));
                  
                  if($hours > 0){
            ?><td style="text-align:center;vertical-align:middle;"><?php echo $hours." Jam"?></td><?php  
                  }else{
                  ?>
            <td style="text-align:center;vertical-align:middle;"><?php echo $days." Hari"?></td>
                  <?php } ?>
            <td style="text-align:center;vertical-align:middle;"><?php echo $d['tittle']?></td>
            <td style="text-align:center;vertical-align:middle;">
                              <a href="?page=agenda&action=hapus&id=<?php echo $d['id']; ?>" onclick="return confirm('Yakin ingin menghapus proker ini ?');" class="btn btn-danger btn-sm">
                              Hapus
                              </a>
                              <a href="?page=agenda&action=edit&id=<?php echo $d['id']; ?>"  class="btn btn-warning btn-sm">
                              Edit
                              </a>
                        </td>		
	</tr>
	<?php }} else {

echo "<tr>
            <td colspan='5' style='text-align:center;'><h4>Belum ada data</h4></td>
      </tr>";
} ?>
      </table>
      
</div>