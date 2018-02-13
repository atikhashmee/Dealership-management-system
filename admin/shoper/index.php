		<?php  
		   include('files/header.php');
		   include('files/menu.php');
		   require_once("../php/connections.php");

		       $db =  new Db();
			  $obj = $db->getConnection();



		 

		 ?>
		 <link rel="stylesheet" type="text/css" href="../shirin/fonts/css/font-awesome.min.css">




		 <div class="container">
 			<div class="row">
 				<div class="col-md-12">
 					<div class="well">
 						<table class="table table-striped table-bordered table-hover table-condensed">
 							<tr>
 								<th>SL/NO</th>
 								<th>product </th>


 							<th>Product Price</th>
 							<th>Product Quantity</th>


 							<th>Totall price</th>

 							</tr>
 							<?php



 							$i = 0;
 							$sql = "SELECT DISTINCT `p_id` FROM `p_distribution` where `dealer_id`='siyam'";

 							$query = $obj->prepare($sql);
 							$query->execute();
 							$q = $query->rowCount();
 							 echo "there are " .$q. " products ";
 							while($row=$query->fetch())
 							{
 								$p_id = $row['p_id'];
 								//$sqll = "SELECT quantity FROM `p_distribution` WHERE `p_id` ='$p_id' AND `dealer_id` = '$user_id'";
 								$sqll = "SELECT sum(`quantity`) as Totallquantity  From `p_distribution` WHERE `p_id` ='$p_id' AND `dealer_id` = 'siyam'";
 								$ddd = $obj->prepare($sqll);
 								 $ddd->execute();
 								 $quantity = $ddd->fetch(PDO::FETCH_ASSOC);



 								 $sqlll = "SELECT `sellingprice` FROM `p_distribution` WHERE `p_id` ='$p_id' AND `dealer_id` = 'siyam'";
 								$dd = $obj->prepare($sqlll);
 								 $dd->execute();
 								 $price = $dd->fetch(PDO::FETCH_ASSOC);







 								$i++;
 								/*$id  = $row['id'];


 								$rcv_date  = $row['recive_date'];
 								$due = $row['due'];
 								$p_prize = $row['price'];
 								$p_quantity =$row['quantity'];*/
 		?>

 		<tr>

 			<td> <?php echo $i;?> </td>
 			<td><?php echo $p_id;?></td>
 			<td><?php   echo $price['sellingprice'];?></td>
 			<td><?php  echo   $quantity['Totallquantity'];?></td>


 			<td><?php echo  ($price['sellingprice']*  $quantity['Totallquantity']);?></td>
 			<td>
 				<a href="p_sell.php?sell=<?php echo $p_id; ?>"><button class="btn btn-warning">Buy</button></a>

 			</td>

 		</tr>
 		<?php
 							}

 							?>

 						</table>
 					</div>
 				</div>
 			</div>
 		</div>


		 <?php  include('files/footer.php'); ?>
