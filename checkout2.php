<?php
 session_start();
include_once('include/db.php');

$query="SELECT * FROM tb_checkout WHERE User_Id='".$_SESSION['User_Id']."'";
if ($sql=mysqli_query($conn,$query)){
	$total_query="SELECT sum(`Total pay`) FROM tb_checkout WHERE User_Id='".$_SESSION['User_Id']."'";
	$total_result=mysqli_query($conn,$total_query);
	$total=mysqli_fetch_array($total_result);
} 
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


?>
<head>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

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
		
		<form action="index.php" method="post" enctype="multipart/form-data">
	<div class="block">
		<input type="text" name="search" id="search">
		<span class="pull-right"></span>
	</div>
	<div>
<div class="blocks">
	<span class="pull-right"><button type="button" onclick="window.location.href='login.php?action=logout'">
	logout</button></span>
	</div><br>
	<div class="container">
	<table>
		<thead>
		<th>SKU</th>
		<th>Quanlity</th>
		<th>Price per item</th>
		<th>Total</th>
	</thead>
	<tbody>
<?php while($row=mysqli_fetch_array($sql)){?>
	<tr>
	<td><?=$row['SKU']?></td>
	<td><?=$row['Quantity']?></td>
	<td><?=$row['Price']?></td>
	<td><?=$row['Price']?></td>
</tr>
<?php }?>
<tr>
		<td colspan="3" style="text-align: center;">Total</td>
		<td><?php echo $total['sum(`Total pay`)'];?></td>
	</tr>
</tbody>
</table>

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


