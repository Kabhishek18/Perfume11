<!--== Start Page Header ==-->
<div id="page-header-wrapper">
    <div class="container">
        <div class="row">
            <!-- Page Title Area Start -->
            <div class="col-6">
                <div class="page-title-wrap">
                    <h1>Shopping Cart</h1>
                </div>
            </div>
            <!-- Page Title Area End -->

            <!-- Page Breadcrumb Start -->
            <div class="col-6 m-auto">
                <nav class="page-breadcrumb-wrap">
                    <ul class="nav justify-content-end">
                        <li><a href="<?=base_url()?>">Home</a></li>
                        <li><a href="javascript:void(0)" class="current">Cart</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Page Breadcrumb End -->
        </div>
    </div>
</div>
<!--== End Page Header ==-->

<!--== Start Cart Page Wrapper ==-->
<div id="cart-page-wrapper" class="page-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Cart Table Area -->
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="pro-thumbnail">Image</th>
                            <th class="pro-title">Product </th>
                            <th class="pro-price">Price</th>
                            <th class="pro-quantity">Quantity</th>
                            <th class="pro-subtotal">Total</th>
                            <th class="pro-remove"> Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($this->cart->contents() as $item){?>    
                            <tr>
                                <td class="pro-thumbnail">
                                    <a href="<?=base_url()?>Products/<?=$item['id']?>/<?=$item['name']?>"><img class="img-fluid" src="<?=$item['image']?>" alt="Product"/></a>
                                </td>
                                <td class="pro-title">
                                    <a href="<?=base_url()?>Products/<?=$item['id']?>/<?=$item['name']?>"><?=($item['options']['Size'].' '.$item['options']['Type'].' '.$item['name'])?> </a>
                                </td>
                                <td class="pro-price">
                                    <span>$ <?=$item['price']?></span>
                                </td>
                                <td class="pro-quantity">
                                    <form method="post" action="<?=base_url()?>Cart/Update" id="cart-update-<?=$item['id']?>">
                                         <input type="hidden"  name ="rowid" value="<?=$item['rowid']?>">
                                        <div class="pro-qty">
                                            <input type="text" name="qty" data-id="<?=$item['rowid']?>" value="<?=$item['qty']?>">
                                           
                                        </div>
                                    </form>
                                </td>
                                <td class="pro-subtotal" id="sub-<?=$item['rowid']?>">
                                    <span id="subtotal-<?=$item['rowid']?>">$ <?=($item['subtotal'])?></span>
                                    <span class="editview-radio-box-<?=$item['rowid']?>"> </span>
                                </td>
                                <td class="pro-remove">
                                    <a href="<?=base_url()?>Cart/Remove/<?=$item['rowid']?>"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        <?php }?>
                    </table>
                </div>

                <!-- Cart Update Option -->
                <div class="cart-update-option d-block d-md-flex justify-content-between">
                    <div class="apply-coupon-wrapper">
                        <form action="<?=base_url()?>Shop/ApplyCoupon" method="post" class=" d-block d-md-flex">
                            <input type="text" name="coupon" placeholder="Enter Your Coupon Code" required/>
                            <button type="submit" class="btn btn-brand">Apply Coupon</button>
                        </form>
                    </div>
                    <div class="cart-update">
                        <a href="<?=base_url()?>Cart/Destroy"  class="btn btn-brand">Clear Cart</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                 <div class="cart-calculator-wrapper">
                    <div class="cart-calculate-items">
                        <div class="form-group">
                            <a class="btn btn-brand" href="<?=$_SERVER['HTTP_REFERER']?>">Continue Shopping</a>
                        </div>
                    </div>
                 </div>   
            </div>
            <div class="col-lg-5 ml-auto">
                <!-- Cart Calculation Area -->
                <div class="cart-calculator-wrapper">
                    <div class="cart-calculate-items">
                        <h3>Cart Totals</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Sub Total</td>
                                    <?php $total = $this->cart->total();?>
                                    <td>$ <span id="totalhid"></span> </td>
                                </tr>
                                 

                               <tr>
                                   <td>Shipping Charge</td>
                                   <td> + $ <span id="shiphid"></span></td>
                               </tr>
                                <tr>
                                    <td colspan="2" id="coupon"></div>
                                </tr>
                                <tr class="total">
                                    <td>Total</td>
                                    <td class="total-amount">$<span id="maintotalhid"> </span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <a href="<?=base_url()?>Checkout" class="btn btn-brand d-block">Proceed To Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== End Cart Page Wrapper ==-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
 var base_url = '<?=base_url()?>';
        $(document).ready(
        function() {
            setInterval(function() {
                $.ajax({
                    url: base_url + 'shop/TotalValueCart',
                    type: 'get',
                    success: function (msg) {
                        var cal =JSON.parse(msg);
                         $('#totalhid').text(cal.total.toFixed(2));
                         $('#shiphid').text(cal.ship.toFixed(2));
                         console.log(cal.coupon);
                         $('#coupon').html(cal.coupon);
                         $('#maintotalhid').text(cal.maintotal.toFixed(2));
                    },
                    error: function (error) {
                    }
                });       
            }, 200);
        });


    var proQty = $(".pro-qty");
        proQty.append('<a href="#" class="inc qty-btn">+</a>');
        proQty.append('<a href="#" class= "dec qty-btn">-</a>');
        $('.qty-btn').on('click', function (e) {
            e.preventDefault();
            var $button = $(this);
           
            var oldValue = $button.parent().find('input').val();
            var rowid = $button.parent().find('input').attr("data-id");
            if ($button.hasClass('inc')) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 1) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 1;
                }
            }
            $button.parent().find('input').val(newVal);
            $.ajax({ 
                url: base_url+'shop/AjaxupdateItemQty',
                data: { qty: newVal ,rowid:rowid },
                type: 'post'
            }).done(function(responseData) {
                onSuccess(responseData,rowid);
            }).fail(function() {
                console.log('Failed');
            });
        });
 function onSuccess(data,rowid) {
  let html = "";
  if(JSON.parse(data)){
        var value =JSON.parse(data);
       html += `$ ${ (value.qty*value.price).toFixed(2) }`;
       $('#subtotal-'+rowid).hide()
    }
  else{
        html +=`<span class="text-danger"> No  Found</span>`;
  }
  $('.editview-radio-box-'+rowid).html(html);
}



</script>    



<!--== Start Footer Section ===-->
<footer id="footer-area" style="margin-top:50px;">
    <!-- Start Newsletter Area -->
    <div class="newsletter-area-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto text-center">
                    <div class="newsletter-content-wrap">
                        <h2>Newsletter</h2>
                        <p>Be the first to hear about new styles and offers and see how you’ve helped.</p>

                        <div class="newsletter-form-wrap">
                            <form action="#"
                                  method="post" id="mc-form" class="mc-form">
                                <input type="email" id="mc-email" autocomplete="off" placeholder="Enter Email Address"
                                       required/>
                                <button class="btn"><i class="fa fa-envelope"></i></button>
                            </form>

                            <!-- mailchimp-alerts Start -->
                            <div class="mailchimp-alerts text-centre">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                            </div>
                            <!-- mailchimp-alerts end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Newsletter Area -->

    <!-- Start Footer Widget Area -->
    <div class="footer-widget-wrapper">
        <div class="container">
            <div class="widget-content-wrap">
                <div class="row">
                    <!-- Start Single Footer Widget -->
                    <div class="col-lg-4 col-sm-12">
                        <div class="single-footer-widget-wrap footer-about">
                            <a href="index" class="footerLogo"><img src="<?=base_url()?>resources/assets/img/logo-white.png"
                                                                         alt="logo"/></a>
                            <p style="text-align:justify;">At Perfume11, our goal is to provide you with the largest selection of perfume and cologne at the lowest prices. Our discount fragrance selection consists of over 9,500 brands of perfume, cologne, body lotion, and after shaves, including many discontinued perfumes and colognes. </p>

                            <address>
                                <p>205 Arapahoe St, Schoenchen, KS 69696</p>
                                <p>Email: <a href="mailto:care@perfume11.com">care@perfume11.com</a></p>
                                <p>Phone: <a href="tel:+11234566789">+1 123-456-6789</a></p>
                            </address>
                        </div>
                    </div>
                    <!-- End Single Footer Widget -->

                    <!-- Start Single Footer Widget -->
                    <div class="col-lg-3 col-sm-6 col-md-3">
                        <div class="single-footer-widget-wrap">
                            <h3 class="widget-title">MORE WAYS TO SHOP</h3>

                            <div class="widget-body">
                                <ul class="widget-list">
                                    <li><a href="#">Women's Perfume</a></li>
                                    <li><a href="#">Men's Cologne</a></li>
                                    <li><a href="#">Top Sellers</a></li>
                                    <li><a href="#">New Arrivals</a></li>
                                    <li><a href="#">Celebrity Scents</a></li>
                                    <li><a href="#">Hard To Find</a></li>
                                    <li><a href="#">Brands</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Footer Widget -->

                    <!-- Start Single Footer Widget -->
                    <div class="col-lg-3 col-sm-6 col-md-3">
                        <div class="single-footer-widget-wrap">
                            <h3 class="widget-title">HELP</h3>

                            <div class="widget-body">
                                <ul class="widget-list">
                                    <li><a href="#">Order Status</a></li>
                                    <li><a href="#">My Account</a></li>
                                    <li><a href="#">Shipping Info</a></li>
                                    <li><a href="#">Return Info</a></li>
                                    <li><a href="#">Contact Info</a></li>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Affiliates</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Footer Widget -->

                   <!-- Start Single Footer Widget -->
                    <div class="col-lg-2 col-sm-6 col-md-3">
                        <div class="single-footer-widget-wrap">
                            <h3 class="widget-title">FIND US ON</h3>

                            <div class="widget-body">
                                <ul class="widget-list">
                                    <li><a href="#">Wholesale Info</a></li>
                                    <li><a href="#">Customer Testimonials</a></li>
                                    <li><a href="#">Earn Rewards</a></li>
                                    <li><a href="#">Privacy</a></li>
                                    <li><a href="#">Join Coupon List</a></li>
                                    <li><a href="#">Klarna</a></li>
                                    <li><a href="#">Safe Shopping Guarantee</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Footer Widget -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Widget Area -->

    <!-- Start Footer Copyright Area -->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <!-- Start Copyright Content -->
                <div class="col-sm-6 text-center text-sm-left">
                    <div class="copyright-content mt-4 mt-sm-0">
                        <p>Copyright © perfume11.com. All Rights Reserved | Designed By: <a href="#" target="_blank">TechCentrica</a>.</p>
                    </div>
                </div>
                <!-- End Copyright Content -->

                <div class="col-sm-6 text-center text-sm-right order-first order-sm-last">
                    <img src="<?=base_url()?>resources/assets/img/payment-icon.png" alt="Payment Method"/>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Copyright Area -->
</footer>
<!--== End Footer Section ===-->

<!-- Scroll to Top Start -->
<a href="#" class="scrolltotop"><i class="fa fa-angle-double-up"></i></a>
<!-- Scroll to Top End -->

<!--=======================Javascript============================-->
<!--=== Jquery Min Js ===-->
<!-- <script src="<?=base_url()?>resources/assets/js/vendor/jquery-3.3.1.min.js"></script> -->
<!--=== Jquery Migrate Min Js ===-->
<script src="<?=base_url()?>resources/assets/js/vendor/jquery-migrate-1.4.1.min.js"></script>
<!--=== Popper Min Js ===-->
<script src="<?=base_url()?>resources/assets/js/vendor/popper.min.js"></script>
<!--=== Bootstrap Min Js ===-->
<script src="<?=base_url()?>resources/assets/js/vendor/bootstrap.min.js"></script>
<!--=== Plugins Js ===-->
<script src="<?=base_url()?>resources/assets/js/plugins.js"></script>
<!--=== Ajax Mail Js ===-->
<script src="<?=base_url()?>resources/assets/js/ajax-mail.js"></script>

<!--=== Active Js ===-->
<!-- <script src="<?=base_url()?>resources/assets/js/active.js"></script> -->
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>

</body>
</html>