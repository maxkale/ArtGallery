
<?php
include 'header.php';

?>
<div class="col-sm-9">
    <div class="well">
        <h4 class="text-center">Art Gallery</h4>
    </div>
    <div class="row">
        <?php if($_SESSION['loggedInUser']['id']!=1){?><div class="col-sm-4" >
        </div><?php }?>
       
    </div>


	<?php 
	function  getImageGallery($con)
	{
		$query = 'select * from product';
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
				<div><?php if($_SESSION['loggedInUser']['id']!=1){?>
						<a class='btn btn-primary' href='orderPlace.php?product_id=<?php echo $sql['id'];?>'>Buy</a>  <button class='btn btn-primary'
						onclick='addCart( <?php echo $sql['id'];?>,<?php echo $_SESSION['loggedInUser']['id'];?>)'>Cart</button>
						<?php }?>
						</div>
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
            
