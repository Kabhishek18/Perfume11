
<!--== Start Slider Area ==-->
<section id="slider-area-wrap">
    <div class="slider-carousel-wrap">
        <!-- Start Single Slide Item -->
        <a href="<?=base_url()?>Brand"><div class="single-slide-wrap slideBg7"></div></a>
        <!-- End Single Slide Item -->

        <!-- Start Single Slide Item -->
        <a href="<?=base_url()?>Women">
        <div class="single-slide-wrap slideBg8"></div></a>
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
<style type="text/css">
    .col-lg-2 .pt{
    color: #337ab7;
    text-decoration: none;
    line-height: 28px;
    text-transform: uppercase;
    }
</style>
<!--== Start Best Sellers Product Area ==-->
<section class="products-area-wrapper">

    <div class="container">
        <!-- Start Section Title Area -->
        <div class="row">
            <div class="col-lg-12 m-auto text-center">
                <div class="section-title-wrap">
                    <h2>BEST SELLING FRAGRANCES</h2>
                    <p>Browse the collection of our best selling and top interesting products. You’ll definitely find
                        what you are looking for.</p>
                        <br />
                    <div class="row">
                        
                        <div class="col-lg-6" style="border-right: 1px solid;font-size: 25px;font-weight: 700;">
                            <a href="<?=base_url()?>Men" style="color:#a08d64;"> <i class="fa fa-mars"></i>  MEN’S COLOGNE</a>
                        </div>
                        <div class="col-lg-6" style="border-left: 1px solid;font-size: 25px;font-weight: 700;">
                            <a href="<?=base_url()?>Women" style="color:#a08d64;"> <i class="fa fa-venus"></i> WOMEN’S PERFUME</a>
                        </div>
                        
                    </div>
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
                                            <a href="<?=base_url()?>Products/<?=$items['ItemId']?>/<?=$items['ProductName']?>" class="d-block">
                                                <img class="primary-thumb" src="<?=$items['SmallImageUrl']?>"
                                                     alt="Product"/>
                                                <img class="secondary-thumb" src="<?=$items['SmallImageUrl']?>"
                                                     alt="Product"/>
                                            </a>
                                         
                            </figure>

                            <!-- Product Details -->
                            <div class="product-details">
                                    <h2 class="product-name"><a href="<?=base_url()?>Products/<?=$items['ItemId']?>/<?=$items['ProductName']?>">
                                        <?=$items['ProductName']?></a>
                                    </h2>
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
                        
                        <?php $i=1; foreach($brandname as $item){?>
                            <a href="#brand-<?=$i?>" class="<?=($i==1?'active':'')?>" data-toggle="tab">
                                <span style="text-transform:uppercase;"><?=$item['BrandName']?></span>
                            </a>
                        <?php $i++; }?>
                    </div>
                </div>
            </div>
            <!-- End Special Product Tab Menu -->

            <!-- Start Special Product Tab Content -->
            <div class="col-md-9 mt-5 mt-md-0">
                <div class="tab-content" id="specialProducts">
                    <!-- Single Tab Content Start -->
                    <?php $i=1; foreach($brandname as $item){?>
                    <div class="tab-pane fade <?=($i==1?'show active':'')?> " id="brand-<?=$i?>" role="tabpanel">
                        <div class="products-wrapper">
                            <div class="special-product-carousel">
                                <!-- Start Single Product -->

                                <?php $products = $this->home_model->GetByBrand(10,$item['BrandName']);?>
                                <?php foreach($products as $product){ ?>
                                <div class="single-product-item">
                                    <!-- Product Thumbnail -->
                                    <figure class="product-thumbnail">
                                        <a href="<?=base_url()?>Products/<?=$product['ItemId']?>/<?=$product['ProductName']?>" class="d-block">
                                            <img class="primary-thumb" src="<?=$product['SmallImageUrl']?>"
                                                 alt="Product<?=$product['ItemId']?>"/>
                                            <img class="secondary-thumb" src="<?=$product['SmallImageUrl']?>"
                                                 alt="Product<?=$product['ItemId']?>"/>
                                            
                                        </a>
                                    </figure>

                                    <!-- Product Details -->
                                    <div class="product-details">
                                        <a href="javascript:void(0)" class="product-cat-name"><?=$product['Type']?></a>
                                        <h2 class="product-name"><a href="<?=base_url()?>Products/<?=$product['ItemId']?>/<?=$product['ProductName']?>"><?=$product['ProductName']?></a></h2>
                                      
                                    </div>
                                </div>
                                <!-- End Single Product -->
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->
                    <?php $i++; }?>
        

                </div>
            </div>
            <!-- End Special Product Tab Content -->
        </div>
    </div>
</section>
<!-- End Special Offers Product -->

