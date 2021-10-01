
<?php
session_start();
  include('config/constants.php');

  

     if(isset($_POST["submit"]))
     {
  //Get the values from the form
     $companyName=$_POST['companyName'];
     $name=$_POST['name'];
     $email=$_POST['email'];
     $filename = $_FILES["image"]["name"];
     $image_Path = "imagesFolder/".basename($filename);
    $size=$_POST['size'];
    $pro_id=$_POST['pro_id'];


  //Connect the database
   $conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die("Connection failed".mysqli_connect_error());

   // Select the Database
   $db_select=mysqli_select_db($conn,DB_NAME);
     
    $sql="INSERT INTO card_info SET CompanyName='$companyName',Name='$name',Email='$email',Image='$filename',Size='$size', pro_id='$pro_id'" ;
     $res= mysqli_query($conn,$sql);
     if (move_uploaded_file($_FILES['image']['tmp_name'], $image_Path))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
     if ($res==true) {
         $_SESSION['last_insert_id']=mysqli_insert_id($conn);
      header('Location:card.php');
    } else {
    echo "record inserted failed";
    } 

     }
    
  
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <title>BuisnessCard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="login-form bg-light mt-4 p-4">
                    <form action="#" method="POST" class="row g-3" enctype="multipart/form-data">
                        <h4>Fill the Details</h4>
                        <div class="col-12">
                            <label>Company Name</label>
                            <input type="text" name="companyName" class="form-control" placeholder="Company Name">
                        </div>
                        <div class="col-12">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="col-12">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="email">
                        </div>
                        <div class="col-12">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control" id="image">
                        </div>
                        <div class="col-12">
                            <label for="size">Choose a Paper Size:</label>
                                 <select id="size" name="size">
                                 <option value="size">3.5"x 2"</option>
                                 <option value="size">3.582” × 2.165”</option>
                                 <option value="size">3.346” × 2.165”</option>
                                 <option value="size">3.54” × 2.165"</option>
                                 <option value="size">3.543” × 2.125”</option>
                                 <option value="size">3.346” × 1.889”</option>
                                 
                                 </select>
                        </div>
                        <input type="hidden" name="pro_id" id="pro_id" value="<?php
                                     echo $_GET['id'];
                                     
                                     ?>" />
                         <div class="col-12">

                        <input type="submit"  id="submit" name="submit"  value="Save " class="btn btn-success"/>
                    </div>
                    </form>
                    <hr class="mt-4">
                   
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->

    <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>
</body>
</html>



</script>