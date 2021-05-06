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
<style type="text/css">
    .star-rating {
        direction: rtl;
        display: inline-block;
        padding: 20px
    }

    .star-rating input[type=radio] {
        display: none
    }

    .star-rating label {
        color: #bbb;
        font-size: 18px;
        padding: 0;
        cursor: pointer;
        -webkit-transition: all .3s ease-in-out;
        transition: all .3s ease-in-out
    }

    .star-rating label:hover,
    .star-rating label:hover ~ label,
    .star-rating input[type=radio]:checked ~ label {
        color: #f2b600
    }
    .zoom:hover {
      transform: scale(1.5); 
      cursor: zoom-in;
      box-shadow: 1px 2px 3px #000;
      border-radius: 5px;
    }
</style>

<!--== Start Shop Page Wrapper ==-->
<div id="shop-page-wrapper">
    <div class="container" style="max-width:1260px;">
	
        <div class="row ">
                    <div class="col-lg-12 col-sm-6 " style="margin-bottom: 50px;font-size: 14px">
                        <div class="single-product-item d-flex justify-content-start">
                            <!-- Product Thumbnail -->
                              <img  src="<?=$SmallImageUrl?>" alt="<?=$ProductName?>"/>

                            <!-- Product Details -->
                            <div class="product-details" style="padding:10px;margin-bottom: 50px;font-size: 16px">
                                <h2 class="product-name" style="margin-bottom:5px;"><?=$ProductName?></h2>
                                By   <a href="<?=base_url()?>Brand/<?=(urlencode($BrandName))?>" class="product-cat-name"><u><?=$BrandName?></u></a> For <?=$Gender?>

                               <div style="font-size: 16px">
                                <p style="margin-top:5px;"><?=$Description?></p>
                                <p style="margin-top:5px;"><?=$Description?></p>
                               </div>
                            </div>
                        </div>
                    </div>
        <!-- Sidebar Area Start -->
           <div class="col-lg-3 col-md-3 .d-none .d-sm-block ">
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
     .star-rating {
        direction: rtl;
        display: inline-block;
        padding: 20px
    }

    .star-rating input[type=radio] {
        display: none
    }

    .star-rating label {
        color: #bbb;
        font-size: 18px;
        padding: 0;
        cursor: pointer;
        -webkit-transition: all .3s ease-in-out;
        transition: all .3s ease-in-out
    }

    .star-rating label:hover,
    .star-rating label:hover ~ label,
    .star-rating input[type=radio]:checked ~ label {
        color: #f2b600
    }
</style>
        <!-- Start Shop Page Content -->
        <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="shop-page-content-wrap">
             
                <div class="shop-page-products-wrap">
                    <div class="products-wrapper product-list-view">
                        <div class="row">
                            <!-- Single Product Start -->
                            <?php foreach($similar as $items){?>


                                <?php if(number_format($items['WholesalePriceUSD'],2)>1){ ?>
                                <div class="col-lg-6 col-sm-6" >

                                    <div class="d-flex justify-content-between" style="margin-top:20px;border-bottom: 2px solid #f0e3c5">
                                    <!-- Product Thumbnail -->
                                        <div class="d-flex justify-content-start">
                                            <img class="img-responsive zoom" src="<?=$items['SmallImageUrl']?>" alt="<?=$items['ProductName']?>"/>

                                            <!-- Product Details -->
                                            <div class="align-items-left" style="padding: 20px">
                                                <a href="#" class="product-cat-name" style="color: #bdb093;">Item #<?=$items['ItemId']?>  </a>
                                                <h2 class="product-name"><a href="#" style="color: #444444;"><b><?=$items['MetricSize']?> <?=$items['Type']?></b></a></h2>
                                                <a href="#" class="product-cat-name" style="color: #bdb093;"><?=$items['BrandName']?> For <?=$items['Gender']?>  </a>
                                                <h2 class="text-success"><?=($items['Instock']?'Instock':'')?></h2>
                                                
                                                <h3 class="text-danger"><?=($items['QuantityAvailable']>20?'':'Hurry '.$items['QuantityAvailable'].' Stock Available !!')?></h3>
                                                
                                             </div>
                                        </div>     
                                            <div class="sepera align-items-right">
                                                <h2 > $ <?=number_format($items['WholesalePriceUSD'],2)?></h2>
                                                <form method="post" action="<?=base_url()?>Shop/AddToCart">
                                                    <div class="product-quantity align-items-center" style="padding: 10px;">
                                                        <div class="pro-quantity">
                                                            <input type="hidden" name="ItemId" value="<?=$items['ItemId']?>">
                                                            <div class="pro-qty">
                                                                <input type="text" name="Quantity" min="1" max="<?=$items['QuantityAvailable']?>" value="1" />
                                                            </div>
                                                        </div>

                                                       <div class="form-group" style="padding: 10px">
                                                            <button type="submit" class="btn btn-brand btn-semi-round"><i
                                                                class="fa fa-shopping-cart"></i> Add to Cart</button>
                                                       </div>
                                                    </div>
                                                </form>
                                            </div>
                                           

                                        
                                    </div>
                                </div>
                            <?php }}?>
                            <!-- Single Product End -->


          
                        </div>
                    </div>
                </div>

                <!-- Start Products Content Wrapper -->
                <h2 style="margin-top: 50px;font-size: 30px;">Similar Product</h2><br>
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="products-wrapper">
                            <div class="feature-product-carousel" style="margin-top: 50px;">

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
                                    <div class="product-details" style="    padding-top: 10px;   padding-bottom: 20px;">
                                            <h2 class="product-name"><a href="<?=base_url()?>Products/<?=$items['ItemId']?>/<?=$items['ProductName']?>">
                                                <?=$items['Size']?> <?=$items['Type']?> For <?=$items['Gender']?></a>
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
                                                    <?php  $reviews= $this->home_model->GetReviewPid($ItemId);?>
                                                    <div class="pro-avg-ratting">
                                                        <h4>Reviewed by <?=(!empty($reviews)?count($reviews):'0')?> customers </h4>
                                                    </div>
                                                    
                                                    <div class="rattings-wrapper">
                                                        <?php if(!empty($reviews)){ ?>
                                                            <?php foreach($reviews as $review){?>
                                                                   <div class="sin-rattings">
                                                                        <div class="ratting-author">
                                                                            <h3><?=$review['Name']?></h3>
                                                                            <div class="ratting-star">
                                                                                <?php for($i=1;$i<= $review['Rate'];$i++){?>
                                                                                    <i class="fa fa-star"></i>
                                                                                <?php }?>
                                                                            </div>
                                                                        </div>
                                                                        <p><?=$review['Description']?></p>
                                                                         <span style="color:grey;">Submitted <?=date('F ,d D y',strtotime($review['Date_Created']))?></span>

                                                                    </div>
                                                        <?php }}?>

                                                    </div>
                                                    <div class="ratting-form-wrapper">
                                                        <h3>Add your Comments</h3>
                                                       <form action="<?=base_url()?>Shop/ReviewSubmit" method="Post">
                                                            <div class=" row">
                                                                <div class="col-12 mb-4">
                                                                     
                                                                        <input type="hidden" name="ItemId" value="<?=$ItemId?>">
                                                                        <div class="star-rating">
                                                                        <h4>Overall Ratings</h4>
                                                                          <input id="star-5" type="radio" name="rating" value="5" checked="" />
                                                                          <label for="star-5" title="5 stars">
                                                                            <i class="active fa fa-star" aria-hidden="true"></i>
                                                                          </label>
                                                                          <input id="star-4" type="radio" name="rating" value="4" />
                                                                          <label for="star-4" title="4 stars">
                                                                            <i class="active fa fa-star" aria-hidden="true"></i>
                                                                          </label>
                                                                          <input id="star-3" type="radio" name="rating" value="3" />
                                                                          <label for="star-3" title="3 stars">
                                                                            <i class="active fa fa-star" aria-hidden="true"></i>
                                                                          </label>
                                                                          <input id="star-2" type="radio" name="rating" value="2" />
                                                                          <label for="star-2" title="2 stars">
                                                                            <i class="active fa fa-star" aria-hidden="true"></i>
                                                                          </label>
                                                                          <input id="star-1" type="radio" name="rating" value="1" />
                                                                          <label for="star-1" title="1 star">
                                                                            <i class="active fa fa-star" aria-hidden="true"></i>
                                                                          </label>
                                                                        </div>
                                                                </div>
                                                                <div class="ratting-form col-md-6 col-12 mb-4">
                                                                    <label for="name">Name:</label>
                                                                    <input id="name" name="Name" placeholder="Name" type="text" required="">
                                                                </div>
                                                                <div class=" ratting-form col-md-6 col-12 mb-4">
                                                                    <label for="email">Email:</label>
                                                                    <input id="email" name="Email" placeholder="Email" type="text" required="">
                                                                </div>
                                                                <div class="ratting-form col-12 mb-4">
                                                                    <label for="your-review">Your Review:</label>
                                                                    <textarea name="description" id="your-review"
                                                                              placeholder="Write a review"></textarea>
                                                                </div>
                                                                <div class="ratting-form col-12">
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
