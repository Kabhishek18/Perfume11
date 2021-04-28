<body>
<style type="text/css">
    .btn-clay{
            padding: 2px;
    margin-left: 2px;
    border-radius: 3px;
    width: 100px;
    }
</style>
<!--== Start Header Section ===-->
<header id="header-area" class="headerFour ">
 <!-- Start PreHeader Area -->
    <div class="preheader-area fixed-top" >
        <div class="container-fluid" >
            <div class="row" >
                <div class="col-md-4 text-center text-md-left">
                    <!-- Start PreHeader Left -->
                    <div class="preheader-left-wrap">
                        <a href="tel:1018889999"><i class="fa fa-phone"></i> 101.888.9999</a>
                        <a href="#">Free Shipping on orders over $150</a>
                    </div>
                    <!-- End PreHeader Left -->
                </div>
                <div class="col-md-4 mt-3 mt-md-0">
                    <!--== Start Search box Wrapper ==-->
                  
                        <form action="<?=base_url()?>Home/Search" method="POST" class="search-form-area" style="display: flex;">

                            <input type="search" class="form-control" name="search" id="search" placeholder="Product Search"  list="browsers">
                            
                              <datalist class="searchspecial" id="browsers">
                                <?php $response =$this->mongo_db2->get('products');
                                    foreach($response as $pro){
                                        $productname[] = $pro['ProductName'];
                                    }
                                    $searchdata= array_unique($productname);
                                    asort($searchdata);
                                foreach($searchdata as $search){ ?>
                                  <option><?=$search?></option>
                                <?php }?>
                              </datalist>
                            <button type="submit" class="btn btn-brand btn-clay btn-search"><i class="fa fa-search"></i></button>
                        </form>
                         
                    <!--== End Search box Wrapper ==-->
                </div>
                <div class="col-md-4 mt-3 mt-md-0">
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
                                <li class="dropdown-show"><a href="<?=base_url()?>Gender/Women">WOMEN'S PERFUME</a></li>
                                <li class="dropdown-show"><a href="<?=base_url()?>Gender/Men"> MEN'S COLOGNE</a></li>
                    
                                <li class="dropdown-show"><a href="<?=base_url()?>Brand">BRANDS</a>
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
                                <span class="count"><?=$this->cart->total_items()?></span>
                                <span>/</span>
                                <span class="amount">$<?=$this->cart->total()?></span>
                            </button>
                            <?php if(!empty($this->cart->contents())){?>
                            <div class="minicart-content">
                                <div class="mini-cart-body">
                                    <!-- Single Cart Item Start -->
                                    <?php foreach($this->cart->contents() as $item){?>  
                                    <div class="single-cart-item d-flex">
                                        <figure class="product-thumb">
                                            <a href="#"><img
                                                    src="<?=$item['image']?>"
                                                    alt="<?=$item['name']?>"/></a>
                                        </figure>

                                        <div class="product-details">
                                            <h2><a href="<?=base_url()?>Product/<?=$item['id']?>/<?=$item['name']?>"><?=$item['name']?></a></h2>
                                            <div class="cal d-flex align-items-center">
                                                <span class="quantity"><?=$item['qty']?></span>
                                                <span class="multiplication">X</span>
                                                <span class="price">$<?=$item['price']?></span>
                                            </div>
                                        </div>
                                        <a href="<?=base_url()?>Cart/Remove/<?=$item['rowid']?>" class="remove-icon"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                    <!-- Single Cart Item End -->
                                    <?php }?>
                                </div>
                                <div class="mini-cart-footer text-center">
                                    <a href="<?=base_url()?>Cart" class="btn btn-transparent btn-small mr-3">View Cart</a>
                                    <a href="<?=base_url()?>Cart/Destroy" class="btn btn-transparent btn-small">Clear Cart</a>
                                </div>
                            </div>
                            <?php }?>
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
<?php unset($_SESSION['success']);}?>
  
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
  
