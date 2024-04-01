<?php  
include 'db.php';
include 'config.php';

if (isset($_POST['trackingsub'])) {
    $trackId = trim($_POST['trackId']);
    $select = mysqli_query($link, "SELECT * FROM tracking WHERE tracking_number = '$trackId' ");
    if (mysqli_num_rows($select) > 0) {
      $row = mysqli_fetch_assoc($select);
        $senders_name = $row['sender_name'];  
         $senders_contact = $row['sender_contact'];  
         $senders_mail = $row['sender_email'];  
         $senders_address = $row['sender_address'];
         $receivers_name = $row['receiver_name'];  
         $receivers_contact = $row['receiver_contact'];  
         $receivers_mail = $row['receiver_email'];  
         $receivers_address = $row['receiver_address'];
         $statuss = $row['status'];  
         $dispatch_l = $row['dispatch_location'];  
         $dispatchh = $row['dispatch_date'];  
         $deliveryy = $row['delivery_date'];
         $current_location = $row['current_location'];
         $desc = $row['pdesc'];
         $carrier = $row['carrier'];
         $carrier_ref = $row['carrier_ref'];
         $weight = $row['weight'];
         $payment_mode = $row['payment_mode'];
         $ship_mode = $row['ship_mode'];
         $quantity = $row['quantity'];
         $delivery_time = $row['delivery_time'];
         $image = $row['image'];
         $destination = $row['destination'];

    }else{
      echo "<script>alert('Invalid Tracking Number');window.location.href = 'index.html'; </script>";
    }
  }
  // else{
  //   echo "<script>window.location.href = 'index.html'; </script>";
  // }
?>

<!DOCTYPE html>
<html>

<!-- Mirrored from nauthemes.net/html/Crest Courier/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Mar 2023 06:23:29 GMT -->
<head>
<meta charset="utf-8">
<title>Speed Express  | Track</title>
<!-- Stylesheets -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">
<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<link rel="icon" href="images/favicon.png" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" type="text/css" href="css/track.css">
</head>

<body class="hidden-bar-wrapper">

<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
 
    
	

	<!--Sidebar Page Container-->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">
				
				<!--Content Side-->
                <div class="content-side col-lg-12 col-md-12 col-sm-12">
                	<div class="track-section">
						<!-- Sec Title Two -->
						<div class="sec-title-two sec-title">
							<h2>Track & <span>Trace Shipment</span></h2>
							<div class="separater"></div>
						</div>
						<div class="track-form-two">
							<form method="post" action="track.php">
								<div class="form-group">
									<label>Enter Tracking Number Here</label>
								</div>
								<div class="form-group">
									<input type="text" name="trackId" placeholder="Enter your tracking number e.g CRG-11-XXXX">
									<button type="submit" name="trackingsub" class="theme-btn submit-btn">Track Your Shipment</button>
								</div>
							</form>
						</div>
	
					<?php  
						if (isset($_POST['trackingsub'])) {
					?>
						<!-- Tracking Info -->
						<div class="tracking-info-detail">
							<?php  
								$qq = mysqli_query($link, "SELECT * FROM track_update WHERE track_num = '$trackId' ");
								if (mysqli_num_rows($qq) > 0) {
									while ($data = mysqli_fetch_assoc($qq)) {

									switch ($data['status']) {
										case 'Active':
											$class = "style-two";
											break;
										case 'Inactive':
											$class = "style-2";
											break;
										case 'Picked Up':
											$class = "style-3";
											break;
										case 'Arrived':
											$class = "style-4";
											break;
										case 'Delivered':
											$class = "style-5";
											break;
										case 'Departed':
											$class = "style-6";
											break;
										case 'On hold':
											$class = "style-7";
											break;
										default:
											$class = "style-three";
											break;
									}
							?>
							<div class="tracking-box">
								<div class="tracking-time-box">
									<div class="tracking-time"><?php echo date('F dS, Y', strtotime($data['date'])); ?></div>
									<span><?php echo date("G:i A", strtotime($data['time'])); ?></span>
								</div>
								<div class="tracking-location <?php echo $class ?>">
									<span class="dott"></span>
									<strong><?php echo $data['status'] ?> in <?php echo $data['current_location'] ?> </strong>
									<?php echo $data['note'] ?>
								</div>
							</div>
							<?php }
								} ?>
						
						</div>
                        
						<div class="container" style='display: block'>
						    <center><img src="images/logo-small-2.png" width="150px" style='margin: 10px 0'><br>
						      <img src="./images/qrcode.png">
						      <p style='font-weight: bold; padding: 10px 0'><?php echo $trackId ?></p>
						    </center>
						    <div class="grid" >
						      <article>
						        <h5 >Shipper Information</h5>
						        <hr>
						        <ul style="font-size: 13px;">
						          <li>Name: <?php echo $senders_name ?></li>
						          <li>Address: <?php echo $senders_address ?></li>
						          <li>Phone Number: <?php echo $senders_contact ?></li>
						          <li>Email: <?php echo $senders_mail ?></li>
						        </ul>
						      </article>

						      <article>
						        <h5>Receiver Information</h5>
						        <hr>
						        <ul style="font-size: 13px;">
						          <li>Name: <?php echo $receivers_name ?></li>
						          <li>Address: <?php echo $receivers_address ?></li>
						          <li>Phone Number: <?php echo $receivers_contact ?></li>
						          <li>Email: <?php echo $receivers_mail ?></li>
						        </ul>
						      </article>
						    </div>

						    <div style='background: grey; color: white; padding: 10px; font-size: 13px; text-align: center; border-radius: 3px'>SHIPMENT STATUS - <?php echo $statuss ?></div>
						    <h6 style='padding: 10px 0; margin: 0 20px'>Shipment Information</h6>
						    <!-- <hr> -->
						    <div class="grid-two" style="font-size: 13px;">
						      <article>
						        <b>Origin: </b><br>
						        <p><?php echo $dispatch_l ?></p>
						      </article>

						      <article>
						        <b>Package: </b><br>
						        <p><?php echo $desc ?></p>
						      </article>

						      <article>
						        <b>Status: </b><br>
						        <p><?php echo $statuss ?></p>
						      </article>

						      <article>
						        <b>Destination: </b><br>
						        <p><?php echo $destination ?></p>
						      </article>

						      <article>
						        <b>Carrier: </b><br>
						        <p><?php echo $carrier ?></p>
						      </article>

						      <article>
						        <b>Type of Shipment: </b><br>
						        <p><?php echo $ship_mode ?></p>
						      </article>

						      <article>
						        <b>Weight: </b><br>
						        <p><?php echo $weight ?></p>
						      </article>

						      <article>
						        <b>Shipment Mode: </b><br>
						        <p><?php echo $ship_mode ?></p>
						      </article>

						      <article>
						        <b>Carrier Reference No.: </b><br>
						        <p><?php echo $carrier_ref ?></p>
						      </article>

						      <article>
						        <b>Product: </b><br>
						        <p><?php echo $desc ?> </p>
						      </article>

						      <article>
						        <b>Qty: </b><br>
						        <p><?php echo $quantity ?></p>
						      </article>

						      <article>
						        <b>Payment Mode: </b><br>
						        <p><?php echo $payment_mode ?></p>
						      </article>

						      <article>
						        <b>Total Freight: </b><br>
						        <p><?php echo $quantity ?></p>
						      </article>

						      <article>
						        <b>Expected Delivery Date: </b><br>
						        <p><?php echo $deliveryy ?></p>
						      </article>

						      <article>
						        <b>Departure Date: </b><br>
						        <p><?php echo $dispatchh ?></p>
						      </article>

						      <article>
						        <b>Delivery Time: </b><br>
						        <p><?php echo $delivery_time ?></p>
						      </article>

						    </div>
						  </div>
						    <div class="container">
						        <center><img src="uploads/<?php echo $image ?>"> </center>
						    </div>
						<?php  
							if ($show_map == "Yes") {
						?>
						<!--Map Outer-->
						<div class="row d-flex align-items-stretch">
		                    <div class="col-md-12 col-lg-12 col-xl-12 ">
		                        <iframe class="map" src="https://maps.google.com/maps?q=<?php echo $current_location == "" ? $dispatch_l : $current_location ?>&amp;t=k&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" style="border:0; width: 100%; height: 527px;"></iframe>
		                    </div>
		                </div>
						<?php } ?>

						<?php  
							if ($allow_print == "Yes") {
						?>
						
			                <center><a href="receipt.php?tnum=<?php echo $trackId ?>" class="btn btn-primary">Print Receipt</a></center>
			           
			        <?php } ?>

			    <?php } ?>
					</div>
				</div>
				
				
			</div>
		</div>
	</div>


	
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-up"></span></div>

<script src="js/jquery.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/appear.js"></script>
<script src="js/owl.js"></script>
<script src="js/wow.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/script.js"></script>

</body>

<!-- Mirrored from nauthemes.net/html/Crest Courier/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Mar 2023 06:23:48 GMT -->
</html>