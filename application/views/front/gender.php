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
      
            <!-- Start Shop Page Content -->
            <div class="col-lg-12 order-first order-lg-last">
                <div class="shop-page-content-wrap">
             

                    <div class="shop-page-products-wrap">
                        <div class="products-wrapper product-grid-view physicianList">

                        <input type='hidden' id='current_page' />
                            <input type='hidden' id='show_per_page' />
                            <div class="row  " id="pagingBox">

                           
                               
                               <?php foreach($datalist as $items){?>
                                <!-- Single Product Start -->
                              
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
                               
                                <!-- Single Product End -->
                                <?php }?>
                             
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
jQuery(document).ready(function () {

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