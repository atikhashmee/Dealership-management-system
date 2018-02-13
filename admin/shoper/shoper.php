					<?php  include('files/header.php');
					   require_once("../php/connections.php");

					       $db =  new Db();
						  $obj = $db->getConnection();



					 include('files/menu.php');

					 ?>

					 <style>
					 	body {
    background-color: #eee;
}

			*[role="form"] {
			    max-width: 530px;
			    padding: 15px;
			    margin: 0 auto;
			    background-color: #fff;
			    border-radius: 0.3em;
			}

			*[role="form"] h2 {
			    margin-left: 5em;
			    margin-bottom: 1em;
			}




					 </style>


					 <div class="container">
						 <div class="row">
							 <div class="col-md-6">
								 <div class="well">

												 <div class="container">
														 <form class="form-horizontal" role="form"  method="POST" action="login.php">
																 <h2>login Form</h2>




																 <div class="form-group">
																		 <label for="firstName" class="col-sm-3 control-label">Full Name</label>
																		 <div class="col-sm-9">
																				 <input type="text" name="Shoper_name" id="name" placeholder="Full Name" class="form-control" autofocus>
																				 <span class="help-block">Last Name, First Name, eg.: Smith, Harry</span>
																				 <p style="color: red" id="message"> </p>
																		 </div>
																 </div>

																 <div class="form-group">
																		 <label for="password" class="col-sm-3 control-label">Password</label>
																		 <div class="col-sm-9">
																				 <input type="password" name="Shoper_pass" placeholder="Password" class="form-control">
																		 </div>
																 </div>
																 <div class="form-group">
																		 <div class="col-sm-9 col-sm-offset-3">
																				 <button type="submit" name="cu_login" class="btn btn-primary btn-block">Register</button>
																		 </div>
																 </div>
														 </form> <!-- /form -->
												 </div> <!-- ./container -->

								 </div>
							 </div>
							 <div class="col-md-6">
								 <div class="well"></div>
							 </div>
						 </div>
					 </div>


								<div class="container">
									<div class="row">
										<div class="col-md-6">
											<div class="well">

															<div class="container">
											            <form class="form-horizontal" role="form"  method="POST" action="#">
											                <h2>Registration Form</h2>




											                <div class="form-group">
											                    <label for="firstName" class="col-sm-3 control-label">Full Name</label>
											                    <div class="col-sm-9">
											                        <input type="text" name="Shoper_name" id="name" placeholder="Full Name" class="form-control" autofocus>
											                        <span class="help-block">Last Name, First Name, eg.: Smith, Harry</span>
											                        <p style="color: red" id="message"> </p>
											                    </div>
											                </div>

											                <div class="form-group">
											                    <label for="password" class="col-sm-3 control-label">Password</label>
											                    <div class="col-sm-9">
											                        <input type="password" name="Shoper_pass" placeholder="Password" class="form-control">
											                    </div>
											                </div>
											                <div class="form-group">
											                    <label for="birthDate" class="col-sm-3 control-label">Joining date</label>
											                    <div class="col-sm-9">
											                        <input type="date" name="Joiningdate" id="birthDate" class="form-control">
											                    </div>
											                </div>

											                <div class="form-group">
											                    <label class="control-label col-sm-3">Gender</label>
											                    <div class="col-sm-6">
											                        <div class="row">
											                            <div class="col-sm-4">
											                                <label class="radio-inline">
											                                    <input type="radio" name="gender"  value="Female">Female
											                                </label>
											                            </div>
											                            <div class="col-sm-4">
											                                <label class="radio-inline">
											                                    <input type="radio" name="gender"  value="Male">Male
											                                </label>
											                            </div>
											                            <div class="col-sm-4">
											                                <label class="radio-inline">
											                                    <input type="radio" name="gender"  value="Unknown">Unknown
											                                </label>
											                            </div>
											                        </div>
											                    </div>
											                </div> <!-- /.form-group -->


											                <div class="form-group">
											                    <div class="col-sm-9 col-sm-offset-3">
											                        <button type="submit" name="saveshoper" class="btn btn-primary btn-block">Register</button>
											                    </div>
											                </div>
											            </form> <!-- /form -->
											        </div> <!-- ./container -->
											</div>
										</div>
										<div class="col-md-6">
											<div class="well"></div>
										</div>
									</div>
								</div>

								<?php

										if(isset($_POST['saveshoper']))
										{

											$name = $_POST['Shoper_name'];
											$pass = $_POST['Shoper_pass'];
											$join_date = $_POST['Joiningdate'];
											$gender = $_POST['gender'];


											if( empty($name) || empty($pass) || empty($join_date) )
											{
												?>

												<script>
													alert("can not miss any required field");
												</script>
												<?php

											}else {




												$sql ="INSERT INTO `customer`(`name`, `pass`, `date`, `gender`) VALUES ('$name','$pass','$join_date','$gender')";
												$query  = $obj->prepare($sql);
												if($query->execute() == true)
												{
													session_start();
													$_SESSION['username'] = $name;
													header("location:p_sell.php");


												}

											}
										}


								?>

					  <?php  include('files/footer.php'); ?>
