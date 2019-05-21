<?php include"include/db.php" ?>
<?php include"include/header.php" ?>

<style>
    .button {
  
  border: none;
  color: white;

  text-align: center;

  font-size: 16px;
  margin: 4px 2px;
   width: 270px;
   height: 60px;
  cursor: pointer;
}
    
    .button2 {
  

  color: black;
 margin: 4px 2px;

   width: 100px;
  cursor: pointer;
}
    
    
    
.mail-box {
    border-collapse: collapse;
    border-spacing: 0;
    display: table;
    table-layout: fixed;
    width: 100%;
}
.mail-box aside {
    display: table-cell;
    float: none;
    height: 100%;
    padding: 0;
    vertical-align: top;
}
.mail-box .sm-side {
    background: none repeat scroll 0 0 #e5e8ef;
    border-radius: 4px 0 0 4px;
    width: 25%;
}
.mail-box .lg-side {
    background: none repeat scroll 0 0 #fff;
    border-radius: 0 4px 4px 0;
    width: 75%;
}
.mail-box .sm-side .user-head {
    background: none repeat scroll 0 0 #00a8b3;
    border-radius: 4px 0 0;
    color: #fff;
    min-height: 80px;
    padding: 10px;
}
.user-head .inbox-avatar {
    float: left;
    width: 65px;
}
.user-head .inbox-avatar img {
    border-radius: 4px;
}
.user-head .user-name {
    display: inline-block;
    margin: 0 0 0 10px;
}
.user-head .user-name h5 {
    font-size: 14px;
    font-weight: 300;
    margin-bottom: 0;
    margin-top: 15px;
}
.user-head .user-name h5 a {
    color: #fff;
}
.user-head .user-name span a {
    color: #87e2e7;
    font-size: 12px;
}

.inbox-body {
    padding: 20px;
}


ul.inbox-nav {
    display: inline-block;
    margin: 0;
    padding: 0;
    width: 100%;
}
.inbox-divider {
    border-bottom: 1px solid #d5d8df;
}
ul.inbox-nav li {
    display: inline-block;
    line-height: 45px;
    width: 100%;
}
ul.inbox-nav li a {
    color: #6a6a6a;
    display: inline-block;
    line-height: 45px;
    padding: 0 20px;
    width: 100%;
}
ul.inbox-nav li a:hover, ul.inbox-nav li.active a, ul.inbox-nav li a:focus {
    background: none repeat scroll 0 0 #d5d7de;
    color: #6a6a6a;
}
ul.inbox-nav li a i {
    color: #6a6a6a;
    font-size: 16px;
    padding-right: 10px;
}
ul.inbox-nav li a span.label {
    margin-top: 13px;
}
ul.labels-info li h4 {
    color: #5c5c5e;
    font-size: 13px;
    padding-left: 15px;
    padding-right: 15px;
    padding-top: 5px;
    text-transform: uppercase;
}
ul.labels-info li {
    margin: 0;
}
ul.labels-info li a {
    border-radius: 0;
    color: #6a6a6a;
}
ul.labels-info li a:hover, ul.labels-info li a:focus {
    background: none repeat scroll 0 0 #d5d7de;
    color: #6a6a6a;
}
ul.labels-info li a i {
    padding-right: 10px;
}
.nav.nav-pills.nav-stacked.labels-info p {
    color: #9d9f9e;
    font-size: 11px;
    margin-bottom: 0;
    padding: 0 22px;
}
.inbox-head {
    background: none repeat scroll 0 0 #41cac0;
    border-radius: 0 4px 0 0;
    color: #fff;
    min-height: 80px;
    padding: 20px;
}


.inbox-head .sr-btn {
    background: none repeat scroll 0 0 #00a6b2;
    border: medium none;
    border-radius: 0 4px 4px 0;
    color: #fff;
    height: 40px;
    padding: 0 20px;
}
.table-inbox {
    border: 1px solid #d3d3d3;
    margin-bottom: 0;
}
.table-inbox tr td {
    padding: 12px !important;
}
.table-inbox tr td:hover {
    cursor: pointer;
}
.table-inbox tr td .fa-star.inbox-started, .table-inbox tr td .fa-star:hover {
    color: #f78a09;
}
.table-inbox tr td .fa-star {
    color: #d5d5d5;
}
.table-inbox tr.unread td {
    background: none repeat scroll 0 0 #f7f7f7;
    font-weight: 600;
}
ul.inbox-pagination {
    float: right;
}
ul.inbox-pagination li {
    float: left;
}
.mail-option {
    display: inline-block;
    margin-bottom: 10px;
    width: 100%;
}
.mail-option .chk-all, .mail-option .btn-group {
    margin-right: 5px;
}
.mail-option .chk-all, .mail-option .btn-group a.btn {
    background: none repeat scroll 0 0 #fcfcfc;
    border: 1px solid #e7e7e7;
    border-radius: 3px !important;
    color: #afafaf;
    display: inline-block;
    padding: 5px 10px;
}
.inbox-pagination a.np-btn {
    background: none repeat scroll 0 0 #fcfcfc;
    border: 1px solid #e7e7e7;
    border-radius: 3px !important;
    color: #afafaf;
    display: inline-block;
    padding: 5px 15px;
}
.mail-option .chk-all input[type="checkbox"] {
    margin-top: 0;
}
.mail-option .btn-group a.all {
    border: medium none;
    padding: 0;
}
.inbox-pagination a.np-btn {
    margin-left: 5px;
}
.inbox-pagination li span {
    display: inline-block;
    margin-right: 5px;
    margin-top: 7px;
}
.fileinput-button {
    background: none repeat scroll 0 0 #eeeeee;
    border: 1px solid #e6e6e6;
}
.inbox-body .modal .modal-body input, .inbox-body .modal .modal-body textarea {
    border: 1px solid #e6e6e6;
    box-shadow: none;
}
.btn-send, .btn-send:hover {
    background: none repeat scroll 0 0 #00a8b3;
    color: #fff;
}
.btn-send:hover {
    background: none repeat scroll 0 0 #009da7;
}
.modal-header h4.modal-title {
    font-family: "Open Sans",sans-serif;
    font-weight: 300;
}
.modal-body label {
    font-family: "Open Sans",sans-serif;
    font-weight: 400;
}
.heading-inbox h4 {
    border-bottom: 1px solid #ddd;
    color: #444;
    font-size: 18px;
    margin-top: 20px;
    padding-bottom: 10px;
}
.sender-info {
    margin-bottom: 20px;
}
.sender-info img {
    height: 30px;
    width: 30px;
}
.sender-dropdown {
    background: none repeat scroll 0 0 #eaeaea;
    color: #777;
    font-size: 10px;
    padding: 0 3px;
}
.view-mail a {
    color: #ff6c60;
}
.attachment-mail {
    margin-top: 30px;
}
.attachment-mail ul {
    display: inline-block;
    margin-bottom: 30px;
    width: 100%;
}
.attachment-mail ul li {
    float: left;
    margin-bottom: 10px;
    margin-right: 10px;
    width: 150px;
}
.attachment-mail ul li img {
    width: 100%;
}
.attachment-mail ul li span {
    float: right;
}
.attachment-mail .file-name {
    float: left;
}
.attachment-mail .links {
    display: inline-block;
    width: 100%;
}

.fileinput-button {
    float: left;
    margin-right: 4px;
    overflow: hidden;
    position: relative;
}
.fileinput-button input {
    cursor: pointer;
    direction: ltr;
    font-size: 23px;
    margin: 0;
    opacity: 0;
    position: absolute;
    right: 0;
    top: 0;
    transform: translate(-300px, 0px) scale(4);
}
.fileupload-buttonbar .btn, .fileupload-buttonbar .toggle {
    margin-bottom: 5px;
}
.files .progress {
    width: 200px;
}
.fileupload-processing .fileupload-loading {
    display: block;
}
* html .fileinput-button {
    line-height: 24px;
    margin: 1px -3px 0 0;
}
* + html .fileinput-button {
    margin: 1px 0 0;
    padding: 2px 15px;
}
@media (max-width: 767px) {
.files .btn span {
    display: none;
}
.files .preview * {
    width: 40px;
}
.files .name * {
    display: inline-block;
    width: 80px;
    word-wrap: break-word;
}
.files .progress {
    width: 20px;
}
.files .delete {
    width: 60px;
}
}
ul {
    list-style-type: none;
    padding: 0px;
    margin: 0px;
}
 
</style>




<div class="container">
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
<form action="" method="post" enctype="multipart/form-data">
 <div class="mail-box">
                  <aside class="sm-side">
                      <div class="user-head">
                          <a class="inbox-avatar" href="javascript:;">
                              <img  width="64" hieght="60" src="imges/LogoMakr_1t25mE.png">
                          </a>
                          <div class="user-name">
                            <?php
                                if(isset($_GET['p_id'])){
                                    $the_user_id = $_GET['p_id'];
                                    
                                    ?>   
                              
                              <h3><a href="index.php?p_id=<?php echo $the_user_id ?>">ABC LIBRARY</a></h3>
                             <?php } ?>
                          </div>
             
                      </div>

                      <ul class="inbox-nav inbox-divider">
                          <li class="active">  
                              <input type="submit" name="all" class="button" value="ALL">
                          </li>
                          <li class="active">
                              <input type="submit" name="LOVE" class="button" value="LOVE">
                          </li>
                          <li class="active">
                              <input type="submit" name="HISTORY" class="button" value="HISTORY">
                          </li>
                          <li class="active">
                              <input type="submit" name="WEB" class="button" value="WEB">
                          </li>
                          <li class="active">
                              <input type="submit" name="JAVA" class="button" value="JAVA">
                          </li>
                           <li class="active">
                              <input type="submit" name="ANDROID" class="button" value="ANDROID">
                          </li>
                      
                      </ul>
                      
                  </aside>
                  <aside class="lg-side">
                      <div class="inbox-head">
                          <h3>STORE</h3>
                          <form action="#" class="pull-right position">
                              <div class="input-append">
                                  <input type="text" class="sr-input" name="result" placeholder="Search BOOKS">
                                 
                                  <input type="submit" name="search" class="button2" value="Search">
                              </div>
                          </form>
                      </div>
                      <div class="inbox-body">
                         <div class="mail-option">
                  
                            <p>Hi <?php echo $_SESSION['firstName']; ?> WELCOME TO ABC LIBRARY </p>
                         </div>
                          
                          
                          
                          
                          <table class="table table-inbox table-hover">
                            <tbody>
                                

                        
                                
        <?php 
            if(isset($_POST['search'])){
    
            $search = $_POST['result'];
            $query = "SELECT * FROM books WHERE bookName LIKE '%$search%'";
                                       
                                        $search_query =mysqli_query($connection,$query);
                                         if(!$search_query){
                                                die("Query Failed ".mysqli_error($connection));
                                            }
                                         $count = mysqli_num_rows($search_query);
                                        if($count == 0){
                                            echo "<h1>No Results</h1>";
                                        } else{                       
                                        while($row = mysqli_fetch_assoc($search_query)){ 
                                            $book_id = $row['id'];
                                            $bookName = $row['bookName'];
                                            $bcategory = $row['bcategory'];
                                            $bDate = $row['bDate'];
                                            $cnumber = $row['cnumber'];
                                            $price = $row['price'];
                                            $image = $row['image'];
                                            
                                            ?>
                          <tr class="">
                                <td>    <a href="recerve.php?p_id=<?php echo $book_id; ?>"> <img src="imges/books/<?php echo $image ?>" width="120"></a>   </td>
                                  <td class="view-message dont-show"><?php echo $bookName ?></td>
                                  <td class="view-message text-right"><?php echo $bDate ?></td>
                                </tr>
                                <?php }
            }
                                
            }
                                
                                
            if(isset($_POST['all'])){
    
            $query = "SELECT * FROM books ORDER BY id DESC";
                                       
                                        $select_book =mysqli_query($connection,$query);
                                       
                                        while($row = mysqli_fetch_assoc($select_book)){ 
                                            $book_id = $row['id'];
                                            $bookName = $row['bookName'];
                                            $bcategory = $row['bcategory'];
                                            $bDate = $row['bDate'];
                                            $cnumber = $row['cnumber'];
                                            $price = $row['price'];
                                            
                                           
                                            $image = $row['image'];
                                            
                                            ?>
                          <tr class="">
                                <td>    <a href="recerve.php?p_id=<?php echo $book_id; ?>"> <img src="imges/books/<?php echo $image ?>" width="120"></a>   </td>
                                  <td ><?php echo $bookName ?></td>
                               <td ><?php echo $cnumber ?></td>
                                  <td><?php echo $bDate ?></td>
                                </tr>
                                <?php }
            }


            if(isset($_POST['LOVE'])){
    
            $query = "SELECT * FROM books where bcategory = 'LOVE' ORDER BY id DESC";
                                       
                                        $select_book =mysqli_query($connection,$query);
                                       
                                        while($row = mysqli_fetch_assoc($select_book)){ 
                                            $book_id = $row['id'];
                                            $bookName = $row['bookName'];
                                            $bcategory = $row['bcategory'];
                                            $bDate = $row['bDate'];
                                            $cnumber = $row['cnumber'];
                                            $price = $row['price'];
                                            
                                           
                                            $image = $row['image'];
                                            
                                            ?>
                            <tr class="">
                                <td> <a href="recerve.php?p_id=<?php echo $book_id; ?>"> <img src="imges/books/<?php echo $image ?>" width="120"></a>   </td>
                                  <td class="view-message dont-show"><?php echo $bookName ?></td>
                                  <td class="view-message text-right"><?php echo $bDate ?></td>
                            </tr>
                                <?php }
            }

       if(isset($_POST['HISTORY'])){
    
            $query = "SELECT * FROM books where bcategory = 'HISTORY' ORDER BY id DESC";
                                       
                                        $select_book =mysqli_query($connection,$query);
                                       
                                        while($row = mysqli_fetch_assoc($select_book)){ 
                                            $book_id = $row['id'];
                                            $bookName = $row['bookName'];
                                            $bcategory = $row['bcategory'];
                                            $bDate = $row['bDate'];
                                            $cnumber = $row['cnumber'];
                                            $price = $row['price'];
                                            
                                           
                                            $image = $row['image'];
                                            
                                            ?>
                            <tr class="">
                                <td> <a href="recerve.php?p_id=<?php echo $book_id; ?>"> <img src="imges/books/<?php echo $image ?>" width="120"></a>   </td>
                                  <td class="view-message dont-show"><?php echo $bookName ?></td>
                                  <td class="view-message text-right"><?php echo $bDate ?></td>
                            </tr>
                                <?php }
            }

       if(isset($_POST['WEB'])){
    
            $query = "SELECT * FROM books where bcategory = 'WEB' ORDER BY id DESC";
                                       
                                        $select_book =mysqli_query($connection,$query);
                                       
                                        while($row = mysqli_fetch_assoc($select_book)){ 
                                            $book_id = $row['id'];
                                            $bookName = $row['bookName'];
                                            $bcategory = $row['bcategory'];
                                            $bDate = $row['bDate'];
                                            $cnumber = $row['cnumber'];
                                            $price = $row['price'];
                                            
                                           
                                            $image = $row['image'];
                                            
                                            ?>
                            <tr class="">
                                <td> <a href="recerve.php?p_id=<?php echo $book_id; ?>"> <img src="imges/books/<?php echo $image ?>" width="120"></a> </td>
                                  <td class="view-message dont-show"><?php echo $bookName ?></td>
                                  <td class="view-message text-right"><?php echo $bDate ?></td>
                            </tr>
                                <?php }
            }


       if(isset($_POST['JAVA'])){
    
            $query = "SELECT * FROM books where bcategory = 'JAVA' ORDER BY id DESC";
                                       
                                        $select_book =mysqli_query($connection,$query);
                                       
                                        while($row = mysqli_fetch_assoc($select_book)){ 
                                            $book_id = $row['id'];
                                            $bookName = $row['bookName'];
                                            $bcategory = $row['bcategory'];
                                            $bDate = $row['bDate'];
                                            $cnumber = $row['cnumber'];
                                            $price = $row['price'];
                                            
                                           
                                            $image = $row['image'];
                                            
                                            ?>
                            <tr class="">
                                <td> <a href="recerve.php?p_id=<?php echo $book_id; ?>"> <img src="imges/books/<?php echo $image ?>" width="120"></a>  </td>
                                  <td class="view-message dont-show"><?php echo $bookName ?></td>
                                 
                                
                                  <td class="view-message text-right"><?php echo $bDate ?></td>
                            </tr>
                                <?php }
            }

       if(isset($_POST['ANDROID'])){
    
            $query = "SELECT * FROM books where bcategory = 'ANDROID' ORDER BY id DESC";
                                       
                                        $select_book =mysqli_query($connection,$query);
                                       
                                        while($row = mysqli_fetch_assoc($select_book)){ 
                                            $book_id = $row['id'];
                                            $bookName = $row['bookName'];
                                            $bcategory = $row['bcategory'];
                                            $bDate = $row['bDate'];
                                            $cnumber = $row['cnumber'];
                                            $price = $row['price'];
                                            
                                           
                                            $image = $row['image'];
                                            
                                            ?>
                            <tr class="">
                                <td> <a href="recerve.php?p_id=<?php echo $book_id; ?>"> <img src="imges/books/<?php echo $image ?>" width="120"></a> </td>
                                  <td class="view-message dont-show"><?php echo $bookName ?></td>
                                  <td class="view-message text-right"><?php echo $bDate ?></td>
                            </tr>
                                <?php }
            }
                                
        ?>
                                    
                          </tbody>
                          </table>
                             
                          
                      </div>
                  </aside>
              </div>
    </form>
</div>