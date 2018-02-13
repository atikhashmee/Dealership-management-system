 <?php  include('files/header.php');

  require_once("php/connections.php");

					  $db =  new Db();
	                $obj = $db->getConnection();
    if(!isset($_SESSION)){
		session_start(); // starting session for checking username
	}
        if(is_null($_SESSION['username']))
	{
		header("location:index.php"); // Redirect to login.php page
	}
?>
<style>
	table tr{
		border: 2px #ccc solid;
	}
</style>

<?php  include('files/menu.php'); ?>



<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="well">
				<form class="form-inline" action="php/distribution.php" method="post">
					<table>
						<tr>
							<div class="form-group">



						<td> <label  for="exampleInputEmail3">Product </label></td>
						<td> <select class="form-control" name="product_id" id="productid">
							<option value="">Select an Option</option>

								<?php

					$i = 0;
					$sql = "SELECT * FROM `product` ";


					$query = $obj->prepare($sql);
					$query->execute();

					while($row=$query->fetch())
					{
						$i++;

						$p_id = $row['p_id'];
						$p_name  = $row['name'];
						$p_entry = $row['date'];
						$p_prize = $row['price'];
						$p_quantity =$row['quantity'];
?>
<option value="<?php  echo $p_name; ?>"> <?php  echo $p_name; ?></option>

<?php
					}

					?>

						</select></td>
						</div>
					</tr>
					<br>
						<tr>
							<div class="form-group">
						<td><label for="exampleInputPassword3">Dealer Name</label></td>
						<td><select class="form-control" name="dealer_name" id="">
							<option value="">select an option</option>
							<?php
					$i = 0;
					$sql1 = "SELECT * FROM `dealers` where type='dealer'";
					$query1 = $obj->prepare($sql1);
					$query1->execute();

					while($row=$query1->fetch())
					{
						$i++;

						$d_id = $row['dealer_id'];
						$d_name  = $row['name'];
						$pass = $row['pass'];
						$adrs = $row['address'];
						$join =$row['join_date'];
						$account = $row['accounts'];


?>
<option value="<?php echo $d_name;  ?>"><?php echo $d_name;  ?></option>

<?php
					}

					?>
						</select></td>
						</div>
					</tr>

					<tr>
							<div class="form-group">



						<td><label  for="exampleInputPassword3">Price</label></td>
						<td><input type="number" name="price" id="price" value="0" readonly="true" class="form-control" placeholder="price each"></td>
						</div>
					</tr>

					<tr>
							<div class="form-group">



						<td><label  for="exampleInputPassword3">Add profit(in %)</label></td>
						<td><input type="number" name="profitvalue" id="profitvalue" value="0" onblur="profitcal()" class="form-control" ></td>
						</div>
					</tr>

						<tr>
							<div class="form-group">



						<td><label  for="exampleInputPassword3"> Totall selling cost</label></td>
						<td><input type="number" name="totllsellingcost" id="totllsellingcost" value="0" readonly="true" class="form-control"></td>
						</div>
					</tr>


					<tr>
							<div class="form-group">



						<td><label  for="exampleInputPassword3">Quantity</label></td>
						<td><input type="number"  name="quantity" id="qntity" onblur="cal()" class="form-control" placeholder="quantity"></td>
						</div>
					</tr>

					<tr>
							<div class="form-group">

						<td><label  for="exampleInputPassword3">Totall amount</label></td>
						<td><input type="number"  name="totall" id="totall" value="0" readonly="true"  class="form-control"  placeholder="totall "></td>
						</div>
					</tr>


					</table>



  <button type="submit" name="save_info" class="btn btn-success">Submit</button>

</form>

			<script type="text/javascript">
			function cal()
			{
				var quantity  =  document.getElementById('qntity').value;
				var price = document.getElementById('price').value;
				document.getElementById('totall').value = quantity*price;
			}

			function profitcal()
			{

				var price = parseInt(document.getElementById('price').value);
				var profit = parseInt(document.getElementById('profitvalue').value);
				var percent = (profit/100)*price;
				var total  = percent+price;
				document.getElementById('totllsellingcost').value = total;
			}



			</script>
			</div>

		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="well">
				<h1>product distribution view</h1>
				<table class="table">
					<tr>
						<th>SL/NO</th>
						<th>product Name</th>
					<th>dealer Name</th>

					<th>product Quantity</th>
					<th>product Price</th>
					<th>Totall price</th>


					<th>Actions</th>
					</tr>
					<?php
					$i = 0;
					$sql = "SELECT * FROM `p_distribution` where distributedby='".$_SESSION['username']."'";
					$query = $obj->prepare($sql);
					$query->execute();

					$q = $query->rowcount();
					 echo "there are " .$q. " products ";
					while($row=$query->fetch())
					{
						$i++;
						$id = $row['id'];
						$p_id = $row['p_id'];
						$d_name  = $row['dealer_id'];
						$p_quantity =$row['quantity'];
						$p_prize = $row['price'];
						$due  = $row['due'];




?>

<tr>

	<td> <?php echo $i;?> </td>
	<td><?php echo $p_id;?></td>
	<td><?php echo $d_name;?></td>
	<td><?php echo $p_quantity;?></td>
	<td><?php echo $p_prize;?></td>
	<td><?php echo $due;?></td>
	<td>
		<a href="dele_p_dis.php?delete=<?php echo $id; ?>"><button class="btn btn-warning">Delete</button></a></td>

</tr>
<?php
					}

					?>

				</table>
			</div>
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script type="text/javascript">
   	$(document).ready(function(){
   		$("#productid").on("change",function(){
   				var id = $(this).val();
   				$.ajax({
   					url:"php/product_price.php",
   					type: "GET",
   					data:{
   						id: id
   					     },
   					     dataType:"json",
   					success: function(data)
   					{

   						document.getElementById('price').value = data.price;
   						console.log(data);
   					}
   				});

   		});
   	});
   </script>

 <?php  include('files/footer.php'); ?>
