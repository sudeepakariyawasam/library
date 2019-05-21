<?php include"include/db.php" ?>
<?php include"include/header.php" ?>
<?php include"include/nav2.php" ?>
<style>

.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
    
* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

    
</style>




<br><br>
<?php
   

                if(isset($_GET['p_id'])){
                $the_user_id = $_GET['p_id'];
  
            
            $query = "SELECT * FROM registration WHERE id = '{$the_user_id}'";

            $select_user_by_id =mysqli_query($connection,$query);
                    
                    
                    
            if(isset($_POST['update'])){
               
                 $firstname = $_POST['firstName'];
                 $lastname = $_POST['lastname'];
                 $email = $_POST['email'];
                 $password = $_POST['password'];
                 $address = $_POST['address'];
                 $mobile = $_POST['mobile'];

                 $firstname = mysqli_real_escape_string($connection,$firstname);
                 $lastname = mysqli_real_escape_string($connection,$lastname);
                 $email = mysqli_real_escape_string($connection,$email);
                 $password = mysqli_real_escape_string($connection,$password);
                 $address = mysqli_real_escape_string($connection,$address);
                 $mobile = mysqli_real_escape_string($connection,$mobile);
                
                
               

               
                $query ="UPDATE registration SET ";
               
                $query .="firstName ='{$firstname}', ";
                $query .="lastname ='{$lastname}', ";
                $query .="email ='{$email}', ";
                $query .="password ='{$password}', ";
                $query .="address ='{$address}', ";
                $query .="mobile ='{$mobile}' ";
                $query .= "WHERE id ={$the_user_id} ";
               
               $update_pro = mysqli_query($connection,$query);
               if($update_pro){
                header("LOCATION: profile_page.php?p_id={$the_user_id}");
               
               }else{
                   die("QUERY FAILED ".mysqli_error($connection));
               }
               
           }  
                    
                    
                           

            while($row = mysqli_fetch_assoc($select_user_by_id)){
                
                $user_id = $row['id'];
                $firstname = $row['firstName'];
                $lastname = $row['lastname'];
                
                $email = $row['email'];
                $address = $row['address'];
                $mobile = $row['mobile'];
                $password = $row['password'];
                
                $_SESSION['id'] = $user_id;
                $_SESSION['firstName'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                $_SESSION['email'] = $email;
                $_SESSION['mobile'] = $mobile;
                
                
                
                //$user_idUp = $_SESSION['id'];
                
                
                ?>



               


  
<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="imges/icons/reading.png" alt=""/>
                         
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                       <?php echo"Hi $firstname"?>
                                        
                                    </h5>
                            <a href="store.php?p_id=<?php echo $user_id?>"><h3>Visit To Store</h3></a>
                               
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">My Books</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Borroed Books</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Editprofile" role="tab" aria-controls="books" aria-selected="false">Edit Profile</a>
                                </li>
                            </ul>
                        </div>
                    </div>
    
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>About</p>
                                <h6> <?php echo"$firstname $lastname"?></h6>
                                <h6> <?php echo"$email"?></h6>
                                <h6> <?php echo"$address"?></h6>
                                <h6> <?php echo"$mobile"?></h6>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            
<?php
            if(isset($_GET['p_id'])){
                $the_user_id = $_GET['p_id'];
        
                $query = "SELECT * FROM recervations where user_id = '$the_user_id' AND status = 'borrow' ";
                                       
                                $select_book = mysqli_query($connection,$query);
                                      while($row = mysqli_fetch_assoc($select_book)){ 
                                            $id = $row['id'];
                                            $user_id = $row['user_id'];
                                            $bookName = $row['bookname'];
                                            $book_id = $row['book_id'];
                                            $bDate = $row['rDate'];
                                          
                                          ?>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label><?php echo $bookName; ?></label>
                                            </div>
                                            <div class="col-md-4">
                                                <p><?php echo $bDate; ?></p>
                                            </div>
                                                <div class="col-md-4">

                                                    
                                                    <a href='invoice.php?p_id=<?php echo $id?>'> View</a>
                                            </div>               
                                        </div>
                             <?php   }                
 }
?>             
                                
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  
                                <?php
            if(isset($_GET['p_id'])){
                $the_user_id = $_GET['p_id'];
        
                $query = "SELECT * FROM recervations where user_id = '$the_user_id' ";
                                       
                                $select_book = mysqli_query($connection,$query);
                                      while($row = mysqli_fetch_assoc($select_book)){ 
                                            $user_id = $row['user_id'];
                                            $bookName = $row['bookname'];
                                            $book_id = $row['book_id'];
                                            $bDate = $row['rDate'];
                                          
                                          ?>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label><?php echo $bookName; ?></label>
                                            </div>
                                            <div class="col-md-4">
                                                <p><?php echo $bDate; ?></p>
                                            </div>
                                                    
                                        </div>
                              
                             <?php   }
                                       
                          
 }
?>                   
                            </div>
                            <div class="tab-pane fade" id="Editprofile" role="tabpanel" aria-labelledby="Editprofile-tab">
                                             <div class="row">
                                            <div class="col-md-6">
                                                <label>First Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                   <input id="" name="firstName"  class="form-control here"  type="text" value="<?php echo $firstname; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Last Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input id="" name="lastname"  class="form-control here"  type="text" value="<?php echo $lastname; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                 <input id="" name="email"  class="form-control here"  type="text" value="<?php echo $email; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input id="" name="mobile"  class="form-control here"  type="text" value="<?php echo $mobile; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input id="" name="address"  class="form-control here"  type="text" value="<?php echo $address; ?>">
                                            </div>
                                        </div>
                                   <div class="row">
                                            <div class="col-md-6">
                                                <label>Password</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input id="" name="password"  class="form-control here"  type="text" value="<?php echo $password; ?>">
                                            </div>
                                        </div>
                                
                                
                                <br><br><br>
                                   <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button name="update" type="submit" class="btn btn-primary">Update My Profile</button>
                                </div>
                              </div>
                              
                                 
                            </div>
                   
                        </div>
                    </div>
                </div>
            </form>           
        </div>

<?php }
    }
?>






<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php include"include/footer.php" ?>
</body>
</html>