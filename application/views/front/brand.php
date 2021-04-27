
<!--== Start Page Header ==-->
<div id="page-header-wrapper">
    <div class="container">
        <div class="row">
            <!-- Page Title Area Start -->
            <div class="col-6">
                <div class="page-title-wrap">
                    <h1><?=(!empty($brandname)?$brandname:'ALL Brand')?></h1>
                </div>
            </div>
            <!-- Page Title Area End -->

            <!-- Page Breadcrumb Start -->
            <div class="col-6 m-auto">
                <nav class="page-breadcrumb-wrap">
                    <ul class="nav justify-content-end">
                        <li><a href="<?=base_url()?>">Home</a></li>
                        <li><a href="<?=base_url()?>Brand" class="current">Brand</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Page Breadcrumb End -->
        </div>
    </div>
</div>
<!--== End Page Header ==-->
<?php if(!empty($brandname)){?>

<!--== Start Shop Page Wrapper ==-->
<div id="shop-page-wrapper" class="page-padding">
    <div class="container">
        <div class="row">
             <!-- Sidebar Area Start -->
            <div class="col-lg-3">
                <div id="sidebar-area-wrap">
                    <!-- Single Sidebar Item Start -->
                    <?php $sidenavbrand =$this->home_model->GetAllProductLimit(15,'BrandName')?>
                    <div class="single-sidebar-wrap">
                        <h2 class="sidebar-title">Fragrances by Brand</h2>
                        <div class="sidebar-body">
                            <ul class="sidebar-list">
                                <?php $s =1; foreach($sidenavbrand as $brand){?>
                                <li><a href="<?=base_url()?>Brand/<?=(urlencode($brand['BrandName']))?>"><?=$brand['BrandName']?></a></li>
                                <?php $s++;if($s==15){break;}}?>  
                                  <li><a href="<?=base_url()?>Brand"><strong>See More+</strong></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Sidebar Item End -->
                    <?php $sidenavtype =$this->home_model->GetAllProductLimit(15,'Type'); ?>                
                    <!-- Single Sidebar Item Start -->
                    <div class="single-sidebar-wrap">
                        <h2 class="sidebar-title">Fragrances by Type</h2>
                        <div class="sidebar-body">
                            <ul class="sidebar-list">
                                <?php $s=1; foreach($sidenavtype as $snt){?>
                                <li><a href="<?=base_url()?>Type/<?=(urlencode($snt['Type']))?>"><?=$snt['Type']?></a></li>
                                <?php $s++;if($s==15){break;}}?>  

                            </ul>
                        </div>
                    </div>
                    <!-- Single Sidebar Item End -->

                 
                   
                </div>
            </div>
            <!-- Sidebar Area End -->
            <!-- Start Shop Page Content -->
            <div class="col-lg-9 order-first order-lg-last">
                <div class="shop-page-content-wrap">
                    <div class="products-settings-option d-block d-md-flex">
                        <div class="product-cong-left d-flex align-items-center">
                            <ul class="product-view d-flex align-items-center">
                                <li data-target="grid-view"><i class="fa fa-th"></i></li>
                                <li class="current" data-target="product-list-view"><i class="fa fa-list-ul"></i></li>
                            </ul>
                            <span class="show-items">Total Items :<strong> <?=count($datalist)?></strong></span>
                        </div>
                    </div>

                    <div class="shop-page-products-wrap">
                        <div class="products-wrapper product-grid-view physicianList">

                        <input type='hidden' id='current_page' />
                            <input type='hidden' id='show_per_page' />
                            <div class="row" id="pagingBox">

                               <?php $i=1; foreach($datalist as $items){?>
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
                                            <h2 class="product-name"><a href="<?=base_url()?>Products/<?=$items['ItemId']?>/<?=$items['ProductName']?>"><?=$items['ProductName']?></a></h2>
                                            <div class="product-prices">
                                                
                                                <span class="price">$ <?=number_format($items['WholesalePriceUSD'],2)?></span>
                                            </div>
                                            <p class="product-desc"><?=$items['Description']?></p>
                                            
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
                                                                    <span class="price">$ <?=number_format($items['WholesalePriceUSD'],2)?></span>
                                                                   
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
                                <!--== End Quick View Content ==-->
                                <!-- Single Product End -->
                                <?php $i++;if($i==3000){break;}}?>
                             
                            </div>
                        </div>
                    </div>
                 
                </div>
            </div>
            <!-- End Shop Page Content -->
        </div>
    </div>
</div>



<!--== End Shop Page Wrapper ==-->


<?php }else{?>
<style type="text/css">
    .top-bar{
        border-top: 4px solid #bdb093;
        padding-top:10px;
        padding-bottom:10px;
        text-align: center;
    }
    .box 
    {
        background: white;
        border: 2px solid #bdb093;
        box-shadow: 1px 2px 3px solid #bdb093;
    }

    .boxed{

        border:1px solid #bdb093;
        padding: 5px;
    }
    .boxed:hover{
        background: #bdb093;
        color: white;
    }
    .text-default{
        color: #bdb093;
        font-size: 15px;
    }
    .text-default:hover{
       color: #212529;
        outline: none;
        text-decoration: none;
    }
    .pb-50{
        padding-bottom: 50;
    }
</style>
    <div id="shop-page-wrapper" class="page-padding">
    <div class="container">
        <div class="row"> 
           <div class="col-md-3 top-bar">
                <h2>All Brands By Letter</h2>
                <div class="row box">
                    <?php $range  =range('A','Z');
                foreach($range as $item){?>
               
                 <div class="col-md-3 boxed ">
                      <span> <a class="btn"><?=$item?></a></span>
                 </div>
            <?php } ?>
                 <div class="col-md-3 boxed ">
                      <span> <a class="btn">All</a></span>
                 </div>
                </div>
           </div>
           <div class="col-md-9">
                <div class="container">
                    <div class="text-title pb-50">
                          <h2>Perfume & Cologne > All </h2>
                    </div>
                </div>
               <div class="row">
                            
                        <?php 
                        $bodybrand = $this->home_model->GetAllProductLimit(0,'BrandName');?>   
                        <?php foreach($bodybrand as $items){?>
                            <div class="col-md-3">
                            <div class= "card">
                                <div class="card-body">
                                   <h3> 
                                    <a class="text-default" href="<?=base_url()?>Brand/<?=(urlencode($items['BrandName']))?>"><?=$items['BrandName']?></a>
                                    </h3>
                                </div>
                            </div>
                            </div>
                        <?php }?>
               </div>
           </div>
                 
        </div>
    </div>    
<div>    
<?php }?>


