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
                        <li><a href="<?=base_url()?>">Home</a></li>
                       <li><a href="javascript:void(0)"  class="current">Product</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Page Breadcrumb End -->
        </div>
    </div>
</div>
<!--== End Page Header ==-->


<!--== Start Shop Page Wrapper ==-->
<div id="shop-page-wrapper">
    <div class="container" style="max-width:1260px;">
	
        <div class="row">
		<div class="shop-page-products-wrap" style="margin-bottom:50px;" >
            <div class="products-wrapper product-list-view">
                <div class="row">
                    <!-- Single Product Start -->
                    <div class="col-lg-4 col-sm-6">
                        <div class="single-product-item">
                            <!-- Product Thumbnail -->
                            <figure class="product-thumbnail">
                                <a href="#" class="d-block">
                                    <img class="primary-thumb" src="<?=$SmallImageUrl?>"
                                         alt="Product"/>
                                    <img class="secondary-thumb" src="<?=$SmallImageUrl?>"
                                         alt="Product"/>
                                </a>
                                
                            </figure>

                            <!-- Product Details -->
                            <div class="product-details">
                                <h2 class="product-name" style="margin-bottom:5px;"><?=$ProductName?></h2>
                                By   <a href="<?=base_url()?>Brand/<?=(str_replace(" ","-",$BrandName))?>" class="product-cat-name"><?=$BrandName?></a> For <?=$Gender?>
                                <p class="product-desc"><?=$Description?></p>
                            </div>
                        </div>
                    </div>
                    <!-- Single Product End -->

                    
                </div>
            </div>
        </div>
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
<style type="text/css">
    .img-responsive{
        height: 150px;
    }
    .sepera
    {
        padding: 10px;
        text-align: center;

    }
    .single-product-item{
        border-bottom:2px solid #dfdfdf;
    }

</style>
        <!-- Start Shop Page Content -->
        <div class="col-lg-9 order-first order-lg-last">
            <div class="shop-page-content-wrap">
             
                <div class="shop-page-products-wrap">
                    <div class="products-wrapper product-list-view">
                        <div class="row">
                            <!-- Single Product Start -->
                            <?php foreach($similar as $items){?>



                                <div class="col-lg-6 col-sm-6" >

                                    <div class="single-product-item">
                                    <!-- Product Thumbnail -->
                                        <img class="img-responsive" src="<?=$items['SmallImageUrl']?>" alt="<?=$items['ProductName']?>"/>

                                        <!-- Product Details -->
                                        <div class="product-details ">
                                            <a href="#" class="product-cat-name">Item #<?=$items['ItemId']?>  </a>
                                            <h2 class="product-name"><a href="#"><?=$items['MetricSize']?> <?=$items['Type']?></a></h2>
                                            <h2 class="text-success"><?=($items['Instock']?'Instock':'')?></h2>
                                            <h2 class="text-danger"><?=($items['Instock']?'':'Outstock')?></h2>
                                             <p class="product-desc"><?=$items['Description']?></p>
                                         </div>
                                            <div class="sepera align-items-right">
                                                <h2 > $ <?=number_format($items['WholesalePriceUSD'],2)?></h2>
                                                <form method="post" action="<?=base_url()?>Shop/AddToCart">
                                                    <div class="product-quantity align-items-center" style="padding: 10px">
                                                        <div class="pro-quantity">
                                                            <input type="hidden" name="ItemId" value="<?=$items['ItemId']?>">
                                                            <div class="pro-qty">
                                                                <input type="text" name="Quantity" min="1" max="<?=$items['QuantityAvailable']?>" value="1" />
                                                            </div>
                                                        </div>

                                                       <div class="form-group" style="padding: 10px">
                                                            <button type="submit" class="btn btn-transparent btn-semi-round"><i
                                                                class="fa fa-shopping-cart"></i> Add to Cart</button>
                                                       </div>
                                                    </div>
                                                </form>
                                            </div>
                                           

                                        
                                    </div>
                                </div>
                            <?php }?>
                            <!-- Single Product End -->


          
                        </div>
                    </div>
                </div>

                <!-- Start Products Content Wrapper -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="products-wrapper">
                            <div class="feature-product-carousel">
                                <?php foreach($similarname as $items){?>
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

                <div class="row">
                        <div class="col-lg-12">
                            <!-- Product Full Description Start -->
                            <div class="product-full-info-reviews">
                                    <div class="" id="reviews">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="product-ratting-wrap">
                                                    <div class="pro-avg-ratting">
                                                        <h4>Reviewed by 663 customers </h4>
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
                                                                </div>
                                                            </div>
                                                            <p>enim ipsam voluptatem quia voluptas sit aspernatur aut
                                                                odit aut fugit, sed quia res eos qui ratione voluptatem
                                                                sequi Neque porro quisquam est, qui dolorem ipsum quia
                                                                dolor sit amet, consectetur, adipisci veli</p>
															 <span style="color:grey;">Submitted 4/22/2021</span>

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
                            <!-- Product Full Description End -->
                        </div>
                </div>
            </div>
        </div>
        <!-- End Shop Page Content -->
        </div>
    </div>
</div>
<!--== End Shop Page Wrapper ==-->
