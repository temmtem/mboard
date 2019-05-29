<?ob_start();?>
<?php
require_once('connect.php');
session_start();
$_SESSION['posted'] = false;
if(isset($_POST['submit']))
 {
      $time = date("g:i:s A"); 
      $date = date("n/j/Y");
      $msg = $_POST['message']; 
      $name = $_POST['fname'];
      $result = "";
       if(!empty($msg) && !empty($name)) 
        { 
            //name time date message 
         $query = "INSERT INTO comment (";
         $query .= " name, time, date, message"; 
         $query .= ") VALUES (";
         $query .= " '{$name}', '{$time}', '{$date}', '{$msg}' ";
         $query .= ")"; 
         $result = mysqli_query($connect, $query); 
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Chat</title>
  <style type="text/css">
     textarea
     {
        border-radius: 2%;
     }
     #thread
     {
         border: 1px #d3d3d3 solid;
         height: 350px;
         width: 350px;
         overflow: scroll;
     }
   </style>  
</head>
<body>  
  <div id="thread">
    <?php
    $select = "SELECT * FROM comment";
    $q = mysqli_query($connect, $select);
    while($row = mysqli_fetch_assoc($q))
        {
           echo $row['name']. ": ". $row['message']."<br>";
        }
    ?>
   </div>  
   <form method="POST" action="index.php">
   <label for="fname">Name: </label>
   <input type="text" name="fname" id="fname"><br>
      <textarea name="message" id="message" rows="4" cols="35"> </textarea> <br>
      <button type="submit" name="submit">Submit</button>
   </form>
</body>
</html>       
   
