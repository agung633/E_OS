<?php
if (isset($_POST['add_soal'])) {


   $event       = $_POST['event'];
   $start       = $_POST['start'];
   $end         = $_POST['end'];

   if ($event == null || $start == null || $end == null) {

      echo '<script type="text/javascript">alert("Semua form harus terisi");window.history.go(-1);</script>';

   } else {

      $sql = $con->prepare("INSERT INTO tb_agenda(id, tittle, start_event, end_event) VALUES ('', '$event', '$start', '$end')");
      
      $sql->execute();

      header('location: ?page=agenda');
   }
}

if(!isset($_SESSION['id_admin'])) {
   header('location: ../');
}



?>
<h3>Tambah Proker</h3>
<hr />
<div class="row">
    <div class="col-md-8 col-sm-12">
        <form action="" method="post" class="form-horizontal">

            <div class="form-group">
            <label class="col-sm-2 control-label">Event</label>
            <div class="col-md-4">
            <textarea class="form-control" name="event" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Mulai</label>
                <div class="col-md-4">
                    <input class="form-control" type="datetime-local" name="start" placeholder="Masukkan Jam Mulai Event" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Akhir</label>
                <div class="col-md-4">
                    <input class="form-control" type="datetime-local" name="end" placeholder="Masukkan Jam Selesai Event" />
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8 col-md-offset-2">
                    <button type="submit" name="add_soal" value="Tambah User" class="btn btn-success">Tambah Proker</button>
                    <button type="button" onclick="window.history.back()" class="btn btn-danger">Kembali</button>
                </div>
            </div>
        </form>
    </div>
</div>

