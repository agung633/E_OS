
<?php
$end = date('Y', strtotime('-1 years'));
$now = date('Y');
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF();
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'SMA IBRAHIMY',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'PENDAFTAR PENGURUS OSIS TAHUN '.$end.'/'.$now.'',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->SetMargins(25,0,0);
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',7);
$pdf->Cell(20,6,'NO DAFTAR',1,0,'C');
$pdf->Cell(20,6,'NIS',1,0,'C');
$pdf->Cell(85,6,'NAMA SISWA',1,0,'C');
$pdf->Cell(30,6,'NILAI',1,1,'C');

$pdf->SetFont('Arial','',7);


define('BASEPATH', dirname(__FILE__));

include('../../include/connection.php');

$width = 20;
$text= 100;
$line_height = 5;
$height = (ceil(($pdf->GetStringWidth($text) / $width)) * $line_height);


$mahasiswa = mysqli_query($con, "select * from t_calon");
while ($row = mysqli_fetch_array($mahasiswa)){
    if($row['nilai'] >= 75){
    $pdf->setFillColor(0,250,0);
    }else{
    $pdf->setFillColor(250,250,250);
    }
    $pdf->Cell(20,$height,$row['id_calon'],1,0,'',true);
    $pdf->Cell(20,$height,$row['nis_calon'],1,0,'',true);
    $nama = mysqli_query($con, "select * from t_user where id_user='".$row['nis_calon']."'");
    $row1 = mysqli_fetch_array($nama);
    $pdf->Cell(85,$height,$row1['fullname'],1,0,'',true);
    $pdf->Cell(30,$height,$row['nilai'],1,1,'',true);

    
}

$pdf->Output();
//header('location:../dashboard.php?page=kelas');
?>
