			 <?php  include('files/header.php'); ?>

			<?php
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
			<script src="shirin/js/atik_jquery.js"></script>
			<script type="text/javascript">
				$(document).ready(function(){

					$("#name").on("blur",function(){
						var name = $(this).val();
						$.ajax({

							url:"php/usercheckalready.php",
							type:"GET",
							data: {
								name: name},
								success: function(response)
								{
									document.getElementById('message').innerHTML = response;
									console.log(response);
								}



						})

					});
				});



			</script>

			<?php  include('files/menu.php'); ?>


			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="well">
							Add Dealer
							<form class="form-inline" action="php/dealer_add.php" method="post">
								<table>
									<tr>
										<div class="form-group">



									<td> <label  for="exampleInputEmail3">Dealer ID</label></td>
									<td> <input required type="text" name="id" class="form-control"  placeholder="ID"></td>
									</div>
								</tr>
								<br>
									<tr>
										<div class="form-group">



									<td><label for="exampleInputPassword3">dealer  Name</label></td>
									<td><input required type="text"  name="name" class="form-control" id="name" placeholder="name"></td>
									<p style="color:red" id="message"></p>
									</div>
								</tr>
								<tr>
										<div class="form-group">



									<td><label for="exampleInputPassword3">dealer  password</label></td>
									<td><input required type="password"  name="pass" class="form-control" placeholder="password"></td>
									</div>
								</tr>
								<tr>
										<div class="form-group">



									<td><label  for="exampleInputPassword3">Branch </label></td>
									<td>
										<select name="adrs"  id="">

											<option value="uttara">uttara</option>
											<option value="mirpur">Mirpur</option>
											<option value="Banani">Banani</option>
											<option value="dhanmondi">Dhanmondi</option>
											<option value="gulshan">Gulshan</option>
											<option value="bashunshara">Bashunshara</option>
										</select>
									</td>
									</div>
								</tr>
								<tr>
										<div class="form-group">



									<td><label  for="exampleInputPassword3">JOIN Date</label></td>
									<td><input type="date"  name="date" class="form-control" placeholder="date"></td>
									</div>
								</tr>

								</table>



			  <button type="submit" name="save_dealer" class="btn btn-warning">Submit</button>

			</form>

						</div>
					</div>
				</div>
			</div>


			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="well">
							<table class="table">
								<tr>
									<th>SL/NO</th>
									<th>Dealer  ID</th>
								<th>dealer Name</th>
								<th>Password</th>
								<th>Address</th>
								<th>joining date</th>

								<th>Actions</th>
								</tr>
								<?php
								require_once("php/connections.php");

								$db =  new Db();
				                $obj = $db->getConnection();
								$i = 0;
								$addedby = $_SESSION['username'];
								$sql1 = "SELECT * FROM `dealers` where addedby = '$addedby'";
								$query1 = $obj->prepare($sql1);
								$query1->execute();
								$q1 = $query1->rowcount();
								 echo "there are " .$q1. " dealers ";
								while($row=$query1->fetch())
								{
									$i++;
									$id = $row['id'];
									$d_id = $row['dealer_id'];
									$d_name  = $row['name'];
									$pass = $row['pass'];
									$adrs = $row['address'];
									$join =$row['join_date'];
									$account = $row['accounts'];


			?>

			<tr>

				<td> <?php echo $i;?> </td>
				<td><?php echo $d_id;?></td>
				<td><?php echo $d_name ;?></td>
				<td><?php echo $pass;?></td>
				<td><?php echo $adrs;?></td>
				<td><?php echo $join;?></td>


				<td><a href="dealer_update.php?edit=<?php echo $id; ?>"><button class="btn btn-warning">edit</button></a>|
					<a href="dealer_delete.php?delete=<?php echo $id; ?>"><button class="btn btn-warning">delete</button></a></td>

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
