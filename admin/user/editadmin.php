<?php
if(!isset($_SESSION['id_admin'])) {
   header('location: ../');
}

$id   = strip_tags(mysqli_real_escape_string($con, $_GET['id']));

$sql  = $con->prepare("SELECT * FROM t_admin WHERE id_admin = ?") or die($con->error);
$sql->bind_param('s', $id);
$sql->execute();
$sql->store_result();
$sql->bind_result($id_admin, $username, $fullname,$email, $id_jbtn, $password);
$sql->fetch();

?>
<h3>Update Data Admin</h3>
<hr />
<div class="row">
    <div class="col-md-8 col-sm-12">
        <form action="./user/updateadmin.php" method="post" class="form-horizontal">
      
            <div class="form-group">
                <label class="col-sm-2 control-label">ID ADMIN</label>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="id_admin" placeholder="NIS" type="number" readonly value="<?php echo $id_admin; ?>"/>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Nama Admin</label>
                <div class="col-md-8">
                    <input class="form-control" name="fullname" type="text" placeholder="Nama Siswa" value="<?php echo $fullname; ?>"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Username</label>
                <div class="col-md-8">
                    <input class="form-control" name="username" type="text" placeholder="Nama Siswa" value="<?php echo $username; ?>"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Password</label>
                <div class="col-md-8">
                    <input class="form-control" name="password" type="text" placeholder="Nama Siswa" value="<?php echo $password; ?>"/>
                </div>
            </div>

            <?php
                        $jbtn = $con->prepare("SELECT id_jbtn FROM t_admin WHERE id_jbtn = '1'");
                        $jbtn->execute();
                        $jbtn->store_result();
                        $jbn = $jbtn->num_rows();
                        if ($jbn > 0){ ?>
            <div class="form-group">
                <label class="col-sm-2 control-label">Jabatan</label>
                <div class="col-md-4">
                    <input class="form-control" name="jabatann" type="text" placeholder="NIS" type="number" readonly value="Super Admin"/>
                </div>
            </div>
                            
                        <?php }else{ ?>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Jabatan</label>
                <div class="col-md-6">
                    <select name="jabatan" required="jabatan" class="form-control">
                        <option value="#">-- Pilih Jabatan --</option>
                        <?php
                            $kelas = mysqli_query($con, "SELECT * FROM t_jabatan Where id_jbtn != '1 '");
                            while ($key = mysqli_fetch_array($kelas)) {
                            ?>
                                <option value="<?php echo $key['id_jbtn']; ?>" <?php if ($id_jbtn == $key['id_jbtn']) { echo 'selected'; } ?> >
                                    <?php echo $key['jabatan']; ?>
                                </option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
                        <?php }?>

            <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-md-8">
                    <input class="form-control" name="email" type="text" value="<?php echo $email; ?>" placeholder="Nama Siswa"/>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-md-8 col-md-offset-2">
                    <button type="submit" name="update" value="Update User" class="btn btn-success">Simpan</button>
                    <button type="button" onclick="window.history.go(-1)" class="btn btn-danger">Kembali</button>
                </div>
            </div>
      
        </form>
    </div>
</div>
