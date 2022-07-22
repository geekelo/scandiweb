<?php
include 'includes/class-autoload.inc.php';
include 'classes/dbh.class.php';
include 'classes/test.class.php';

error_reporting(0);
// add button
if(isset($_POST['addbutton'])){
 
    header("Location: product-add.php");
    exit;
  }


  //delete mass delete via checkbox
//   if(isset($_POST['deletebutton'])){
//     $box = $_POST['checkbox'];
    
//      // while (list ($key,$val) = each ($box))
//     //  if(empty($box)){
//     //     echo "$box";
//     //  }
  
//     //     else{
//     //  foreach($box as $key => $val){
  
    
     
//     //     // echo "$val,";
//     //      mysqli_query($conn, "DELETE FROM products WHERE id = $val");  
//     //     header('location:product_page.php');
//     //     }
//     //  }
     
       
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <!-- bootstrap and jquery -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- custom css link -->
    <link rel="stylesheet" href="./css/style2.css">

</head>
<body>


<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"  name="deleteform">
<div class="topbar">
<h1> <b>Product List</b></h1>
<a href="admin_page.php"><button class="addbutton  btn-outline-light" name="addbutton">ADD</button></a>
<input class="deletebutton  btn-outline-light" name="deletebutton" type="submit" value="MASS DELETE">

<hr>
</div>
   <div class="product-display">

   <?php
   $testObj = new Test();
   if(isset($_POST['deletebutton'])){
     $box = $_POST['checkbox'];
     if ($box == null){
     
        echo '<span class="message"> Please select a product!  </span>';}
        else { $testObj-> delProductsStmt($box);}
     
   }
   ?>
      <ul class="product-display-table">
    <?php
 
    $testObj-> getProducts();
    //  $testObj-> getProductsStmt("xdfsd", "sfdds");
   // $testObj-> setProductsStmt("TELSLA1", "Teslima", 190, "dvd", 50, 59, 69, 7, 9);
    ?>

</ul>
</div>

</div>

         </form>

<footer>
   
  <p>Scandiweb Test Assignment</p>
 </footer>




</body>
</html>