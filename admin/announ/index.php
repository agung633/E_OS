<?php


if (isset($_GET['action'])) {

    switch ($_GET['action']) {
       case 'tambah':
          include('./kelas/add.php');
          break;

         case 'hapus':
            $sql = $con->prepare("DELETE FROM t_ann ");
            $sql->execute();
         
            header('location: ?page=ann&ann=del');
         break;
       
       default:
          include('./announ/list.php');
          break;
    }
 
 } else {
 
    include('./announ/list.php');
 
 }
 ?>
 