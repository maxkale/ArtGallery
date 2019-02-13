
<?php
include 'header.php';

?>
<div class="col-sm-9">
		<div class="well">
			<h4 class="text-center">Add Product</h4>
		</div>	
		<div class='col-sm-3'>
		</div>
		<div class='col-sm-9'>
		<form method="post" enctype="multipart/form-data">
			<div class='col-sm-9'>
				<div class='form-group'>
					<label>Product Name</label>
					<input type='text' placeholder='Product Name' name='name' class='form-control'>
				</div>
			</div>
			<div class='col-sm-9'>
				<div class='form-group'>
					<label>Product Price</label>
					<input type='number' placeholder='Product Price' name='price' class='form-control'>
				</div>
			</div>
			<div class='col-sm-9'>
				<div class='form-group'>
					<label>Product Image</label>
					<input type='file' accept="image/gif,image/jpeg" name='image' class='form-control'>
				</div>
			</div>
			<div class='col-sm-9'>
				<div class='form-group text-center'>
					<input type='submit'  name='submit' class='btn btn-primary'>
				</div>
			</div>
		</form>
		</div>
	</div>
</div>

<?php
include 'footer.php';
if(isset($_POST['submit']))
{
	if(!empty($_POST['name'])&&$_POST['price']&&$_FILES["image"]["name"]){
		$upload = 'image/'.$_FILES["image"]["name"];
		
		$sql = "insert into product(name,price,image)
		value("."'".$_POST['name']."'".",".$_POST['price'].","."'".$_FILES['image']['name']."'".")";
			if(mysqli_query($con,$sql))
		{
			move_uploaded_file($_FILES["image"]["tmp_name"], $upload);
			echo "<script>
			alert('Product add Successfully');
			window.location.href = 'index.php';
			</script>";
			
		}else{
			echo "<script>
			alert('Something Wents wrong');
			</script>";
		}
	}
	else{
		echo "<script>
			alert('All Feild mandatory');
			</script>";
	}


}

?>
            
