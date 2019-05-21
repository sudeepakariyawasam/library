<?php include"include/db.php" ?>
<?php include"include/header.php" ?>
<style>
    body {
        background-color: #f5f5f5;
        padding-top: 25px;
        font-family: 'Open sans', Arial, sans-serif;
    }

    .header-navigation {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
        font-size: .80rem;
    }

    .header-navigation a {
        font-size: .80rem;
    }

    .header-navigation .breadcrumb {
        margin-bottom: 0;
        background-color: transparent;
        padding: 0.20rem 1rem;
    }

    .header-navigation .btn-group {
        margin-left: auto;
    }

    .header-navigation .btn-share {
        position: relative;
    }

    .header-navigation .btn-share::after {
        content: "";
        width: 1px;
        height: 50%;
        background-color: #ccc;
        position: absolute;
        top: 50%;
        left: 100%;
        transform: translateY(-50%);
    }

    .store-body {
        display: flex;
        flex-direction: row;
        padding: 0;
    }

    .store-body .product-info {
        width: 60%;
        border-right: 1px solid rgba(0, 0, 0, .125);
    }

    .store-body .product-payment-details {
        width: 40%;
        padding: 15px 15px 0 15px;
    }

    .product-info .product-gallery {
        display: flex;
        flex-direction: row;
        border-bottom: 1px solid rgba(0, 0, 0, .125);
    }

    .product-gallery-featured {
        display: flex;
        width: 100%;
        flex-direction: row;
        justify-content: center;
        align-items: flex-start;
        padding: 15px 0;
        cursor: zoom-in;
    }

    .product-gallery-thumbnails .thumbnails-list li {
        margin-bottom: 5px;
        cursor: pointer;
        position: relative;
        width: 70px;
        height: 70px;
    }

    .thumbnails-list li img {
        display: block;
        width: 100%;
    }

    .product-gallery-thumbnails .thumbnails-list li:hover::before {
        content: "";
        width: 3px;
        height: 100%;
        background: #007bff;
        position: absolute;
        top: 0;
        left: 0;
    }

    .product-info .product-seller-recommended {
        padding: 20px 20px 0 20px;
    }

    .product-comments textarea {
        height: 50px;
    }

    .last-questions-list li {
        margin-bottom: 20px;
    }

    .last-questions-list li span {
        padding-left: 10px;
    }
</style>

<?php
 if(isset($_GET['p_id'])){
                $the_book_id = $_GET['p_id'];
        
                $query = "SELECT * FROM books where id = '$the_book_id' ";
                                       
                                        $select_book =mysqli_query($connection,$query);
                                       
                                while($row = mysqli_fetch_assoc($select_book)){ 
                                            $book_id = $row['id'];
                                            $bookName = $row['bookName'];
                                            $bcategory = $row['bcategory'];
                                            $discription = $row['discription'];
                                            $bDate = $row['bDate'];
                                            $cnumber = $row['cnumber'];
                                            $price = $row['price'];
                                            
                                           
                                            $image = $row['image'];
                                    
                                            $_SESSION['book_id'] = $book_id;
                                            $_SESSION['bDate'] = $bDate;
                                            $_SESSION['bookName'] = $bookName;
                                            $_SESSION['image'] = $image;
                                            $_SESSION['bcategory'] = $bcategory;
                                            $_SESSION['discription'] = $discription;
                                    
                                            
?>



<main>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-10">
                        <div class="card-header">
                            <h4>Hello <?php echo $_SESSION['firstName']; ?></h4>
                            <a href="store.php?p_id=<?php echo $_SESSION['id']; ?>">
                                <p style="align:left">Back</p>
                            </a>
                        </div>


                        <div class="card-body store-body">
                            <div class="product-info">
                                <div class="product-gallery">
                                    <div class="product-gallery-thumbnails">
                                    </div>
                                    <div class="product-gallery-featured">
                                        <img src="imges/books/<?php echo $image ?>" alt="" style="width:60%">
                                    </div>
                                </div>
                                <div class="product-seller-recommended">
                                    <div class="product-description mb-5">
                                        <h2 class="mb-5">Description</h2>
                                        <p><?php echo $discription ?></p>
                                    </div>

                                </div>
                            </div>
                            <div class="product-payment-details">
                                <p class="last-sold text-muted"><small><?php echo $cnumber ?></small></p>

                                <h2 class="product-price display-4"><?php 
                                                
                                                if($cnumber>0){
                                                     echo" Avilable $cnumber Books In Store";   
                                                }else{
                                                     echo" This Book is not Available at the moment";   
                                                }
                                       ?>                      
                                </h2>
                                
                                <p class="text-success"><i class="fab fa-asymmetrik"></i></p>
                                <input type="submit" name="recerve" class="btn btn-primary btn-lg btn-block" value="Recerve Now">

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </form>
</main>

<?php   
    
    if(isset($_POST['recerve'])){
        
        
        $firstname = $_SESSION['firstName'];
        $lastname = $_SESSION['lastname'];
        $mobile = $_SESSION['mobile'];
    

        $reserveDate = date('Y-m-d');                      
                            
        $user_id =  $_SESSION['id'];
        $bookName = $_SESSION['bookName'];
        $book_id = $_SESSION['book_id'];
        //$bDate = $_SESSION['bDate'];
        $email = $_SESSION['email'];
        $contact = $_SESSION['mobile'];
        $image = $_SESSION['image'];
        $bcategory = $_SESSION['bcategory'];
        $discription = $_SESSION['discription'];
                             
                $get_query ="UPDATE books SET cnumber = cnumber - 1 WHERE id = $book_id ";
                $update_query = mysqli_query($connection,$get_query);
        
        
        
         $query = "INSERT INTO recervations(user_id,book_id,rDate,bookname,email,contact,status,image,bcategory,discription,firstName,lastname,mobile,price) VALUES ('{$user_id}','{$book_id}','{$reserveDate}','{$bookName}','{$email}','{$contact}','borrow','{$image}','{$bcategory}','{$discription}','{$firstname}','{$lastname}','{$mobile}',200)";
        
        
        $add_query = mysqli_query($connection,$query);
        
        if($add_query){
            echo"Success";
             header("LOCATION: store.php?p_id=$user_id");
            
        }else{
             die("QUERY FAILED".mysqli_error($connection));
        }    
    }                                                
}
     
}
     
?>