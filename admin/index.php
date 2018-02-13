 <?php  include('files/header.php'); ?>

 <style>
  /* Outer */
.popup {
    width:100%;
    height:100%;
    display:none;
    position:fixed;
    top:0px;
    left:0px;
    background:rgba(0,0,0,0.75);
}
 
/* Inner */
.popup-inner {
    max-width:700px;
    width:90%;
    padding:40px;
    position:absolute;
    top:50%;
    left:50%;
    -webkit-transform:translate(-50%, -50%);
    transform:translate(-50%, -50%);
    box-shadow:0px 2px 6px rgba(0,0,0,1);
    border-radius:3px;
    background:#fff;
}
 
/* Close Button */
.popup-close {
    width:30px;
    height:30px;
    padding-top:4px;
    display:inline-block;
    position:absolute;
    top:0px;
    right:0px;
    transition:ease 0.25s all;
    -webkit-transform:translate(50%, -50%);
    transform:translate(50%, -50%);
    border-radius:1000px;
    background:rgba(0,0,0,0.8);
    font-family:Arial, Sans-Serif;
    font-size:20px;
    text-align:center;
    line-height:100%;
    color:#fff;
}
 
.popup-close:hover {
    -webkit-transform:translate(50%, -50%) rotate(180deg);
    transform:translate(50%, -50%) rotate(180deg);
    background:rgba(0,0,0,1);
    text-decoration:none;
}
</style>
<script src="shirin/js/atik_jquery.js"></script>
<script>
  $(function() {
    //----- OPEN
    $('[data-popup-open]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-open');
        $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);
 
        e.preventDefault();
    });
 
    //----- CLOSE
    $('[data-popup-close]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-close');
        $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);
 
        e.preventDefault();
    });
});
</script>


 <div class="container">
 	<div class="row">
 		<div class="col-md-4">
 			<div class="logo">
 				<a href="index.php"><img src="img/logo.jpg" alt="" height="200" width="400"></a>
 			</div>
 		</div>
    <div class="col-md-8">
      <div class="well">
        <h2>HATIL-Online shopping and management system</h2>
      </div>
    </div>
 	</div>
 </div>

 <div class="container">
 	<div class="row">
 		<div class="col-md-12">
 			<div class="well">
 		<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="img/dealer1.jpg" alt="Chania">
    </div>

    <div class="item">
      <img src="img/Dealer2.jpg" alt="Chania">
    </div>

    <div class="item">
      <img src="img/dealer3.jpg" alt="Flower">
    </div>

    <div class="item">
      <img src="img/dealer4.png" alt="Flower">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

 			</div>
 		</div><!--end of admin login area-->
    <!--dealer login area start-->
 		
 	</div><!--end of row-->
 </div><!--end of full container-->

  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="well">
           
      <a class="btn btn-success" data-popup-open="popup-1" href="#">login</a>
 
<div class="popup" data-popup="popup-1">
    <div class="popup-inner">
    <h4>Login Panel</h4>
        <form action="php/admin_login_process.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">UserName</label>
    <input type="text"  name="a_user_name" class="form-control"  placeholder="username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="a_pass" placeholder="Password">
  </div>

 
  
  <div class="checkbox">
    <label>
      <input type="checkbox"> Remember me 
    </label>
  </div>
  <button type="submit"  name="a_submit" class="btn btn-default">Submit</button>
</form>

  <?php 

  if (isset($msg)) {
    echo $msg;
  }

  ?>

        <p><a data-popup-close="popup-1" href="#">Close</a></p>
        <a class="popup-close" data-popup-close="popup-1" href="#">x</a>
    </div>
</div>
        </div>
      </div>
      <!--divison-->
      
    </div>
  </div>

 <?php  include('files/footer.php'); ?>