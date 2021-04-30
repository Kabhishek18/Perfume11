<!--== Start Page Header ==-->
<div id="page-header-wrapper">
    <div class="container">
        <div class="row">
            <!-- Page Title Area Start -->
            <div class="col-6">
                <div class="page-title-wrap">
                    <h1>Review Our Product</h1>
                </div>
            </div>
            <!-- Page Title Area End -->

            <!-- Page Breadcrumb Start -->
            <div class="col-6 m-auto">
                <nav class="page-breadcrumb-wrap">
                    <ul class="nav justify-content-end">
                        <li><a href="<?=base_url()?>">Home</a></li>
                        <li><a href="javascript:void(0)" class="current">Cart</a></li>
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
</style>
<!--== Start Cart Page Wrapper ==-->
<div id="cart-page-wrapper" class="page-padding">
    <div class="container">
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
                </div>
            </div>
            <div class="col-lg-8 col-sm-6">
                <div class="product-details">
                    <h2 class="product-name" style="margin-bottom:5px;"><?=$ProductName?></h2>
                    By   <a href="<?=base_url()?>Brand/<?=(urlencode($BrandName))?>" class="product-cat-name"><?=$BrandName?></a> For <?=$Gender?>
                </div>

                    <form action="<?=base_url()?>Shop/ReviewSubmit" method="Post">
                        <input type="hidden" name="ItemId" value="<?=$ItemId?>">
                        <div class="star-rating">
                        <h4>Overall Ratings</h4>
                          <input id="star-5" type="radio" name="rating" value="5" />
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
                    <div class="form-group">
                        <label>Review Description</label>
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                        <div class="form-group">
                            <input type="submit" name="" value="Submit">
                        </div>
                    </form>
            </div>

            <!-- Single Product End -->
        </div>
    </div>
</div>            
                