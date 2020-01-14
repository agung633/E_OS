<?php



include('../include/connection.php');


$pesan = mysqli_query($con,"SELECT * FROM t_calon
    WHERE status='proses'");
$j = mysqli_num_rows($pesan);
if($j>0){
    echo $j;
}/////// jumlah notifikasi 1,2,3 dll
?>
