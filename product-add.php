<?php
include 'includes/class-autoload.inc.php';
include 'classes/dbh.class.php';
include 'classes/test.class.php';
include 'config.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <!-- bootstrap and jquery -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- custom css link -->
    <link rel="stylesheet" href="./css/style.css">

</head>
<body>
    <?php




        
//  $query = mysqli_query($conn, "SELECT * FROM products WHERE sku = '$product_sku'");
//   if(mysqli_num_rows($stmt) > 0)
//   {
//    $message[] =  'SKU already exists!';
//   }}



   

    ?>

<section>


 <div class="container">
<div class="admin-product-form-container">
  <div class="formbg"></div>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="product_form" enctype="multipart/form-data" class="needs-validation" novalidate>
 <div  >
 <h1>Product Add</h1>
 <div>
 <input  type="submit" value="SAVE" class="savebutton btn btn-outline-light" name="save_product">
<button class="cancelbutton btn-outline-light" name="cancelbutton" type="submit" >  CANCEL </button>
<hr>
</div>

<?php
if(isset($_POST['save_product'])){
    $product_sku = $_POST['product_sku'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_type_value =$_POST['productType'];
    $size = $_POST['size'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $width = $_POST['width'];
    $length = $_POST['length'];


   
$testObj = new Test();
$exists = $testObj-> getProductsStmt($product_sku);
if ($exists == false){
  echo  '<span class="message"> SKU already exists! </span>';
}

else{
   
$testObj-> setProductsStmt($product_sku, $product_name, $product_price,  $product_type_value, $size,  $weight, $height, $width, $length );

// $testObj-> setProductsStmt("TELSLA1", "Teslima", 190, "dvd", 50, 59, 69, 7, 9);
// $testObj-> getProductsStmt("xdfsd", "sfdds");
}
}

if(isset($_POST['cancelbutton'])){
 
    header("Location: product-list.php");
    exit;
  }
  

//ERROR MESSAGE
// if(isset($message)){
//     foreach($message as $message){
//        echo '<span class="message">'.$message[] = $message .'</span>';
//     }
//  }

?>
</div> 
<div class="subcontainer">
   <div class="">
     <label for="validationCustom01">SKU</label>
     <input type="text" placeholder="Enter the Product SKU" class="form-control" id="sku" name="product_sku" required/>
     <div class="invalid-feedback">
         Please, submit required data
     </div>
   </div>

   <br>
   <div class="">
     <label for="validationCustom02">NAME</label>
     <input type="text" placeholder="Enter the Product name" class="form-control" id="name"  name="product_name" required/>
     <div class="invalid-feedback">
         Please, submit required data
     </div>
   </div>

  <br>
   <div class="">
     <label for="validationCustom03">PRICE($)</label>
     <input type="number" placeholder="0.00" class="form-control" id="price" name="product_price"  step=".01" required/>
     <div class="invalid-feedback">
         Please, submit required data
     </div>
   </div>

   <br>
 <div  class="" >
   <label for="productType">TYPE SWITCHER</label>
   <select name="productType" placeholder="Product Type" class="form-control"  id="productType" name="product_type"  required>
      <option value="" >Product Type</option>
      <option value="dvd"> DVD-disc</option>
      <option value="book">BOOK</option>
      <option value="furniture">FURNITURE</option>
   </select>
   <div class="invalid-feedback">
     Please, submit required data
 </div>
 </div>

   <div id="DVD" style="display:none;">
   <br/>
   <label for="size">SIZE (MB)</label>
   <input type="number"  class="form-control"  id="size" name="size" placeholder="Please provide size" required/>
   <div class="invalid-feedback">
     Size required 
 </div>
 <br/>
   <p>Please, provide Size in MB</p>
  
   </div>
   
   <div id="Book" style="display:none;">
   <br/>
   <label for="weight">WEIGHT (KG)</label>
   <input type="number"  class="form-control"  id="weight" name="weight" placeholder="Please provide weight" required/>
   <div class="invalid-feedback">
     Weight required 
 </div>
 <br/>
   <p>Please, provide Weight in KG</p>

   </div>
   
   <div id="Furniture" style="display:none;">
   <br/>
     <div>
   <label for="height">HEIGHT (CM)</label>
   <input type="number"  class="form-control"  id="height" name="height" placeholder="Please provide height" required/>
   <div class="invalid-feedback">
     Height required 
 </div></div>
   <br/>

<div>
    
   <label for="width">WIDTH (CM)</label>
   <input type="number"  class="form-control"  id="width" name="width" placeholder="Please provide width" required/>
   <div class="invalid-feedback">
     Width required 
 </div></div>
   <br/>
   <div>
   <label for="length">LENGTH (CM)</label>
     <input type="number"  class="form-control"  id="length" name="length" placeholder="Please provide length" required/>
     <div class="invalid-feedback">
         Size required 
     </div></div>
     <br/>
   <p>Please, provide Dimensions in HxWxL</p>
   </div>

   </div>
 </div>
 </div>



</form>



</div>
 </div>

</section>
 <footer>
  <p>Scandiweb Test Assignment</p>
 </footer>


 <script>

$('#productType').on('change',function(){
          if( $(this).val()==="dvd"){
          $("#DVD").show();
          $("#DVD").addClass("hidden");
           $("#Book").hide();
            $("#Furniture").hide()
          }
         
          
          if( $(this).val()==="book"){
             $("#Book").show();
           $("#DVD").hide();
            $("#Furniture").hide()
          }
          
            if( $(this).val()==="furniture"){
             $("#Furniture").show();
           $("#DVD").hide();
            $("#Book").hide()
          }
          
      });
  </script>

    
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    



</body>
</html>