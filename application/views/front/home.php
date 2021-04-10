
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
                     
              <!-- Start Special Product Tab Menu -->
              <div class="col-md-3">
                <div class="special-products-menu-area">
                    <h2>Fragrances by Type</h2>
                    
                    <div class="special-products-menu nav flex-column" role="tablist">
                    <?php $i=1; foreach($brandname as $brand){?>
                        <a href="#<?=$brand?>" <?=($i==1?'class="active"':'')?> data-toggle="tab">
                            <span style="text-transform:uppercase;"><?=$brand?></span>
                        </a>
                    <?php $i++; if($i==7){break;} }?>
                  
						
				
                    </div>
                </div>
            </div>
            <!-- End Special Product Tab Menu -->

            <!-- Start Special Product Tab Content -->
            <div class="col-md-9 mt-5 mt-md-0">
                <div class="tab-content" id="specialProducts">
                    <!-- Single Tab Content Start -->
                    <?php $j=1; foreach($brandname as $brand){?>    
                    <div class="tab-pane fade <?=($j==1?'class="show active"':'')?> " id="<?=$brand?>" role="tabpanel">
                        <div class="products-wrapper product-grid-view">
                            
                        <div class="col-lg-3 col-sm-6" >
                                
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
                                               
                                                <a href="#" class="btn btn-brand btn-quickView" data-toggle="modal"
                                                   data-target="#quickViewModal<?=$items['ItemId']?>">Quick View</a>
                                            </figcaption>
                                        </figure>

                                        <!-- Product Details -->
                                        <div class="product-details">
                                            <a href="#" class="product-cat-name"><?=$items['Type']?></a>
                                            <h2 class="product-name"><a href="<?=base_url()?>Products/<?=$items['ItemId']?>"><?=$items['ProductName']?></a></h2>
                                            <div class="product-prices">
                                                
                                                <span class="price">$ <?=$items['WholesalePriceUSD']?></span>
                                            </div>

                                            
                                        </div>
                                    </div>
                                      
                                </div>

                        </div>
                    </div>
                    <?php $j++; if($j==7){break;} }?>

                    <!-- Single Tab Content End -->                   
                </div>
            </div>
            <!-- End Special Product Tab Content -->                



        </div>
    </div>
</section>
<!-- End Special Offers Product -->
