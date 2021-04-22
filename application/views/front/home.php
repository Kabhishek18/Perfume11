
<!--== Start Slider Area ==-->
<section id="slider-area-wrap">
    <div class="slider-carousel-wrap">
        <!-- Start Single Slide Item -->
        <div class="single-slide-wrap slideBg7"></div>
        <!-- End Single Slide Item -->

        <!-- Start Single Slide Item -->
        <div class="single-slide-wrap slideBg8"></div>
        <!-- End Single Slide Item -->
    </div>
</section>
<!--== End Slider Area ==-->

<!--== Start Categories Gallery ==-->
<div class="categories-gallery-area" style="padding-top:0px;">
    <div class="container-fluid">
       

        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="category-sale-message">
                    <h4 style="text-transform:uppercase;">Discount Perfume and Cologne up to 80% off at America's Largest Fragrance Outlet. <a href="#">TOP PERFUME AND COLOGNE BRANDS
                    </a></h4>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== End Categories Gallery ==-->

<!--== Start Best Sellers Product Area ==-->
<section class="products-area-wrapper">
    <div class="container">
        <!-- Start Section Title Area -->
        <div class="row">
            <div class="col-lg-6 m-auto text-center">
                <div class="section-title-wrap">
                    <h2>BEST SELLING FRAGRANCES</h2>
                    <p>Browse the collection of our best selling and top interesting products. You’ll definitely find
                        what you are looking for.</p>
                </div>
            </div>
        </div>
        <!-- End Section Title Area -->

        <!-- Start Products Content Wrapper -->
        <div class="row">
            <div class="col-lg-12">
                <div class="products-wrapper">
                    <div class="feature-product-carousel">
                        <?php foreach($bestsell as $items){?>
                        <!-- Start Single Product -->
                        <div class="single-product-item">
                            <!-- Product Thumbnail -->
                            <figure class="product-thumbnail">
                                            <a href="<?=base_url()?>Products/<?=$items['ItemId']?>" class="d-block">
                                                <img class="primary-thumb" src="<?=$items['SmallImageUrl']?>"
                                                     alt="Product"/>
                                                <img class="secondary-thumb" src="<?=$items['SmallImageUrl']?>"
                                                     alt="Product"/>
                                            </a>
                                            <figcaption class="product-hvr-content">
                                            </figcaption>
                            </figure>

                            <!-- Product Details -->
                            <div class="product-details">
                                    <a href="#" class="product-cat-name"><?=$items['Type']?></a>
                                    <h2 class="product-name"><a href="<?=base_url()?>Products/<?=$items['ItemId']?>">
                                        <?=$items['ProductName']?></a>
                                    </h2>
                                    <div class="product-prices">
                                        
                                        <span class="price">$ <?=$items['WholesalePriceUSD']?></span>
                                    </div>

                                         
                            </div>
                        </div>
                    
                        <!-- End Single Product -->
                        <?php }?>    
                      
                    </div>
                </div>
            </div>
        </div>
        <!-- End Products Content Wrapper -->
    </div>
</section>
<!--== End Best Sellers Product Area ==-->


<!-- Start Special Offers Product -->
<section id="special-products-wrapper">
    <div class="container">
        <div class="row">
                     
            
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
<!-- partial:index.partial.html -->
    <style>
        .tabs-left {
          border-bottom: none;
          border-right: 1px solid #ddd;
        }

        .tabs-left>li {
          float: none;
        margin:0px;
          
        }

        .tabs-left>li.active>a,
        .tabs-left>li.active>a:hover,
        .tabs-left>li.active>a:focus {
          border-bottom-color: #ddd;
          border-right-color: transparent;
          background:#f90;
          border:none;
          border-radius:0px;
          margin:0px;
        }
        .nav-tabs>li>a:hover {
            /* margin-right: 2px; */
            line-height: 1.42857143;
            border: 1px solid transparent;
            /* border-radius: 4px 4px 0 0; */
        }
        .tabs-left>li.active>a::after{content: "";
            position: absolute;
            top: 10px;
            right: -10px;
            border-top: 10px solid transparent;
          border-bottom: 10px solid transparent;
          
          border-left: 10px solid #f90;
            display: block;
            width: 0;}
    </style>
<div  class="col-sm-6">
        <h3>Left Tabs</h3>
        <hr/>
        <div class="col-xs-3"> <!-- required for floating -->
          <!-- Nav tabs -->
          <ul class="nav nav-tabs tabs-left sideways">
             <?php foreach($bestsell as $items){?>
            <li class="active"><a href="#home-v" data-toggle="tab">Home</a></li>
            <li><a href="#profile-v" data-toggle="tab">Profile</a></li>
            <li><a href="#messages-v" data-toggle="tab">Messages</a></li>
            <li><a href="#settings-v" data-toggle="tab">Settings</a></li>
              <?php }?>    
          </ul>
        </div>

        <div class="col-xs-9">
          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane active" id="home-v">Home Tab.</div>
            <div class="tab-pane" id="profile-v">Profile Tab.</div>
            <div class="tab-pane" id="messages-v">Messages Tab.</div>
            <div class="tab-pane" id="settings-v">Settings Tab.</div>
          </div>
        </div>

        <div class="clearfix"></div>

</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>

        </div>
    </div>
</section>
<!-- End Special Offers Product -->
