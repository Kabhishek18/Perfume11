<!--== Start Page Header ==-->
<div id="page-header-wrapper">
    <div class="container">
        <div class="row">
            <!-- Page Title Area Start -->
            <div class="col-6">
                <div class="page-title-wrap">
                    <h1><?=($this->uri->segment(2,0))?></h1>
                </div>
            </div>
            <!-- Page Title Area End -->

            <!-- Page Breadcrumb Start -->
            <div class="col-6 m-auto">
                <nav class="page-breadcrumb-wrap">
                    <ul class="nav justify-content-end">
                        <li><a href="<?=base_url()?>">Home</a></li>
                        <li><a href="javascript:void(0)" class="current">Category</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Page Breadcrumb End -->
        </div>
    </div>
</div>
<!--== End Page Header ==-->

    <!-- Bootstrap Core CSS -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->
    <script src="<?=base_url()?>resources/assets/js/vendor/jquery-3.3.1.min.js"></script>

	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 	<link href = "<?php echo base_url(); ?>asset/jquery-ui.css" rel = "stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>asset/style.css" rel="stylesheet">
   <!-- Page Content -->
   <div id="shop-page-wrapper" class="page-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
				<div id="sidebar-area-wrap">
				    <div class="single-sidebar-wrap">
						 <h2 class="sidebar-title">Fragrances by Price</h2>
                         <div class="sidebar-body">
                            <div class="sidebar-list" style="border-right: 3px solid #dfdfdf; padding: 10px;">
        						<input type="hidden" id="hidden_minimum_price" value="1" />
        						<input type="hidden" id="hidden_maximum_price" value="200" />
        						<p id="price_show">$1 - $15</p>
        		                <div id="price_range"></div>
                            </div>
                         </div>   
	                </div>	

                       
	                <div class="single-sidebar-wrap">
						 <h2 class="sidebar-title">Fragrances by Gender</h2>
						 <div class="sidebar-body">
                            <ul class="sidebar-list">
								<?php foreach($Gender as $row){ ?>
								<li><input type="checkbox" class="common_selector gender" value="<?php echo $row['Gender']; ?>"  <?=(($this->uri->segment(2,0)==$row['Gender']?'Checked':''))?> > <?php echo $row['Gender']; ?> </li>
								<?php }	?>	
							</ul>
						</div>		
	                </div>	

                   <div class="single-sidebar-wrap">
						 <h2 class="sidebar-title">Fragrances by Brand</h2>
						 <div class="sidebar-body">
                            <ul class="sidebar-list">
								<?php foreach($BrandName as $row){ ?>
								<li><input type="checkbox" class="common_selector brand" value="<?php echo $row['BrandName']; ?>" <?=((urldecode($this->uri->segment(2,0))==$row['BrandName']?'Checked':''))?> >  <?php echo $row['BrandName']; ?> </li>
								<?php }	?>	
								 <li><a href="<?=base_url()?>Brand"><strong>See More+</strong></a></li>
							</ul>
						</div>		
	                </div>		


	                <div class="single-sidebar-wrap">
						 <h2 class="sidebar-title">Fragrances by Type</h2>
						 <div class="sidebar-body">
                            <ul class="sidebar-list">
								<?php foreach($Type as $row){ ?>
								<li><input type="checkbox" class="common_selector brand" value="<?php echo $row['Type']; ?>" <?=((urldecode($this->uri->segment(2,0))==$row['Type']?'Checked':''))?>   > <?php echo $row['Type']; ?> </li>
								<?php }	?>	
							</ul>
						</div>		
	                </div>		

				
				</div>
				
            </div>

            <div class="col-lg-9 order-first order-lg-last">
                <div class="shop-page-content-wrap">
            	  	<div class="shop-page-products-wrap">
                    	<div class="products-wrapper product-grid-view physicianList">
							
			                <div class="row filter_data">
			                </div>


			                <nav class="nav" id="pagination_link">
							</nav>

			               </div> 
		            	</div>
		            </div>
		        </div>    	
            </div>
        </div>

    </div>
   </div> 
<style>
    .nav{
        padding: 10px;
        text-align: center;
        margin-top: 10px;    
    }
    .page-link a{
        color: #bdb093;
    }
    .page-link a:hover {
        background-color: #bdb093;
            color: #000;
    }    
    .renderit
    {
        margin-top: 50px;
        padding: 200px;
        margin-bottom: 50px    
    }
    .loading
    {
        margin-left:40%;
        height: 100px;
    }
</style>

<script>
    $(document).ready(function(){

    	filter_data(1);

    	function filter_data(page)
    	{
            $('.filter_data').html('<div class="renderit"><img class="loading" src="<?php echo base_url(); ?>asset/loader.gif"></div>');
    		var action = 'fetch_data';
    		//var page = 1;
    	
    		var gender = get_filter('gender');
    		var minimum_price = $('#hidden_minimum_price').val();
    		var maximum_price = $('#hidden_maximum_price').val();
    		var brand = get_filter('brand');
    		var type = get_filter('type');
    		
    		$.ajax({
    			url:"<?php echo base_url(); ?>product_filter/fetch_data/"+page,
    			method:"POST",
    			dataType:"JSON",
    			data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, type:type, gender:gender},
    			success:function(data)
    			{
                    window.scrollTo(5,0);
    				$('.filter_data').html(data.product_list);
    				$('#pagination_link').html(data.pagination_link);
    			}
    		})
    	}

    	$('#price_range').slider({
    		range:true,
    		min:1,
    		max:250,
    		values:[1, 15],
    		step: 2,
    		stop:function(event, ui){
    			//$('#price_show').show();
    			$('#price_show').html(' $ ' +ui.values[0] + ' - ' +' $ ' + ui.values[1]);
    			$('#hidden_minimum_price').val(ui.values[0]);
    			$('#hidden_maximum_price').val(ui.values[1]);
    			filter_data(1);
    		}
    	});

    	function get_filter(class_name)
    	{
    		var filter = [];
    		$('.'+class_name+':checked').each(function(){
    			filter.push($(this).val());
    		});
    		return filter;
    	}

    	$(document).on("click", ".pagination li a", function(event){
    		event.preventDefault();
    		var page = $(this).data("ci-pagination-page");
    		filter_data(page);
    	});

    	$('.common_selector').click(function(){
            filter_data(1);
        });
    });
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
<script src="<?=base_url()?>resources/assets/js/active.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>

</body>
</html>