<?php  
   session_start();  
?>  
<!DOCTYPE html>  
<html>  
<head>  
   <title>Personal Stamp Collection</title>  
   <style>
      .container {
         max-width: 800px;
         margin: 0 auto;
         padding: 20px;
      }

      h1 {
         text-align: center;
      }

      .btn {
         display: inline-block;
         padding: 10px 20px;
         font-size: 16px;
         text-decoration: none;
         color: #fff;
         background-color: #007bff;
         border: none;
         border-radius: 4px;
         cursor: pointer;
      }

      .btn-success {
         background-color: #28a745;
      }

      .btn-primary {
         background-color: #007bff;
      }

      .btn-danger {
         background-color: #dc3545;
      }

      .alert {
         padding: 10px;
         margin-bottom: 20px;
         color: #155724;
         background-color: #d4edda;
         border-color: #c3e6cb;
         border-radius: 4px;
      }

      table {
         width: 100%;
         border-collapse: collapse;
      }

      th, td {
         padding: 8px;
         text-align: left;
         border-bottom: 1px solid #ddd;
      }
   </style>
</head>  
<body>  
  
<div class="container">  
   <h1 style="color:Tomato">Personal Stamp Collection</h1>  
  
   <a href="create.php" class="btn btn-success">Add Stamp</a>  
  
   <?php  
      if(isset($_SESSION['success'])){  
         echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";  
      }  
   ?>  
  
   <table>  
      <tr>  
         <th>Stamp Name</th>  
         <th>Details</th>  
         <th>Action</th>  
      </tr>  
      <?php  
         require 'config.php';  
         $books = $collection->find([]);  
         foreach($books as $book) {  
            echo "<tr>";  
            echo "<td>".$book->name."</td>";  
            echo "<td>".$book->detail."</td>";  
            echo "<td>";  
            echo "<a href='edit.php?id=".$book->_id."' class='btn btn-primary'>Edit</a>";
            echo "<a href='delete.php?id=".$book->_id."' class='btn btn-danger'>Delete</a>";
  
            echo "</td>";  
            echo "</tr>";  
         };  
      ?>  
   </table>  
</div>  
  
</body>  
</html>
