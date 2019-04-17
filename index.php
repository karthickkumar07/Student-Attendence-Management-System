<?php 
include("db.php");
include("header.php");
              $flag=0; 
			  $update=0;
			   if(isset($_POST['submit']))
               {
				   $date=date("y-m-d");
				 $records=mysqli_query($con,"select * from attendence_records where date='$date'");;
				 $num= mysqli_num_rows($records) ;
				 
				 if($num)
				 {
					 foreach($_POST['attendence_status'] as $id=>$attendence_status)
				  {
				  $student_name=$_POST['student_name'][$id];
                  $student_registernumber=$_POST['student_registernumber'][$id];				  
				     
                  
                 $result= mysqli_query($con,"update attendence_records set student_name='$student_name', student_registernumber='$student_registernumber', attendence_status='$attendence_status', date='$date' where date='$date'");
				  
				  if($result)
				  {
					  $update=1;
				  }
				  } 
				 }

					 
				 }
				 else
				 {
                  foreach($_POST['attendence_status'] as $id=>$attendence_status)
				  {
				  $student_name=$_POST['student_name'][$id];
                  $student_registernumber=$_POST['student_registernumber'][$id];				  
				  

                  $result =mysqli_query($con,"insert into attendence_records(student_name,student_registernumber,attendence_status,date)values('$student_name','$student_registernumber','$attendence_status','$date')");  
				  if($result)
				  {
					  $flag=1;
				  }
				  } 
				 }

               				   

?>

<div class="panel panel-default">

     <div class="panel panel-heading">
	 <h2>
     <a class="btn btn-success" href="add.php">ADD Students </a>
	 <a class="btn btn-info pull-right" href="viewall.php">View All </a>
	 
	 </h2>
	 <?php if($flag){ ?>
	 <div class="alert alert-success">
	 Attendence Data inserted successfully
	 </div>
	 <?php } ?>
	 
	  <?php if($update){ ?>
	 <div class="alert alert-success">
	 Attendence Data updated successfully
	 </div>
	 <?php } ?>
	 
	 
	 <div class="well text-center"><?php echo date("Y-m-d");?> </div>
	 <div class="panel panel-body">
	 <form action="index.php" method="POST">
	 <table class="table table-striped">
	 <th>serail Number</th>
	 <th>student name</th>
	 <th>student reg number</th>
	 <th>Attendence status</th>
	 <?php $result=mysqli_query($con,"select * from attendence");
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
     <input type="hidden" value="<?php echo $row['student_name']; ?> " name="student_name[]">
	 </td>
	 <td><?php echo $row['student_registernumber']; ?> 
       <input type="hidden" value="<?php echo $row['student_registernumber']; ?> " name="student_registernumber[]">
	 </td>
	 <td> <input type="radio" name="attendence_status[<?php echo $counter ;  ?>]" value"present"> present
	       <input type="radio" name ="attendence_status[<?php echo $counter ;  ?>]" value"absent"> absent
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