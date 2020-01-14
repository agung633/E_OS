<?php
if (!isset($_SESSION['id_admin'])) {
   header('location: ../');
}

if (isset($_GET['action'])) {

   switch ($_GET['action']) {

      case 'hapus':

            mysqli_query($con,"TRUNCATE t_calon");

            header('location: ?page=calonosis');

         break;
      default:
         include('./calonosis/list.php');
         break;
   }

} else {

   include('./calonosis/list.php');

}
?>
