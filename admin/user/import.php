<h3>Import File Excel</h3>
<hr />
<?php
if(isset($_POST)) 
?>
<div id="ada">
<h3>Download Panduan Import Excel<a href="../assets/PANDUAN IMPORT EXCEL KE DATABASE.pdf">&nbsp;Disini</a></h3>
<button class="btn btn-success"  onclick="keliatan()">Saya Mengerti</button>
</div>
<div id="cek">
<form method="post" enctype="multipart/form-data" action="./user/upload_aksi.php">
	Pilih File: 
	<input name="filepegawai" type="file" required="required"> 
    <br>
	<input class="btn btn-primary" name="upload" type="submit" value="Import">
</form>
</div>
<script>
function keliatan(){
    document.getElementById("cek").style.visibility = "visible";
    document.getElementById("ada").style.display = "none";
}

document.getElementById("cek").style.visibility = "hidden";
</script>