		<?php  
		   include('files/header.php');
		   include('files/menu.php');
		 
          require_once("admin/php/connections.php");

                                   $db =  new Db();
                                  $obj = $db->getConnection();

		 

		 ?>
		 <link rel="stylesheet" type="text/css" href="admin/shirin/fonts/css/font-awesome.min.css">
               <style type="text/css">
                 .productbox {
              background-color:#ffffff;
            padding:10px;
            margin-bottom:10px;
            -webkit-box-shadow: 0 8px 6px -6px  #999;
               -moz-box-shadow: 0 8px 6px -6px  #999;
                    box-shadow: 0 8px 6px -6px #999;
          }

          .producttitle {
              font-weight:bold;
            padding:5px 0 5px 0;
          }

          .productprice {
            border-top:1px solid #dadada;
            padding-top:5px;
          }

          .pricetext {
            font-weight:bold;
            font-size:1.4em;
          }
          
          .carousel-container{
            height: 300px;
          }

          carousel-container

               </style>



<div class="container">
 	<div class="row">
 		<div class="col-md-12">
 			<div class="well">
      <div class="carousel-container">
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
      <img src="admin/img/dealer1.jpg"  height="300px" alt="Chania">
    </div>

    <div class="item">
      <img src="admin/img/Dealer2.jpg" height="300px"  alt="Chania">
    </div>

    <div class="item">
      <img src="admin/img/dealer3.jpg"  height="300px" alt="Flower">
    </div>

    <div class="item">
      <img src="admin/img/dealer4.png"  height="300px" alt="Flower">
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


 			</div>
 		</div><!--end of admin login area-->
    <!--dealer login area start-->
 		
 	</div><!--end of row-->
 </div><!--end of full container-->
		 <div class="container">
 			<div class="row">
 				<div class="col-md-12">
 					<div class="well" id="datashow">
 					
 					

 						
 					</div>
 				</div>
 			</div>
 		</div>


		 <?php  include('files/footer.php'); ?>
<script src="js-cookie.js"></script>
     <script type="text/javascript">
       if (!Cookies.get('popup')) {
    setTimeout(function() {
      $('#siteModal').modal();
    }, 600);
  }
  $('#siteModal').on('shown.bs.modal', function () {
    // bootstrap modal callback function
    // set cookie
    Cookies.set('popup', 'valid', { expires: 3, path: "/" }); // need to set the path to fix a FF bug
  });



     </script>


     <!-- Bootstrap Modal Markup -->
<div class="modal fade" id="siteModal" tabindex="-1" role="dialog" aria-labelledby="siteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content section">
      <div class="close-container" data-dismiss="modal" aria-label="Close">
        <span>X</span>
      </div>
      <div class="modal-body">
      <h4>Select your dealer to be shoped from</h4>
      <form class="form" method="POST">
          <select class="form-control" name="dealer" id="dealer_name">
          <option>Select </option>
          <?php 
           
            $qry = $obj->prepare("SELECT * FROM `dealers` WHERE `type` ='dealer'");
            $qry->execute();
     while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {?>
            <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
          <?php   }

            if (isset($_POST['dealer'])) {
              session_start();
               $_SESSION['dealer'] = $_POST['dealer'];
            }
          ?>
        </select>
        </form>
      </div>
      
   </div>
  </div> 
</div>  
<script type="text/javascript">
    $("#dealer_name").on('change', function(){
      $("#siteModal").modal("hide");
      var name = $(this).val();
      console.log(name);
      $.ajax({
        url :"ajaxreq.php",
        type:"POST",
        data : {dealer :name},
        dataType:"HTML",
        success:function(res)
        {
          $("#datashow").html(res);
        }
      });
    });
</script>