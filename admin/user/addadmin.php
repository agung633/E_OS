<?php

if(!isset($_SESSION['id_admin'])) {
   header('location: ../');
}




if(isset($_POST['add_user'])) {
    $id_admin = $_POST['id'];
   $username  = $_POST['username'];
   $fullname = $_POST['fullname'];
   $password  = $_POST['password'];
   $email = $_POST['email'];
   $jabatan = $_POST['jabatan'];
   $hashedpw = password_hash($password, PASSWORD_DEFAULT);
   $id = mysqli_query($con, "SELECT username FROM t_admin WHERE username='$username'");
   $ada =mysqli_query($con, "SELECT email FROM t_admin WHERE email='$email'");

   if( $username == '' || $fullname == '' || $password == '') {

      echo '<script type="text/javascript">alert("Semua form harus terisi");</script>';

   } else if(!preg_match("/^[a-zA-z \'.]*$/",$fullname)) {

      echo '<script type="text/javascript">alert("Nama hanya boleh mengandung huruf, titik(.), petik tunggal");</script>';

   }else if (mysqli_num_rows($id) > 0){
    echo '<script type="text/javascript">alert("Username Sudah DIpakai");window.history.go(-1);</script>';
    
    }else if (mysqli_num_rows($ada) > 0){
        echo '<script type="text/javascript">alert("Email Sudah Digunakan");window.history.go(-1);</script>';
        
        }
    else{

      $sql = $con->prepare("INSERT INTO t_admin VALUES('$id_admin', '$username', '$fullname', '$email', '$jabatan', '$hashedpw')");
      $sql->execute();


      header('location: ?page=user');

   }

}
if(!isset($_SESSION['id_admin'])) {
    header('location: ../');
 }
 
 $query = "SELECT max(id_admin) as maxKode FROM t_admin";
 $hasil = mysqli_query($con,$query);
 $data = mysqli_fetch_array($hasil);
 $kodeadmin = $data['maxKode'];
 $noUrut = (int) substr($kodeadmin, 3, 3);
 $noUrut++;
 $char = "AD";
 $kodeadmin = $char . sprintf("%03s", $noUrut);
?>
<h3>Tambah Data Admin</h3>
<hr />
<div class="row">
    <div class="col-md-8 col-sm-12">
        <form action="" method="post" class="form-horizontal">
        <div class="form-group">
        <label class="col-sm-2 control-label">ID Admin</label>
                <div class="col-md-4">
                <input class="form-control" type="text" name="id" readonly value="<?php echo $kodeadmin; ?>" />
            </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Username</label>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="username" placeholder="Username" type="number"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Fullname</label>
                <div class="col-md-8">
                    <input class="form-control" name="fullname" type="text" placeholder="Nama Admin"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Password</label>
                <div class="col-md-8">
                    <input class="form-control" name="password" type="password" placeholder="Mauskkan Password"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Jabatan</label>
                <div class="col-md-6">
                    <select name="jabatan" required="jabatan" class="form-control">
                        <option value="#">-- Pilih Jabatan --</option>
                        <?php
                        $jbtn = $con->prepare("SELECT id_jbtn FROM t_admin WHERE id_jbtn LIKE '3'");
                        $jbtn->execute();
                        $jbtn->store_result();
                        $jbn = $jbtn->num_rows();
                        if ($jbn > 0){
                         $kelas = mysqli_query($con, "SELECT * FROM t_jabatan WHERE id_jbtn = '2'");
                         while ($key = mysqli_fetch_array($kelas)) {
                         ?>
                             <option value="<?php echo $key['id_jbtn']; ?>">
                                 <?php echo $key['jabatan']; ?>
                             </option>
                             </select> <center> <p style="background-color:rgba(255, 91, 91, 0.4);padding:10px 0px;margin-bottom:0px; margin-top:15px;">Maaf Ketua Osis Sudah Ada</p></center><?php }

                        }else{
                            $kelas = mysqli_query($con, "SELECT * FROM t_jabatan WHERE id_jbtn != '1'");
                            while ($key = mysqli_fetch_array($kelas)) {
                            ?>
                                <option value="<?php echo $key['id_jbtn']; ?>">
                                    <?php echo $key['jabatan']; ?>
                                </option>
                                
                            <?php }}
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-md-8">
                    <input class="form-control" name="email" type="text" placeholder="Masukkan Email"/>
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-8 col-md-offset-2">
                    <button type="submit" name="add_user" value="Tambah User" class="btn btn-success">Tambah Admin</button>
                    <button type="button" onclick="window.history.back()" class="btn btn-danger">Kembali</button>
                </div>
            </div>
        </form>
    </div>
</div>



