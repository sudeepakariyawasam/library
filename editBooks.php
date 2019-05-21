<?php include"include/header.php" ?>
<?php include"include/nav.php" ?>
<?php include"include/db.php" ?>

 <?php 
                if(isset($_GET['p_id'])){
                $Bookid = $_GET['p_id'];
                                    
                                       $query = "SELECT * FROM books where id = '$Bookid' ";
                                       
                                        $select_book = mysqli_query($connection,$query);
                    
                    
                    
                    if(isset($_POST['update'])){
                        
                          $bookName = $_POST['bookName'];
                          $cnumber = $_POST['cnumber'];
                          $price = $_POST['price'];
                          $discription = $_POST['discription'];
                        
                            $book_pic = $_FILES['image']['name'];
                            $book_pic_temp = $_FILES['image']['tmp_name'];

                            move_uploaded_file($book_pic_temp,"imges/books/$book_pic");
                        
                             if(empty($book_pic)){
                                    $query = "SELECT * FROM books where id = '$Bookid' ";
                                    $select_image = mysqli_query($connection,$query);
                                    
                                    while($row = mysqli_fetch_array($select_image)){
                                        $book_pic = $row['image'];
                                    }                                    
                                }
                        
                        
                                 $bookName = mysqli_real_escape_string($connection,$bookName);
                                 $cnumber = mysqli_real_escape_string($connection,$cnumber);
                                 $discription = mysqli_real_escape_string($connection,$discription);
                        
                        
                        
                $query ="UPDATE books SET ";
               
                $query .="bookName ='{$bookName}', ";
                $query .="cnumber ='{$cnumber}', ";
                $query .="price ='{$price}', ";
                $query .="discription ='{$discription}', ";
                $query .="image ='{$book_pic}' ";
                $query .= "WHERE id ={$Bookid} ";
                        
               $update_books = mysqli_query($connection,$query);
               if($update_books){
                header("LOCATION: books.php");
               
               }else{
                   die("QUERY FAILED ".mysqli_error($connection));
               }       
                        
                        
                    }
                                       
                                        while($row = mysqli_fetch_assoc($select_book)){ 
                                            $book_id = $row['id'];
                                            $bookName = $row['bookName'];
                                            $bcategory = $row['bcategory'];
                                            $bDate = $row['bDate'];
                                            $cnumber = $row['cnumber'];
                                            $price = $row['price'];
                                            $image = $row['image'];

?>

<br><br><br><br><br><br>
<div class="container">
       <p>Back</p>
      <div class="row">
       
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $bookName; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
         
                
   <form action="" method="post" enctype="multipart/form-data">
            <div class=""> 
                       <div align="center"> 
                    <img src="./imges/books/<?php echo $image; ?>" class="img-circle img-responsive" width="300px"> 
                     
                           
                    <div class="form-group">
                        <label for="user" class="font-weight-bold">Upload Book Image: </label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                   
                </div>
                  <table>
                    <tbody>
                      <tr>
                        <td>Name</td>
                          <td>
                            <input type="text" class="form-control" id="bname" name="bookName" value="<?php echo $bookName; ?>">
                        </td>
                      </tr>
                
                    <tr>
                        <td>Count</td>
                        <td>
                         <input type="text" class="form-control" id="cnumber" name="cnumber" value="<?php echo $cnumber; ?>">
                        </td>
                      </tr>
                     <tr>
                        <td>Description</td>
                         <td>
                        <input type="text" class="form-control" id="about" name="discription" value="<?php echo $bookName; ?>">
                         </td>
                      </tr>
                        <tr>
                        <td>Price</td>
                            <td>
                                <input type="text" class="form-control" id="price" name="price" autocomplete="off" value="<?php echo $price; ?>"></td>
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