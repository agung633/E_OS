<?php
if(!isset($_SESSION['id_admin'])) {
   header('location: ../');
}
if (isset($_POST['tambah'])) {
    $isi   = $_POST['isi'];
 
    if ($isi == null) {
 
       echo '<script type="text/javascript">alert("Semua form harus terisi");</script>';
 
    } else {
 
       $sql = $con->prepare("INSERT INTO t_ann(id, isi) VALUES ( '', '$isi')");
       $sql->execute();
 
       header('location:?page=ann&ann=success');
    }
   }
else if (isset($_POST['edit'])) {

   $isi   = $_POST['isi'];
 
   if ($isi == null) {

      echo '<script type="text/javascript">alert("Semua form harus terisi");</script>';

   } else {

      $sql = $con->prepare("UPDATE t_ann SET isi='$isi'");
      $sql->execute();

      header('location:?page=ann&ann=edit');
   }
}

?>
<div class="row">
   <div class="col-md-9 col-sm-9">
      <h3>Pengumuman</h3>
   </div>
   <div class="col-md-3 col-sm-3" style="padding-top:10px;">
      <a class="btn btn-danger" href="?page=ann&action=hapus">Remove Pengumuman</a>
</div>
   <div style="clear:both"></div>
   <hr />
   <div class="col-md-10 col-sm-12"> 
   <?php if (isset($_GET["ann"])) {
                  if ($_GET["ann"] == "success") {
                    echo '<div style="background:rgba(107, 249, 107, 0.56);padding:10px 0px 1px 0px;text-align:center;color:black;"><p>Pengumuman Ditambahkan!</p></div>';
                  }
                  elseif ($_GET["ann"] == "edit") {
                    echo '<div style="background:rgba(107, 249, 107, 0.56);padding:10px 0px 1px 0px;text-align:center;color:black;"><p>Pengumuman Sudah Di ganti!</p></div>';
                  }
                  elseif ($_GET["ann"] == "del") {
                     echo '<div style="background:rgba(248, 42, 42, 0.56);padding:10px 0px 1px 0px;text-align:center;color:black;"><p>Pengumuman Sudah Di hapus!</p></div>';
                   }
                }?>
   <form action="" method="post">
     <div class="form-group">
     <?php
         $hj = mysqli_query($con,"SELECT * FROM t_ann");
         $row = mysqli_fetch_array($hj);
         $banyak = mysqli_num_rows($hj);
            if($banyak > 0) {  ?>
         <label for="exampleFormControlTextarea1">Masukkan Pengumuman :</label>
         <textarea class="form-control" name="isi" id="exampleFormControlTextarea1" rows="10"><?php echo $row['isi'] ?></textarea>
         </div>
            <div class="col-md-3 col-sm-3" style="padding-top:10px;">
            <button name="edit" class="btn btn-success" type="submit">Simpan
            <?php } else { ?>
               <label for="exampleFormControlTextarea1">Masukkan Pengumuman :</label>
         <textarea class="form-control" name="isi" id="exampleFormControlTextarea1" placeholder="Silahkan Masukkan Pengumuman" rows="10"></textarea>
         </div>
            <div class="col-md-3 col-sm-3" style="padding-top:10px;">
            <button name="tambah" class="btn btn-success" type="submit">Simpan
            <?php } ?>
      </div>
      </div>
      </form>
</div>