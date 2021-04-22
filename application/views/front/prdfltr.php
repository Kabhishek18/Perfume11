
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<!--== Start Page Header ==-->
<div id="page-header-wrapper">
    <div class="container">
        <div class="row">
            <!-- Page Title Area Start -->
            <div class="col-6">
                <div class="page-title-wrap">
                    <h1>ALL Brand</h1>
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
<style type="text/css">
	.label{
		margin-bottom: 13px;
		border-bottom: 1px solid #dfdfdf;
		padding-bottom: 10px;
	}
</style>
<!--== Start Shop Page Wrapper ==-->
<div id="shop-page-wrapper" class="page-padding">
    <div class="container">
        <div class="row">
             <!-- Sidebar Area Start -->
             <div class="col-lg-3">
                <div id="sidebar-area-wrap">
                    <!-- Single Sidebar Item Start -->
               		<div class="single-sidebar-wrap">
                        <h2 class="sidebar-title">Fragrances by Price</h2>
                        <div class="sidebar-body">
                         	<input type="hidden" id="hidden_minimum_price" value="0">

                         	<input type="hidden" id="hidden_maximum_price" value="999999">
                         	<p id="price_show">1000-6500</p>
                         	<div id="price_range"></div>
                        </div>
                    </div>
                    <div class="single-sidebar-wrap">
                        <h2 class="sidebar-title">Fragrances by Brand</h2>
                        <div class="sidebar-body">
                            <div class="sidebar-list">
                            <?php foreach($brand_data as $brand){?>	<div class="label">
                            	<label >
                            	<input type="checkbox" class="common_selector brand" value="<?=$brand?>"> <?=$brand?>
                            </label>
                            </div>
                             
                        	<?php }?>
                            </div>
                        </div>
                    </div>
                     <div class="single-sidebar-wrap">
                        <h2 class="sidebar-title">Fragrances by Tye</h2>
                        <div class="sidebar-body">
                            <div class="sidebar-list">
                            <?php foreach($type_data as $type){?>	<div class="label">
                            	<label >
                            	<input type="checkbox" class="common_selector type" value="<?=$type?>"> <?=$type?>
                            </label>
                            </div>
                             
                        	<?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
            <!-- Single Sidebar Item End -->
            <div class="col-lg-9 order-first order-lg-last">
             	<div class="shop-page-content-wrap">
                    <div class="products-settings-option d-block d-md-flex">
                      <h2 align="center">Product Filter</h2>
                      <br />
                      <div align="center" id="pagination_link">
                          
                      </div>
                      <div class="row filter_data">
                          
                      </div>
                    </div>
           		</div>
            </div>

        </div>
    </div>
</div>            


<style type="text/css">
   #loading{
    text-align: center;
    background: url() no-repeat center;
    height: 150px;
   } 
</style>
<script type="text/javascript">
    $(document).ready(function() {
        filter_data(1);
        function filter_data(page) {

            $('filter_data').html("<div id='loading'></div>");
            var action ='fetch_data';
            var minimum_price =$('#hidden_minimum_price').val();

            var maximum_price =$('#hidden_maximum_price').val();

            //var brand =get_filter('brand');
            var brand ='Liz Claiborne';
             console.log(brand);
            // var typename = get_filter('type');
             var typename = 'Body Lotion';

            $.ajax({
                url:"<?= base_url()?>Home/fetch_data/"+page,
                method:"POST",
                dataType:"JSON",
                data:{ action:action,minimum_price:minimum_price,maximum_price:maximum_price,brand:brand,typename:typename },
                success:function (data) {
                    $('filter_data').html(data.product_list);
                    $('#pagination_link').html(data.pagination_link);
                }
            })
         }
        function get_filter(class_name) {
             var filter = [];
             $('.'+class_name+':checked').each(function() {
                filter.push($(this).val());
             });
             return filter;
         } 

        $(document).on('click','.pagination li a',function(event) {
            event.preventDefault();
            var page =$(this).data('ci-pagination-page');
            filter_data(page);
        }) ;

        $('.common_selector').click(function() {
            filter_data(1);
        });

        $('#price_range').slider({
            range:true,
            min:1,
            max:99999999,
            values:[1,99999999].
            step:500,
            stop:function (event, ui) {
                $('#price_show').html(ui.values[0] + ' - ' +ui.values[1]);
                $('#hidden_minimum_price').val(ui.values[0]);
                $('#hidden_maximum_price').val(ui.values[1]);
                filter_data(1);
            }
        })

    });
</script>