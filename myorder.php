
<?php
include 'header.php';

?>
<div class="col-sm-9">
    <div class="well">
        <h4 class="text-center">My Order</h4>
    </div>
    <div class="row">
        <?php if($_SESSION['loggedInUser']['id']!=1){?><div class="col-sm-4" >
        </div><?php }?>
       
    </div>

	<?php 
	function  getImageGallery($con)
	{
		$query = "select o.*,p.*,u.* from ordered o 
		left join user u on u.id = o.user_id
		left join product p on p.id = o.product_id
		where user_id =". $_SESSION['loggedInUser']['id'];
		return mysqli_query($con,$query);	
	}
		$gallery = getImageGallery($con);
		echo "<div class='col-sm-12'>";
		while($sql = mysqli_fetch_assoc($gallery)){
			?>
			<div class='col-sm-12'>
				<div class='col-sm-3'>
				<img src = 'image/<?php echo $sql['image'];?>'  width='100%' height='150px'>
				</div>
				<h5>Name : <?php echo $sql['name'];?></h5>
				<h5>Address : <?php echo $sql['address'];?></h5>
				<h5>Price : <?php echo $sql['price'];?></h5>
				<h5>Order Date : <?php echo $sql['date'];?></h5>
				<h5>Delevery Date : <?php echo $sql['date'];?></h5>
				<br>
				<br>
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
            
