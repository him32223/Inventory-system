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
		echo"<script>window.location.href='index.php';
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
?>

<style>
table{
	border-collapse:collapse ; 
	width:100%;
}
th,td{text-align:left ; padding:0px;}
tr:nth-child(even){background-color:#f2f2f2;}
th{background-color:#4CAF50; color:pink;}
.pull-left{float:left;}
.pull-right{float:right;}
.block{background-color:#87CEEB;width:100%;float:left;}
input.empty{
	font-family: FontAwesome;
	font-style:normal;
	font-weight: normal;
	text-decoration: inherit;
}
	</style>
	<head>
		<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>

</style>	
		
		<form action="index.php" method="post">
	<div class="block">
		<input type="text" name="search" id="search">
		<span class="pull-right"></span>
	</div>
	<div>
		<select name="select">
			<option value="SKU">SKu</option>
			<option value="Quantity"> in stock Quantity</option>
			<option value="Price">Price per item</option>
		</select>
		<input type="text" class="empty" placeholder="&#xF002; Search" name="search_data">
		<button type="submit" name="submit" class="button">Submit</button>
		<button type="button" onclick="window.location.href='register.php'">register</button>
		
	</div>
	</form>
		
<div class="blocks">
	<span class="pull-right"><button type="submit" onclick="window.location.href='logout.php?action=logout'">
	logout</button></span>
	</div><br>
	<div class="container">
		<?php 
if ($_SESSION["permission"]=="user"){

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
<td><img src="bag.jpg" style="background-image: height:75px;width: 75px;"></td>
<td><?=$row['SKU']?></td>
<td><?=$row['Quantity']?></td>
<td><?=$row['Price']?></td>
<td>
<a href="index.php?SKU=<?=$row['SKU']?>&action=delete"
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
<td><img src="bag.jpg" style="background-image: height:75px;width: 75px;"></td>
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


