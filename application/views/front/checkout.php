<!--== Start Page Header ==-->
<div id="page-header-wrapper">
    <div class="container">
        <div class="row">
            <!-- Page Title Area Start -->
            <div class="col-6">
                <div class="page-title-wrap">
                    <h1>Checkout</h1>
                </div>
            </div>
            <!-- Page Title Area End -->

            <!-- Page Breadcrumb Start -->
            <div class="col-6 m-auto">
                <nav class="page-breadcrumb-wrap">
                    <ul class="nav justify-content-end">
                        <li><a href="<?=base_url()?>">Home</a></li>
                        <li><a href="<?=base_url()?>Cart">Cart</a></li>
                        <li><a href="javascript:void(0)" class="current">Checkout</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Page Breadcrumb End -->
        </div>
    </div>
</div>
<!--== End Page Header ==-->

<!--== Start Checkout Page Wrapper ==-->
<div id="checkout-page-wrapper" class="page-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Checkout Login Coupon Accordion Start -->
                <div class="checkoutaccordion" id="checkOutAccordion">
                    <?php if(empty($this->session->user_account)){?>
                        <div class="card">
                            <h3>Returning Customer? <span data-toggle="collapse" data-target="#logInaccordion">Click Here To Login</span>
                            </h3>

                            <div id="logInaccordion" class="collapse" data-parent="#checkOutAccordion">
                                <div class="card-body">
                                    <p>If you have shopped with us before, please enter your details in the boxes below. If
                                        you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                                    <div class="login-reg-form-wrap">
                                        <div class="row">
                                            <div class="col-lg-7 m-auto">
                                                <!-- Form Start -->
                                                     <?php echo form_open_multipart('Home/Authenticate','') ?> 
                                                        <div class="single-input-item">
                                                            <input type="email" name="UserEmail"  placeholder="Email" required/>
                                                        </div>

                                                        <div class="single-input-item">
                                                            <input type="password" name="UserPassword" placeholder="Enter your Password" required/>
                                                        </div>

                                                        <div class="single-input-item">
                                                            <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                                                <div class="remember-meta">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="rememberMe">
                                                                        <label class="custom-control-label" for="rememberMe">Remember Me</label>
                                                                    </div>
                                                                </div>

                                                                <a href="#" class="forget-pwd">Forget Password?</a>
                                                            </div>
                                                        </div>

                                                        <div class="single-input-item">
                                                            <button class="btn btn-brand">Login Account</button>
                                                        </div>
                                                    <?php echo form_close() ?>  
                                                <!-- Form End -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                    <?php if(empty($this->session->coupon)){?>
                        <div class="card">
                            <h3>Have A Coupon? <span data-toggle="collapse" data-target="#couponaccordion">Click Here To Enter Your Code</span>
                            </h3>
                            <div id="couponaccordion" class="collapse" data-parent="#checkOutAccordion">
                                <div class="card-body">
                                    <div class="cart-update-option">
                                        <div class="apply-coupon-wrapper">
                                            <form action="#" method="post" class=" d-block d-md-flex">
                                                <input type="text" placeholder="Enter Your Coupon Code" required/>
                                                <button class="btn btn-brand">Apply Coupon</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                </div>
                <!-- Checkout Login Coupon Accordion End -->
            </div>
        </div>

    <?php echo form_open_multipart('Shop/CheckoutSubmit','') ?> 
        <div class="row">
            <!-- Checkout Billing Details -->
            <div class="col-lg-8">
                <div class="checkout-billing-details-wrap">
                    <h2>Billing Details</h2>
                    <div class="billing-form-wrap">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <label for="f_name" class="required">First Name</label>
                                        <input type="text" id="f_name" placeholder="First Name" required/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <label for="l_name" class="required">Last Name</label>
                                        <input type="text" id="l_name" placeholder="Last Name" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="single-input-item">
                                <label for="email" class="required">Email Address</label>
                                <input type="email" id="email" name="email" placeholder="Email Address" required/>
                            </div>

                            <div class="single-input-item">
                                <label for="com-name">Company Name</label>
                                <input type="text" id="com-name" name="company_name" placeholder="Company Name"/>
                            </div>

                            <div class="single-input-item">
                                <label for="country" class="required">Country</label>
                                <select name="country" id="country">
                                    <option value="India">India</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="England">England</option>
                                    <option value="London">London</option>
                                    <option value="London">London</option>
                                    <option value="Chaina">China</option>
                                </select>
                            </div>

                            <div class="single-input-item">
                                <label for="street-address" class="required">Street address</label>
                                <input type="text" id="street-address" name="street_address" placeholder="Street address Line 1" required/>
                            </div>

                            <div class="single-input-item">
                                <input type="text" name="street_addressl2" placeholder="Street address Line 2 (Optional)"/>
                            </div>

                            <div class="single-input-item">
                                <label for="town" class="required">Town / City</label>
                                <input type="text" id="town" name="city" placeholder="Town / City" required/>
                            </div>

                            <div class="single-input-item">
                                <label for="state">State / Divition</label>
                                <input type="text" id="state" name="state" placeholder="State / Divition"/>
                            </div>

                            <div class="single-input-item">
                                <label for="postcode" class="required">Postcode / ZIP</label>
                                <input type="text" id="postcode" name="postcode" placeholder="Postcode / ZIP" required/>
                            </div>

                            <div class="single-input-item">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" name="phone" placeholder="Phone" required="" />
                            </div>

                         

                            <div class="checkout-box-wrap">
                                <div class="single-input-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="ship_to_different">
                                        <label class="custom-control-label" for="ship_to_different">Ship to a different
                                            address?</label>
                                    </div>
                                </div>
                                <div class="ship-to-different single-form-row">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="single-input-item">
                                                <label for="f_name_2" class="required">First Name</label>
                                                <input type="text" id="f_name_2" name="sf_name" placeholder="First Name" />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="single-input-item">
                                                <label for="l_name_2" class="required">Last Name</label>
                                                <input type="text" id="l_name_2" name="sl_name" placeholder="Last Name" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-input-item">
                                        <label for="email_2" class="required">Email Address</label>
                                        <input type="email" id="email_2" name="semail" placeholder="Email Address" />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="com-name_2">Company Name</label>
                                        <input type="text" id="com-name_2" name="scompany_name" placeholder="Company Name"/>
                                    </div>

                                    <div class="single-input-item">
                                        <label for="country_2" class="required">Country</label>
                                        <select name="scountry" id="country_2">
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="India">India</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="England">England</option>
                                            <option value="London">London</option>
                                            <option value="London">London</option>
                                            <option value="China">China</option>
                                        </select>
                                    </div>

                                    <div class="single-input-item">
                                        <label for="street-address_2" class="required">Street address</label>
                                        <input type="text" name="sstreet_address" id="street-address_2" placeholder="Street address Line 1"
                                               />
                                    </div>

                                    <div class="single-input-item">
                                        <input type="text" name="sstreet_addressl2"  placeholder="Street address Line 2 (Optional)"/>
                                    </div>

                                    <div class="single-input-item">
                                        <label for="town_2" class="required">Town / City</label>
                                        <input type="text" id="town_2" name="stown" placeholder="Town / City" />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="state_2">State / Divition</label>
                                        <input type="text" id="state_2" name="sstate" placeholder="State / Divition"/>
                                    </div>

                                    <div class="single-input-item">
                                        <label for="postcode_2" class="required">Postcode / ZIP</label>
                                        <input type="text" id="postcode_2" name="spostcode" placeholder="Postcode / ZIP" />
                                    </div>
                                </div>
                            </div>

                            <div class="single-input-item">
                                <label for="ordernote">Order Note</label>
                                <textarea name="ordernote" id="ordernote" name="ordernote" cols="30" rows="3"
                                          placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </div>
                       
                    </div>
                </div>
            </div>

            <!-- Order Summary Details -->
            <div class="col-lg-4 mt-5 mt-lg-0">
                <div class="order-summary-details">
                    <h2>Your Order Summary</h2>
                    <div class="order-summary-content">
                        <!-- Order Summary Table -->
                        <div class="order-summary-table table-responsive text-center">
                            <table class="table table-bordered">
                            
                             
                                <tfoot>
                                <tr>
                                    <td>Sub Total</td>
                                    <?php $total = $this->cart->total();?>
                                    <td><strong>$ <?=number_format($total,2)?></strong></td>
                                </tr>
                                 <?php if(!empty($this->session->coupon)){ $coupon= $this->session->coupon; ?>
                                    <tr>
                                        <td>Coupon Applied <span class="text-success"><?=$coupon['CouponName']?></span></td>
                                        <td> <span class="text-danger">- </span> $
                                            <?php if($coupon['CouponType']=='Percentage'){
                                                $coupon['CouponValue'] = ($coupon['CouponValue']*$this->cart->total())/100 ;
                                                ?>

                                                 <?=(($coupon['CouponValue']*$this->cart->total())/100)?>
                                            <?php }else{?>
                                                  <?=$coupon['CouponValue']?>  
                                            <?php }?> 

                                            <a href="<?=base_url()?>Shop/Coupondestroy" class="text-danger"><i class="fa fa-trash-o"></i></a>   
                                        </td>
                                    </tr>
                                     <?php $total = $this->cart->total() - $coupon['CouponValue'] ?>
                                <?php }?>    

                                <tr>
                                    <td>Shipping</td>
                                    <td class="d-flex justify-content-center">
                                        <span class="shipping-type">
                                                <?=(!empty($ship)?$ship:"Free Shipping")?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Amount</td>
                                    <td><strong>$<?=($total+$ship)?></strong></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                        <!-- Order Payment Method -->
                        <div class="order-payment-method">
                            <div class="single-payment-method show">
                                <div class="payment-method-name">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="cashon" name="paymentmethod" value="cash"
                                               class="custom-control-input" checked/>
                                        <label class="custom-control-label" for="cashon">Cash On Delivery</label>
                                    </div>
                                </div>
                                <div class="payment-method-details" data-method="cash">
                                    <p>Pay with cash upon delivery.</p>
                                </div>
                            </div>

                            <div class="single-payment-method">
                                <div class="payment-method-name">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="directbank" name="paymentmethod" value="bank"
                                               class="custom-control-input"/>
                                        <label class="custom-control-label" for="directbank">Direct Bank
                                            Transfer</label>
                                    </div>
                                </div>
                                <div class="payment-method-details" data-method="bank">
                                    <p>Make your payment directly into our bank account. Please use your Order ID as the
                                        payment reference. Your order will not be shipped until the funds have cleared
                                        in our account..</p>
                                </div>
                            </div>

                            <div class="single-payment-method">
                                <div class="payment-method-name">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="checkpayment" name="paymentmethod" value="check"
                                               class="custom-control-input"/>
                                        <label class="custom-control-label" for="checkpayment">Pay with Check</label>
                                    </div>
                                </div>
                                <div class="payment-method-details" data-method="check">
                                    <p>Please send a check to Store Name, Store Street, Store Town, Store State /
                                        County, Store Postcode.</p>
                                </div>
                            </div>

                            <div class="single-payment-method">
                                <div class="payment-method-name">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="paypalpayment" name="paymentmethod" value="paypal"
                                               class="custom-control-input"/>
                                        <label class="custom-control-label" for="paypalpayment">Paypal <img
                                                src="<?=base_url()?>resources/assets/img/paypal-card.jpg" class="img-fluid paypal-card"
                                                alt="Paypal"/></label>
                                    </div>
                                </div>
                                <div class="payment-method-details" data-method="paypal">
                                    <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                        account.</p>
                                </div>
                            </div>

                            <div class="summary-footer-area">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="terms" required/>
                                    <label class="custom-control-label" for="terms">I have read and agree to the
                                        <a
                                                href="<?=base_url()?>Terms">terms and conditions.</a></label>
                                </div>

                                <input type="submit" class="btn btn-brand btn-full" value="Place Order"> 
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-8 " style="margin-top: 10px">
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="pro-thumbnail">Thumbnail</th>
                            <th class="pro-title">Product </th>
                            <th class="pro-price">Price</th>
                            <th class="pro-quantity">Quantity</th>
                            <th class="pro-subtotal">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($this->cart->contents() as $item){?>    
                            <tr>
                                <td class="pro-thumbnail">
                                    <a href="<?=base_url()?>Products/<?=$item['id']?>/<?=$item['name']?>"><img class="img-fluid" src="<?=$item['image']?>" alt="Product"/></a>
                                </td>
                                <td class="pro-title">
                                    <a href="<?=base_url()?>Products/<?=$item['id']?>/<?=$item['name']?>"><?=$item['name']?> </a>
                                </td>
                                <td class="pro-price">
                                    <span>$ <?=$item['price']?></span>
                                </td>
                                <td class="pro-quantity">
                                    <?=$item['qty']?>
                                </td>
                                <td class="pro-subtotal">
                                    <span>$ <?=($item['qty']*$item['price'])?></span>
                                </td>
                            </tr>
                        <?php }?>
                        <tr> <td colspan="3"> <a href="<?=base_url()?>" class="btn btn-brand"><i class="fa fa-edit"></i> Edit This Order</a></td>
                                <td colspan="2"> <input type="submit" class="btn btn-brand btn-full" value="Place Order"> </td></tr>
                    </table>
                </div>
            </div>
        </div>

        <?php echo form_close();?>
    </div>
</div>
<!--== End Checkout Page Wrapper ==-->
