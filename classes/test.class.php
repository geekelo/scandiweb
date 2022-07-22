<?php

class Test extends Dbh {

    public function messagetemp($message){
   
    }

    public function getProducts(){
        $sql = "SELECT * FROM products";
        $stmt = $this->connect()->query($sql);

        while($row = $stmt->fetch()){

          
          echo '<li><div class="prodlist">';
          echo  '<input type="checkbox" id="checkbox" name="checkbox[]" value="' . $row['id'] . '" >';

          echo '<p>' . $row['sku'] .'</p>';
           echo '<p>' . $row['name'] .'</p>';
           echo '<p>' . $row['price'] .'&nbsp; $</p> ';

           echo '<p>';
          
          //  $row = mysqli_fetch_row($select); 
         if ($row['type'] == 'dvd') {
          echo 'Size: &nbsp;' . $row['size'] . '&nbsp; MB';
         
          } 


       if ($row['type'] == 'furniture') {
          echo "Dimension: &nbsp;" . $row['height'] . "x" . $row['width'] . "x" . $row['length'];
       } 
       if ($row['type'] == 'book') {
       echo "Weight: &nbsp;"  . $row['weight'] . "&nbsp; KG ";
        }
       
    


       

      echo '</p> <br></div></li>' ;
     
      
        }
    }



    public function delProductsStmt($box){

       $nums = 0 ;
         foreach($box as $key => $val){
      
        if($this->connect() !=null  ){
            if($box != null){
            $sql = sprintf("DELETE FROM products WHERE id = $val");
            $stmt = $this->connect()->query($sql);
            if($stmt){
                // echo '<span class="message"> Successfully Deleted!  </span>';
            
    
         
    }
   
}

} $nums = $nums +1;
  }
  if($nums == 1){
  echo '<span class="message"> Successfully Deleted &nbsp;' . $nums . '&nbsp; product!  </span>';}
  if($nums > 1){
    echo '<span class="message"> Successfully Deleted &nbsp;' . $nums . '&nbsp; products!  </span>';}
    }


    public function getProductsStmte($sku, $name){
        $sql = "SELECT * FROM products WHERE sku = ? AND name = ?";
        $stmt = $this->connect()->prepare($sql);
     $stmt->execute([$sku, $name]);
     $items = $stmt->fetchAll();

     foreach ($items as $item){
        echo $item['price'] . '<br>';
     }
       
    }



           
 

        
    public function getProductsStmt($sku){
        $sql = "SELECT * FROM products WHERE sku = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$sku]); 
        //fetch result 
        $user = $stmt->fetch();
        if ($user) {
            // username already exists
            return false;
          
           
        } else {
            // username does not exist
          return true;
        }  
    }




    public function setProductsStmt($sku, $name, $price, $type, $size, $weight, $height, $width, $length){

        if(empty($sku) || empty($name) || empty($price) || empty($type)  ){
            echo  '<span class="message">  Please, submit required data!  </span>' ;}

        else if ( ! empty( $sku ) && ! preg_match('/^[a-zA-Z0-9-]+$/', $sku ) ) {
            echo  '<span class="message">  Please, spaces are not allowed for SKU!  </span>' ;}
        

          else if ($type == 'dvd' && empty($size) ) {
                echo  '<span class="message">  Please, submit required Dvd Size!  </span>' ;}
             else   if ($type == 'book' && empty($weight) ) {
                    echo  '<span class="message"> Please, submit required Book Weight!  </span>';}
               else     if($type == 'furniture' && empty($height) || $type == 'furniture' && empty($width) || $type == 'furniture' && empty($width)){
                        echo  '<span class="message"> Please, submit required Furniture Dimension!  </span>';}
                       
                    
   
        
        
        else{

        $sql = "INSERT INTO products(sku, name, price, type, size, weight, height, width, length ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?) ";
        $stmt = $this->connect()->prepare($sql);
        
        $stmt->execute([$sku, $name, $price, $type, $size, $weight, $height, $width, $length]);
        header("Location: product-list.php");
        exit;
        }
    
    }  
}
