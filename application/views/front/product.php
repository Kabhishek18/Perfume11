<!--== Start Page Header ==-->
<div id="page-header-wrapper">
    <div class="container">
        <div class="row">
            <!-- Page Title Area Start -->
            <div class="col-6">
                <div class="page-title-wrap">
                    <h1><?=$ProductName?></h1>
                </div>
            </div>
            <!-- Page Title Area End -->

            <!-- Page Breadcrumb Start -->
            <div class="col-6 m-auto">
                <nav class="page-breadcrumb-wrap">
                    <ul class="nav justify-content-end">
                        <li><a href="javascript:void(0)">Home</a></li>
                        <li><a href="javascript:void(0)"  class="current">Product</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Page Breadcrumb End -->
        </div>
    </div>
</div>
<!--== End Page Header ==-->

<!--== Start Single Product Wrapper ==-->
<div id="single-product-page-wrapper" class="page-padding">
    <div class="container">
        <div class="row">
            <!-- Single Product Page Content Start -->
            <div class="col-lg-12">
                <div class="single-product-page-content">
                    <div class="row">
                        <!-- Product Thumbnail Area Start -->
                        <div class="col-lg-5">
                            <div class="product-thumbnail-wrap">
                                <div class="product-image-carousel">
                                    <div class="single-image-item">
                                        <img class="img-fluid" src="<?=$LargeImageUrl?>"
                                             alt="Product"/>
                                    </div>

                                    
                                </div>

                            </div>
                        </div>
                        <!-- Product Thumbnail Area End -->

                        <!-- Product Details Area Start -->
                        <div class="col-lg-7">
                            <div class="product-details">
                                <h2><?=$ProductName?></h2>


                                <div class="price-group">
                                    <span class="price">$ <?=$WholesalePriceUSD?></span>
                                </div>

                                <div class="product-info-stock-sku">
                                
                                    <span class="product-stock-status text-success"><?=($Instock?'In Stock':'')?></span>

                                    <span class="product-stock-status text-danger"><?=($Instock?'':'Out Stock')?></span>
                                    <span class="product-sku-status"><strong>SKU</strong> PERFUME<?=$ItemId?></span>
                                </div>

                                <p class="product-desc" style="text-align:justify;">
                                    <?=$Description?>
                                </p>

                                
                                <form method="post" action="<?=base_url()?>Shop/AddToCart">
                                        <div class="product-quantity d-sm-flex align-items-center">
                                            <div class="pro-quantity">
                                                <input type="hidden" name="ItemId" value="<?=$ItemId?>">
                                                <div class="pro-qty">
                                                    <input type="text" name="Quantity" min="1" value="1" />
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-transparent btn-semi-round"><i
                                                    class="fa fa-shopping-cart"></i> Add to Cart</button>
                                        </div>
                                </form>
                                <!-- Product Share -->
                                <div class="product-share-area">
                                    <h3>Share This Product:</h3>
                                    <div class="share-btn">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                        <a href="#"><i class="fa fa-reddit"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product Details Area End -->
                    </div>

                </div>
            </div>
            <!-- Single Product Page Content End -->
        </div>
    </div>
</div>
<!--== End Single Product Wrapper ==-->