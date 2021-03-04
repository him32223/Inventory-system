<?php
	include_once('include/db.php'); 
	$qry="SELECT * FROM tb_item WHERE SKU='".$_GET['SKU']."'";
	$sql=mysqli_query($conn,$qry);
	$row=mysqli_fetch_array($sql);

	if(isset($_POST['edit'])&& isset($_GET['SKU'])){
		$SKU=$_POST['SKU'];
		$Quantity=$_POST['Quantity'];
		$Price=$_POST['Price'];

		$Query="UPDATE tb_item SET SKU='$SKU',Quantity='$Quantity',Price='$Price' WHERE SKU='".$_GET['SKU']."'";

		if($result=mysqli_query($conn,$Query)){
			echo"<script>window.location.href='index.php';
			alert('Record Success to Edit');
			</script>";
		}else{
			echo"<script>alert('record Fails to Edit')</script>";
		}

	}
?>

<style>
	btn{
		font-weight: bold;
		height:36px;
		cursor: default;
		width: 100px;
	 }

	label{
		display: inline-block;
		margin-bottom: 5px;
		font-weight: bold;
	}

	label input{
		height: unset;
	}

	.group{
		margin: 10px;
	}

	body{
		font-family: Courier New;
	}
</style>

<form class="form horizonatal" action="edit.php?SKU=<?=$_GET['SKU']?>"
	method="post" enctype="multipart/form-date">
		<div class="controls group">
			<label class="control label">SKU</label>
				<div class="controls">
					<input type="text" name="SKU" placeholder="SKU" value="<?=$row['SKU']?>" required>

				</div>
		</div>

<div>
	<div class="control group">
		<label class="control label">QUantity</label>
			<div class="controls">
				<input type="text" name="Quantity" placeholder="Quantity" value="<?=$row['Quantity']?>" required>
			</div>
	</div>

</div>

<div>
	
	</div>

</div>

<div>
	<div class="controls group">
		<label class="control label">Price</label>
			<div class="controls">
				<input type="text" name="Price" placeholder="Price" value="<?=$row['Price']?>" required>
			</div>
	</div>

</div>

<div><br>
	<div class="control group"> 
		<div class="controls">
			<button type="submit" name="edit" id="edit" value="edit" class="btn">submit</button>
			<button type="button" onclick="window.location.href='index.php'" class="btn">Back</button>
		</div>
	</div>
</div>
</form>


