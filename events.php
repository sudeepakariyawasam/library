<?php include"include/db.php" ?>
<?php include"include/header.php" ?>
<?php //include"include/nav.php" ?>

<style>
    /* Full-width input fields */
    input[type=text],
    input[type=password] {
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
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
        padding-top: 60px;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto;
        /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 80%;
        /* Could be more or less, depending on screen size */
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
        from {
            -webkit-transform: scale(0)
        }

        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframes animatezoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
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
<br><br><br><br><br>
<div class="container">
    <a href="adminpro.php"><h2 class="page-header text-center" id="arrival-header"><span class="text-danger"><b>ADMIN PANEL</b> </span></h2></a>
    <section>

        <button onclick="document.getElementById('id01').style.display='block'" class="button button-hero mt-4" style="width:auto;">ADD EVENT</button>
        <div id="id01" class="modal">

            <form class="modal-content animate" onsubmit="return validation()" action="" method="post" enctype="multipart/form-data">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <img src="imges/event.png" alt="Avatar" class="avatar" style="width:200px">
                </div>

                <div class="container">

                    <div class="form-group">
                        <label for="user" class="font-weight-bold">Upload Event Image: </label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>


                    <!--event name-->
                    <div class="form-group">
                        <label for="user" class="font-weight-bold">Event Name: </label>
                        <input type="text" name="ename" class="form-control" id="ename" autocomplete="off" placeholder="Event Name">
                        <span id="eventname" class="text-danger font-weight-bold"> </span>
                    </div>



                    <!--Event Date-->
                    <div class="form-group">
                        <label for="user" class="font-weight-bold">Event Date: </label>
                        <input type="date" name="edate" class="form-control" id="edate" autocomplete="off">
                        <span id="eventdate" class="text-danger font-weight-bold"> </span>
                    </div>

                    <!--Description About Events-->
                    <div class="form-group">
                        <label class="font-weight-bold">Event Details: </label>
                        <input type="text" name="eabout" class="form-control" id="eabout" autocomplete="off" placeholder="Event Deatils">
                        <span id="aboutevent" class="text-danger font-weight-bold"> </span>
                    </div>


                    <button type="submit" name="submit" class="button button-hero mt-4">ADD</button>

                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>

                </div>
            </form>
        </div>

    </section>




</div>
<br><br><br>
<?php
    if(isset($_POST['submit'])){
        
       
        $ename = $_POST['ename'];
        $edate = $_POST['edate'];
        $edate=date("Y-m-d",strtotime($edate));
        $eabout = $_POST['eabout']; 
        
        
        
        $event_pic = $_FILES['image']['name'];
        $event_pic_temp = $_FILES['image']['tmp_name'];
        
        move_uploaded_file($event_pic_temp,"imges/events/$event_pic");
        
        
        
         $ename = mysqli_real_escape_string($connection,$ename);
         $eabout = mysqli_real_escape_string($connection,$eabout);
       
$query = "INSERT INTO events(ename,edate,eabout,image) VALUES ('{$ename}','{$edate}','{$eabout}','{$event_pic}')";
        
        $add_query = mysqli_query($connection,$query);
        
        if($add_query){
            echo"Success";
             header('LOCATION: events.php');
            
        }else{
             die("QUERY FAILED ".mysqli_error($connection));
        }
        
    }
?>


<script type="text/javascript">
    function validation() {

        var Event_ID = document.getElementById('Event_ID').value;
        var ename = document.getElementById('ename').value;
        var edate = document.getElementById('edate').value;
        var eabout = document.getElementById('eabout').value;




        if (Event_ID == "") {
            document.getElementById('eventid').innerHTML = " ** Please fill the Event ID field";
            return false;
        }

        if ((Event_ID.length <= 0) || (Event_ID.length > 4)) {
            document.getElementById('eventid').innerHTML = " ** Event ID lenght only 4 characters";
            return false;
        }

        if (ename == "") {
            document.getElementById('eventname').innerHTML = " ** Please fill the Event Name field";
            return false;
        }
        if ((ename.length <= 2) || (ename.length > 30)) {
            document.getElementById('eventname').innerHTML = " ** Event name lenght must be between 2 and 30";
            return false;
        }
        if (!isNaN(ename)) {
            document.getElementById('eventname').innerHTML = " ** only characters are allowed";
            return false;
        }

        if (edate == "") {
            document.getElementById('eventdate').innerHTML = " ** Please fill the Book Issue Date field";
            return false;
        }

        if (eabout == "") {
            document.getElementById('aboutevent').innerHTML = " ** Please write About Book Details";
            return false;
        }

    }

</script>




<section>
    <div class="container">

        <table class="table table-border table-hover">
            <form action="" method="post">
                <div>
                    <input type="submit" class="btn btn-primary" name="last" value="Last Reults">
                    <input type="search" name="find" placeholder="">
                    <input type="submit" class="btn btn-primary" name="search" value="Search">
                </div>
            </form>

            <thead>
                <tr>
                    <th>Id</th>
                    <th>Event Name</th>
                    <th>Date</th>
                    <th>About</th>
                   
                    <th>Image</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>

            </thead>
            <tbody>
                <?php 
                            if(isset($_POST['last'])){
                                    
                                       $query = "SELECT * FROM events ORDER BY id DESC";
                                       
                                        $select_user =mysqli_query($connection,$query);
                                       
                                        while($row = mysqli_fetch_assoc($select_user)){ 
                                            $event_id = $row['id'];
                                            $ename = $row['ename'];
                                            $edate = $row['edate'];
                                            $eabout = $row['eabout'];
                                            $image = $row['image'];
                                            
                                            echo"<tr>";
                                                echo"<td>$event_id</td>";
                                                echo"<td>$ename</td>";
                                                echo"<td>$edate</td>";
                                                
                                                echo"<td>$eabout</td>";
                                               
                                            
                                            
                                             echo"<td><img src='imges/events/$image' height='30px' width='30px'></td>";
                                            echo"<td><a href='events.php?delete=$event_id'> Delete</a></td>";
                                           echo"<td><a href='editEvents.php?p_id=$event_id'> Edit</a></td>";
                                               
                                            
                                            echo"</tr>"; 
                                            }
                    
                }
                                            
        ?>

                <?php 
                            if(isset($_POST['search'])){
                                echo"<h1>Results</h1>";
                                
                                $find = $_POST['find'];
                                $find = mysqli_real_escape_string($connection,$find);
                                
                               $query ="SELECT * FROM events WHERE ename LIKE '%$find%' ";
                               $search_query = mysqli_query($connection, $query);
                                
                                if(!$search_query){
                                die("Query Failed ".mysqli_error($connection));
                                }

                                $count = mysqli_num_rows($search_query);
                                if($count == 0){
                                    echo "<h1>No Results</h1>";
                                }else{
                                
                                          
                                        while($row = mysqli_fetch_assoc($search_query)){ 
                                           $event_id = $row['id'];
                                            $ename = $row['ename'];
                                            $edate = $row['edate'];
                                            $eabout = $row['eabout'];
                                            $image = $row['image'];
                                           
                        
                                         
                                            echo"<tr>";
                                                echo"<td>$event_id</td>";
                                                echo"<td>$ename</td>";
                                                echo"<td>$edate</td>";
                                                echo"<td>$eabout</td>";
                                               
                                            
                                            
                                             echo"<td><img src='imges/events/$image' height='30px' width='30px'></td>";
                                            echo"<td><a href='events.php?delete=$event_id'> Delete</a></td>";
                                            echo"<td><a href='editEvents.php?p_id=$book_id'> Edit</a></td>";
                                            
                                            echo"</tr>"; 
                                            }
                            }
                            }
                                            
        ?>


            </tbody>
        </table>

        <?php
        if(isset($_GET['delete'])){
            
            $event_id = mysqli_real_escape_string($connection,$_GET['delete']);
            
            $query = "DELETE FROM events WHERE id = {$event_id} ";
            $delete_query = mysqli_query($connection, $query);
            header('Location: events.php');
        }
    ?>

    </div>
</section>
<br><br><br><br><br>








<?php include"include/footer.php" ?>
