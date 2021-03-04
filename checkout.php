 <?php

include_once('include/db.php');
session_start();
$query="SELECT * FROM tb_checkout WHERE User_Id='".$_SESSION['User_Id']."'";
if ($sql=mysqli_query($conn,$query)){
	$total_query="SELECT sum(`Total pay`) FROM tb_checkout WHERE User_Id='".$_SESSION['User_Id']."'";
	$total_result=mysqli_query($conn,$total_query);
	$total=mysqli_fetch_array($total_result);
} 
                                                                                                                                                                                                                                                                                                                                                                                                                         
//check if button delete is click
if(isset($_GET['SKU'])&& isset($_GET['action'])&& $_GET['action']=='delete'){
	//get the data using $_Get[],inside the $_Get[] is the name on the url
	$SKU=$_GET['SKU'];
	//delete user query
	$Query="DELETE FROM tb_item WHERE SKU='$SKU'";
	//check if the query run access then messagebox will show
		if ($result=mysqli_query($conn,$Query)) {
			echo "<script>window.location.href='index.php';
			alert('Record Successfully delete');</script>";
		}else{
			echo"<script>alert('Record Fails to delete')</script>";
		}
	//messagebox will show when users fail to delete
	}
$query1="SELECT * FROM tb_checkout ";
$sql1=mysqli_query($conn,$query1);
while ($row=mysqli_fetch_array($sql1)) {
if(isset($_POST[$row['SKU']])){
	if(!empty($_FILES['image'.$row['id']]['name']))  
	{	
		//take the image extensions
		$ext = explode('.', $_FILES['image'.$row['id']]['name']);
		//change the extensions to lower cases
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
	}elseif(isset($target_path) && !move_uploaded_file($_FILES['image'.$row['id']]['tmp_name'], $target_path)){
		echo "<script>alert('Image failed to upload image')</script>";  
	}else{
		$query="UPDATE tb_stock SET Picture='".$file."' WHERE SKU='".$row['SKU']."'";
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
table{border-collapse:collapse;width:100%;}
th,td{border:solid;text-align:left;padding:8px;color: white}
tr:nth-child(even){color: white}
th{background-color:darkblue;color:white;} 
.pull-left{float:left;}
.pull-right{float:right;}
.block{background-color:black;width:100%; float:left;}
input.empty{
	font-family:FontAwesome;
	font-style: normal;
	font-weight:normal;
	text-decoration:inherit;
}
body{background-color: black}
</style>
	<div class="control group">
	<button type="button" onclick="window.location.href='index.php'" class="btn">Back</button>
	</div>
</head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<form action="receipt.php" method="post" enctype="multipart/form-data">

<div class="container">	
	<table>
	<thead>
		<th>SKU</th>
		<th>Quantity</th>
		<th>Price per item</th>
		<th>Address</th>
		<th>tel</th>
		<th>User id</th>
		<th>Price</th>
		</thead>
		<tbody>
			<?php while($row=mysqli_fetch_array($sql)){?>
		<tr>
		<td><?=$row['SKU']?></td>
		<td><?=$row['Quantity']?></td>
		<td><?=$row['Price']?></td>
		<td><?=$row['Address']?></td>
		<td><?=$row['tel']?></td>
		<td><?=$row['User_Id']?></td>
		<td><?=$row['Total pay']?></td>

	</tr>
<?php }?>
	<tr>
		<td colspan="6" style="text-align: center;">Total</td>
		<td ><?php echo $total['sum(`Total pay`)'];?></td>
	</tr>
	</tbody>
	</table>

		<button type="button" onclick="window.location.href='login.php'">Pay</button>
</div>
</form>
<script>
	$(document).ready(function(){
		$('#search').keyup(function(){
			search_table($(this).val());
		});
		function search_table(value){
			$('#employee_table tr').earh(function(){
				var found = 'false';
				$(this).each(function(){
					if($(this).text().toLowerCase().indexOf(value.toLowerCase())>=0)
						{
						found='true';
						}
				
					
				});
				if(found == 'true')
				{
					$(this).Show();
				}
				else
				{
					$(this).hide();
				}
			});
		};
	});
</script>

