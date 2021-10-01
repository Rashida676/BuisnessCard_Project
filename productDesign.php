<?php
 
  include('config/constants.php');
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
    </style>
</head>
<body>
    <div class="container">
    <h2>Select Your Template</h2>
     <div class="row">
     
      <?php
      
        //Connect the database
   $conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die("Connection failed".mysqli_connect_error());

   // Select the Database
   $db_select=mysqli_select_db($conn,DB_NAME);
       $sql="select * from products";
       $res=mysqli_query($conn,$sql);
       if(mysqli_num_rows($res)>0){

        while($row=mysqli_fetch_array($res)){
          if ($row['ID']==1){

            
            ?>
             <div class="col-md-4">
               <a href="cardDetails.php?id=<?php echo $row['ID'];?>">
                 <div class="card bg-dark text-white">
        
                    <img 
                    src="images/<?php echo $row['Image'];?>"
                    class="card-img"
                    alt="..."
                   style="width:355px"
                    />
                             <div class="card-img-overlay">
                                <h5 class="card-title"><input style="color:black;" type="text" id="fcompanyname" name="fcompanyname" placeholder="Company Name"><br></h5>
                                 <p class="card-text" style="color:black;">
                                    <input type="text" id="fname" name="fname" placeholder="Name">
                                 </p>
                                <p class="card-text">
                                    <input type="text" id="fname" name="fname" placeholder="Example@gmail.com">
                                </p>
                              </div>
                 </div>
            </a>
       </div> 
        
  </body>
</html>


           
<?php
          }elseif($row['ID']==2){ 
            
              
              ?>
          
  <div class="col-md-4">
               <a href="cardDetails2.php?id=<?php echo $row['ID'];?>">
                 <div class="card bg-dark text-white">
                     <img 
                    src="images/<?php echo $row['Image'];?>"
                    class="card-img"
                    alt="..."
                   style="width:355px"
                    />
                    
                             <div class="card-img-overlay">
                                <h5 class="card-title"> <input type="text" id="fname" name="fname" placeholder="Name"></h5>
                                 <p class="card-text" style="color:black;">
                                    <textarea id="w3review" name="w3review">
                                        
                                    </textarea>
                                 </p>
                                <p class="card-text">
                                   <input type="text" id="fname" name="fname" placeholder="Example@gmail.com">
                                </p>
                              </div>
                 </div>
            </a>
       </div> 

       <?php
          }
          else if($row['ID']==3)
          { 
            
              
              ?>

              <div class="col-md-4">
               <a href="cardDetails.php?id=<?php echo $row['ID'];?>">
                 <div class="card bg-dark text-white">
        
                    <img 
                    src="images/<?php echo $row['Image'];?>"
                    class="card-img"
                    alt="..."
                   style="width:355px"
                    />
                             <div class="card-img-overlay">
                                <h5 class="card-title"></h5>
                                 <p class="card-text" style="color:black;">
                                    <?php ?>
                                 </p>
                                <p class="card-text"></p>
                              </div>
                 </div>
            </a>
       </div> 
      <?php   
       }

        }
    }




      
      ?>
      
           </div>
 
    </div>
</body>
</html>