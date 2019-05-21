<?php include"include/db.php" ?>
<?php include"include/header.php" ?>
<?php include"include/nav.php" ?>

<?php
    
     if(isset($_POST['submit'])){
         
         $firstname = $_POST['firstname'];
         $lastname = $_POST['lastname'];
         $username = $_POST['username'];
         $email = $_POST['email'];
         $password = $_POST['password'];
         $cpassword = $_POST['cpassword'];
         $address = $_POST['address'];
         $mobile = $_POST['mobile'];
         
         $firstname = mysqli_real_escape_string($connection,$firstname);
         $lastname = mysqli_real_escape_string($connection,$lastname);
         
         $username = mysqli_real_escape_string($connection,$username);
         $email = mysqli_real_escape_string($connection,$email);
         $password = mysqli_real_escape_string($connection,$password);
         $cpassword = mysqli_real_escape_string($connection,$cpassword);
         $address = mysqli_real_escape_string($connection,$address);
         $mobile = mysqli_real_escape_string($connection,$mobile);
         
         
            if($password == $cpassword ){
         
            $query = "INSERT INTO registration(firstname,lastname,username,email,password,address,mobile) VALUES ('{$firstname}','{$lastname}','{$username}','{$email}','{$password}','{$address}','{$mobile}')";
            $create_user_query = mysqli_query($connection,$query);
                
                
                
            }else{
                echo"Retype your password again";
            }
         

     }

?>




  <!--================Hero Banner Area Start =================-->
  <section class="hero-banner magic-ball">
    <div class="container">

      <div class="row align-items-center text-center text-md-left">
        <div class="col-md-6 col-lg-5 mb-5 mb-md-0">

            
            
            
                <div class="container">
       <h1><div class="py-5 text-center">Registration</div></h1>
       <div class="flex-box">
           
           
           
          <form action="" method="post" class="bg-light">

          <div class="row">
              <div class="col-md-6 mb-3">
                  <!-- first name-->

                  <label for="firstName">First name</label>
                  <input type="text" class="form-control" id="firstName"  name="firstname"  placeholder="" >
                  <span id="fn" class="text-danger font-weight-bold"></span>
                </div>

                  <!--Last Name-->

                <div class="col-md-6 mb-3">
                  <label for="lastName">Last name</label>
                  <input type="text" class="form-control" id="lastName" name="lastname" placeholder="" value="">
                  <span id="ln" class="text-danger font-weight-bold"></span>
          </div>
        </div>

        <div class="mb-3">
                        <label for="username">Username</label>
                        <div class="input-group">
                          <div class="input-group-prepend"></div>
                          </div>
                          <input type="text" class="form-control" id="username" name="username" placeholder="Username" >
                          <span id="un" class= "text-danger font-weight-bold"></span>
                        </div>
                  
              
                      <div class="mb-3">
                        <label for="email">Email </label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="you@example.com" >
                        <span id="em" class="text-danger font-weight-bold"></span>
                      </div>
              
                      <div class="mb-3">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control" id="pwd" name="password" placeholder="8 chracters with number" >
                        <span id="pswd" class="text-danger font-weight-bold"></span>
                      </div>

                      <div class="mb-3">
                        <label for="CPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="cpwd" name="cpassword" placeholder="8 chracters with number" >
                        <span id="cpswd" class="text-danger font-weight-bold" ></span>
                      </div>
              
                      <div class="mb-3">
                            <label for="address">Address  </label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="66/1,kandyroad,colombo" >
                            <span id="add" class="text-danger font-weight-bold"></span>
                         </div>

                         <div class="mb-3">
                            <label for="mnum">Mobile number  </label>
                            <input type="text" class="form-control" id="monum" name="mobile" placeholder="07********" >
                            <span id="Mob" class="text-danger font-weight-bold"></span>
                         </div>
                         
                      
                      <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit" id="submit">SUBMIT</button>
        </form>
         
    
       </div>
     </div>  

            
         
        </div>
        <div class="col-md-6 col-lg-7 col-xl-6 offset-xl-1">
<!--          <img class="img-fluid" src="img/home/hero-img.png" alt="">-->
          <img src="imges/LogoMakr_1t25mE.png" class="img-fluid" id="welcome-image" style="width:80%">
        </div>
      </div>
    </div>
  </section>
  <!--================Hero Banner Area End =================-->
<br><br><br>

<?php include"include/footer.php" ?>