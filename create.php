<?php  
session_start();  

if(isset($_POST['submit'])){  
   require 'config.php';  
   $insertOneResult = $collection->insertOne([  
       'name' => $_POST['name'],  
       'detail' => $_POST['detail'],  
   ]);  
   $_SESSION['success'] = "Stamp Added successfully";  
   header("Location: index.php");  
}  
?>

<!DOCTYPE html>  
<html>  
<head>  
   <title>Stamp Collection</title>  
   <style>
      .container {
         max-width: 600px;
         margin: 0 auto;
         padding: 20px;
      }

      h1 {
         text-align: center;
      }

      .btn {
         display: inline-block;
         padding: 10px 20px;
         background-color: #007bff;
         color: #fff;
         text-decoration: none;
         border-radius: 5px;
      }

      .form-group {
         margin-bottom: 20px;
      }

      .form-control {
         width: 100%;
         padding: 10px;
         border: 1px solid #ccc;
         border-radius: 5px;
         box-sizing: border-box;
      }

      .btn-success {
         background-color: #28a745;
      }
   </style>
</head>  
<body>  
   <div class="container">  
      <h1>Add Stamp</h1>  
      <a href="index.php" class="btn btn-primary">Back</a>  

      <form method="POST">  
         <div class="form-group">  
            <strong>Name:</strong>  
            <input type="text" name="name" required="" class="form-control" placeholder="Name">  
         </div>  
         <div class="form-group">  
            <strong>Detail:</strong>  
            <textarea class="form-control" name="detail" placeholder="Detail"></textarea>  
         </div>  
         <div class="form-group">  
            <button type="submit" name="submit" class="btn btn-success">Submit</button>  
         </div>  
      </form>  
   </div>  
</body>  
</html>
