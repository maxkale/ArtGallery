<?php
include 'connection.php';
if(!empty($_GET)){
$sql = "insert into cart(user_id,product_id)values(".$_GET['user_id'].",".$_GET['product_id'].")";
if(mysqli_query($con,$sql))
	{
	return 'Add successfully';
	}else{
			return false;

	}

}
?>