<?php
 include('config/constants.php');
   //Connect the database
   $conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die("Connection failed".mysqli_connect_error());
   // Select the Database
   $db_select=mysqli_select_db($conn,DB_NAME);
   if(isset($_POST)){
      $card_info_id=$_POST['card_info_id'];
      $quantity=$_POST['quantity'];
      $price=$_POST['pro_price'];
      $total=$_POST['quantity']*$_POST['pro_price'];
      $pro_name=$_POST['pro_name']; 
      $pro_id=$_POST['pro_id'];
      $sql="INSERT INTO cart SET card_info_id='$card_info_id',
       quantity='$quantity',
       price='$price',
       user_id='1',
       total='$total', 
       pro_name='$pro_name',
       pro_id='$pro_id'";
       $res= mysqli_query($conn,$sql);

   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css"
    />
    <title>Design</title>
    <style>
     @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');

     *{
         font-family: 'Open Sans', sans-serif;
     }

     
         .container{
             padding:50px;
         }
     
    </style>
</head>
<body>
    <div class="container">
    <h2 style="text-align:center">CART DETAILS</h2>
     <div class="row">

     <table class="table table-striped table-hover">
         <thead>
             <th>Name</th>
             <th>Price</th>
             <th>Quantity</th>
             <th>Total</th>
         </thead>
         <tbody>
             <tr> 
                 <td><?php echo $pro_name;?></td>
                 <td><?php echo $price;?></td>
                 <td><?php echo $quantity;?></td>
                 <td><?php echo $total;?></td>
             </tr>
         </tbody>
    
     </table>
     </div>
   </div>
</body>
</html>