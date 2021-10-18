<!DOCTYPE html>
<html lang="en">
    
    <?php include 'conn.php'; ?>
    <?php include 'header.php'; ?>
        <!--Full width header End-->
		
		<!-- Breadcrumbs Start -->
		<div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
		    <div class="breadcrumbs-inner">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-12 text-center">
		                    <h1 class="page-title">Cart</h1>
		                    <ul>
		                        <li>
		                            <a class="active" href="index.html">Home</a>
		                        </li>
		                        <li>Cart</li>
		                    </ul>
		                </div>
		            </div>
		        </div>
		    </div><!-- .breadcrumbs-inner end -->
		</div>
		<!-- Breadcrumbs End -->

        <!-- Cart Page Start Here -->
        <div class="shipping-area sec-spacer">
			<div class="container">
				<div class="tab-content">
				    <div class="tab-pane active" id="checkout">
                        <div class="row">
				            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="product-list">
									<table>
										<tr>
											<td><i class="fa fa-times"></i></td>
											<td><img src="images/cart/3.jpg" alt=""/></td>
											<td>
												<div class="des-pro">
													<h4>Jersey</h4><p>Men’s Football</p>
												</div>
											</td>
											<td><strong>$20</strong></td>
											<td>
												<div class="order-pro order1">
													<input type="number" value="01" />
												</div>
											</td>
											<td><span class="prize">$20.00</span></td>  
										</tr>
										<tr>
											<td><i class="fa fa-times"></i></td>
											<td><img src="images/cart/1.jpg" alt=""/></td>
											<td>
												<div class="des-pro">
													<h4>Cleats</h4><p>Men’s Football</p>
												</div>
											</td>
											<td><strong>$20</strong></td>
											<td>
												<div class="order-pro order1">
													<input type="number" value="01" />
												   
												</div>
											</td>
											<td><span class="prize">$20.00</span></td>
											
										</tr>
                                        <tr>
                                            <td><i class="fa fa-times"></i></td>
                                            <td><img src="images/cart/2.jpg" alt=""/></td>
                                            <td>
                                                <div class="des-pro">
                                                    <h4>Backpack</h4><p>Club Team</p>
                                                </div>
                                            </td>
                                            <td><strong>$20</strong></td>
                                            <td>
                                                <div class="order-pro order1">
                                                    <input type="number" value="01" />
                                                </div>
                                            </td>
                                            <td><span class="prize">$20.00</span></td>
										</tr>
									</table>							   
								</div><!-- .product-list end -->
							</div>
						</div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="order-list">
                                    <h3>Have A Coupon Code?</h3>
                                    <div class="coupon-fields">
                                        <input name="coupon_code" class="input-text required" id="coupon_code" value="" placeholder="Coupon code" type="text">
                                        <input class="apply-coupon button button-default button-default-size button" name="apply_coupon" value="Apply Coupon" type="submit">
                                    </div>
                                </div><!-- .order-list end -->
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="checkout-price order-list">
                                    <h3>Your Order</h3>
                                    <table>
                                        <tr>
                                            <td><b>Product</b></td>
                                            <td><b>Total</b></td>
                                        </tr>
                                        <tr class="row-bold">
                                            <td>Subtotal</td>
                                            <td>$ 158.00</td>
                                        </tr>
                                        <tr class="row-bold">
                                            <td>Total</td>
                                            <td>$ 158.00</td>
                                        </tr>
                                    </table>
                                    <div class="next-step">
                                        <a href="checkout.html">Proceeed to Checkout</a>
                                    </div>
                                </div><!-- .checkout-price end -->
                            </div>  
                        </div>
					</div>                                 
				</div>
			</div>
		</div>
        <!-- Cart Page End Here  -->

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

<!-- Mirrored from keenitsolutions.com/products/html/edulearn/edulearn-demo/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Sep 2018 11:26:50 GMT -->
</html>