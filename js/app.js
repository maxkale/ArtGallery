function logout()
	{
			if(confirm('are you sure to logout')){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
			   // Typical action to be performed when the document is ready:
					location.href = 'login.php';
					 }
			};
			xhttp.open("GET", "logout.php", true);
			xhttp.send();
			}
	}
	function addCart(pid,uid)
	{
		if(pid&&uid)
		{
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
			   // Typical action to be performed when the document is ready:
						alert('Add to cart');
					
					 }
			};
			xhttp.open("get", "addCart.php?user_id="+uid+"&product_id="+pid, true);
			xhttp.send();
			}

		}
