<?php  
session_start();  
require 'config.php';  
  
if (isset($_GET['id'])) {  
   $book = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);  
}  
  
if(isset($_POST['submit'])){  
   $collection->updateOne(  
       ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],  
       ['$set' => ['name' => $_POST['name'], 'detail' => $_POST['detail'],]]  
   );  
  
   $_SESSION['success'] = "Updating of Stamp is successful";  
   header("Location: index.php");  
}  
  
?>  
  
<!DOCTYPE html>  
<html>  
<head>  
   <title>Stamp Collection</title>
   <style>
      .container {
         max-width: 500px;
         margin: 0 auto;
         padding: 20px;
      }

      h1 {
         text-align: center;
      }

      .btn {
         display: inline-block;
         padding: 10px 20px;
         margin-bottom: 10px;
         text-decoration: none;
         color: #fff;
         background-color: #007bff;
         border: none;
         border-radius: 4px;
      }

      .form-group {
         margin-bottom: 20px;
      }

      .form-group strong {
         display: block;
         margin-bottom: 5px;
      }

      .form-control {
         width: 100%;
         padding: 10px;
         font-size: 16px;
         border: 1px solid #ccc;
         border-radius: 4px;
      }

      .btn-success {
         background-color: #28a745;
      }
   </style>
</head>  
<body>  
  
<div class="container">  
   <h1>Edit Stamp Details</h1>  
   <a href="index.php" class="btn btn-primary">Back</a>  
  
   <form method="POST">  
      <div class="form-group">  
         <strong>Name:</strong>  
         <input type="text" name="name" value="<?php echo $book->name; ?>" required="" class="form-control" placeholder="Name">  
      </div>  
      <div class="form-group">  
         <strong>Detail:</strong>  
         <textarea class="form-control" name="detail" placeholder="Detail"><?php echo $book->detail; ?></textarea>  
      </div>  
      <div class="form-group">  
         <button type="submit" name="submit" class="btn btn-success">Submit</button>  
      </div>  
   </form>  
</div>  
  
</body>  
</html>
