<?php 
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP(); //baris ini wajib di disable kalau mau di upload ke live sever
$mail->Host='smtp.gmail.com';
$mail->Port=587;
$mail->SMTPAuth=true;
$mail->SMTPSecure='tls';

$mail->Username='emailsyetan@gmail.com';
$mail->Password='T00yol99';

$mail->setFrom('emailsyetan@gmail.com','SyetanUhU');
$mail->addAddress('alungsatrio77@gmail.com');
$mail->addReplyTo('emailsyetan@gmail.com');

$mail->isHTML(true);
$mail->Subject='PHP Mailer Subject';
$mail->Body='<h1 align-center> Bisa Lung kalau bisa </h1> <h4 align-center> Bisa gak?</h4> <br> <button>coba ini</button>';
if(!$mail->send()){
	echo "Pesan tidak terkirim";
}
else{
	echo "Pesan telah terkirim";
 }
 ?>