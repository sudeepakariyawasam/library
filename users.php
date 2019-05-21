<?php include"include/db.php" ?>
<?php include"include/header.php" ?>
<?php //include"include/nav.php" ?>
<br><br><br><br><br>
<div class="container">
<section>
<a href="adminpro.php"><h2 class="page-header text-center" id="arrival-header"><span class="text-danger"><b>ADMIN PANEL</b> </span></h2></a>
<br><br>
<h5>User Management</h5>
<br>
</section>
    
    
    
    
<section>
    
    <table class="table table-border table-hover">
    
    

    <form action="" method="post">
         <div>
        <input type="submit" class="btn btn-primary"  name="last" value="Last Reults">
        <input  type="search" name="find" placeholder="">
         <input type="submit" class="btn btn-primary"  name="search" value="Search">                                                
        </div>
    </form>

    
    
 <thead>
        <tr>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th> 
            <th>Email</th>
            <th>Username</th>
            <th>Password</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Delete</th>
           
            
        </tr>
                            
</thead>
<tbody>
<?php 
                            if(isset($_POST['last'])){
                                    
                                       $query = "SELECT * FROM registration ORDER BY id DESC";
                                       
                                        $select_user =mysqli_query($connection,$query);
                                       
                                        while($row = mysqli_fetch_assoc($select_user)){ 
                                            $user_id = $row['id'];
                                            $firstname = $row['firstName'];
                                            $lastname = $row['lastname'];
                                            $username = $row['username'];
                                            $email = $row['email'];
                                            $password = $row['password'];
                                            $address = $row['address'];
                                            $mobile = $row['mobile'];
                                            
                                            echo"<tr>";
                                                echo"<td>$user_id</td>";
                                                echo"<td>$firstname</td>";
                                                echo"<td>$lastname</td>";
                                                echo"<td>$email</td>";
                                                echo"<td>$username</td>";
                                                echo"<td>$password</td>";
                                                echo"<td>$address</td>";
                                                
                                                echo"<td>$mobile</td>";
                                            
                                 
                                            echo"<td><a href='users.php?delete=$user_id'> Delete</a></td>";
                                            //echo"<td><img src='../img/propic/$pro_pic' height='30px' width='30px'></td>";
                                                //echo"<td><a href='messages.php?delete=$id'> Delete</a></td>";
                                            
                                            echo"</tr>"; 
                                            }
                    
                }
                                            
        ?>

        <?php 
                            if(isset($_POST['search'])){
                                echo"<h1>Results</h1>";
                                
                                $find = $_POST['find'];
                                $find = mysqli_real_escape_string($connection,$find);
                                
                               $query ="SELECT * FROM registration WHERE firstName LIKE '%$find%' ";
                               $search_query = mysqli_query($connection, $query);
                                
                                if(!$search_query){
                                die("Query Failed ".mysqli_error($connection));
                                }

                                $count = mysqli_num_rows($search_query);
                                if($count == 0){
                                    echo "<h1>No Results</h1>";
                                }else{
                                
                                          
                                        while($row = mysqli_fetch_assoc($search_query)){ 
                                              $user_id = $row['id'];
                                            $firstname = $row['firstName'];
                                            $lastname = $row['lastname'];
                                            $username = $row['username'];
                                            $email = $row['email'];
                                            $password = $row['password'];
                                            $address = $row['address'];
                                            $mobile = $row['mobile'];
                                         
                                            echo"<tr>";
                                                echo"<td>$user_id</td>";
                                                echo"<td>$firstname</td>";
                                                echo"<td>$lastname</td>";
                                                echo"<td>$email</td>";
                                                echo"<td>$username</td>";
                                                echo"<td>$password</td>";
                                                echo"<td>$address</td>";
                                                
                                                echo"<td>$mobile</td>";
                                            
                                           
                                            echo"<td><a href='users.php?delete=$user_id'> Delete</a></td>";
                                         
                                            
                                            echo"</tr>"; 
                                            }
                            }
                            }
                                            
        ?>
    
    
                            </tbody>
                        </table>




<?php

      

        if(isset($_GET['delete'])){
            
            $user_id = mysqli_real_escape_string($connection,$_GET['delete']);
            
            $query = "DELETE FROM registration WHERE id = {$user_id} ";
            $delete_query = mysqli_query($connection, $query);
            header('Location: users.php');
        }
    ?>

    
</section>    
    
    
    
    


</div>


<br><br><br>


<?php include"include/footer.php" ?>