
  <!--================ Header Menu Area start =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">

            <?php
        if(isset($_GET['p_id'])){
            $the_user_id = $_GET['p_id'];
            //header("LOCATION: index.php?p_id=$the_user_id");
            ?>     
            <a class="navbar-brand logo_h" href="index.php?p_id=<?php echo $the_user_id?>"><h1><i class="fas fa-book-reader"></i> ABC LIBRARY</h1> </a>
                   
       <?php }else{
            
            ?>
             <a class="navbar-brand logo_h" href="index.php"><h1><i class="fas fa-book-reader"></i> ABC LIBRARY</h1> </a>
        <?php }
              
    ?>
            
            
<!--
            
            <a class="navbar-brand logo_h" href="index.php"><h1><i class="fas fa-book-reader"></i> ABC LIBRARY</h1> </a>
-->
            
            
            
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-end">
             
                
                     <?php 
            if(!isset($_GET['p_id'])){                
                ?>
                         <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li> 
                         <li class="nav-item"><a class="nav-link" href="register.php">Register Now</a>
                         <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
            <?php }   
            ?>  
            </ul>

    <?php
        if(isset($_GET['p_id'])){
            $the_user_id = $_GET['p_id'];
            ?>
               <div class="nav-right text-center text-lg-right">
              <a class="button" href="profile_page.php?p_id=<?php echo $the_user_id?>">My Profile</a>
            </div>
               <div class="nav-right text-center text-lg-right">
              <a class="button" href="index.php?">Log Out</a>
            </div>
       <?php }
              
    ?>
                  
            
          </div> 
        </div>
      </nav>
    </div>
  </header>
  <!--================Header Menu Area =================-->