<?php
include 'connection.php';
if(!empty($_POST['product_id'])&&!empty($_POST['address']))
{
	if(!empty($_POST['cart_id']))
	{
		$update = 'update cart set status = 1 where id = '.$_POST['cart_id'];
		mysqli_query($con,$update);
	}
	$sql = "insert into ordered (product_id,user_id,address,date)values(".$_POST['product_id'].",
	".$_SESSION['loggedInUser']['id'].","."'".$_POST['address']."'".","."'".date('Y-m-d')."'".")"	;
	mysqli_query($con,$sql);
	echo "Order Place Successfully";
	?><script> setTimeout(function(){ window.location='index.php';}, 3000);</script>
	<?php
}else{
	$url = "orderPlace.php?product_id=".$_POST['product_id'];
	header("location:$url ");	
}
?>