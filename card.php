   <?php
session_start();

 include('config/constants.php');
 $last_inserted_id=$_SESSION['last_insert_id'];

 //Connect the database
   $conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die("Connection failed".mysqli_connect_error());

   // Select the Database
   $db_select=mysqli_select_db($conn,DB_NAME);


 $sql="select * from card_info where  id=$last_inserted_id" ;
    $res= mysqli_query($conn,$sql);



     if(mysqli_num_rows($res)>0){

        $row=mysqli_fetch_assoc($res);
         while ($row>0){
           $id=$row['ID'];
           $companyName=$row['CompanyName'];
           $name=$row['Name'];
           $email=$row['Email'];
           $image=$row['Image'];
           $size=$row['Size'];

         $product_id=$row['pro_id'];


        $sqlquery="select * from products where id=$product_id";

         $result=mysqli_query($conn,$sqlquery);
        while($row=mysqli_fetch_array($result)){
        $pro_id=$row['ID'];
        $pro_name=$row['Name'];
        $pro_image=$row['Image'];
        $pro_price=$row['Price'];

        
     
      ?>

         <!DOCTYPE html>
<html lang="en">
  <head>
    <title>BuisnessCard</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="products.css" />
  </head>

  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <form action="add-to-cart.php" method="POST">
            <input type="hidden" name="pro_id" value="<?php echo $row['ID'];?>">
            <input type="hidden" name="card_info_id" value="<?php echo $last_inserted_id;?>">
            <div style="border:1px solid #333;background-color:#f1f1f1;border-radius:5px;padding:5px;">
          <div class="card bg-dark text-white">
            <img
              src="images/<?php echo $row['Image'];?>"
              class="card-img"
              alt="..."
            />
            <div class="card-img-overlay">
              
               <div class="row">
                 <div class="col-md-6">
                           <img style="width:150px;height:150px;margin:50px;" src="imagesFolder/<?php echo $image;?>">
                      </div>
                    <div class="col-md-6">
                        <h5 style="padding:10px;" class="card-title"><?php echo $companyName;?></h5>
                       <p  style="padding:10px;" class="card-text"><?php echo $name;?></p>
                       <p   style="padding:10px;" class="card-text"><?php echo $email;?></p>
                    </div>
                      
                     
                     </div>
             
            </div> 
              
            </div>
          </div>
          <hr/>
          <div class="col-md-6">
           <div class="row">
             <div class="col-md-6">
                 <label type="text">Quantity:</label>
             </div>
              <div class="col-md-6">
                 <input type="number" name="quantity" class="form-control"  value="1">
             </div>
          </div>
          <div class="row">
             <div class="col-md-6">
                 <label type="text">Name:</label>
             </div>
              <div class="col-md-6">
                <input type="text" name="pro_name" class="form-control"  value="<?php echo $pro_name;?>">
             </div>
          </div>
          <div class="row">
             <div class="col-md-6">
                 <label type="text">Price :</label>
             </div>
              <div class="col-md-6">
                <input type="text" name="pro_price" class="form-control" value="<?php echo $pro_price;?>" readonly>
             </div>
          </div>
      
      
          </div>
          <div>
           <button type="submit" name="add-to-cart"  class="btn btn-success" data-id="<?php echo $last_inserted_id;?>">Add to cart</button>
        </form>
    </div>

        
        </div>
      </div>
     
    </div>
  </body>
</html>

<?php
      }
  
    }  
    }
    ?>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  -->
