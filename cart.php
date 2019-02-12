
<?php
include 'header.php';

?>
<div class="col-sm-9">
    <div class="well">
        <h4 class="text-center">My Cart</h4>
    </div>
    <div class="row">
        <?php if($_SESSION['loggedInUser']['id']!=1){?><div class="col-sm-4" >
        </div><?php }?>
    </div>


	<?php 
	function  getImageGallery($con)
	{
		$query = 'select p.*,u.*,c.id as cart_id from cart c
		left join product as p on p.id=c.product_id
		left join user as u on u.id=c.user_id where status != 1 and user_id = '.$_SESSION['loggedInUser']['id'];
		return mysqli_query($con,$query);	
	}
		$gallery = getImageGallery($con);
		echo "<div class='col-sm-12'>";
		while($sql = mysqli_fetch_assoc($gallery)){
			?>
			<div class='col-sm-3'>
				<h4><?php echo $sql['name'];?></h4>
					<img src = 'image/<?php echo $sql['image'];?>'  width='100%' height='150px'>
					<div>Price Rs <?php echo $sql['price'];?></div>
				<div>
					   <a class="btn btn-primary" 
					   href='orderPlace.php?product_id=<?php echo $sql['id'];?>&cart_id=<?php echo $sql['cart_id'];?>' >Buy</a>
			</div><br>							
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
            
