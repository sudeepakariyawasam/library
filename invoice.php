<?php include"include/db.php" ?>
<?php include"include/header.php" ?>
<?php //include"include/nav.php" ?>



<br><br><br><br><br><br><br><br>

        
<?php
            if(isset($_GET['p_id'])){
                $the_user_id = $_GET['p_id'];
        
                $query = "SELECT * FROM recervations where id = '$the_user_id' ";
                                       
                $select_book = mysqli_query($connection,$query);
                $post_date = date('Y-m-d');
                                      while($row = mysqli_fetch_assoc($select_book)){ 
                                            $id = $row['id'];
                                            $user_id = $row['user_id'];
                                            $bookName = $row['bookname'];
                                            $book_id = $row['book_id'];
                                            $bDate = $row['rDate'];
                                            $image = $row['image'];
                                            $bcategory = $row['bcategory'];
                                            $discription = $row['discription'];
                                          
                                            $firstname = $row['firstName'];
                                            $lastname = $row['lastname'];
                                            $mobile = $row['mobile'];
                                            $price = $row['price'];
                                          
                                           $_SESSION['id'] = $id;
                                                                      
                                          
                $bought = strtotime($post_date);
                $return = strtotime($bDate);

                $subDate = ($bought - $return)/60/60/24;
                $freeDays = 70;
                
                if($subDate>7){
                    $total = $subDate*10-$freeDays;
                }else{
                    $total = 0;
                }
                                                                    
                $grandTotal = $price + $total;
                     
        if(isset($_POST['return'])){
            
           $book_query ="UPDATE books SET cnumber = cnumber + 1 WHERE id = $book_id ";
           $Bookupdate_query = mysqli_query($connection,$book_query);
     
         
          $get_query ="UPDATE recervations SET status = 'submited' WHERE id = $id ";
            
          $update_query = mysqli_query($connection,$get_query);
          header("Location: profile_page.php?p_id=$user_id");
        }

                                          
?>
            
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    
                  <form action="" method="post">
                    <div class="row p-5">
                        <div class="col-md-6">
                            <a class="navbar-brand logo_h" href="index.php?p_id=<?php echo $the_user_id?>"><h1><i class="fas fa-book-reader"></i> ABC LIBRARY</h1> </a>
                        </div>

                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-1">Invoice #<?php echo $id  ?></p>
                            <p class="text-muted">Due to: <?php echo $bDate  ?></p>
                        </div>
                    </div>

                    <hr class="my-5">

                    <div class="row pb-5 p-5">
                        <div class="col-md-6">
                            <p class="font-weight-bold mb-4">Client Information</p>
                            <p class="mb-1"><?php echo "$firstname $lastname"  ?></p>
<!--                            <p>Acme Inc</p>-->
<!--
                            <p class="mb-1">Berlin, Germany</p>
                            <p class="mb-1">6781 45P</p>
-->
                        </div>

                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-4">Book Details</p>
                            <p class="mb-1"><span class="text-muted">Book Name: </span> <?php echo $bookName  ?></p>
                            <p class="mb-1"><span class="text-muted">Category: </span> <?php echo $bcategory  ?></p>
<!--
                            <p class="mb-1"><span class="text-muted">Payment Type: </span> Root</p>
                            <p class="mb-1"><span class="text-muted">Name: </span> John Doe</p>
-->
                        </div>
                    </div>

                    <div class="row p-5">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">ID</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Name</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Borrowed Date</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Price</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $id  ?></td>
                                        <td><?php echo $bookName  ?></td>
                                        <td><?php echo $bDate  ?></td>
                                        <td><?php echo "1"  ?></td>
                                        <td><?php echo $price  ?></td>
                                        <td><?php echo $price  ?></td>
                                       
                                    </tr>
                
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Grand Total</div>
                            <div class="h2 font-weight-light"><?php echo $grandTotal  ?></div>
                        </div>

                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Late Fee</div>
                            <div class="h2 font-weight-light"><?php echo $total  ?></div>
                        </div>

                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Sub - Total amount</div>
                            <div class="h2 font-weight-light"><?php echo $price  ?></div>
                        </div>
                    </div>
                      
                      <input type="submit" name="return" class="btn btn-primary btn-lg btn-block" value="Return Now"> 
                    
                    </form>  
                    
                </div>
            </div>
        </div>
    </div>
    
    <div class="text-light mt-5 mb-5 text-center small">ABC LIBRARY</div>

</div>

      
                             <?php   }                
 }
?>             

   <?php
            
      

    ?>




















