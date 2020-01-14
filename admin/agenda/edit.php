<?php
$id          = $_GET['id'];
$gaga = mysqli_query($con,"SELECT * FROM tb_agenda WHERE id='$id'");
   
$ew = mysqli_fetch_array($gaga);



if (isset($_POST['add_soal'])) {


   $event       = $_POST['event'];
   $start       = $_POST['start'];
   $end         = $_POST['end'];


   if ($event == null || $start == null || $end == null) {

      echo '<script type="text/javascript">alert("Semua form harus terisi");window.history.go(-1);</script>';

   } else {

      mysqli_query($con,"UPDATE tb_agenda SET tittle='$event', start_event='$start', end_event='$end' WHERE id='$id'") or die(mysqli_error($con));


      header('location: ?page=agenda');
   }
}

if(!isset($_SESSION['id_admin'])) {
   header('location: ../');
}



?>
<h3>Tambah Soal</h3>
<hr />
<div class="row">
    <div class="col-md-8 col-sm-12">
        <form action="" method="post" class="form-horizontal">

            <div class="form-group">
            <label class="col-sm-2 control-label">Event</label>
            <div class="col-md-4">
            <textarea class="form-control" name="event" id="exampleFormControlTextarea1" rows="3"><?php echo $ew['tittle'] ?></textarea>
            </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Mulai</label>
                <div class="col-md-4">
                    <input class="form-control" type="datetime-local" name="start" value="" placeholder="Masukkan Jam Mulai Event" /><div style="background-color:rgba(139, 206, 247, 0.41);padding:10px 10px;margin-top:10px;"><?php echo "Data Awal : <br>".$ew['start_event']; ?></div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Akhir</label>
                <div class="col-md-4">
                    <input class="form-control" type="datetime-local" name="end" value="<?php echo $ew['end_event'] ?>" placeholder="Masukkan Jam Selesai Event" /><div style="background-color:rgba(139, 206, 247, 0.41);padding:10px 10px;margin-top:10px;"><?php echo "Data Awal : <br>".$ew['end_event']; ?></div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8 col-md-offset-2">
                    <button type="submit" name="add_soal" value="Tambah User" class="btn btn-success">Simpan</button>
                    <button type="button" onclick="window.history.back()" class="btn btn-danger">Kembali</button>
                </div>
            </div>
        </form>
    </div>
</div>

