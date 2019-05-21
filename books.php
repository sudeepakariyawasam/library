  <?php include"include/db.php" ?>
<?php include"include/header.php" ?>
<?php //include"include/nav.php" ?>
<?php
    if(isset($_POST['submit'])){
        
        
        $bookName = $_POST['bookName'];
        $bcategory = $_POST['bcategory'];
        $bDate = $_POST['bDate'];
        $bDate=date("Y-m-d",strtotime($bDate));
        
        
        $cnumber = $_POST['cnumber'];
        $price = $_POST['price'];
        $discription = $_POST['discription'];
        
        
        $book_pic = $_FILES['image']['name'];
        $book_pic_temp = $_FILES['image']['tmp_name'];
        
        move_uploaded_file($book_pic_temp,"imges/books/$book_pic");
        
        
        
         $bookName = mysqli_real_escape_string($connection,$bookName);
         $cnumber = mysqli_real_escape_string($connection,$cnumber);
         $discription = mysqli_real_escape_string($connection,$discription);
        

        
          $query = "INSERT INTO books(bookName,bcategory,bDate,cnumber,price,discription,image) VALUES ('{$bookName}','{$bcategory}','{$bDate}','{$cnumber}','{$price}','{$discription}','{$book_pic}')";
        
        $add_query = mysqli_query($connection,$query);
        
        if($add_query){
            echo"Success";
             header('LOCATION: books.php');
            
        }else{
             die("QUERY FAILED".mysqli_error($connection));
        }
        
    }
?>

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

        <button onclick="document.getElementById('id01').style.display='block'" class="button button-hero mt-4" style="width:auto;">ADD BOOK</button>
        <div id="id01" class="modal">

            <form class="modal-content animate" onsubmit="return validation()" action="" method="post" enctype="multipart/form-data">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <img src="imges/icons/06dafa26d8fc91be88a21c96551b21e0-stack-of-books-by-vexels.png" alt="Avatar" class="avatar" style="width:200px">
                </div>

                <div class="container">
                    <div class="form-group">
                        <label for="user" class="font-weight-bold">Upload Book Image: </label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>

          

                    <!--book name-->
                    <div class="form-group">
                        <label for="Name" class="font-weight-bold">Book Name: </label>
                        <input type="text" class="form-control" id="bname" name="bookName" autocomplete="off" placeholder="Book Name">
                        <span id="bookname" class="text-danger font-weight-bold"> </span>
                    </div>

                    <!--category-->
                    <div class="form-group">
                        <label for="Category">Category</label>

                        <select type="text" class="custom-select" id="bcategory" name="bcategory">
                            <option value="Choose">Choose...</option>
                            <option value="LOVE">LOVE</option>
                             <option value="JAVA">JAVA</option>
                            <option value="HISTORY">HISTORY</option>
                            <option value="WEB">WEB</option>
                            <option value="ANDROID">ANDROID</option>
                        </select>

                        <span id="bctype" class="text-danger font-weight-bold"></span>
                    </div>

                    <!--Date-->
                    <div class="form-group">
                        <label for="Date" class="font-weight-bold">Date: </label>
                        <input type="date" class="form-control" id="date" name="bDate" autocomplete="off">
                        <span id="bdate" class="text-danger font-weight-bold"> </span>
                    </div>

                    <!--No of Copies-->
                    <div class="form-group">
                        <label class="font-weight-bold">No Of Copies: </label>
                        <input type="text" class="form-control" id="cnumber" name="cnumber" autocomplete="off" placeholder="No of Copies">
                        <span id="cpnumber" class="text-danger font-weight-bold"> </span>
                    </div>
                     <!--price-->
                    <div class="form-group">
                        <label class="font-weight-bold">Price: </label>
                        <input type="text" class="form-control" id="price" name="price" autocomplete="off" placeholder="Book Price">
                        <span id="cpnumber" class="text-danger font-weight-bold"> </span>
                    </div>

                    <!--Description About Books-->
                    <div class="form-group">
                        <label class="font-weight-bold">Description About Book: </label>
                        <input type="text" class="form-control" id="about" name="discription" autocomplete="off" placeholder="Discription about books">
                        <span id="aboutbook" class="text-danger font-weight-bold"> </span>
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

<br>


<script type="text/javascript">
    function validation() {

        var Book_ID = document.getElementById('Book_ID').value;
        var bname = document.getElementById('bname').value;
        var bcategory = document.getElementById('bcategory').value;
        var date = document.getElementById('date').value;
        var cnumber = document.getElementById('cnumber').value;
        var about = document.getElementById('about').value;




        if ((Book_ID.length <= 0) || (Book_ID.length > 4)) {
            document.getElementById('bookid').innerHTML = " ** Course ID lenght only 4 characters";
            return false;
        }

        if (bname == "") {
            document.getElementById('bookname').innerHTML = " ** Please fill the Book Name field";
            return false;
        }
        if ((bname.length <= 2) || (bname.length > 30)) {
            document.getElementById('bookname').innerHTML = " ** Book name lenght must be between 2 and 30";
            return false;
        }
        if (!isNaN(bname)) {
            document.getElementById('bookname').innerHTML = " ** only characters are allowed";
            return false;
        }

        if (bcategory == "") {
            document.getElementById('bctype').innerHTML = " ** Please fill the Course field";
            return false;
        }

        if (date == "") {
            document.getElementById('bdate').innerHTML = " ** Please fill the Book Issue Date field";
            return false;
        }

        if (cnumber == "") {
            document.getElementById('cpnumber').innerHTML = " ** Please fill the Number of copies  field";
            return false;
        }
        if (isNaN(cnumber)) {
            document.getElementById('cpnumber').innerHTML = " ** Fill Numbers only";
            return false;
        }

        if (about == "") {
            document.getElementById('aboutbook').innerHTML = " ** Please write About Book Details";
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
                    <th>bookName</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Count</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>

            </thead>
            <tbody>
                <?php 
                            if(isset($_POST['last'])){
                                    
                                       $query = "SELECT * FROM books ORDER BY id DESC";
                                       
                                        $select_user =mysqli_query($connection,$query);
                                       
                                        while($row = mysqli_fetch_assoc($select_user)){ 
                                            $book_id = $row['id'];
                                            $bookName = $row['bookName'];
                                            $bcategory = $row['bcategory'];
                                            $bDate = $row['bDate'];
                                            $cnumber = $row['cnumber'];
                                            $price = $row['price'];
                                            
                                           
                                            $image = $row['image'];
                                            
                                            echo"<tr>";
                                                echo"<td>$book_id</td>";
                                                echo"<td>$bookName</td>";
                                                echo"<td>$bcategory</td>";
                                                echo"<td>$bDate</td>";
                                                echo"<td>$cnumber</td>";
                                                echo"<td>$price</td>";
                                                 
                                            
                                            
                                             echo"<td><img src='./imges/books/$image' height='30px' width='30px'></td>";
                                            echo"<td><a href='books.php?delete=$book_id'> Delete</a></td>";
                                             echo"<td><a href='editbooks.php?p_id=$book_id'> Edit</a></td>";
                                           
                                               
                                            
                                            echo"</tr>"; 
                                            }
                    
                }
                                            
        ?>

                <?php 
                            if(isset($_POST['search'])){
                                echo"<h1>Results</h1>";
                                
                                $find = $_POST['find'];
                                $find = mysqli_real_escape_string($connection,$find);
                                
                               $query ="SELECT * FROM books WHERE bookName LIKE '%$find%' ";
                               $search_query = mysqli_query($connection, $query);
                                
                                if(!$search_query){
                                die("Query Failed ".mysqli_error($connection));
                                }

                                $count = mysqli_num_rows($search_query);
                                if($count == 0){
                                    echo "<h1>No Results</h1>";
                                }else{
                                
                                          
                                        while($row = mysqli_fetch_assoc($search_query)){ 
                                            $book_id = $row['id'];
                                            $bookName = $row['bookName'];
                                            $bcategory = $row['bcategory'];
                                            $bDate = $row['bDate'];
                                            $cnumber = $row['cnumber'];
                                            //$discription = $row['discription'];
                                           
                                            $image = $row['image'];
                                         
                                            echo"<tr>";
                                               echo"<td>$book_id</td>";
                                                echo"<td>$bookName</td>";
                                                echo"<td>$bcategory</td>";
                                                echo"<td>$bDate</td>";
                                                echo"<td>$cnumber</td>";
                                                //echo"<td>$discription</td>";
                                            
                                           
                                            echo"<td><img src='imges/books/$image' height='30px' width='30px'></td>";
                                            echo"<td><a href='books.php?delete=$book_id'> Delete</a></td>";
                                         
                                            
                                            echo"</tr>"; 
                                            }
                            }
                            }
                                            
        ?>


            </tbody>
        </table>

        <?php
        if(isset($_GET['delete'])){
            
            $book_id = mysqli_real_escape_string($connection,$_GET['delete']);
            
            $query = "DELETE FROM books WHERE id = {$book_id} ";
            $delete_query = mysqli_query($connection, $query);
            header('Location: books.php');
        }
    ?>

    </div>
</section>
<br><br><br><br><br>


<?php include"include/footer.php" ?>