<?php


if (isset($_GET['action'])) {

    switch ($_GET['action']) {
       case 'tambah':
          include('./img/add.php');
          break;

       case 'upload':
		
   break;

         case 'hapus':
            if (isset($_GET['id'])) {

               $id   = strip_tags(mysqli_real_escape_string($con, $_GET['id']));
   
               $sql   = $con->prepare("DELETE FROM images WHERE id = ?");
               $sql->bind_param('s', $id);
               $sql->execute();
   
               header('location: ?page=img');
            
            
         
            } else {
   
               header('location: ./');
   
            }
         break;
       
       default:
          include('./img/list.php');
          break;
    }
 
 } else {
 
    include('./img/list.php');
 
 }
 ?>
 