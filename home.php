 <?php
 session_start();
include_once('include/db.php');

$query="SELECT * FROM tb_item";
$sql=mysqli_query($conn,$query);
//check if button delete is click
if(isset($_GET['SKU']) && isset($_GET['action'])&& $_GET['action']=='delete'){
	//get the data using $_Get[],inside the $_Get[] is the name on the url
	$SKU=$_GET['SKU'];
	//delete user query
	$Query="DELETE FROM tb_item WHERE SKU='$SKU'";
	//check if the query run seccess then messagebox will show
	if($result=mysqli_query($conn,$Query)) {
		echo"<script>window.location.href='home.php';
		alert('Record Succesfully Delete');</script>";
		
		//messagebox will show when users fail to delete
		}else{
			echo"<script>alert('Record Fails to Delete')</script>";}
}
if(isset($_POST['submit'])){
				$search=$_POST['select'];
				$qryl="SELECT * FROM  `tb_item` WHERE $search like'%".$_POST['search_data']."%'";
				$sql=mysqli_query($conn,$qryl);
			}

$query1="SELECT * FROM tb_item ";
$sql1=mysqli_query($conn,$query1);
while ($row=mysqli_fetch_array($sql1)) {
if(isset($_POST[$row['SKU']])){
	if(!empty($_FILES['image'.$row['Id']]['name']))
	{	
		//take the image extensions
		$ext = explode('.', $_FILES['image'.$row['Id']]['name']);
		//change the extensions to lower cairo_pdf_surface_set_size(surface, width, height)
		$ext = strtolower(array_pop($ext));
		//set the image path and name
		$file = 'Picture/'.date('YmdHis').'.'.$ext;
		//check the extension type
		if(($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png')){ 
			$target_path = $file;
		}else{
			$error_ext = 1;      
		}
		//check the file is exists in img folder or not
		if(file_exists($file)){
			$file_exists = 1;
		}
	}
	if(isset($error_ext)){
		echo "<script>alert('Please upload .jpg, .jpeg or .png file only.')</script>"; 
	}elseif(isset($file_exists)){
		echo "<script>alert('Image already exists, please choose another image or change the image name.')</script>"; 
	}elseif(isset($target_path) && !move_uploaded_file($_FILES['image'.$row['Id']]['tmp_name'], $target_path)){
		echo "<script>alert('Image failed to upload image')</script>";  
	}else{
		$query="UPDATE tb_item SET Picture='".$file."' WHERE SKU='".$row['SKU']."'";
		if($result=mysqli_query($conn,$query)){
			echo "<script>alert('Successfully');</script>";
		}else{
			echo "<script>alert('Fails insert image')</script>";
		}
		header("Refresh:0");
	}
}
}


?>
<head>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

<style>
	body{background-image: url("Picture/g.jpg");background-size: cover;}
	table{border-collapse:collapse;width:100%;}
th, td{
    border: 2px solid #0000ff;
    padding:8px;
    color:black;
    font-size: 20px;
    text-align: center;
}
th{
	color: white;
	font-size: 25px;
	background-image: linear-gradient(#00bfff,#0040ff,#8000ff)
}
button{
	padding: 8px;
	width: 120px;
	font-size: :16px;
	border: 2px solid dodgerblue;
	border-radius: 10px;
	color:white;
	background-color:dodgerblue;
}
button:hover{
	color:dodgerblue;
	background-color: white;
} 
</style>

	<head>
		<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>

</style>	
		
	<div>
		<select name="select">
			<option value="SKU">SKu</option>
			<option value="Quantity"> in stock Quantity</option>
			<option value="Price">Price per item</option>
		</select>
		<input type="text" class="empty" placeholder="&#xF002; Search" name="search_data">
		<button type="submit" name="submit" class="button">Submit</button>
		
	</div>
		
<div class="blocks">
	<span class="pull-right"><button type="button" onclick="window.location.href='index.php?action=logout'">
	logout</button></span>
	</div><br>
	<div class="container">
		<?php 
if ($_SESSION["per"]=="admin"){

?>
	<table>
		<thead>
		<th>Picture</th>
		<th>SKU</th>
		<th>Quanlity</th>
		<th>Price per item</th>
		<th>Add Out Stock</th>
		<th>Delete Item</th>.
	</thead>
	<tbody>
<?php while($row=mysqli_fetch_array($sql)){?>
	<tr>
	<td><?php
			if($row['Picture']==""){
				echo "<input type='file' name='image".$row['Id']."' value=''>";
				echo "<input type='submit' name='".$row['SKU']."'>";
			}else{
				echo"<img style='width:100px;' src='".$row['Picture']."'>";
			}
			?>	
	</td>
	<td><?=$row['SKU']?></td>
	<td><?=$row['Quantity']?></td>
	<td><?=$row['Price']?></td>
	<td>
	<button type="button" onclick="window.location.href='edit.php?SKU=<?=$row['SKU']?>'" class="btn">Add Stock</button>
	<button type="button" onclick="window.location.href='edit.php?SKU=<?=$row['SKU']?>'" class="btn">Out Stock</button>
	</td>
		<td>
			<a href="home.php?SKU=<?=$row['SKU']?>&action=delete"
			onclick="return confirm('Are you sure want to delete');">
			<button type="button">Delete</button>
			</a>
		</td>
</tr>
<?php }?>
</tbody>
</table>
<?php }else{?>

	<table>
		<thead>
			<th>picture</th>
			<th>SKU</th>
			<th>Price</th>
			<th></th>
		</thead>
		<tbody>
<?php while($row=mysqli_fetch_array($sql)){?>
<tr>
	<td><?php
			if($row['Picture']==""){
				echo "<input type='file' name='image".$row['Id']."' value=''>";
				echo "<input type='submit' name='".$row['SKU']."'>";
			}else{
				echo"<img style='width:100px;' src='".$row['Picture']."'>";
			}
			?>
</td>
<td><?=$row['SKU']?></td>
<td><?=$row['Price']?></td>
<td><button type="button" onclick="window.location.href='quantity.php?SKU=<?=$row['SKU']?>'" class="btn">Buy</button></td>
</tr>
<?php }?>
</tbody>
</table>
<?php }?>
</div>
</form>
	<script>
			$(document).ready(function(){
				$('#search').keyup(function(){
					search_table($(this).val());

				});	
			
			function search_table(value){
				$('#employee_table tr').each(function(){
					var found='false';
					$(this).each(function(){
						if($(this).text().toLowerCase().indexOf(value.toLowerCase())>=0)
								{
									found='true';
								
								}
				});
				if(found=='true'){
					$(this).show();

				}else{
					$(this).hide();
				}
			});
			}
		});
		</script>


