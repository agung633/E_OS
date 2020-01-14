<?php
require('../include/connection.php');
$idu = $_GET['id'];
$sql = mysqli_query($con,"SELECT * FROM t_skategori WHERE idkategori='$idu'");
if (!$sql) {
    printf("Error: %s\n", mysqli_error($con));
    exit();}
while ($row=mysqli_fetch_array($sql)){
    $kategori = $row['kategori'];
}
?>
<div class="row">
   <div class="col-md-9 col-sm-9">
      <h3>Tambah Soal Di <?php echo $kategori; ?></h3>
      <br>
      </hr>
   </div>
   <div class="col-md-3 col-sm-3" style="padding-top:10px;">
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <form class="form1" action="" method="post" enctype="multipart/form-data">
                        <div class="card">
                                      <h3>Soal Text</h3>
                                      <div class="card-body card-block">
                                          <div class="form-group"><label for="company" class=" form-control-label">Tambah Soal</label><input type="text" placeholder="Add Question" name="question" class="form-control"></div>
                                          <div class="form-group"><label for="company" class=" form-control-label">Option 1</label><input type="text" placeholder="Add Option 1" name="opt1" class="form-control"></div>
                                          <div class="form-group"><label for="company" class=" form-control-label">Option 2</label><input type="text" placeholder="Add Option 2" name="opt2" class="form-control"></div>
                                          <div class="form-group"><label for="company" class=" form-control-label">Option 3</label><input type="text" placeholder="Add Option 3" name="opt3" class="form-control"></div>
                                          <div class="form-group"><label for="company" class=" form-control-label">Option 4</label><input type="text" placeholder="Add Option 4" name="opt4" class="form-control"></div>
                                          <div class="form-group"><label for="company" class=" form-control-label">Jawaban</label><input type="text" placeholder="Add Answer" name="answer" class="form-control"></div>
                                          <div class="form-group">
                                              <input type="submit" name="submit1" value="Add Question" class="btn btn-success">

                                          </div>

                                      </div>
                                  </div>

                              </div>



                          </div>

                      </form>
                            </div>
                        </div>
                                        </div>
                                      </div><!--/.col-->

<?php 
    if(isset($_POST['submit1'])) {

        $loop=0;
    $count=0;
      $res=mysqli_query($con,"SELECT * from t_soal where kategori='$kategori' order by Idujian asc") or die (mysqli_error($con));
        $count=mysqli_num_rows($res);
        if ($count=0)
        {

        }
        else
        {
          while ($row=mysqli_fetch_array($res))
          {
            $loop=$loop+1;
            mysqli_query($con,"UPDATE t_soal set no='$loop' where Idujian =$row[Idujian]");
          }
        }

$loop=$loop+1;
mysqli_query($con,"INSERT into t_soal values(NULL,'$loop','$_POST[question]','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]','$_POST[answer]','$kategori')") or die (mysqli_error($link));
}elseif(isset($_POST['submit2'])){
  
                                                    /**$res=mysqli_query($link,"SELECT * from t_soal where kategori='$kategori' order by o asc");
                                                    while($row=mysqli_fetch_array($res))
                                                    {
                                                      echo "<tr>";
                                                      echo "<td>"; echo $row["no"]; echo"</td>";
                                                      echo "<td>"; echo $row["soal"]; echo"</td>";
                                                      echo "<td>";

                                                      if (strpos($row["opt1"],'gambar/') !==false)
                                                      {
                                                        ?>
                                                        <img src="<?php echo $row["opt1"]; ?>" height="50" width="50">
                                                        <?php
                                                      }
                                                      else
                                                      {
                                                          echo $row["opt1"];
                                                      }

                                                      echo"</td>";
                                                      echo "<td>";

                                                      if (strpos($row["opt2"],'gambar/') !==false)
                                                      {
                                                        ?>
                                                        <img src="<?php echo $row["opt2"]; ?>" height="50" width="50">
                                                        <?php
                                                      }
                                                      else
                                                      {
                                                          echo $row["opt2"];
                                                      }

                                                      echo"</td>";
                                                      echo "<td>";

                                                      if (strpos($row["opt3"],'gambar/') !==false)
                                                      {
                                                        ?>
                                                        <img src="<?php echo $row["opt3"]; ?>" height="50" width="50">
                                                        <?php
                                                      }
                                                      else
                                                      {
                                                          echo $row["opt3"];
                                                      }

                                                      echo"</td>";
                                                      echo "<td>";

                                                      if (strpos($row["opt4"],'gambar/') !==false)
                                                      {
                                                        ?>
                                                        <img src="<?php echo $row["opt4"]; ?>" height="50" width="50">
                                                        <?php
                                                      }
                                                      else
                                                      {
                                                          echo $row["opt4"];
                                                      }

                                                      echo"</td>";
                                                      echo "<td>";

                                                      if (strpos($row["opt4"],'gambar/') !==false)
                                                      {
                                                        ?>
                                                        <a href="edit_opt.image.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?>">Edit</a>
                                                        <?php
                                                      }
                                                      else
                                                      {
                                                        ?>
                                                        <a href="edit_option.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?>">Edit</a>
                                                        <?php
                                                      }

                                                      echo"</td>";

                                                      echo "<td>";
                                                      ?>
                                                      <a href="delete_option.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id; ?>">Delete</a>
                                                      <?php


                                                      echo "</td>";

                                                      echo "</tr>";
                                                    }
                                                   

*/
}
?>