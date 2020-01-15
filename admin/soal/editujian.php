<?php
if(!isset($_SESSION['id_admin'])) {
   header('location: ../');
}

$id   = strip_tags(mysqli_real_escape_string($con, $_GET['id']));

$sql  = $con->prepare("SELECT * FROM t_skategori WHERE idkategori = ?") or die($con->error);
$sql->bind_param('s', $id);
$sql->execute();
$sql->store_result();
$sql->bind_result($id_kategori, $kategori, $waktu, $aktif);
$sql->fetch();

?>
<h3>Update Ujian</h3>
<hr />
<div class="row">
    <div class="col-md-8 col-sm-12">
        <form action="./soal/update.php" method="post" class="form-horizontal">

            <div class="form-group">
                <label class="col-sm-2 control-label">Nama Ujian</label>
                <div class="col-md-4">
                <input class="form-control" readonly type="hidden" name="id" placeholder="Masukkan Opsi A" value="<?php echo $id ?>" />
                    <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama Ujian" value="<?php echo $kategori ?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Waktu (Menit)</label>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="waktu" placeholder="Masukkan Waktu"  value="<?php echo $waktu ?>"/>
                </div>
            </div>

            <br>
            <br>

            <div class="form-group">
                <div class="col-md-8 col-md-offset-2">
                    <button type="submit" name="update" value="Update User" class="btn btn-success">Simpan</button>
                    <button type="button" onclick="window.history.go(-1)" class="btn btn-danger">Kembali</button>
                </div>
            </div>
      
        </form>
    </div>
</div>
