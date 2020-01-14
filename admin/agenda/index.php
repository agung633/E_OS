<?php


if (isset($_GET['action'])) {

    switch ($_GET['action']) {

       case 'tambah':
         include('./agenda/add.php');
		
   break;

   case 'edit':
      include('./agenda/edit.php');
   
break;

         case 'hapus':
            if (isset($_GET['id'])) {

               $id   = strip_tags(mysqli_real_escape_string($con, $_GET['id']));
   
               $sql   = $con->prepare("DELETE FROM tb_agenda WHERE id = ?");
               $sql->bind_param('s', $id);
               $sql->execute();
   
               header('location: ?page=agenda');
            
            
         
            } else {
   
               header('location: ./');
   
            }
         break;
       
       default:
          include('./agenda/list.php');
          break;
    }
 
 } else {
 
    include('./agenda/list.php');
 
 }
 ?>
 