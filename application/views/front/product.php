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
<style type="text/css">
  .row .modified{
      margin-top: 50px;
    margin-bottom: 50px;
    width: 100%;
  }
</style>
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
                                <h2><?=$MetricSize?> <?=$ProductName?></h2>


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

                        <div class="row modified" > 
                            <?php $response =$this->mongo_db2->where(['ProductName'=>$ProductName,'Type'=>$Type])->get('products');?>
                                
                                        <?php $i=1; foreach($response as $items){?>
                                            <!-- Single Product Start -->
                                          
                                             <div class="col-lg-3 col-sm-6" >
                                
                                                <div class="single-product-item">
                                                    <!-- Product Thumbnail -->
                                                    <figure class="product-thumbnail">
                                                        <a href="<?=base_url()?>Products/<?=$items['ItemId']?>/<?=$items['ProductName']?>" class="d-block">
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
                                                        <h2 class="product-name"><a href="<?=base_url()?>Products/<?=$items['ItemId']?>/<?=$items['ProductName']?>"><?=$items['MetricSize']?> <?=$items['ProductName']?></a></h2>
                                                        <div class="product-prices">
                                                            
                                                            <span class="price">$ <?=$items['WholesalePriceUSD']?></span>
                                                        </div>

                                                        
                                                    </div>
                                                </div>
                                      
                                            </div>
                                            <!--== Start Quick View Content ==-->
                                    <div class="modal" id="quickViewModal<?=$items['ItemId']?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><img src="<?=base_url()?>resources/assets/img/icons/cancel.png" alt="Close" class="img-fluid"/></span>
                                            </button>
                                            <div class="modal-body">
                                                <div class="single-product-page-content">
                                                    <div class="row">
                                                        <!-- Product Thumbnail Area Start -->
                                                        <div class="col-lg-5">
                                                            <div class="product-thumbnail-wrap">
                                                                <div class="product-image-carousel">
                                                                    <div class="single-image-item">
                                                                        <img class="img-fluid" src="<?=$items['LargeImageUrl']?>"
                                                                            alt="Product"/>
                                                                    </div>

                                                                   
                                                                </div>

                                                               
                                                            </div>
                                                        </div>
                                                        <!-- Product Thumbnail Area End -->

                                                        <!-- Product Details Area Start -->
                                                        <div class="col-lg-7">
                                                            <div class="product-details">
                                                                <h2><?=$items['ProductName']?></h2>

                                                               
                                                                <div class="price-group">
                                                                    <span class="price">$ <?=$items['WholesalePriceUSD']?></span>
                                                                   
                                                                </div>

                                                                <div class="product-info-stock-sku">
                                                                    <span class="product-stock-status text-success"><?=($items['Instock']?"In Stock":'')?></span>
                                                                    <span class="product-stock-status text-danger"><?=($items['Instock']?"":'Out Stock')?></span>
                                                                    <span class="product-sku-status"><strong>SKU</strong> PERFUME<?=$items['ItemId']?></span>
                                                                </div>

                                                                <p class="product-desc"><?=$items['Description']?></p>

                                                                <div class="shopping-option">
                                                                    

                                                                
                                                                </div>

                                                                <form method="post" action="<?=base_url()?>Shop/AddToCart">
                                                                    <div class="product-quantity d-sm-flex align-items-center">
                                                                        <div class="pro-quantity">
                                                                            <input type="hidden" name="ItemId" value="<?=$items['ItemId']?>">
                                                                            <div class="pro-qty">
                                                                                <input type="text" name="Quantity" min="1" value="1" />
                                                                            </div>
                                                                        </div>

                                                                        <button type="submit" class="btn btn-transparent btn-semi-round"><i
                                                                                class="fa fa-shopping-cart"></i> Add to Cart</button>
                                                                    </div>
                                                                </form>
                                                                <div class="product-share-area">
                                                                    <h3>Share This Product:</h3>
                                                                    <div class="share-btn">
                                                                         <a href="#"><i class="fa fa-facebook"></i></a>
                                                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Product Details Area End -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                            </div>
                                       
                                            <!-- Single Product End -->
                                        <?php $i++;if($i==1000){break;}}?>
                  
                        </div>  


                        <div class="container">
                                 <h2 style="font-size: 33px;text-align: center; padding: 15px">Similar Products</h2>
                                <!-- Start Section Title Area -->
                               
                                <!-- End Section Title Area -->

                                <!-- Start Products Content Wrapper -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="products-wrapper">
                                            <div class="feature-product-carousel">
                                                <?php 
                                                    $bestsell =$this->mongo_db2->where(['ProductName'=>$ProductName])->get('products');
                                                    rsort($bestsell);
                                                    ?>
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
                                                                                <figcaption class="product-hvr-content">
                                                                                   
                                                                                    <a href="#" class="btn btn-brand btn-quickView" data-toggle="modal"
                                                                                       data-target="#quickViewModal<?=$items['ItemId']?>">Quick View</a>
                                                                                </figcaption>
                                                                            </figure>

                                                                            <!-- Product Details -->
                                                                            <div class="product-details">
                                                                                <a href="#" class="product-cat-name"><?=$items['Type']?></a>
                                                                                <h2 class="product-name"><a href="<?=base_url()?>Products/<?=$items['ItemId']?>/<?=$items['ProductName']?>"><?=$items['ProductName']?></a></h2>
                                                                                <div class="product-prices">
                                                                                    
                                                                                    <span class="price">$ <?=$items['WholesalePriceUSD']?></span>
                                                                                </div>

                                                                                
                                                                            </div>
                                                </div>
                                                
                                                <!-- End Single Product -->
                                                <?php }?>    
                                              
                                            </div>
                                        </div>
                                            <?php foreach($bestsell as $items){?>
                                            <div class="modal" id="quickViewModal<?=$items['ItemId']?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true"><img src="<?=base_url()?>resources/assets/img/icons/cancel.png" alt="Close" class="img-fluid"/></span>
                                                            </button>
                                                            <div class="modal-body">
                                                                <div class="single-product-page-content">
                                                                    <div class="row">
                                                                        <!-- Product Thumbnail Area Start -->
                                                                        <div class="col-lg-5">
                                                                            <div class="product-thumbnail-wrap">
                                                                                <div class="product-image-carousel">
                                                                                    <div class="single-image-item">
                                                                                        <img class="img-fluid" src="<?=$items['LargeImageUrl']?>"
                                                                                            alt="Product"/>
                                                                                    </div>

                                                                                   
                                                                                </div>

                                                                               
                                                                            </div>
                                                                        </div>
                                                                        <!-- Product Thumbnail Area End -->

                                                                        <!-- Product Details Area Start -->
                                                                        <div class="col-lg-7">
                                                                            <div class="product-details">
                                                                                <h2><?=$items['ProductName']?></h2>

                                                                               
                                                                                <div class="price-group">
                                                                                    <span class="price">$ <?=$items['WholesalePriceUSD']?></span>
                                                                                   
                                                                                </div>

                                                                                <div class="product-info-stock-sku">
                                                                                    <span class="product-stock-status text-success"><?=($items['Instock']?"In Stock":'')?></span>
                                                                                    <span class="product-stock-status text-danger"><?=($items['Instock']?"":'Out Stock')?></span>
                                                                                    <span class="product-sku-status"><strong>SKU</strong> PERFUME<?=$items['ItemId']?></span>
                                                                                </div>

                                                                                <p class="product-desc"><?=$items['Description']?></p>

                                                                                <div class="shopping-option">
                                                                                    

                                                                                
                                                                                </div>

                                                                                <form method="post" action="<?=base_url()?>Shop/AddToCart">
                                                                                    <div class="product-quantity d-sm-flex align-items-center">
                                                                                        <div class="pro-quantity">
                                                                                            <input type="hidden" name="ItemId" value="<?=$items['ItemId']?>">
                                                                                            <div class="pro-qty">
                                                                                                <input type="text" name="Quantity" min="1" value="1" />
                                                                                            </div>
                                                                                        </div>

                                                                                        <button type="submit" class="btn btn-transparent btn-semi-round"><i
                                                                                                class="fa fa-shopping-cart"></i> Add to Cart</button>
                                                                                    </div>
                                                                                </form>
                                                                                <div class="product-share-area">
                                                                                    <h3>Share This Product:</h3>
                                                                                    <div class="share-btn">
                                                                                         <a href="#"><i class="fa fa-facebook"></i></a>
                                                                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                                                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- Product Details Area End -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                             <?php }?>     
                                    </div>
                                </div>
                                <!-- End Products Content Wrapper -->
                        </div>              

                    </div>


                    <!-- Review Section -->
                        
                        <div class="row">
                        <div class="col-lg-12">
                            <!-- Product Full Description Start -->
                            <div class="product-full-info-reviews">
                                <!-- Single Product tab Menu -->
                                <nav class="nav" id="nav-tab">
                                    <a class="active" id="description-tab" data-toggle="tab" href="#description">Description</a>
                                    <a id="reviews-tab" data-toggle="tab" href="#reviews">Reviews</a>
                                </nav>
                                <!-- Single Product tab Menu -->

                                <!-- Single Product tab Content -->
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="description">
                                        <p>Stay comfortable and stay in the race no matter what the weather's up to. The
                                            Bruno Compete Hoodie's water-repellent exterior shields you from the
                                            elements, while advanced fabric technology inside wicks moisture to keep you
                                            dry.Stay comfortable and stay in the race no matter what the weather's up
                                            to. The Bruno Compete Hoodie's water-repellent exterior shields you from the
                                            elements, while advanced fabric technology inside wicks moisture to keep you
                                            dry.Stay comfortable and stay in the race no matter what the weather's up
                                            to. The Bruno Compete Hoodie's water-repellent exterior shields you from the
                                            elements, while advanced fabric technology inside wicks moisture to keep you
                                            dry.</p>

                                        <ul>
                                            <li>Adipisicing elitEnim, laborum.</li>
                                            <li>Lorem ipsum dolor sit</li>
                                            <li>Dolorem molestiae quod voluptatem! Sint.</li>
                                            <li>Iure obcaecati odio pariatur quae saepe!</li>
                                        </ul>
                                    </div>

                                    <div class="tab-pane fade" id="reviews">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="product-ratting-wrap">
                                                    <div class="pro-avg-ratting">
                                                        <h4>4.5 <span>(Overall)</span></h4>
                                                        <span>Based on 9 Comments</span>
                                                    </div>
                                                    <div class="ratting-list">
                                                        <div class="sin-list float-left">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <span>(5)</span>
                                                        </div>
                                                        <div class="sin-list float-left">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <span>(3)</span>
                                                        </div>
                                                        <div class="sin-list float-left">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <span>(1)</span>
                                                        </div>
                                                        <div class="sin-list float-left">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <span>(0)</span>
                                                        </div>
                                                    </div>
                                                    <div class="rattings-wrapper">

                                                        <div class="sin-rattings">
                                                            <div class="ratting-author">
                                                                <h3>Cristopher Lee</h3>
                                                                <div class="ratting-star">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <span>(5)</span>
                                                                </div>
                                                            </div>
                                                            <p>enim ipsam voluptatem quia voluptas sit aspernatur aut
                                                                odit aut fugit, sed quia res eos qui ratione voluptatem
                                                                sequi Neque porro quisquam est, qui dolorem ipsum quia
                                                                dolor sit amet, consectetur, adipisci veli</p>
                                                        </div>

                                                        <div class="sin-rattings">
                                                            <div class="ratting-author">
                                                                <h3>Nirob Khan</h3>
                                                                <div class="ratting-star">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <span>(5)</span>
                                                                </div>
                                                            </div>
                                                            <p>enim ipsam voluptatem quia voluptas sit aspernatur aut
                                                                odit aut fugit, sed quia res eos qui ratione voluptatem
                                                                sequi Neque porro quisquam est, qui dolorem ipsum quia
                                                                dolor sit amet, consectetur, adipisci veli</p>
                                                        </div>

                                                        <div class="sin-rattings">
                                                            <div class="ratting-author">
                                                                <h3>MD.ZENAUL ISLAM</h3>
                                                                <div class="ratting-star">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <span>(5)</span>
                                                                </div>
                                                            </div>
                                                            <p>enim ipsam voluptatem quia voluptas sit aspernatur aut
                                                                odit aut fugit, sed quia res eos qui ratione voluptatem
                                                                sequi Neque porro quisquam est, qui dolorem ipsum quia
                                                                dolor sit amet, consectetur, adipisci veli</p>
                                                        </div>

                                                    </div>
                                                    <div class="ratting-form-wrapper">
                                                        <h3>Add your Comments</h3>
                                                        <form action="#" method="post">
                                                            <div class="ratting-form row">
                                                                <div class="col-12 mb-4">
                                                                    <h5>Rating:</h5>
                                                                    <div class="ratting-star fix">
                                                                        <i class="fa fa-star-o"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12 mb-4">
                                                                    <label for="name">Name:</label>
                                                                    <input id="name" placeholder="Name" type="text">
                                                                </div>
                                                                <div class="col-md-6 col-12 mb-4">
                                                                    <label for="email">Email:</label>
                                                                    <input id="email" placeholder="Email" type="text">
                                                                </div>
                                                                <div class="col-12 mb-4">
                                                                    <label for="your-review">Your Review:</label>
                                                                    <textarea name="review" id="your-review"
                                                                              placeholder="Write a review"></textarea>
                                                                </div>
                                                                <div class="col-12">
                                                                    <input value="add review" type="submit">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Product tab Content -->
                            </div>
                            <!-- Product Full Description End -->
                        </div>
                    </div>                    

                    <!-- Review Section -->


                </div>
            </div>
            <!-- Single Product Page Content End -->
        </div>
    </div>
</div>


<!--== End Single Product Wrapper ==