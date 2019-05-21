<?php include"include/db.php" ?>
<?php include"include/header.php" ?>
<?php include"include/nav.php" ?>


<br><br><br><br><br><br><br><br>

<div class="container">
  <div class="row">
        <form action="" method="post">
        
<?php
            if(isset($_GET['p_id'])){
                $the_user_id = $_GET['p_id'];
        
                $query = "SELECT * FROM recervations where id = '$the_user_id' ";
                                       
                                $select_book = mysqli_query($connection,$query);
                                      while($row = mysqli_fetch_assoc($select_book)){ 
                                            $id = $row['id'];
                                            $user_id = $row['user_id'];
                                            $bookName = $row['bookname'];
                                            $book_id = $row['book_id'];
                                            $bDate = $row['rDate'];
                                            $image = $row['image'];
                                            $bcategory = $row['bcategory'];
                                            $discription = $row['discription'];
                                          
                                           $_SESSION['id'] = $id;
                                          
?>
    <div class="col-md-6 img">
        <img src="imges/books/<?php echo $image; ?>" alt="" class="img-rounded" style="width:60%">
    </div>
    <div class="col-md-6 details">
        <blockquote>
            <h5><?php echo $bookName; ?></h5>
            <small><cite title="Source Title"><?php echo $bcategory; ?><i class="icon-map-marker"></i></cite></small>
        </blockquote>
        <p>
          <?php echo $discription; ?><br>
          <?php echo $bDate; ?><br>
            
        </p>
      
            <button name="updateBooks" type="submit" class="btn">Return Now</button>
        
    </div>            
      
                             <?php   }                
 }
?>             

   <?php
      
       if(isset($_GET['p_id'])){
                $reserve_id = $_GET['p_id'];
      
       if(isset($_POST['updateBooks'])){
            
        $user_id =  $_SESSION['id'];
     
          $get_query ="UPDATE recervations SET status = 'submited' WHERE id = $reserve_id ";
          $update_query = mysqli_query($connection,$get_query);
            header("Location: profile_page.php?p_id=$user_id");
        }
           
       }
    ?>


</form>


  </div>
</div>