<?php 

include("db.php");
include("header.php");


?>



<div class="panel panel-default">

     <div class="panel panel-heading">
	 <h2>
     <a class="btn btn-success" href="add.php">ADD Students </a>
	 <a class="btn btn-info pull-right" href="index.php"> Back</a>
	 
	 </h2>
	 
	 
	 <div class="panel panel-body">
	 <table class="table table-striped">
	 <th>serail Number</th>
	 <th>Dates</th>
	  <th>Show Attendence</th>
	 
	 <?php $result=mysqli_query($con,"select distinct date from attendence_records");
	 $serialnumber=0; 
	 while($row=mysqli_fetch_array($result))
     {
      $serialnumber++;
	  

	 }
	 ?>
	 
	 
	 <tr>
	 <td><?php echo $serialnumber; ?>   </td>
	 <td><?php echo $row['date']; ?> 
     
	 </td>
	 <td>
	<form action="show_attendence.php" method="POST">
	<input type="hidden" value="<?php echo $row['date'] ?>" name="date[]">
	<input type="submit" class="btn btn-primary" value="Show Attendence">
	 
	 
	 </td>
	 </tr>
	 <?php 
	
	 ?>
	 
	 </table>
	 <input type="submit" name="submit" value="submit" class="btn btn-primary">
	 </form>
	 </div>
	 </div>
	 




</div>