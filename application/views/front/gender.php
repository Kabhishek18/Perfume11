<!--== Start Page Header ==-->
<div id="page-header-wrapper">
    <div class="container">
        <div class="row">
            <!-- Page Title Area Start -->
            <div class="col-6">
                <div class="page-title-wrap">
                    <h1><?=$gender?></h1>
                </div>
            </div>
            <!-- Page Title Area End -->

            <!-- Page Breadcrumb Start -->
            <div class="col-6 m-auto">
                <nav class="page-breadcrumb-wrap">
                    <ul class="nav justify-content-end">
                        <li><a href="<?=base_url()?>">Home</a></li>
                        <li><a href="javascript:void(0)" class="current">Category</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Page Breadcrumb End -->
        </div>
    </div>
</div>
<!--== End Page Header ==-->


<!--== Start Shop Page Wrapper ==-->
<div id="shop-page-wrapper" class="page-padding">
    <div class="container">
        <div class="row">
             <!-- Sidebar Area Start -->
             <div class="col-lg-3">
                <div id="sidebar-area-wrap">
                    <!-- Single Sidebar Item Start -->
                    <?php 
                        $sideres =$this->mongo_db2->get('products');
                        foreach($sideres as $pro){
                            $brandname[] = $pro['BrandName'];
                        }
                        $sidenavbrand = array_unique($brandname);
                        shuffle($sidenavbrand);
                    ?>
                    <div class="single-sidebar-wrap">
                        <h2 class="sidebar-title">Fragrances by Brand</h2>
                        <div class="sidebar-body">
                            <ul class="sidebar-list">
                                <?php $s =1; foreach($sidenavbrand as $brand){?>
                                <li><a href="<?=base_url()?>Brand/<?=(str_replace(" ","-",$brand))?>"><?=$brand?></a></li>
                                <?php $s++;if($s==15){break;}}?>    
                            </ul>
                        </div>
                    </div>
                    <!-- Single Sidebar Item End -->
                    <?php 
                        $sidetype =$this->mongo_db2->get('products');
                        foreach($sidetype as $stype){
                            $type[] = $stype['Type'];
                        }
                        $sidenavtype = array_unique($type);
                        shuffle($sidenavtype);
                    ?>                
                    <!-- Single Sidebar Item Start -->
                    <div class="single-sidebar-wrap">
                        <h2 class="sidebar-title">Fragrances by Type</h2>
                        <div class="sidebar-body">
                            <ul class="sidebar-list">
                                <?php $s=1; foreach($sidenavtype as $snt){?>
                                <li><a href="<?=base_url()?>Type/<?=(urlencode($snt))?>"><?=$snt?></a></li>
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
                            <div class="row  " id="pagingBox">

                           
                               
                            <?php $i=1; foreach($datalist as $items){?>
                                <!-- Single Product Start -->
                              
                                <div class="col-lg-4 col-sm-6" >
                                
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
                                <!--== End Quick View Content ==-->
                                <!-- Single Product End -->
                                <?php $i++;if($i==1000){break;}}?>
                             
                            </div>
                        </div>
                    </div>
                                
                    <div class="pagination-area-wrap">
                        <div class="container">
                            <div id='page_navigation'></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Shop Page Content -->
        </div>
    </div>
</div>



<!--== End Shop Page Wrapper ==-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<style>

    /*Pagination CSS*/
    #page_navigation {
    clear:both;
    margin: 20px 0;
    }
    #page_navigation a{
        padding:3px 6px;
        border:1px solid #a08d64;
        margin:2px;
        color:black;
        text-decoration:none
    }
    .active_page{
        background:#a08d64;
        color:white !important;
    }

</style> 

<script>
$(document).ready(function () {

//Pagination JS
//how much items per page to show
var show_per_page = 150; 
//getting the amount of elements inside pagingBox div
var number_of_items = $('#pagingBox').children().size();
//calculate the number of pages we are going to have
var number_of_pages = Math.ceil(number_of_items/show_per_page);

//set the value of our hidden input fields
$('#current_page').val(0);
$('#show_per_page').val(show_per_page);

//now when we got all we need for the navigation let's make it '

/* 
what are we going to have in the navigation?
    - link to previous page
    - links to specific pages
    - link to next page
*/
var navigation_html = '<a class="previous_link" href="javascript:previous();">Prev</a>';
var current_link = 0;
while(number_of_pages > current_link){
    navigation_html += '<a class="page_link" href="javascript:go_to_page(' + current_link +')" longdesc="' + current_link +'">'+ (current_link + 1) +'</a>';
    current_link++;
}
navigation_html += '<a class="next_link" href="javascript:next();">Next</a>';

$('#page_navigation').html(navigation_html);

//add active_page class to the first page link
$('#page_navigation .page_link:first').addClass('active_page');

//hide all the elements inside pagingBox div
$('#pagingBox').children().css('display', 'none');

//and show the first n (show_per_page) elements
$('#pagingBox').children().slice(0, show_per_page).css('display', 'block');

});



//Pagination JS

function previous(){

new_page = parseInt($('#current_page').val()) - 1;
//if there is an item before the current active link run the function
if($('.active_page').prev('.page_link').length==true){
go_to_page(new_page);
}

}

function next(){
new_page = parseInt($('#current_page').val()) + 1;
//if there is an item after the current active link run the function
if($('.active_page').next('.page_link').length==true){
go_to_page(new_page);
}

}
function go_to_page(page_num){
//get the number of items shown per page
var show_per_page = parseInt($('#show_per_page').val());

//get the element number where to start the slice from
start_from = page_num * show_per_page;

//get the element number where to end the slice
end_on = start_from + show_per_page;

//hide all children elements of pagingBox div, get specific items and show them
$('#pagingBox').children().css('display', 'none').slice(start_from, end_on).css('display', 'block');

/*get the page link that has longdesc attribute of the current page and add active_page class to it
and remove that class from previously active page link*/
$('.page_link[longdesc=' + page_num +']').addClass('active_page').siblings('.active_page').removeClass('active_page');

//update the current page input field
$('#current_page').val(page_num);
}
</script>