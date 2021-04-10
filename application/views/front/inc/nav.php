

<body>

<!--== Start Header Section ===-->
<header id="header-area" class="headerFour">
 <!-- Start PreHeader Area -->
    <div class="preheader-area" >
        <div class="container-fluid" >
            <div class="row" >
                <div class="col-md-6 text-center text-md-left">
                    <!-- Start PreHeader Left -->
                    <div class="preheader-left-wrap">
                        <a href="tel:1018889999"><i class="fa fa-phone"></i> 101.888.9999</a>
                        <a href="#">Free Shipping on orders over $150</a>
                    </div>
                    <!-- End PreHeader Left -->
                </div>

                <div class="col-md-6 mt-3 mt-md-0">
                    <!-- Start PreHeader Right -->
                    <div class="preheader-right-wrap">
                        <nav id="site-settings">
                            <ul class="nav justify-content-center justify-content-md-end">
                                <?php if(!empty($this->session->user_account)){?>
                                <?php $var =$this->session->user_account;?>
                                    <li class="dropdown-show"><a href="#" class="arrow-toggle"><?=(!empty($var)?$var['UserName']:'')?> My Account</a>
                                    <ul class="dropdown-nav">
                                        <li><a href="<?=base_url()?>Dashboard">My Account</a></li>
                                        <li><a href="<?=base_url()?>Cart">Shopping Cart</a></li>
                                        <li><a href="<?=base_url()?>Checkout">Checkout</a></li>
                                        <li><a href="<?=base_url()?>Logout">Logout</a></li>
                                    </ul>
                                </li>
                                <?php }else{?>
                                        <li class="dropdown-show"><a  class="arrow-toggle" href="javascript:void(0)"><i class="fa fa-users"></i>Sign in/up</a>
                                        <ul class="dropdown-nav">
                                        <li><a href="LoginRegister">Register</a></li>
                                        <li><a href="LoginRegister">Login</a></li>
                                    </ul>
                                        </li>
                                <?php }?>    
                                <li class="dropdown-show"><a href="#" class="arrow-toggle"><img
                                        src="<?=base_url()?>resources/assets/img/icons/flag/en.png" alt="English"/> English</a>
                                    <ul class="dropdown-nav">
                                        <li><a href="#"><img src="<?=base_url()?>resources/assets/img/icons/flag/de.png" alt="German"/>
                                            German</a></li>
                                        <li><a href="#"><img src="<?=base_url()?>resources/assets/img/icons/flag/bd.png" alt="Bengali"/> Bengali</a>
                                        </li>
                                        <li><a href="#"><img src="<?=base_url()?>resources/assets/img/icons/flag/fr.png" alt="France"/>
                                            France</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown-show"><a href="#" class="arrow-toggle">USD</a>
                                    <ul class="dropdown-nav">
                                        <li><a href="#">AUD</a></li>
                                        <li><a href="#">EUR</a></li>
                                        <li><a href="#">GBP</a></li>
                                        <li><a href="#">USD</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </nav>
                    </div>
                    <!-- End PreHeader Right -->
                </div>
            </div>
        </div>
    </div>
    <!-- End PreHeader Area -->
    <!-- Start Header Bottom  -->
    <div class="header-bottom-area">
        <div class="container-fluid">
            <div class="row">
                <!-- Start Logo Area -->
                <div class="col-lg-3 col-sm-4 m-auto text-center text-sm-left">
                    <div class="logo-wrap mb-4 mb-sm-0">
                        <a href="<?=base_url()?>"><img src="<?=base_url()?>resources/assets/img/logo-white.png" alt="Logo"/></a>
                    </div>
                </div>
                <!-- End Logo Area -->

                <!-- Start Navigation // Main Menu -->
                <div class="col-lg-6 m-auto d-none d-lg-block">
                    <div id="navigation-area-wrap" class="text-center">
                        <nav class="mainmenu">
                            <ul id="main-navbar" class="clearfix">
                                <li class="dropdown-show"><a href="<?=base_url()?>Women">WOMEN'S PERFUME</a></li>
                                <li class="dropdown-show"><a href="<?=base_url()?>Men"> MEN'S COLOGNE</a></li>
                    
                                <li class="dropdown-show"><a href="#">BRANDS</a>
                                    <ul class="mega-menu-wrap dropdown-nav">
                                        <li class="mega-menu-item"><a href="#" class="mega-item-title">Most Popular Perfume Brands
                                    </a>
                                            <ul><br>
                                                <li><a href="#">Calvin Klein</a></li>
                                                <li><a href="#">Yves Saint Laurent</a></li>
                                                <li><a href="#">Dolce & Gabbana</a></li>
                                                <li><a href="#">Giorgio Armani</a></li>
                                                <li><a href="#">Burberry</a></li>
                                                <li><a href="#">Givenchy</a></li>
                                                <li><a href="#">Guerlain</a>
                                                <li><a href="#">Christian Dior</a>
                                                <li><a href="#">Hugo Boss</a></li>
												
                                            </ul>
                                        </li>

                                       
                                    </ul>
                                </li>
                                
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- End Navigation // Main Menu -->

                <!-- Header Shop Cong Area -->
                <div class="col-lg-3 col-sm-8 m-auto">
                    <div class="header-configure-area d-flex justify-content-center justify-content-sm-end align-items-center">
                        <!-- Start Search Box -->
                        <div class="search-box-wrap">
                            <button class="srch-icon animate-modal-popup" data-mfp-src="#search-box-popup"><i
                                    class="fa fa-search fa-rotate-270"></i></button>
                        </div>
                        <!-- End Search Box -->

                        <!-- Start Mini Cart Area -->
                        <div class="mini-cart-wrap">
                            <button class="btn-minicart"><i class="fa fa-shopping-cart"></i>
                                <span class="count">4</span>
                                <span>/</span>
                                <span class="amount">$488.00</span>
                            </button>

                            <div class="minicart-content">
                                <div class="mini-cart-body">
                                    <!-- Single Cart Item Start -->
                                    <div class="single-cart-item d-flex">
                                        <figure class="product-thumb">
                                            <a href="#"><img
                                                    src="<?=base_url()?>resources/assets/img/products/home-two/product-1.jpg"
                                                    alt="Products"/></a>
                                        </figure>

                                        <div class="product-details">
                                            <h2><a href="#">Sprite Yoga Companion</a></h2>
                                            <div class="cal d-flex align-items-center">
                                                <span class="quantity">3</span>
                                                <span class="multiplication">X</span>
                                                <span class="price">$77.00</span>
                                            </div>
                                        </div>
                                        <a href="#" class="remove-icon"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                    <!-- Single Cart Item End -->

                                    <!-- Single Cart Item Start -->
                                    <div class="single-cart-item d-flex">
                                        <figure class="product-thumb">
                                            <a href="#"><img
                                                    src="<?=base_url()?>resources/assets/img/products/home-two/product-2.jpg"
                                                    alt="Products"/></a>
                                        </figure>
                                        <div class="product-details">
                                            <h2><a href="#">Yoga Companion Kit</a></h2>
                                            <div class="cal d-flex align-items-center">
                                                <span class="quantity">2</span>
                                                <span class="multiplication">X</span>
                                                <span class="price">$6.00</span>
                                            </div>
                                        </div>
                                        <a href="#" class="remove-icon"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                    <!-- Single Cart Item End -->

                                    <!-- Single Cart Item Start -->
                                    <div class="single-cart-item d-flex">
                                        <figure class="product-thumb">
                                            <a href="#"><img
                                                    src="<?=base_url()?>resources/assets/img/products/home-two/product-3.jpg"
                                                    alt="Products"/></a>
                                        </figure>
                                        <div class="product-details">
                                            <h2><a href="#">Sprite Yoga Companion Kit</a></h2>
                                            <div class="cal d-flex align-items-center">
                                                <span class="quantity">1</span>
                                                <span class="multiplication">X</span>
                                                <span class="price">$116.00</span>
                                            </div>
                                        </div>
                                        <a href="#" class="remove-icon"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                    <!-- Single Cart Item End -->
                                </div>
                                <div class="mini-cart-footer text-center">
                                    <a href="#" class="btn btn-transparent btn-small mr-3">View Cart</a>
                                    <a href="#" class="btn btn-transparent btn-small">Checkout</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Mini Cart Area -->
                    </div>
                </div>
                <!-- Header Shop Cong Area -->
            </div>
        </div>
    </div>
    <!-- End Header Bottom  -->
</header>
<!--== End Header Section ===-->

<!--== Start Search box Wrapper ==-->
<div class="mfp-hide modalSearchBox" id="search-box-popup">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="search-box-wrapper">
                <form action="#" method="POST" class="search-form-area">
                    <input type="search" class="form-control" name="search" id="search" placeholder="Search">
                    <button type="submit" class="btn btn-brand btn-search"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--== End Search box Wrapper ==-->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php if($this->session->flashdata('success')){ ?>
    <script type="text/javascript">
        swal({
        title: 'Success',
        text: '<?=($this->session->flashdata('success'))?>',
        timer: 2000,
        buttons: false
        })
    </script>
<?php }?>
  
<?php if($this->session->flashdata('danger')){ ?>
     <script type="text/javascript">
        swal({
        title: 'Danger',
        text: '<?=($this->session->flashdata('danger'))?>',
        timer: 2000,
        buttons: false
        })
    </script>
<?php }?>
   
<?php if($this->session->flashdata('warning')){ ?>
     <script type="text/javascript">
        swal({
        title: 'Warning',
        text: '<?=($this->session->flashdata('warning'))?>',
        timer: 2000,
        buttons: false
        })
    </script>
<?php }?>
   
<?php if($this->session->flashdata('info')){ ?>
    <script type="text/javascript">
        swal({
        title: 'Information',
        text: '<?=($this->session->flashdata('info'))?>',
        timer: 2000,
        buttons: false
        })
    </script>
<?php }?>
  
