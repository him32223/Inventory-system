<?php
session_start();
include_once('include/db.php');
if(isset($_POST['login'])){
	if(!empty($_POST['Username']) && !empty($_POST['Password'])){
		$Username=$_POST['Username'];
		$Password=$_POST['Password'];
		$Permission=$_POST['permission'];
		$Query="SELECT * FROM tb_login WHERE Username= '".$Username."' AND Password='".$Password."' AND Permission='".$Permission."'";
		$result=mysqli_query($conn,$Query);
		$rows=mysqli_num_rows($result);
		$row=mysqli_fetch_array($result);
		if($rows==1){
			echo"<script>window.location.href='home.php?user=".$row['SKU']."';
			alert('Successfully login');</script>";
			$_SESSION['per']=$row['Permission'];
			$_SESSION['User_Id']=$row['User_Id'];


		}else{
			echo"<script>alert('Wrong Username or Password!Please try again');</script>";
		}
	}else{
		echo"<script>alert('Please Insert Username or Password');
				</script>";
	}
	
	

		

}
?>


<style>
  input {
  width: 100%;
  padding: 12px;
  border: none;
  border-bottom: 1px solid blue;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  background-color: transparent;
}

/* Style the submit button */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
}

/* Style the container for inputs */
.container {
  background-color: #f1f1f1;
  padding: 2px;
}

.control-group {
  background-color: #f1f1f1;
  padding: 2px;
}
 

</style>

	<div class="container">
		<form class="form-horizontal" action="index.php" method="post">
			<div class="control-group">
				<label class="control-label">Username</label>
				<div class="controls">
					<input type="text" name="Username" placeholder="Username">
				</div>
			</div>
	</div>

	<div class="control-group">
		<label class="control-lable">Password</label>
		<div class="controls">
			<input type="password" name="Password" placeholder="Password">
		</div>
	</div>

	<div class="control-group">
		<label class="control-lable">Permission</label>
		<div class="controls">
			<input type="text" name="permission" placeholder="Permission">
		</div>
	</div>


	<br>
		<div class="control-group">
			<button type="submit" onclick="window.location.href='home.php'" name="login" value="" class="btn">Sign in</button>
			<button type="button" onclick="window.location.href='register.php'" name="register" value="" class="btn">Register</button>
		</div>
	</form>
</div>

