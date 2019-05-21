<?php
         
                include"include/db.php";
                $id = 28;
                    
                $query = "SELECT * FROM recervations where id = '$id' ";
                                       
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
                                          
                                          
                                         
                                   
                                      }
                $bought = strtotime($post_date);
                $return = strtotime($bDate);
                $freeDays = 70;

                $subDate = ($bought - $return)/60/60/24;
                if($subDate>7){
                    $total = $subDate*10-$freeDays;
                }else{
                    $total = 0;
                }

                

                
                echo "$subDate ";
                
                echo"<br>";
                echo "$total ";

               //$return = ($post_date - $bDate);

                if($post_date>$bDate){
                    echo "Success";
                }else{
                    echo"fail";
                }

               //echo "$bDate <br>";
               //echo "$post_date";
?>