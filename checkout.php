<!DOCTYPE html>
<html lang="zxx">
    
	<?php include 'conn.php'; ?>
	<?php include 'header.php'; ?>
        <!--Full width header End-->
		
		<!-- Breadcrumbs Start -->
		<div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
		    <div class="breadcrumbs-inner">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-12 text-center">
		                    <h1 class="page-title">check Out</h1>
		                    <ul>
		                        <li>
		                            <a class="active" href="index.html">Home</a>
		                        </li>
		                        <li>check Out</li>
		                    </ul>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!-- Breadcrumbs End -->

        <!-- rs-check-out Here-->
		<div class="rs-check-out sec-spacer">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-12">
						<h3 class="title-bg">Billing Details</h3>
						<div class="check-out-box">
							<form id="contact-form" method="post">
								<fieldset>
									<div class="row">                                      
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label>First Name*</label>
												<input id="fname" name="fname" class="form-control" type="text">
											</div>
										</div>
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label>Last Name*</label>
												<input name="lname" class="form-control" type="text">
											</div>
										</div>
									</div>
									<div class="row"> 
										<div class="col-md-12 col-sm-12 col-xs-12">    
											<div class="form-group">
												<label>Company</label>
												<input name="lname" class="form-control" type="text">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label>Email*</label>
												<input id="email" name="email" class="form-control" type="email">
											</div>
										</div>
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label>Phone*</label>
												<input name="subject" class="form-control" type="text">
											</div>
										</div>
									</div>
									<div class="row"> 
										<div class="col-md-12 col-sm-12 col-xs-12">    
											<div class="form-group">
												<label>Country*</label>
                                                <select>
                                                    <option>Select Your Country</option>
                                                    <option>Bangladesh</option>
                                                    <option>China</option>
                                                    <option>USA</option>
                                                </select>
											</div>
										</div>
									</div>
									<div class="row"> 
										<div class="col-md-12 col-sm-12 col-xs-12">    
											<div class="form-group">
												<label>Addreess*</label>
												<input name="lname" class="form-control" type="text">
											</div>
										</div>
									</div>
									<div class="row"> 
										<div class="col-md-12 col-sm-12 col-xs-12">    
											<div class="form-group">
												<label>Street addreess</label>
												<input placeholder="Apartment, suite, unit etc. (optional)"  name="lname" class="form-control" type="text">
											</div>
										</div>
									</div>
									<div class="row"> 
										<div class="col-md-12 col-sm-12 col-xs-12">    
											<div class="form-group">
												<label>Town/City*</label>
												<input name="lname" class="form-control" type="text">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label>District*</label>
												<select>
													<option value="">Select an option</option>
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label>Postcode/ZIP*</label>
												<input name="subject" class="form-control" type="text">
											</div>
										</div>
									</div>
									<div class="checkbox">
								    	<label><input type="checkbox" value="">Create an account?</label>
								    </div>    
								</fieldset>
							</form>	
						</div><!-- .check-out-box end -->	
						<div class="shipping-box">
                            <h3 class="title">Shipping Details</h3>
							<div class="checkbox">
						    	<label><input type="checkbox" value="">Ship to a different address</label>
						    </div>
						    <div class="row"> 
								<div class="col-md-12 col-sm-12 col-xs-12">    
									<div class="form-group mb-0">
										<label>Order Notes</label>
										<input placeholder="Notes about your order, e.g. special notes for delivery." name="lname" class="form-control" type="text">
									</div>
								</div>
							</div>
						</div><!-- .shipping-box end -->	
					</div>
					<div class="col-lg-4 col-md-12">
						<h3 class="title-bg">Your Order</h3>
						<div class="product-demo">
							<div class="product-image">
								<img src="images/porder-img.png" alt="">
							</div>
							<div class="product-name">
								<h5>Notebook</h5>
							</div>
							<div class="product-quantity">
								<h5><i class="fa fa-times"></i>1</h5>
							</div>
							<div class="product-ititial-price">
								<h5>$49.00</h5>
							</div>
						</div><!-- .product-demo end -->
						<div class="product-price">
							<table>
								<tr>
									<td>Subtotal</td>
									<td>$49.00</td>
								</tr>
								<tr>
									<td class="no-border">Shipping</td>
									<td class="no-border"></td>
								</tr>
								<tr>
									<td> 
										<input type="radio" name="gender" checked> Standard<br>
  										<input type="radio"  name="gender"> Express
  									</td>
									<td>
										$10.00<br>
										$19.00<br>
									</td>
								</tr>
								<tr>
									<td>Total</td>
									<td></td>
								</tr>
							</table>
						</div><!-- .product-price end -->
						<div class="rs-payment-system">
							<div class="payment-radio-btn1">
								<input type="radio" checked>Check payments
								<p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
							</div>
							<div class="payment-radio-btn2">
  								<input type="radio" name="paypal">Paypal
  							</div>
  							<input class="btn-send" type="submit" value="Order Now">
						</div><!-- .rs-payment-system end -->			
					</div>
				</div>
			</div>
		</div>
		<!-- rs-check-out End Here-->

        <!-- Partner Start -->
        <div id="rs-partner" class="rs-partner sec-color pt-70 pb-170">
            <div class="container">
				<div class="rs-carousel owl-carousel" data-loop="true" data-items="5" data-margin="80" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-mobile-device="2" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="4" data-ipad-device-nav="false" data-ipad-device-dots="false" data-md-device="5" data-md-device-nav="false" data-md-device-dots="false">
                    <div class="partner-item">
                        <a href="#"><img src="images/partner/1.png" alt="Partner Image"></a>
                    </div>
                    <div class="partner-item">
                        <a href="#"><img src="images/partner/2.png" alt="Partner Image"></a>
                    </div>
                    <div class="partner-item">
                        <a href="#"><img src="images/partner/3.png" alt="Partner Image"></a>
                    </div>
                    <div class="partner-item">
                        <a href="#"><img src="images/partner/4.png" alt="Partner Image"></a>
                    </div>
                    <div class="partner-item">
                        <a href="#"><img src="images/partner/5.png" alt="Partner Image"></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Partner End -->
       
		<?php include 'footer.php'; ?>
    </body>

<!-- Mirrored from keenitsolutions.com/products/html/edulearn/edulearn-demo/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Sep 2018 11:26:50 GMT -->
</html>