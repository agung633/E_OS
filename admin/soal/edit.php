<?php
if(!isset($_SESSION['id_admin'])) {
   header('location: ../');
}

$id   = strip_tags(mysqli_real_escape_string($con, $_GET['id']));

$sql  = $con->prepare("SELECT * FROM t_soal WHERE Idujian = ?") or die($con->error);
$sql->bind_param('s', $id);
$sql->execute();
$sql->store_result();
$sql->bind_result($id_soal, $no, $que, $option1, $option2, $option3, $option4, $ans, $kategori);
$sql->fetch();

?>
<h3>Update Soal</h3>
<hr />
<div class="row">
    <div class="col-md-8 col-sm-12">
        <form action="./soal/updates.php" method="post" class="form-horizontal">
      
        <div class="form-group">
                <label class="col-sm-2 control-label">ID Soal</label>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="id_soal"readonly value="<?php echo $id_soal; ?>" />
                </div>
            </div>

            <div class="form-group">
            <label class="col-sm-2 control-label">Soal</label>
            <div class="col-md-4">
            <textarea class="form-control" name="soal" id="exampleFormControlTextarea1" rows="3"><?php echo $que?></textarea>
            </div>
            </div>

            <div class="form-group">
            <div class="col-md-8">
               <center> <label>Pilihan Ganda</label> </center>
               </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Pil A</label>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="option1" placeholder="Masukkan Opsi A" value="<?php echo $option1 ?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Pil B</label>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="option2" placeholder="Masukkan Opsi B"  value="<?php echo $option2 ?>"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Pil C</label>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="option3" placeholder="Masukkan Opsi C" value="<?php echo $option3 ?> "/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Pil D</label>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="option4" placeholder="Masukkan Opsi D" value="<?php echo $option4 ?> "/>
                </div>
            </div>

            <br>
            <br>

            <div class="form-group">
                <label class="col-sm-2 control-label">Kunci Jawaban</label>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="ans" placeholder="Masukan Kunci Jawaban" value="<?php echo $ans ?>" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-8 col-md-offset-2">
                    <button type="submit" name="update" value="Update User" class="btn btn-success">Update Soal</button>
                    <button type="button" onclick="window.history.go(-1)" class="btn btn-danger">Kembali</button>
                </div>
            </div>
      
        </form>
    </div>
</div>
