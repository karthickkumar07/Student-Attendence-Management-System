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
	 <form action="index.php" method="POST">
	 <table class="table table-striped">
	 <th>serail Number</th>
	 <th>student name</th>
	 <th>student reg number</th>
	 <th>Attendence status</th>
	 <?php 
	 $result=mysqli_query($con,"select * from attendence_records where date=$_POST[date]");
	 $serialnumber=0;
	 $counter=0;
	 while($row=mysqli_fetch_array($result))
     {
      $serialnumber++;
	  
	 }
	 
	 ?>
	 
	 <tr>
	 <td><?php echo $serialnumber; ?>   </td>
	 <td><?php echo $row['student_name']; ?> 
	 </td>
	 <td><?php echo $row['student_registernumber']; ?> 
	 </td>
	 <td> <input type="radio" name="attendence_status[<?php echo $counter ;  ?>]" 
	 <?php if($row['attendence_status']=="present") 
           echo "checked=checked";
		 ?>
	 value"present"> present
	       <input type="radio" name ="attendence_status[<?php echo $counter ;  ?>]"
           <?php if($row['attendence_status']=="absent") 
           echo "checked=checked";
		    ?>
		   value"absent"> absent
	 </td>
	 </tr>
	 <?php 
	 $counter++;
	 ?>
	 
	 </table>
	 <input type="submit" name="submit" value="submit" class="btn btn-primary">
	 </form>
	 </div>
	 </div>
	 




</div>