<body>
<style type="text/css">
    .btn-clay{
            padding: 2px;
    margin-left: 2px;
    border-radius: 3px;
    width: 100px;
    }

#autosuggest { width: 300px;}
.autocomplete-suggestions {
background: rgba(0,0,0,.84);
  color: white;
overflow: hidden;
}
.autocomplete-suggestion { 
  white-space: nowrap;
  overflow: hidden; 
  padding: 5px 3px;
  font-size: 90%;
}
.autocomplete-selected {
  background-color: rgba(182,254,254,.8);
  color: #fff;
}
.autocomplete-suggestions strong {
  font-weight: normal;
  color: rgba(114,114,222,1); 
}
.autocomplete-group { padding: 2px 5px; }
.autocomplete-group strong { display: block; border-bottom: 1px dotted #000; }

input, input:active {
  outline-width: 0;
  border-width: 0 0 1px 0;
  border-style: dashed;
  border-color: #777;
  padding: 0 3px;
}
input:focus {
  background-color: rgba(0,0,0,.12);
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
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
                        <form action="<?=base_url()?>Home/Search" method="POST" class="search-form-area" style="display: flex;">

                              <input id="autocomplete"  type="search" class="form-control" placeholder="Search here">
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
                                
                                <li><a href="<?=base_url()?>Contact">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- End Navigation // Main Menu -->

                <!-- Header Shop Cong Area -->
                <div class="col-lg-3 col-sm-8 m-auto">
                    <div class="header-configure-area d-flex justify-content-center justify-content-sm-end align-items-center">
                        <!-- Start Search Box -->
                     
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
<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/9729/jquery.autocomplete.js'></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>

<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/9729/zipcodesDK.js'></script>
<script type="text/javascript">
    var base_url = '<?=base_url()?>';
        $(document).ready(
        function() {

            $.ajax({
            url: base_url + 'Home/AjxGetBrand',
            type: 'post',
            success: function (msg) {
               OnSearch(msg);
            },
            error: function (error) {
            }
        });  
        });
  
    function OnSearch(data) {
        products =JSON.parse(data);
        var brandname =new Array();
        var products = jQuery.parseJSON(data);
        $.each(products, function(key,value) {
          brandname.push(value.BrandName);
        }); 

        console.log(brandname);
        $( "#autocomplete" ).autocomplete({
          source: brandname
        });
 
    }

</script>