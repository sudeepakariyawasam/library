<?php include"include/db.php" ?>
<?php include"include/header.php" ?>
<?php //include"include/nav.php" ?>

<br><br><br><br><br>
<div class="container">
    <a href="adminpro.php"><h2 class="page-header text-center" id="arrival-header"><span class="text-danger"><b>ADMIN PANEL</b> </span></h2></a>

</div>
<br><br><br>

<section>
    <div class="container">

        <table class="table table-border table-hover">
            <thead>
                <tr>
                    <th>Book Name</th>
                    <th>Category</th>
                    <th>User Name</th>
                    <th>Contact</th>
                   
                    <th>Borrow Date</th>
                    <th>Date to submit</th>
                    <th>Total Price</th>
                </tr>

            </thead>
            <tbody>
                <?php 
                           
                                    
                $query = "SELECT * FROM recervations where status ='borrow' ";
                                       
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
                                          
                $returnDate = date('Y-m-d', strtotime($bDate. ' + 7 days'));
                                          
                
                                          

                $subDate = ($bought - $return)/60/60/24;
                $freeDays = 70;
                
                if($subDate>7){
                    $total = $subDate*10-$freeDays;
                }else{
                    $total = 0;
                }
                                                                    
                $grandTotal = $price + $total;
                                                               
                                            
                                            
                                            
                                            echo"<tr>";
                                                echo"<td>$bookName</td>";
                                                echo"<td>$bcategory</td>";
                                                 echo"<td>$firstname</td>";
                                                
                                                echo"<td>$mobile</td>";
                                                echo"<td>$bDate</td>";
                                                echo"<td>$returnDate</td>";
                                                echo"<td>$grandTotal</td>";
                                               
                                               
                                            
                                               
                                            
                                            echo"</tr>"; 
                                            }
              
                                            
        ?>


            </tbody>
        </table>



    </div>
</section>
<br><br><br><br><br>








<?php //include"include/footer.php" ?>
