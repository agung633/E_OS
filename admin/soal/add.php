<?php
if (isset($_POST['add_soal'])) {

   $id_soal     = $_POST['id_soal'];
   $soal        = $_POST['soal'];
   $option1     = $_POST['option1'];
   $option2     = $_POST['option2'];
   $option3     = $_POST['option3'];
   $option4     = $_POST['option4'];
   $ans         =$_POST['ans'];

   if ($soal == null || $option1 == null || $option2 == null || $option3 == null || $option4 == null) {

      echo '<script type="text/javascript">alert("Semua form harus terisi");window.history.go(-1);</script>';

   } else {

      $sql = $con->prepare("INSERT INTO quiz(id_soal, que, option1, option2, option3, option4, ans) VALUES ('$id_soal', '$soal', '$option1', '$option2','$option3', '$option4', '$ans')");
      
      $sql->execute();

      header('location: ?page=soal');
   }
}

if(!isset($_SESSION['id_admin'])) {
   header('location: ../');
}


$query = "SELECT max(id_soal) as maxKode FROM quiz";
$hasil = mysqli_query($con,$query);
$data = mysqli_fetch_array($hasil);
$kodesoal = $data['maxKode'];
$noUrut = (int) substr($kodesoal, 3, 3);
$noUrut++;
$char = "SO";
$kodesoal = $char . sprintf("%03s", $noUrut);
?>
<h3>Tambah Soal</h3>
<hr />
<div class="row">
    <div class="col-md-8 col-sm-12">
        <form action="" method="post" class="form-horizontal">

            <div class="form-group">
                <label class="col-sm-2 control-label">ID Soal</label>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="id_soal"readonly value="<?php echo $kodesoal; ?>" />
                </div>
            </div>

            <div class="form-group">
            <label class="col-sm-2 control-label">Soal</label>
            <div class="col-md-4">
            <textarea class="form-control" name="soal" id="exampleFormControlTextarea1" rows="3"></textarea>
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
                    <input class="form-control" type="text" name="option1" placeholder="Masukkan Opsi A" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Pil B</label>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="option2" placeholder="Masukkan Opsi B" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Pil C</label>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="option3" placeholder="Masukkan Opsi C" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Pil D</label>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="option4" placeholder="Masukkan Opsi D" />
                </div>
            </div>

            <br>
            <br>

            <div class="form-group">
                <label class="col-sm-2 control-label">Kunci Jawaban</label>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="ans" placeholder="Masukan Kunci Jawaban" />
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8 col-md-offset-2">
                    <button type="submit" name="add_soal" value="Tambah User" class="btn btn-success">Tambah Siswa</button>
                    <button type="button" onclick="window.history.back()" class="btn btn-danger">Kembali</button>
                </div>
            </div>
        </form>
    </div>
</div>

