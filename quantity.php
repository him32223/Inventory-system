<?php
session_start();
	include_once('include/db.php'); 
	$qry="SELECT * FROM tb_item WHERE SKU='".$_GET['SKU']."'";
	$sql=mysqli_query($conn,$qry);
	$row=mysqli_fetch_array($sql);

	if(isset($_POST['Buy'])&& isset($_GET['SKU'])){
		$SKU=$_POST['SKU'];
		$Quantity=$_POST['Quantity'];
		$Price=$_POST['Price'];
		$User_Id=$_SESSION['User_Id'];
		$Total=$Price*$Quantity;
		$Address=$_POST['Address'];
		$Username=$_POST['Username'];
		$tel=$_POST['tel'];

		$Query="INSERT INTO tb_checkout(SKU,Quantity,Price,`Total pay`,User_Id,Username,Address,tel)VALUES('$SKU','$Quantity','$Price','$Total','$User_Id','$Username','$Address','$tel')";

		if($result=mysqli_query($conn,$Query)){
			echo"<script>window.location.href='checkout.php';
			alert('Ready to checkout');
			</script>";
		}else{
			echo"<script>alert('record Fails to Edit')</script>";
		}

	}
?>


<form class="form horizonatal" action="quantity.php?SKU=<?=$_GET['SKU']?>"
	method="post" enctype="multipart/form-date">
	<fieldset>
	<?php
			if($row['Picture']==""){
				echo "<input type='file' name='image".$row['Id']."' value=''>";
				echo "<input type='submit' name='".$row['SKU']."'>";
			}else{
				echo"<img style='width:100px;' src='".$row['Picture']."'>";
			}
			?>	
		<div class="controls group">
			<label class="control label">SKU</label>
				<div class="controls">
					<input  type="text" name="SKU" placeholder="SKU" value="<?=$row['SKU']?>" required>

				</div>
		</div>

		<div>


<div>
	<div class="control group">
		<label class="control label">QUantity</label>
			<div class="controls">
				<input type="text" name="Quantity" placeholder="Quantity" value="<?=$row['Quantity']?>" required>
			</div>
	</div>

</div>



<div>
	<div class="controls group">
		<label class="control label">Price</label>
			<div class="controls">
				<input  type="text" name="Price" placeholder="Price" value="<?=$row['Price']?>" required>
			</div>
	</div>

</div>

<div>
	<div class="controls group">
		<label class="control label">Address</label>
			<div class="controls">
				<input  type="text" name="Address" required placeholder="Address"  >
			</div>
	</div>

</div>

<div>
	<div class="controls group">
		<label class="control label">tel</label>
			<div class="controls">
				<input  type="text" name="tel" required placeholder="tel"  >
			</div>
	</div>

</div>













<div><br>
	<div class="control group"> 
		<div class="controls">
			<button type="submit" name="Buy" id="Buy" value="Buy" class="btn">submit</button>
			<button type="button" onclick="window.location.href='index.php'" class="btn">Back</button>
		</div>
	</div>
</div>
</form>
	
</form>
    </div>
</form>
    
