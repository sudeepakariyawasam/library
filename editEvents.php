<?php include"include/header.php" ?>
<?php include"include/nav.php" ?>
<?php include"include/db.php" ?>

 <?php 
                if(isset($_GET['p_id'])){
                $Eventid = $_GET['p_id'];
                                    
                                       $query = "SELECT * FROM events where id = '$Eventid' ";
                                       
                                        $select_book = mysqli_query($connection,$query);
                    
                    
                    
                    if(isset($_POST['update'])){
                        
                            $ename = $_POST['ename'];
                            $edate = $_POST['edate'];
                            $edate=date("Y-m-d",strtotime($edate));
                            $eabout = $_POST['eabout']; 



                            $event_pic = $_FILES['image']['name'];
                            $event_pic_temp = $_FILES['image']['tmp_name'];

                            move_uploaded_file($event_pic_temp,"imges/events/$event_pic");
                        

                             if(empty($event_pic)){
                                    $query = "SELECT * FROM events where id = '$Eventid'";
                                    $select_image = mysqli_query($connection,$query);
                                    
                                    while($row = mysqli_fetch_array($select_image)){
                                        $event_pic = $row['image'];
                                    }                                    
                                }
                        
                        
                                 if(empty($edate)){
                                    $query = "SELECT * FROM events where id = '$Eventid'  ";
                                    $select_image = mysqli_query($connection,$query);
                                    
                                    while($row = mysqli_fetch_array($select_image)){
                                        $edate = $row['edate'];
                                    }                                    
                                }
                        
                        
                        
                             $ename = mysqli_real_escape_string($connection,$ename);
                             $eabout = mysqli_real_escape_string($connection,$eabout);
                        
                              
                        
                        
                        
                $query ="UPDATE events SET ";
               
                $query .="ename ='{$ename}', ";
                $query .="edate ='{$edate}', ";
               
                $query .="eabout ='{$eabout}', ";
                $query .="image ='{$event_pic}' ";
                $query .= "WHERE id ={$Eventid} ";
                        
               $update_books = mysqli_query($connection,$query);
               if($update_books){
                header("LOCATION: events.php");
               
               }else{
                   die("QUERY FAILED ".mysqli_error($connection));
               }       
                        
                        
                    }
                                       
                                        while($row = mysqli_fetch_assoc($select_book)){ 
                                            $event_id = $row['id'];
                                            $ename = $row['ename'];
                                            $edate = $row['edate'];
                                            $eabout = $row['eabout'];
                                            $image = $row['image'];

?>

<br><br><br><br><br><br>
<div class="container">
       <a href="events.php"><p>Back</p></a>
      <div class="row">
       
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $image; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
         
                
   <form action="" method="post" enctype="multipart/form-data">
            <div class=""> 
                       <div align="center"> 
                    <img src="./imges/events/<?php echo $image; ?>" class="img-circle img-responsive" width="300px"> 
                     
                           
                    <div class="form-group">
                        <label for="user" class="font-weight-bold">Upload Event Image: </label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                   
                </div>
                  <table>
                    <tbody>
                      <tr>
                        <td>Event Name</td>
                          <td>
        <input type="text" name="ename" class="form-control" id="ename" value="<?php echo $ename ?>">
                        </td>
                      </tr>
                
                    <tr>
                        <td>Event Date:</td>
                        <td>
                            <div class="form-group">
                                
                            <input type="date" name="edate" class="form-control" id="edate" value="<?php echo $edate ?>">
                                <span id="eventdate" class="text-danger font-weight-bold"> </span>
                            </div>
                        </td>
                      </tr>
                     <tr>
                        <td>Event Details:</td>
                         <td>
                       <input type="text" name="eabout" class="form-control" id="eabout" value="<?php echo $eabout ?>" >
                         </td>
                      </tr>
             

     
                    </tbody>
                  </table>
                  
                  <input type="submit" class="btn-primary" name="update">
                
                </div>
    </form>
              </div>
            </div>

<!--          </div>-->
        </div>
      </div>
    </div>

<?php 
                                        }}
?>