  <!--================Hero Banner Area Start =================-->
  <section class="hero-banner magic-ball">
    <div class="container">

      <div class="row align-items-center text-center text-md-left">
        <div class="col-md-6 col-lg-5 mb-5 mb-md-0">
          <h1>"ONCE YOU <u>LEARN TO READ</u><br> YOU WILL BE FOREVER <span id="title">FREE"</span></h1>
           
<!--          <a class="button button-hero mt-4" href="#">Login</a>-->
            
            <?php 
            if(!isset($_GET['p_id'])){                
                ?>
                          <button onclick="document.getElementById('id01').style.display='block'" class="button button-hero mt-4" style="width:auto;">Login</button>  
            <?php }
            
            ?>
    
         
        </div>
        <div class="col-md-6 col-lg-7 col-xl-6 offset-xl-1">
<!--          <img class="img-fluid" src="img/home/hero-img.png" alt="">-->
          <img src="imges/LogoMakr_1t25mE.png" class="img-fluid" id="welcome-image" style="width:80%">
        </div>
      </div>
    </div>
  </section>
  <!--================Hero Banner Area End =================-->


<div id="id01" class="modal">
  
  <form class="modal-content animate" action="" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="imges/events/user.png" alt="Avatar" class="avatar" style="width:200px">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="emaili" value="" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="passwordi" required>
        
      <button type="submit" name="login" class="button button-hero mt-4">Login</button>

    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
     
    </div>
  </form>
</div>

<style>
/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


<?php
       if(isset($_POST['login'])){
               
        $emaili = $_POST['emaili'];
        $passwordi = $_POST['passwordi'];

        $emaili = mysqli_real_escape_string($connection,$emaili);
        $passwordi = mysqli_real_escape_string($connection,$passwordi);
        
        
        $query = "SELECT * FROM registration WHERE email ='{$emaili}' AND password ='{$passwordi}' ";
        $user_select = mysqli_query($connection,$query);
        
        if(!$user_select){
            die("QUERY FAILED".mysqli_error($connection));   
        }
        
              while($row = mysqli_fetch_array($user_select)){
                    
                    $user_id = $row['id'];
                    $db_email = $row['email'];
                    $db_password = $row['password'];
                    $db_firstname = $row['firstname'];
                    $db_lastname = $row['lastname'];
                   
                    
                 if($emaili == "admin@admin" && $passwordi == "pptx" ){
                     header("LOCATION: adminpro.php");
                    
                }elseif($emaili !==$db_email && $passwordi !== $db_password){
                    header("LOCATION: index.php");
                    //echo"<h1>invalid username </h1>";
                   
                }else if($emaili == $db_email && $passwordi == $db_password){
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['email'] = $db_email;
                    $_SESSION['password'] = $db_password;
                    $_SESSION['firstname'] = $db_firstname;
                    $_SESSION['lastname'] = $db_lastname;
                    $_SESSION['propic'] = $_db_pro_pic;
                               
                     
                    setcookie("firstname",$_POST['firstname'],time()+3600 * 24 *365);
                    setcookie("lastname",$_POST['lastname'],time()+3600 * 24 *365);
                    setcookie("email",$_POST['email'],time()+3600 * 24 *365);
                    setcookie("password",$_POST['password'],time()+3600 * 24 *365); 
                     
                     
                    header("LOCATION: profile_page.php?p_id=$user_id");
                }else{
                    header("LOCATION: index.php");
                } 
                    
                } 
        
        
        }
        
    




?>


