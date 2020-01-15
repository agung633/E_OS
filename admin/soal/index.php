<?php
if (!isset($_SESSION['id_admin'])) {
   header('location: ../');
}

if (isset($_GET['action'])) {

   switch ($_GET['action']) {
      case 'addsoal':
         include('./soal/add.php');
         break;

      case 'edit':
         include('./soal/edit.php');
         break;
         case 'editujian':
            include('./soal/editujian.php');
            break;
      case 'editsoal':
            include('./soal/edit.php');
            break;
      case 'adds':
         include('./soal/addsoal.php');
         break;
      case 'hapus':

         if (isset($_GET['id'])) {

            $nis   = strip_tags(mysqli_real_escape_string($con, $_GET['id']));

            $sql   = $con->prepare("DELETE FROM t_skategori WHERE idkategori = ?");
            $sql->bind_param('s', $id_soal);
            $sql->execute();

            header('location: ?page=ujian');
         
         
      
         } else {

            header('location: ./');

         }
         break;
         case 'hapuss':

            if (isset($_GET['id'])) {
   
               $nis   = strip_tags(mysqli_real_escape_string($con, $_GET['id']));
   
               $sql   = mysqli_query($con,"DELETE FROM t_soal WHERE Idujian = '$nis'");
   
              echo'<script>window.history.back();
              location.reload();</script> ';
            
            
         
            } else {
   
               header('location: ./');
   
            }
            break;
         case 'aktif':

            if (isset($_GET['id'])) {
   
              $aa = mysqli_query($con, "UPDATE t_skategori SET aktif='1' WHERE idkategori='".$_GET['id']."'") or die(mysqli_error($con));
   
               header('location: ?page=ujian');
            
            
         
            } else {
   
               header('location: ./');
   
            }
            break;
            case 'nonaktif':

               if (isset($_GET['id'])) {
      
                  $nis   = strip_tags(mysqli_real_escape_string($con, $_GET['id']));
      
                  $sql   = $con->prepare("UPDATE t_skategori SET aktif='0' WHERE idkategori = ?");
                  $sql->bind_param('s', $id_soal);
                  $sql->execute();
      
                  header('location: ?page=ujian');
               
               
            
               } else {
      
                  header('location: ./');
      
               }
               break;
      default:
         include('./soal/list.php');
         break;
   }

} else {

   include('./soal/list.php');

}
?>
