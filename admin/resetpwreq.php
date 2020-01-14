<?php

require 'mail/phpmailer/PHPMailerAutoload.php';
if (isset($_POST["reset-request-submit"])) {
  
  define('BASEPATH', dirname(__FILE__));
  include '../include/connection.php';
  $userEmail = $_POST["email"];
  $id = mysqli_query($con, "SELECT * FROM t_admin WHERE email='$userEmail'");
  $ada = mysqli_num_rows($id);

  if($userEmail == null){
    header("location:./reset-password.php?reset=error");
  }
  elseif($ada == 0){
    header("location:./reset-password.php?reset=ada");
  }
  else{
  $selector = bin2hex(openssl_random_pseudo_bytes(8));
  $token = openssl_random_pseudo_bytes(32);

  $url = "localhost/eos/admin/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

  $expires = date("U") + 1800;
  


 

  


  $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
  $stmt = mysqli_stmt_init($con);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "Telah terjadi Error!";
    exit();
  }else {
    mysqli_stmt_bind_param($stmt, "s", $userEmail);
    mysqli_stmt_execute($stmt);
  }

  $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpire) VALUES (?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($con);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "Telah terjadi Error!";
    exit();
  }else {
    $hashedToken = password_hash($token, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
    mysqli_stmt_execute($stmt);
  }
 // ini untuk menutup koneksi database dan statementnya agar aman dari para hacker yang akan masuk melalui jaringan database yang masih terbuka
  mysqli_stmt_close($stmt);
  mysqli_close($con);

 $mail = new PHPMailer;
$mail->isSMTP(); //baris ini wajib di disable kalau mau di upload ke live sever
$mail->Host='smtp.gmail.com';
$mail->Port=587;
$mail->SMTPAuth=true;
$mail->SMTPSecure='tls';

// $mail->Username='emailsyetan@gmail.com';
$mail->Username='osisibrahimy@gmail.com';
// $mail->Password='T00yol99';
$mail->Password='Osis1234';

$mail->setFrom('osisibrahimy@gmail.com','E-OSIS IBRAHIMY');
$mail->addAddress("$userEmail");
$mail->addReplyTo('osisibrahimy@gmail.com');

$mail->isHTML(true);
$mail->Subject='Reset Password Admin Anda';
// $mail->Body='<p><a href="' . $url . '"><button>Ehoy</button></a></p>';'.$url.'
$mail->Body='<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style type="text/css">
	/* FONTS */
    @media screen {
		@font-face {
		 
		  font-style: normal;
		  font-weight: 400;
		  
		}
		
		@font-face {
		 
		  font-style: normal;
		  font-weight: 700;
		  
		}
		
		@font-face {
		 
		  font-style: italic;
		  font-weight: 400;
		  
		}
		
		@font-face {
		 
		  font-style: italic;
		  font-weight: 700;
		 
		}
    }
    
    /* CLIENT-SPECIFIC STYLES */
    body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
    table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
    img { -ms-interpolation-mode: bicubic; }

    /* RESET STYLES */
    img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
    table { border-collapse: collapse !important; }
    body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }

    /* ANDROID CENTER FIX */
    div[style*="margin: 16px 0;"] { margin: 0 !important; }
</style>
</head>
<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">

<!-- HIDDEN PREHEADER TEXT -->
<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; , Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">

</div>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <!-- LOGO -->
    <tr>
        <td bgcolor="#00aeff" align="center">
            <table border="0" cellpadding="0" cellspacing="0" width="480" >
                <tr>
                    <td align="center" valign="top" style="padding: 40px 10px 40px 10px;">
                        
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- HERO -->
    <tr>
        <td bgcolor="#00aeff" align="center" style="padding: 0px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="480" >
                <tr>
                    <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; , Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                      <h1 style="font-size: 32px; font-weight: 400; margin: 0;">Lupa Password anda?</h1>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- COPY BLOCK -->
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="480" >
              <!-- COPY -->
              <tr>
                <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; , Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
                  <p style="margin: 0;">Mereset Atau mengatur ulang password anda itu dangat muda, Anda hanya memasukan password baru setelah Mengeklik Tombol Reset Password!</p>
                </td>
              </tr>
              <!-- BULLETPROOF BUTTON -->
              <tr>
                <td bgcolor="#ffffff" align="left">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                        <table border="0" cellspacing="0" cellpadding="0">
                          <tr>
                              <td align="center" style="border-radius: 3px;" bgcolor="#00aeff"><a href="'.$url.'" target="_blank" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #00aeff; display: inline-block;">Reset Password Anda</a></td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
        </td>
    </tr>
    <!-- COPY CALLOUT -->
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="480" >
                <!-- HEADLINE -->
                <tr>
                  <td bgcolor="#111111" align="left" style="padding: 40px 30px 20px 30px; color: #ffffff; , Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
                    <h2 style="font-size: 24px; font-weight: 400; margin: 0;"></h2>
                  </td>
                </tr>
                <!-- COPY -->
                <tr>
                  <td bgcolor="#111111" align="left" style="padding: 0px 30px 20px 30px; color: #666666; , Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
                    <p style="margin: 0;"></p>
                  </td>
                </tr>
                <!-- COPY -->
                <tr>
                  <td bgcolor="#111111" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; , Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
                    <p style="margin: 0;"><a href="" target="_blank" style="color: #7c72dc;"></a></p>
                  </td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- SUPPORT CALLOUT -->
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="480" >
                <!-- HEADLINE -->
               
            </table>
        </td>
    </tr>
    <!-- FOOTER -->
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="480" >
              
              <!-- PERMISSION REMINDER -->
              <tr>
                <td bgcolor="#f4f4f4" align="left" style="padding: 0px 30px 30px 30px; color: #666666; , Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;" >
                  <p style="margin: 0;"><a href="https://www.instagram.com/birrilfebrian/?hl=en" target="_blank" style="color: #111111; font-weight: 700;">please contact us.</a>.</p>
                </td>
              </tr>
              
              <!-- ADDRESS -->
              <tr>
                <td bgcolor="#f4f4f4" align="left" style="padding: 0px 30px 30px 30px; color: #666666; , Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;" >
                  <p style="margin: 0;">Kab. Situbondo, Kec. Panji, Mimbaan, 68322, SMAS IBRAHIMY SITUBONDO.</p>
                </td>
              </tr>
            </table>
        </td>
    </tr>
</table>

</body>
</html>
';
if($mail->send()){
	header("Location: ./reset-password.php?reset=success");
}
else{
	header("Location: ./reset-password.php?reset=bla");
 }
 // dari sini
 }} else {
  header("Location: ../index.php");
}
 




