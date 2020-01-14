<?php
$query = "SELECT max(id) as maxKode FROM images";
$hasil = mysqli_query($con,$query);
$data = mysqli_fetch_array($hasil);
$kodeadmin = $data['maxKode'];
$noUrut = (int) substr($kodeadmin, 3, 3);
$noUrut++;
$char = "PT";
$kodeadmin = $char . sprintf("%03s", $noUrut);
$sql = mysqli_query($con ,"SELECT * FROM images");
 if (mysqli_num_rows($sql) == 1) { 
    header('location: ./'); 
}else{

if(isset($_POST['upload'])){
    $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
    $nama = $_FILES['file']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $ukuran	= $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
   
   

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 1044070){			
            move_uploaded_file($file_tmp, '../assets/img/'.$nama);
            $query = mysqli_query($con,"INSERT INTO images(id, file_name) VALUES('$kodeadmin', '$nama')");
            if($query){
                echo 'FILE BERHASIL DI UPLOAD';
                header('location:?page=img');
            }else{
                echo 'GAGAL MENGUPLOAD GAMBAR';
            }
        }else{
            echo 'UKURAN FILE TERLALU BESAR';
        }
    }else{
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    }
}}
?>
<h3>Tambah Foto</h3>
<hr />
<div class="row">
    <div style="margin-left:20px;" class="col-md-8 col-sm-12">
    <form action="" method="post" enctype="multipart/form-data">
		<input type="file" name="file">
		<input class="btn btn-success" type="submit" name="upload" value="Upload">
        <br>
            </div>
        </form>
    </div>
</div>

