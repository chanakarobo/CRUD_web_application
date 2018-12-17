
<html>
<head>
 <title>CRUD_APP</title>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</head>
<body>

<?php require_once 'process.php';?>

<?php
if(isset($_SESSION['message'])):?>
<div class="alert alert-<?=$_SESSION['msg_type']?>">
   
<?php
echo $_SESSION['message'];
unset($_SESSION['message']);
?>
</div>
<?php endif?>
<?php
$mysqli=new mysqli('localhost','root',"",'crud') or die(mysqli_error($mysqli));
$result=$mysqli->query("select * from data ")or die(mysqli_error($mysqli));
?>

<div>

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Location</th>
            <th colspan="2">Action</th>

</tr>
</thead>
<?php
    while($row=$result->fetch_assoc()):?>
 <tr>
    <td><?php echo $row['name'];?></td>
    <td><?php echo $row['location'];?></td>
    <td>
   <a href="index.php?edit=<?php echo $row['id'];?>" class="btn btn-info">edit</a>
   <a href="index.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">delete</a>
    </td>
</tr>
<?php endwhile; ?> 
</table> 
</div>

<?php

function pre_r($array){
  echo'<pre>';
  print_r($array);
  echo '</pre>';

}

?>
<div class="row justify-content-center">
<form action="process.php" method="POST">
  <input type="hidden" name="id" value="<?php echo $id?>">

<div class="form-group"> 
<label>Name</label>    
<input type="text" name="name" class="form-control" value="<?php echo $name;?>" placeholder="enter your name">
</div>

<div class="form-group"> 
<label>Location</label>
<input type="text" name="location" class="form-control" value="<?php echo $location;?>"  placeholder="enter your location">
</div>

<div class="form-group"> 
<?php
if($update==true) :  
?>
<input type="submit" name="update" class="btn btn-info" value="update">
<?php else:?>
<input type="submit" name="save" class="btn btn-primary" value="save">
<?php endif;?> 
</div>   
</form> 
</div>

</body>
</html>