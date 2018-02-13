
<?php  include('files/header.php'); ?>
<?php
		
      if(empty($_SESSION['customername'])){
      header("location:shoper.php");
    }
    else {
	               require_once("../php/connections.php");
					              $db = new Db();
					              $obj = $db->getConnection();
?>

<?php  include('files/menu.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="well">
           <form action="p_sell.php" method="post" >
				<table class="table">
					<?php
                     if (isset($_REQUEST['sell'])) {


                     	$id = $_REQUEST['sell'];
                     	$p_price = 0;
                     	$p_id =" ";
                     	$sql = "SELECT * FROM `p_distribution` WHERE `p_id` = '$id'";
                     	$query = $obj->prepare($sql);
                     	$query->execute();
                     	while($row = $query->fetch(PDO::FETCH_ASSOC))
                     	{
                     		$p_id = $row['p_id'];
                     		$p_price = $row['sellingprice']+($row['sellingprice']*(4/100));
                     		?>
                     		

				
					<?php
                     	}
                     }
					 ?>
					 	<tr>
						<td>product id</td>
						<td><input type="text" name="product_id" value="<?php echo $p_id; ?>" ></td>
					</tr>
					<tr>
						<td>product Price</td>
						<td><input type="text" name="prize" value="<?php echo $p_price; ?>" > <p style="color: red">(4 % VAT added)</p></td>
					</tr>
					<tr>
						<td>product Quantity</td>
						<td><input type="number" name="quantity" onblur="getTotal()" ></td>
					</tr>
					<tr>
						<td>totall prices</td>
						<td><input type="text" name="total"></td>
					</tr>
					<tr>
						<td></td>
						<td><button type="reset" class="btn btn-warning">Reset</button>|<button type="submit" name="con_sell" class="btn btn-success">Confirm</button></td>
					</tr>
				</table>
				</form>
			</div>
		</div>
	</div>
</div>

<?php

if(isset($_POST['con_sell']))
{


	$p_id = $_POST['product_id'];
	$p_price = $_POST['prize'];
	$p_quantity = $_POST['quantity'];
	$total = $_POST['total'];
	$users = $_SESSION['customername'];
	$datetime = date('Y-m-d');
	$sql1 = "INSERT INTO `p_sell`(`p_id`, `p_prize`, `p_quantity`, `totall_prize`, `users`, `sel_date_time`) VALUES
	 ('$p_id','$p_price','$p_quantity','$total','$users','$datetime')";

	 $query = $obj->prepare($sql1);
	 $query->execute();

	 if($query == true)
	 {
	 	header("location:confirm_sell.php");

	 }
}



?>


 <?php } include('files/footer.php'); ?>

  <script type="text/javascript">
	     function getTotal() {
        var prize = document.getElementsByName('prize')[0].value;
        var quantity = document.getElementsByName('quantity')[0].value;
        var total = (+quantity)* (+prize) ;
        document.getElementsByName('total')[0].value = total;
    }

</script>
