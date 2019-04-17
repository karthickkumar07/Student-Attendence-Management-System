<?php
    include("header.php");
    include("db.php");
        $flag=0;
    if(isset($_POST['submit']))
	{
		$result =mysqli_query($con,"insert into attendence(student_name,student_registernumber)values('$_POST[name]','$_POST[rg]')");
		
		if($result)
		{
			$flag=1;
		}
	}
		
?>
<div class="panel panel-default">
       <?php if($flag) { ?>
	   <div class="alert alert-success">
	   <strong>!success</strong>Attendence data successfully inserted
	   </div>
       <?php } ?> 
      <div class="panel-heading">
	  <h2>
          <a class="btn btn-success" href="add.php">Add student</a>
          <a class="btn btn-info pull-right" href="index.php">Back</a>
	  </h2>
      </div>
	  
	  <div class="panel-body"> 
	  <form action="add.php" method="POST">
	  
	  <div class="form-group">
	  <label for="name">Student Name </label>
	  <input type="text" name="name"  class="form-control" required>
	  </div>
	  
	  <div class="form-group">
	  <label for="rg">Register Number </label>
	  <input type="text" name="rg"  class="form-control" required>
	  </div>
	  <br>
	  <div class="form-group">
	  <input type= "submit" name="submit" value="submit" class="btn btn-primary" required>
	  </div>
	  
	  </form>
	  </div>
	  
    
</div>