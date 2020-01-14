<div class="row">
   <div class="col-md-9 col-sm-9">
      <h3>Upload Image</h3>
   </div>
   <div class="col-md-3 col-sm-3" style="padding-top:10px;">
   <?php 
   $sql = mysqli_query($con, "SELECT * FROM images");
   if (mysqli_num_rows($sql) == 3) { 
   } else{?>

   <a href="?page=img&action=tambah" class="btn btn-primary" type="submit" name="submit">Upload</a>
   <?php } ?>
</div>

<div class="col-md-10 col-sm-12"> 
<hr width="120%">
<table class="table table-striped table-hover">
      <tr>
      <th style="text-align:center;">#</th>
      <th width="1000px" style="text-align:center;">Foto</th>
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

      $sql = mysqli_query($con, "SELECT * FROM images LIMIT $start,4");

      if (mysqli_num_rows($sql) > 0) {

      $i = 1;
      while($d = mysqli_fetch_array($sql)){
      ?>
	<tr>
            <td style="text-align:center;vertical-align:middle;"><?php echo $no++;?></td>
	      <td style="text-align:center;vertical-align:middle;"><img src="<?php echo "../assets/img/".$d['file_name']; ?>" width="10%"></td>
            <td style="text-align:center;vertical-align:middle;">
                              <a href="?page=img&action=hapus&id=<?php echo $d['id']; ?>" onclick="return confirm('Yakin ingin menghapus gambar ini ?');" class="btn btn-danger btn-sm">
                              Hapus
                              </a>
                        </td>		
	</tr>
	<?php }} else {

echo "<tr>
            <td colspan='5' style='text-align:center;'><h4>Belum ada data</h4></td>
      </tr>";
} ?>
      </table>
      <h5>* Anda Hanya Bisa Menambahkan 1 Gambar</h5>
</div>