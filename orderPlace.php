
<?php
include 'header.php';

?>
<div class="col-sm-9">
    <div class="well">
        <h4 class="text-center">Place Order</h4>
    </div>
    <div class="row">
        <?php if($_SESSION['loggedInUser']['id']!=1){?><div class="col-sm-4" >
        </div><?php }?>
       
    </div>


	<?php 
	$product_id = $_GET['product_id'];
	function  getImageGallery($con,$product_id)
	{
		$query = "select * from product where id = $product_id";
		return mysqli_query($con,$query);	
	}
		$gallery = getImageGallery($con,$product_id);
		echo "<div class='col-sm-12'>";
		while($sql = mysqli_fetch_assoc($gallery)){
			?>
			<div class='col-sm-3'>
			<form action="order.php" method='post'>
			<?php
			if(!empty($_GET['cart_id']))?>
			<input type='hidden' name='cart_id' value='<?php echo $_GET['cart_id'];?>'>
			<input type='hidden' name='product_id' value='<?php echo $product_id;?>'>
				<h4><?php echo $sql['name'];?></h4>
					<img src = 'image/<?php echo $sql['image'];?>'  width='100%' height='150px'>
				</div>
				<div>					
			</div>
			<div class='col-sm-9'>
				<h4>Product Name : <strong><?php echo $sql['name'];?></strong> </h4>
				<label>Your Address</label>
				<textarea class="form-control" name='address' placeholder='Your Address Is' rows='4'></textarea>
				<h5>Total Amount :Rs  <?php echo $sql['price'];?></h5>
				<button class='btn btn-primary'>Place Order</button>
				<div>					
			</div>
			<?php
		}?>
			
	</div>
</div>

</div>  
</div>

<?php
include 'footer.php';
?>
            
